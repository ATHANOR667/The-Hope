<?php

namespace App\Services\PSP;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\Donation\Mail\DonFeedback;
use Modules\Donation\Mail\PaymentFailedFeedback;
use Modules\Donation\Mail\RefundFeedback;
use Modules\Donation\Models\Don;
use Modules\Donation\Models\Refund;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;
use Stripe\Webhook;

class StripeService
{
    protected StripeClient $stripe;
    protected string $webhookSecret;

    public function __construct()
    {
        $this->stripe = new StripeClient(env('STRIPE_SECRET'));
        $this->webhookSecret = env('STRIPE_WEBHOOK_SECRET');
    }

    public function createCheckoutSession(
        float $amount,
        string $currency,
        string $donatorEmail,
        string $donatorName,
        string $successUrl,
        string $cancelUrl
    ): array {
        try {
            $unitAmount = (int) ($amount * 100);

            $checkoutSession = $this->stripe->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => strtolower($currency),
                        'unit_amount' => $unitAmount,
                        'product_data' => [
                            'name' => 'Don',
                            'description' => 'Contribution financière.',
                        ],
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'customer_email' => $donatorEmail,
                'success_url' => $successUrl . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => $cancelUrl,
                'metadata' => [
                    'donator_email' => $donatorEmail,
                    'donator_name' => $donatorName,
                ],
            ]);

            return [
                'session_id' => $checkoutSession->id,
                'url' => $checkoutSession->url,
            ];
        } catch (ApiErrorException $e) {
            Log::error('Stripe API error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function handleWebhook(Request $request): JsonResponse
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $this->webhookSecret);
        } catch (\Exception $e) {
            Log::error('Stripe Webhook Error: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid'], 400);
        }

        switch ($event->type) {
            case 'checkout.session.completed':
                $this->handleCheckoutSessionCompleted($event->data->object);
                break;
            case 'payment_intent.payment_failed':
                $this->handlePaymentIntentFailed($event->data->object);
                break;
            case 'charge.refunded':
                $this->handleChargeRefunded($event->data->object);
                break;
            default:
                Log::info('Unhandled Stripe event: ' . $event->type);
        }

        return response()->json(['status' => 'success']);
    }

    protected function handleCheckoutSessionCompleted($session): void
    {
        $don = Don::where('token', $session->id)->first();
        if (! $don) return;

        $montant = $session->amount_total / 100;
        $devise = strtoupper($session->currency);
        $paymentIntentId = $session->payment_intent;

        if ($session->payment_status === 'paid') {
            $don->update([
                'status' => 'completed',
                'reference' => $paymentIntentId,
                'operateur' => 'Stripe',
                'montant' => $montant,
                'devise' => $devise,
            ]);

            try {
                Mail::to($don->emailDonateur)->send(new DonFeedback(
                    $don->prenom . ' ' . $don->nom,
                    $don->montant,
                    $don->devise,
                    $don->reference
                ));
            } catch (Exception $e) {
                Log::error('Mail error: ' . $e->getMessage());
            }
        } else {
            $don->update(['status' => 'failed', 'operateur' => 'Stripe']);
        }
    }

    protected function handlePaymentIntentFailed($paymentIntent): void
    {
        $don = Don::where('reference', $paymentIntent->id)->first();
        if (! $don || $don->status === 'failed') return;

        $don->update(['status' => 'failed', 'operateur' => 'Stripe']);

        try {
            Mail::to($don->emailDonateur)->send(new PaymentFailedFeedback(
                $don->prenom . ' ' . $don->nom,
                $don->montant,
                $don->devise,
                $don->reference,
                $paymentIntent->last_payment_error->message ?? 'Échec du paiement.'
            ));
        } catch (Exception $e) {
            Log::error('Mail error: ' . $e->getMessage());
        }
    }

    protected function handleChargeRefunded($charge): void
    {
        $don = Don::where('reference', $charge->payment_intent)->first();
        if (! $don) return;

        if ($charge->amount_refunded === $charge->amount) {
            $don->update(['status' => 'refunded']);
        }

        Refund::create([
            'don_id' => $don->id,
            'payment_intent_id' => $charge->payment_intent,
            'refund_id' => $charge->id,
            'status' => 'succeeded',
            'operateur' => 'Stripe',
            'montant' => $charge->amount_refunded / 100,
            'devise' => strtoupper($charge->currency),
        ]);

        try {
            Mail::to($don->emailDonateur)->send(new RefundFeedback(
                $don->prenom . ' ' . $don->nom,
                $charge->amount_refunded / 100,
                strtoupper($charge->currency),
                $don->reference,
                $charge->id
            ));
        } catch (Exception $e) {
            Log::error('Mail error: ' . $e->getMessage());
        }
    }

    public function refundDon(Don $don, ?float $amount = null): \Stripe\Refund
    {
        if (empty($don->reference)) {
            throw new Exception('Payment Intent manquant.');
        }

        $params = ['payment_intent' => $don->reference];
        if ($amount !== null) {
            $params['amount'] = (int) ($amount * 100);
        }

        $result = $this->stripe->refunds->create($params);

        Refund::create([
            'don_id' => $don->id,
            'payment_intent_id' => $result->payment_intent,
            'refund_id' => $result->id,
            'status' => $result->status,
            'operateur' => 'Stripe',
            'montant' => $result->amount / 100,
            'devise' => strtoupper($result->currency),
        ]);

        return $result;
    }
}
