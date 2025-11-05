<?php

namespace Modules\Donation\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RefundFeedback extends Mailable
{
    use Queueable, SerializesModels;

    public string $donateur;
    public float $montantRembourse;
    public string $devise;
    public string $originalReference;
    public string $refundReference;

    /**
     * Crée une nouvelle instance de message.
     */
    public function __construct(
        string $donateur,
        float $montantRembourse,
        string $devise,
        string $originalReference,
        string $refundReference
    ) {
        $this->donateur = $donateur ?: 'Cher donateur';
        $this->montantRembourse = $montantRembourse;
        $this->devise = $devise;
        $this->originalReference = $originalReference;
        $this->refundReference = $refundReference;
    }

    /**
     * Construit le message.
     */
    public function build(): self
    {
        return $this->subject('Confirmation de Remboursement - The Hope')
            ->view('donation::Mail.Payment.refundFeedback');
    }
}
