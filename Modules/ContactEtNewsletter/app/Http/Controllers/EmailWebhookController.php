<?php

namespace Modules\ContactEtNewsletter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ContactEtNewsletter\Services\Messaging\EmailInboundService;

class EmailWebhookController extends Controller
{
    protected EmailInboundService $inboundService;

    public function __construct(EmailInboundService $inboundService)
    {
        $this->inboundService = $inboundService;
    }

    /**
     * Gère la réception des webhooks de l'analyseur d'e-mail entrant.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request)
    {
        try {
            // IMPORTANT: Ici, vous DEVEZ valider le webhook (signature Mailgun/SendGrid)
            // pour empêcher l'enregistrement de fausses données.

            $this->inboundService->processInbound($request);

            return response()->json(['success' => true], 200);

        } catch (\Exception $e) {
            \Log::error('Erreur Email Webhook: ' . $e->getMessage(), ['request' => $request->all()]);

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
