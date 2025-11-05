<?php

namespace Modules\Donation\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentFailedFeedback extends Mailable
{
    use Queueable, SerializesModels;

    public string $donateur;
    public float $montant;
    public string $devise;
    public string $reference;
    public string $errorMessage;

    /**
     * Crée une nouvelle instance de message.
     */
    public function __construct(
        string $donateur,
        float $montant,
        string $devise,
        string $reference,
        string $errorMessage = 'Une erreur inconnue est survenue.'
    ) {
        $this->donateur = $donateur ?: 'Cher donateur';
        $this->montant = $montant;
        $this->devise = $devise;
        $this->reference = $reference;
        $this->errorMessage = $errorMessage;
    }

    /**
     * Construit le message.
     */
    public function build(): self
    {
        return $this->subject('Problème avec votre Don à The Hope')
            ->view('donation::Mail.Payment.paymentFailedFeedback');
    }
}
