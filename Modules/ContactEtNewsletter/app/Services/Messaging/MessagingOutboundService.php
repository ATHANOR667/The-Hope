<?php

namespace Modules\ContactEtNewsletter\Services\Messaging;

use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Modules\ContactEtNewsletter\Models\Messaging\Conversation;
use Modules\ContactEtNewsletter\Models\Messaging\Message;
use Modules\ContactEtNewsletter\Models\Messaging\Contact;
use Twilio\Exceptions\TwilioException;
use Illuminate\Support\Facades\Log;

class MessagingOutboundService
{
    protected ConversationService $conversationService;
    protected TwilioApiService $twilioApiService;
    protected EmailDeliveryService $emailDeliveryService;


    public function __construct(
        ConversationService $conversationService,
        TwilioApiService $twilioApiService,
        EmailDeliveryService $emailDeliveryService // Sera créé à l'étape suivante
    )
    {
        $this->conversationService = $conversationService;
        $this->twilioApiService = $twilioApiService;
        $this->emailDeliveryService = $emailDeliveryService;
    }

    /**
     * Traite l'envoi d'une réponse de l'administrateur.
     * @param Conversation $conversation Le fil de discussion auquel répondre.
     * @param Authenticatable $admin L'administrateur qui envoie le message.
     * @param string $content Le contenu du message.
     * @return Message Le message enregistré.
     * @throws Exception
     */
    public function sendReply(Conversation $conversation, Authenticatable $admin, string $content): Message
    {
        $message = $this->conversationService->createMessage(
            $conversation,
            $admin,
            $content
        );

        $contact = $conversation->contact;

        try {
            switch ($conversation->channel_type) {
                case Conversation::CHANNEL_WHATSAPP:
                    $this->sendViaWhatsApp($contact, $content);
                    break;

                case Conversation::CHANNEL_SMS:
                    $this->sendViaSms($contact, $content);
                    break;

                case Conversation::CHANNEL_EMAIL:
                    $this->sendViaEmail($conversation, $contact, $content);
                    break;

                default:
                    throw new Exception("Canal d'envoi non supporté: {$conversation->channel_type}");
            }

            return $message;

        } catch (TwilioException $e) {
            Log::error("Erreur Twilio lors de l'envoi vers {$conversation->channel_type}: " . $e->getMessage());
            // Propagation de l'exception pour que Livewire puisse la gérer
            throw new Exception("Échec de l'envoi Twilio : " . $e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            Log::error("Erreur lors de l'envoi de la réponse: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * @throws TwilioException|Exception
     */
    protected function sendViaWhatsApp(Contact $contact, string $content): void
    {
        if (empty($contact->phone_whatsapp)) {
            throw new Exception("Le contact n'a pas de numéro WhatsApp enregistré.");
        }
        $from = config('twillio.Twilio_whatsapp');
        if (empty($from)) {
            throw new Exception("Numéro Twilio WhatsApp FROM non configuré.");
        }
        $this->twilioApiService->sendWhatsApp($contact->phone_whatsapp, $content, $from);
    }

    protected function sendViaSms(Contact $contact, string $content): void
    {
        if (empty($contact->phone_sms)) {
            throw new Exception("Le contact n'a pas de numéro SMS enregistré.");
        }
        $from = config('twillio.Twilio_phone');
        if (empty($from)) {
            throw new Exception("Numéro Twilio SMS FROM non configuré.");
        }
        $this->twilioApiService->sendSms($contact->phone_sms, $content, $from);
    }

    /**
     * @throws Exception
     */
    protected function sendViaEmail(Conversation $conversation, Contact $contact, string $content): void
    {
        if (empty($contact->email)) {
            throw new Exception("Le contact n'a pas d'adresse e-mail enregistrée.");
        }
        $this->emailDeliveryService->sendReply($conversation, $contact, $content);
    }
}
