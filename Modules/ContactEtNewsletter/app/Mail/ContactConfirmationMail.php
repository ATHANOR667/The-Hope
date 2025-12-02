<?php

namespace Modules\ContactEtNewsletter\Mail;


use App\Models\HomeContent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $email;
    public  $subject;
    public string $content;
    public string $conversationId;


    public function __construct(string $name, string $email, string $subject, string $content, string $conversationId)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->content = $content;
        $this->conversationId = $conversationId;
    }


    public function build(): static
    {
        return $this->subject('Confirmation de réception de votre message')
            ->view('contactetnewsletter::mail.contact-confirmation',[
                'logo' => HomeContent::first()->meta['og:image']
            ]);
    }
}
