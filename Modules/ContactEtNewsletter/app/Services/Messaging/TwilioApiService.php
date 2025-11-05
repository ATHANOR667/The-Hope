<?php

namespace Modules\ContactEtNewsletter\Services\Messaging;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;
use Twilio\Security\RequestValidator;

class TwilioApiService
{
    protected Client $twilioClient;
    protected string $authToken;
    protected string $accountSid;
    protected bool $configured = false;
    protected ?string $error = null;

    protected function ensureClient(): void
    {
        if ($this->twilioClient !== null) {
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
            $this->twilioClient = new Client($sid, $token);
            $this->authToken = $token ;
            $this->accountSid = $sid ;
            $this->configured = true;
        } catch (\Throwable $e) {
            $this->error = 'Échec initialisation Twilio : ' . $e->getMessage();
            Log::error('Twilio init error', ['error' => $e->getMessage()]);
            $this->configured = false;
        }
    }



    /**
     * Vérifie si le webhook entrant vient réellement de Twilio.
     * @param Request $request
     * @return bool
     */
    public function verifyWebhookSignature(Request $request): bool
    {
        $this->ensureClient();
        $validator = new RequestValidator($this->authToken);

        $signature = $request->header('X-Twilio-Signature');
        $url = $request->fullUrl();
        $params = $request->all();

        return $validator->validate($signature, $url, $params);
    }


    /**
     * Envoie un message SMS standard.
     * @param string $to Le numéro de destination (E.164)
     * @param string $content Le contenu du message
     * @param string $from Le numéro Twilio (expéditeur)
     * @throws TwilioException
     * @throws Exception
     */
    public function sendSms(string $to, string $content, string $from): void
    {
        $this->ensureClient();

        if (!$this->configured) {
            throw new Exception($this->error ?? 'Twilio non disponible.');
        }

        try {
            $this->twilioClient->messages->create(
                $to,
                [
                    'from' => $from,
                    'body' => $content,
                ]
            );
        } catch (TwilioException $e) {
            Log::error('SMS failed', ['to' => $to, 'error' => $e->getMessage()]);
            throw $e;
        }

    }

    /**
     * Envoie un message WhatsApp.
     * @param string $to Le numéro de destination (E.164)
     * @param string $content Le contenu du message
     * @param string $from Le numéro WhatsApp Twilio (E.164)
     * @throws TwilioException
     * @throws Exception
     */
    public function sendWhatsApp(string $to, string $content, string $from): void
    {
        $this->ensureClient();

        if (!$this->configured) {
            throw new Exception($this->error ?? 'Twilio non disponible.');
        }

        try {
            $this->twilioClient->messages->create(
                "whatsapp:{$to}",
                [
                    'from' => "whatsapp:{$from}",
                    'body' => $content,
                ]
            );
        } catch (TwilioException $e) {
            Log::error('SMS failed', ['to' => $to, 'error' => $e->getMessage()]);
            throw $e;
        }

    }
}
