<?php

namespace Modules\ContactEtNewsletter\Mail;


use App\Models\HomeContent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $content;
    public $conversationId;

    /**
     * Crée une nouvelle instance de message.
     *
     * @return void
     */
    public function __construct(string $name, string $email, string $subject, string $content, int $conversationId)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->content = $content;
        $this->conversationId = $conversationId;
    }

    /**
     * Construit le message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmation de réception de votre message')
            ->view('contactetnewsletter.mail.contact-confirmation',[
                'logo' => HomeContent::first()->meta['og:image']
            ]);
    }
}
