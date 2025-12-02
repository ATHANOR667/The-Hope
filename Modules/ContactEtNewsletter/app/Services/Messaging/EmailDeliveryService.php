<?php

namespace Modules\ContactEtNewsletter\Services\Messaging;

use Modules\ContactEtNewsletter\Models\Messaging\Conversation;
use Modules\ContactEtNewsletter\Models\Messaging\Contact;
use Modules\ContactEtNewsletter\Mail\ConversationReplyMail;
use Illuminate\Support\Facades\Mail;

class EmailDeliveryService
{
    /**
     * Envoie une réponse par e-mail au contact.
     * @param Conversation $conversation
     * @param Contact $contact
     * @param string $content
     * @return void
     */
    public function sendReply(Conversation $conversation, Contact $contact, string $content): void
    {
        Mail::to($contact->email)->send(new ConversationReplyMail($conversation, $content));
    }
}
