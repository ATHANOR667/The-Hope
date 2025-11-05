<?php

namespace Modules\ContactEtNewsletter\Services\Messaging;

use Illuminate\Contracts\Auth\Authenticatable;
use Modules\ContactEtNewsletter\Models\Messaging\Contact;
use Modules\ContactEtNewsletter\Models\Messaging\Conversation;
use Modules\ContactEtNewsletter\Models\Messaging\Message;

class ConversationService
{
    /**
     * Recherche ou crée un Contact basé sur l'identifiant du canal.
     * Pour l'omnicanal, il faut s'assurer que l'on vérifie tous les champs possibles.
     * @param string $channelType
     * @param string $identifier
     * @param array $contactData
     * @return Contact
     */
    public function findOrCreateContact(string $channelType, string $identifier, array $contactData = []): Contact
    {
        $field = match ($channelType) {
            Conversation::CHANNEL_WHATSAPP => 'phone_whatsapp',
            Conversation::CHANNEL_SMS      => 'phone_sms',
            Conversation::CHANNEL_EMAIL    => 'email',
            default                        => throw new \InvalidArgumentException("Canal non supporté: {$channelType}"),
        };

        $contact = Contact::where($field, $identifier)->first();

        if (!$contact) {
            $data = array_merge([$field => $identifier], $contactData);
            $contact = Contact::create($data);
        }

        return $contact;
    }

    /**
     * Recherche ou crée une Conversation pour un Contact sur un canal donné.
     * @param Contact $contact
     * @param string $channelType
     * @param string|null $subject
     * @return Conversation
     */
    public function findOrCreateConversation(Contact $contact, string $channelType, ?string $subject = null): Conversation
    {
         $conversation = Conversation::where('contact_id', $contact->id)
            ->where('channel_type', $channelType)
            ->where('status', Conversation::STATUS_OPEN)
            ->first();

        if (!$conversation) {
            $conversation = Conversation::create([
                'contact_id'   => $contact->id,
                'channel_type' => $channelType,
                'subject'      => $subject,
            ]);
        }

        return $conversation;
    }

    /**
     * Enregistre un message dans une conversation donnée.
     * @param Conversation $conversation
     * @param Authenticatable $sender L'objet expéditeur (Contact ou User/Admin)
     * @param string $content
     * @return Message
     */
    public function createMessage(Conversation $conversation, Authenticatable $sender, string $content): Message
    {
        return Message::create([
            'conversation_id' => $conversation->id,
            'sender_id'       => $sender->id,
            'sender_type'     => $sender::class,
            'content'         => $content,
            'sent_at'         => now(),
        ]);
    }
}
