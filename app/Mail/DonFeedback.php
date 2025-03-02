<?php

namespace App\Mail;

use App\Models\Cause;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonFeedback extends Mailable
{
    use Queueable, SerializesModels;

    public  int $montant ;
    public  string $donateur ;

    public Cause $cause;

    public string $reference ;


    /**
     * Create a new message instance.
     */
    public function __construct($donateur  , $montant , Cause $cause , string $reference)
    {
        $this->donateur = $donateur ? $donateur : 'Anonyme';
        $this->montant = $montant;
        $this->cause = $cause;
        $this->reference = $reference;
    }

    public function build(): DonFeedback
    {
       /* $pdf = Pdf::loadView('Mail.Attachment.invoice',
            [
                'donnateur' => $this->donnateur,
                'montant' => $this->montant ,
                'cause' => $this->cause,
                'reference' => $this->reference,
            ]);*/

        return $this->subject('The hope vous remercie')
            ->view('Mail.donateFeedback')
           /* ->attachData($pdf->output(), 'facture.pdf', [
                'mime' => 'application/pdf',
            ])*/;
    }
}
