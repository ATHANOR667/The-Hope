<?php

namespace Modules\Donation\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PSP\NotchpayService;
use App\Services\PSP\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Modules\Donation\Mail\DonFeedback;
use Modules\Donation\Mail\PaymentFailedFeedback;
use Modules\Donation\Models\Don;
use NotchPay\Exceptions\ApiException as NotchPayApiException;
use NotchPay\Exceptions\NotchPayException;
use Stripe\Exception\ApiErrorException;

class PspController extends Controller
{
    protected NotchpayService $notchpayService;
    protected StripeService $stripeService;

    public function __construct(NotchpayService $notchpayService, StripeService $stripeService)
    {
        $this->notchpayService = $notchpayService;
        $this->stripeService = $stripeService;
    }



    /**
     * Gère l'initialisation des dons via NotchPay.
     */
    public function donateNotchpay(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $url = route('visitor.donate');
        $request->validate([
            'montant' => 'required|numeric|min:1',
            'email' => 'required|email',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);

        $email = Crypt::encrypt($request->input('email'));
        $nom = Crypt::encrypt($request->input('nom'));
        $prenom = Crypt::encrypt($request->input('prenom'));
        $currency = 'XAF';

        try {
            $tranx = $this->notchpayService->initializePayment(
                (float) $request->input('montant'),
                $request->input('email'),
                route('payment.verify.notchpay', [
                    'email' => $email,
                    'nom' => $nom,
                    'prenom' => $prenom,
                ]),
                $request->input('email') . '-' . now()->format('d-m-Y-H-i-s')
            );

            if ($tranx && isset($tranx->authorization_url)) {
                return redirect($tranx->authorization_url);
            } else {
                Log::error('NotchPay - URL d\'autorisation manquante ou transaction null.');
                return redirect($url)->with('error_', 'Erreur inattendue lors de l\'initialisation du paiement.');
            }

        } catch (NotchPayException $e) {
             try {
                Mail::to(Crypt::decrypt($email))->send(new PaymentFailedFeedback(
                    Crypt::decrypt($nom) . ' ' . Crypt::decrypt($prenom),
                    (float) $request->input('montant'),
                    $currency,
                    $request->input('email') . '-' . now()->format('d-m-Y-H-i-s').Str::uuid(),
                    'Erreur lors de l\'initialisation du paiement : ' . $e->getMessage()
                ));
            } catch (\Exception $mailE) {
                Log::error('Erreur lors de l\'envoi du mail d\'échec NotchPay (initialisation) : ' . $mailE->getMessage());
            }

            return redirect($url)->with('error_', 'Erreur lors de l\'initialisation du paiement : ' . $e->getMessage());
        }
    }

    /**
     * Gère la vérification des dons via NotchPay (callback).
     */
    public function verifyNotchpay(Request $request, string $email, string $nom, string $prenom): \Illuminate\Http\RedirectResponse
    {
        $url = route('visitor.donate');

        try {
            $email = Crypt::decrypt($email);
            $nom = Crypt::decrypt($nom);
            $prenom = Crypt::decrypt($prenom);
        } catch (\Exception $e) {
            Log::error('Erreur lors du déchiffrement des données (cause, email, nom, prenom) GuestController::verifyNotchpay() : ' . $e->getMessage());
            session()->flash('error_', 'Données de paiement invalides.');
            return redirect($url);
        }

        $reference = $request->input('reference');
        if (!$reference) {
            session()->flash('error_', 'Référence de paiement non fournie.');
            return redirect($url);
        }

        try {
            $tranx = $this->notchpayService->verifyPayment($reference);

            if ($this->notchpayService->isPaymentComplete($tranx)) {
                $existingDon = Don::where('reference', $reference)->first();

                if ($existingDon && $existingDon->status === 'completed') {
                    session()->flash('info', 'Cette transaction a déjà été traitée avec succès.');
                    return redirect($url);
                }


                $donAmount = (float) $tranx->transaction->amount;
                $donCurrency = $tranx->transaction->currency;

                $don = $existingDon ?? new Don();
                $don->fill([
                    'reference'       => $reference,
                    'montant'         => $donAmount,
                    'devise'          => $donCurrency,
                    'emailDonateur'   => $email,
                    'nom'             => $nom,
                    'prenom'          => $prenom,
                    'status'          => 'completed',
                    'operateur'       => 'NotchPay',
                    'token'           => null,
                ])->save();


                Mail::to($email)->send(new DonFeedback(
                    $prenom . ' ' . $nom,
                    $don->montant,
                    $don->devise,
                    $don->reference
                ));

                session()->flash('success_', 'Paiement réussi et traité. Un email de confirmation vous a été envoyé.');
                return redirect($url);

            } else {
                session()->flash('error_', 'Paiement non finalisé ou échoué. Statut actuel : ' . $tranx->transaction->status);
                Log::warning('NotchPay - Paiement non complet pour la référence : ' . $reference . ' Statut : ' . $tranx->transaction->status);

                try {
                    Mail::to($email)->send(new PaymentFailedFeedback(
                        $nom . ' ' . $prenom,
                        (float) $tranx->transaction->amount,
                        $tranx->transaction->currency,
                        $reference,
                        'Paiement non finalisé. Statut: ' . $tranx->transaction->status
                    ));
                } catch (\Exception $mailE) {
                    Log::error('Erreur lors de l\'envoi du mail d\'échec NotchPay (non complet) : ' . $mailE->getMessage());
                }

                return redirect($url);
            }

        } catch (NotchPayApiException $e) {
            session()->flash('error_', 'Erreur lors de la vérification du paiement : ' . $e->getMessage());
            return redirect($url);
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'enregistrement du don ou de l\'envoi du mail GuestController::verifyNotchpay() : ' . $e->getMessage());
            session()->flash('error_', 'Paiement réussi mais une erreur est survenue lors de l\'enregistrement ou de l\'envoi de la confirmation.');
            return redirect($url);
        }
    }

    /**
     * Gère l'initialisation des dons via Stripe.
     */
    public function donateStripe(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $url = route('visitor.donate');
        $request->validate([
            'montant' => 'required|numeric|min:1',
            'email' => 'required|email',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);

        Log::warning($request->input('cause_id'));

        $montant = (float) $request->input('montant');
        $email = $request->input('email');
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $cause_id = $request->input('cause_id') ? $request->input('cause_id'): 1;
        $currency = $request->input('currency');

        try {
             $don = Don::create([
                'nom'           => $nom,
                'prenom'        => $prenom,
                'emailDonateur' => $email,
                'montant'       => $montant,
                'devise'        => $currency,
                'status'        => 'pending',
                'operateur'     => 'Stripe',
                'reference'     => null,
                'token'         => null,
            ]);


            $successUrl = route('payment.success.stripe', ['don' => $don->id]);
            $cancelUrl = route('payment.cancel.stripe', ['don' => $don->id]);

            $checkoutSession = $this->stripeService->createCheckoutSession(
                $montant,
                $currency,
                $email,
                $prenom . ' ' . $nom,
                $successUrl,
                $cancelUrl,
            );

            $don->update(['token' => $checkoutSession['session_id']]);

            return redirect($checkoutSession['url']);

        } catch (ApiErrorException $e) {
            Log::error('Stripe - Erreur lors de l\'initialisation de la session Checkout : ' . $e->getMessage());
            if (isset($don) && $don->exists) {
                $don->update(['status' => 'failed']);
                try {
                    Mail::to($email)->send(new PaymentFailedFeedback(
                        $nom . ' ' . $prenom,
                        $montant,
                        $currency,
                        'N/A',
                        'Erreur d\'initialisation du paiement Stripe: ' . $e->getMessage()
                    ));
                } catch (\Exception $mailE) {
                    Log::error('Erreur lors de l\'envoi du mail d\'échec Stripe (initialisation) : ' . $mailE->getMessage());
                }
            }
            return redirect($url)->with('error_', 'Erreur lors de l\'initialisation du paiement Stripe : ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Erreur générale dans donateStripe : ' . $e->getMessage());

            return redirect($url)->with('error_', 'Une erreur inattendue est survenue lors de l\'initialisation du paiement.');
        }
    }

    /**
     * Gère la redirection après un paiement Stripe réussi.
     * Le statut final du don sera géré par le webhook.
     */
    public function successStripe(Request $request, Don $don): \Illuminate\Http\RedirectResponse
    {
        $url = route('visitor.donate');
        session()->flash('info', 'Votre don est en cours de traitement. Vous recevrez une confirmation par email sous peu.');
        return redirect($url);
    }

    /**
     * Gère la redirection après l'annulation d'un paiement Stripe.
     */
    public function cancelStripe(Request $request, Don $don): \Illuminate\Http\RedirectResponse
    {
        $url = route('visitor.donate');

        if ($don->status === 'pending') {
            $don->update(['status' => 'canceled']);
        }
        session()->flash('error_', 'Le paiement a été annulé. Vous pouvez réessayer.');
        return redirect($url);
    }
}
