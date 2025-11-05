<?php

namespace Modules\Donation\Services;

use Illuminate\Support\Facades\Log;
use NotchPay\Exceptions\ApiException;
use NotchPay\Exceptions\InvalidArgumentException;
use NotchPay\Exceptions\NotchPayException;
use NotchPay\NotchPay;
use NotchPay\Payment;

class NotchpayService
{
    protected string $apiKey;

    public function __construct()
    {
        $this->apiKey = env('NOTCHPAY_API_KEY');
        NotchPay::setApiKey($this->apiKey);
    }

    /**
     * Initialise un paiement avec NotchPay.
     *
     * @param float $amount Le montant du paiement.
     * @param string $email L'email du donateur.
     * @param string $callbackUrl L'URL de rappel après le paiement.
     * @param string $reference La référence unique de la transaction.
     * @return object|null Retourne l'objet transaction de NotchPay en cas de succès, null sinon.
     * @throws InvalidArgumentException En cas d'erreur d'initialisation.
     */
    public function initializePayment(float $amount, string $email, string $callbackUrl, string $reference): ?object
    {
        try {
            $tranx = Payment::initialize([
                'amount' => $amount,
                'email' => $email,
                'currency' => 'XAF',
                'callback' => $callbackUrl,
                'reference' => $reference,
            ]);
            return $tranx;
        } catch (NotchPayException $e) {
            Log::error('NotchPay - Erreur lors de l\'initialisation du paiement : ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Vérifie le statut d'un paiement NotchPay.
     *
     * @param string $reference La référence de la transaction à vérifier.
     * @return object|null Retourne l'objet transaction de NotchPay en cas de succès, null sinon.
     * @throws InvalidArgumentException En cas d'erreur lors de la vérification.
     */
    public function verifyPayment(string $reference): ?object
    {
        try {
            $tranx = Payment::verify($reference);
            return $tranx;
        } catch (ApiException $e) {
            Log::error('NotchPay - Erreur lors de la vérification du paiement : ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Vérifie si le statut de la transaction est "complete".
     *
     * @param object $transaction L'objet transaction retourné par NotchPay.
     * @return bool
     */
    public function isPaymentComplete(object $transaction): bool
    {
        return isset($transaction->transaction->status) && $transaction->transaction->status === 'complete';
    }
}
