<?php

namespace Modules\Donation\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonFeedback extends Mailable
{
    use Queueable, SerializesModels;

    public float $montant;
    public string $devise;
    public string $donateur;
    public string $reference;

    /**
     * Crée une nouvelle instance de message.
     */
    public function __construct(
        string $donateur,
        float $montant,
        string $devise,
        string $reference
    ) {
        $this->donateur = $donateur ?: 'Cher donateur';
        $this->montant = $montant;
        $this->devise = $devise;
        $this->reference = $reference;
    }

    /**
     * Construit le message.
     */
    public function build(): self
    {
        return $this->subject('Merci pour votre Don - The Hope')
        ->view('donation::Mail.Payment.donateFeedback');
    }
}
