<?php

namespace Modules\ContactEtNewsletter\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterDelivery;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterMessage;
use Modules\ContactEtNewsletter\Models\Newsletter\Subscriber;

class NewsletterMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public NewsletterMessage $newsletterMessage;
    public Subscriber $subscriber;
    public ?NewsletterDelivery $delivery;

    public function __construct(NewsletterMessage $newsletterMessage, Subscriber $subscriber, ?NewsletterDelivery $delivery)
    {
        $this->newsletterMessage = $newsletterMessage;
        $this->subscriber = $subscriber;
        $this->delivery = $delivery;
    }

    public function build(): NewsletterMessageMail
    {
        return $this->subject($this->newsletterMessage->title)
        ->view('contactetnewsletter::mail.newsletter-message-mail')
            ->with([
                'newsletterMessage' => $this->newsletterMessage,
                'subscriber' => $this->subscriber,
                'delivery' => $this->delivery,
            ]);
    }
}
