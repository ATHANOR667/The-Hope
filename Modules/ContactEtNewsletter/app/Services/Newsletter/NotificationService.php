<?php

namespace Modules\ContactEtNewsletter\Services\Newsletter;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use InvalidArgumentException;
use Modules\ContactEtNewsletter\Mail\NewsletterMessageMail;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterDelivery;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterMessage;
use Modules\ContactEtNewsletter\Models\Newsletter\Subscriber;

class NotificationService
{
    protected TwilioService $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    /**
     * Envoyer une notification générique.
     */
    public function send(Subscriber $recipient, NewsletterMessage $message, NewsletterDelivery $delivery, ?array $channels = null): void
    {
        $channels = $channels ?? ['mail', 'sms', 'whatsapp'];

        foreach ($channels as $channel) {
            $this->sendViaChannel($channel, $recipient, $delivery, $message);
        }
    }

    /**
     * Envoie via un canal spécifique
     */
    protected function sendViaChannel(string $channel, Subscriber $recipient, NewsletterDelivery $delivery, NewsletterMessage $message): void
    {
        try {
            switch ($channel) {
                case 'mail':
                    if ($recipient->email) {
                        Mail::to($recipient->email)->send(new NewsletterMessageMail($message, $recipient, $delivery));
                        $this->markDelivered($delivery, 'mail');
                    }
                    break;

                case 'sms':
                    if ($recipient->phone) {
                        $this->twilioService->sendSms($recipient->phone, $message);
                        $this->markDelivered($delivery, 'sms');
                    }
                    break;

                case 'whatsapp':
                    if ($recipient->phone) {
                        $this->twilioService->sendWhatsApp($recipient->phone, $message);
                        $this->markDelivered($delivery, 'whatsapp');
                    }
                    break;

                default:
                    throw new InvalidArgumentException("Canal '$channel' non supporté.");
            }
        } catch (\Exception $e) {
            Log::error("Échec envoi notification ($channel)", [
                'recipient' => $recipient->id,
                'error' => $e->getMessage(),
            ]);

            $this->markFailed($delivery, $e->getMessage());
        }
    }

    protected function markDelivered(NewsletterDelivery $delivery, string $channel): void
    {
        $delivery->update([
            'channel' => $channel,
            'delivered_at' => now(),
            'status' => 'success',
        ]);
    }

    protected function markFailed(NewsletterDelivery $delivery, string $error): void
    {
        $delivery->update([
            'status' => 'failed',
            'error_message' => substr($error, 0, 255),
        ]);
    }
}
