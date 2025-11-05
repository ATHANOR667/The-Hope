<?php

namespace Modules\ContactEtNewsletter\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ContactEtNewsletter\Services\Messaging\TwilioApiService;
use Modules\ContactEtNewsletter\Services\Messaging\TwilioInboundService;

// IMPORTANT: Vous devrez mettre en place une validation de signature Twilio
// pour vous assurer que le webhook vient bien de Twilio et non d'un tiers malveillant.

class TwilioWebhookController extends Controller
{
    protected TwilioInboundService $inboundService;

    public function __construct(TwilioInboundService $inboundService )
    {
        $this->inboundService = $inboundService;
    }

    /**
     * Gère la réception des webhooks Twilio pour SMS et WhatsApp.
     * @param Request $request
     * @return JsonResponse
     */
    public function handle(Request $request )
    {

        try {

            $this->inboundService->processInbound($request);

            // Réponse Twilio requise (TwiML vide ou 200 OK)
            return response()->json([], 200);

        } catch (\Exception $e) {
            // Loggez l'erreur pour la débugguer
            \Log::error('Erreur Twilio Webhook: ' . $e->getMessage(), ['request' => $request->all()]);

            // Retourne une erreur HTTP à Twilio
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
