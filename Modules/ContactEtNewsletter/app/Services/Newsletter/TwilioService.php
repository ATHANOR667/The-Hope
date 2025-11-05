<?php

namespace Modules\ContactEtNewsletter\Services\Newsletter;

use Exception;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterMessage;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;
use Illuminate\Support\Facades\Log;

class TwilioService
{
    protected ?Client $client = null;
    protected bool $configured = false;
    protected ?string $error = null;

    /**
     * Initialise le client uniquement quand nécessaire
     */
    protected function ensureClient(): void
    {
        if ($this->client !== null) {
            return;
        }

        $sid   = config('services.twilio.sid');
        $token = config('services.twilio.token');

        if (empty($sid) || empty($token)) {
            $this->error = 'Twilio SID ou Token manquant dans la configuration.';
            Log::warning('Twilio non configuré', [
                'sid' => !empty($sid),
                'token' => !empty($token),
            ]);
            $this->configured = false;
            return;
        }

        try {
            $this->client = new Client($sid, $token);
            $this->configured = true;
        } catch (\Throwable $e) {
            $this->error = 'Échec initialisation Twilio : ' . $e->getMessage();
            Log::error('Twilio init error', ['error' => $e->getMessage()]);
            $this->configured = false;
        }
    }

    public function sendSms(string $to, NewsletterMessage $message): void
    {
        $this->ensureClient();

        if (!$this->configured) {
            throw new \Exception($this->error ?? 'Twilio non disponible.');
        }

        $body = $message->content ?? $message->title ?? 'Message';

        try {
            $this->client->messages->create($to, [
                'from' => config('services.twilio.from'),
                'body' => $body,
            ]);
        } catch (TwilioException $e) {
            Log::error('SMS failed', ['to' => $to, 'error' => $e->getMessage()]);
            throw $e;
        }
    }

    /**
     * @throws TwilioException
     * @throws Exception
     */
    public function sendWhatsApp(string $to, NewsletterMessage $message): void
    {
        $this->ensureClient();

        if (!$this->configured) {
            throw new Exception($this->error ?? 'Twilio non disponible.');
        }

        $body = $message->content ?? $message->title ?? 'Message';

        try {
            $this->client->messages->create("whatsapp:{$to}", [
                'from' => 'whatsapp:' . config('services.twilio.whatsapp_from'),
                'body' => $body,
            ]);
        } catch (TwilioException $e) {
            Log::error('WhatsApp failed', ['to' => $to, 'error' => $e->getMessage()]);
            throw $e;
        }
    }
}
