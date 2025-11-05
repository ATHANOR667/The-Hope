<?php

namespace Modules\ContactEtNewsletter\Services\Messaging;

use Exception;
use Illuminate\Http\Request;
use Modules\ContactEtNewsletter\Models\Messaging\Conversation;

class TwilioInboundService
{
    protected ConversationService $conversationService;
    protected TwilioApiService $twilioApiService;

    public function __construct(ConversationService $conversationService , TwilioApiService $twilioApiService)
    {
        $this->conversationService = $conversationService;
        $this->twilioApiService = $twilioApiService;

    }

    /**
     * Traite un webhook Twilio entrant (SMS ou WhatsApp).
     * @param Request $request
     * @throws Exception
     */
    public function processInbound(Request $request): void
    {
        $this->twilioApiService->verifyWebhookSignature($request);

        $from = $request->input('From');
        $content = $request->input('Body');

        if (empty($from) || empty($content)) {
            throw new Exception("Données Twilio manquantes (From ou Body).");
        }

        if (str_starts_with($from, 'whatsapp:')) {
            $channelType = Conversation::CHANNEL_WHATSAPP;
            $identifier = substr($from, 11);
        } else {
            $channelType = Conversation::CHANNEL_SMS;
            $identifier = $from;
        }

        $contact = $this->conversationService->findOrCreateContact($channelType, $identifier);

        $conversation = $this->conversationService->findOrCreateConversation($contact, $channelType, substr($content, 0, 50) . '...');

        $this->conversationService->createMessage($conversation, $contact, $content);
    }
}
