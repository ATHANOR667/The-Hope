<?php

namespace Modules\ContactEtNewsletter\Services\Messaging;

use Exception;
use Illuminate\Http\Request;
use Modules\ContactEtNewsletter\Models\Messaging\Conversation;

class EmailInboundService
{
    protected ConversationService $conversationService;

    public function __construct(ConversationService $conversationService)
    {
        $this->conversationService = $conversationService;
    }

    /**
     * Traite les données du webhook d'analyse d'e-mail (ex: Mailgun/SendGrid Inbound).
     * @param Request $request
     * @throws Exception
     */
    public function processInbound(Request $request): void
    {
        $senderEmail = $request->input('sender');
        $recipient = $request->input('recipient');
        $fullContent = $request->input('body-plain') ?? $request->input('body-html');

        if (empty($senderEmail) || empty($recipient) || empty($fullContent)) {
            throw new Exception("Données de webhook email incomplètes.");
        }

        $conversationId = $this->extractConversationIdFromRecipient($recipient);

        if (!$conversationId) {

            throw new Exception("Impossible d'extraire l'ID de conversation de l'e-mail.");
        }

        $cleanContent = $this->cleanEmailReplyContent($fullContent);

        $conversation = Conversation::find($conversationId);

        if (!$conversation) {
            throw new Exception("Conversation non trouvée pour l'ID: {$conversationId}.");
        }

        // Le contact est l'expéditeur de l'e-mail
        $contact = $this->conversationService->findOrCreateContact(Conversation::CHANNEL_EMAIL, $senderEmail);

        // 5. Enregistrement du Message (l'expéditeur est le Contact)
        $this->conversationService->createMessage($conversation, $contact, $cleanContent);
    }

    /**
     * Extrait l'UUID de conversation de l'adresse de destination.
     * Attend un format comme 'reponse+UUID@votredomaine.com'.
     * @param string $recipient
     * @return string|null
     */
    protected function extractConversationIdFromRecipient(string $recipient): ?string
    {
        // Exemple d'extraction du 'tag' dans 'reponse+tag@domaine.com'
        if (preg_match('/^[^@\+]*\+([a-f0-9-]+)@/', $recipient, $matches)) {
            return $matches[1];
        }
        return null;
    }

    /**
     * Nettoie le contenu de l'e-mail pour enlever les citations, signatures et les corps précédents.
     * La difficulté principale de la retranscription "type WhatsApp" est ici.
     * @param string $content
     * @return string
     */
    protected function cleanEmailReplyContent(string $content): string
    {
        // --- Techniques de Nettoyage ---

        // 1. Suppression des marqueurs de citation standard (réponse automatique par défaut de nombreux clients mail)
        // ex: '--- Original Message ---' ou lignes commencant par '>'
        $patterns = [
            '/^>.*$/m', // Lignes commençant par > (standard de citation)
            '/^On.*wrote:$/m', // Référence de réponse de Gmail/Outlook
            '/\s*--- Original Message ---.*$/si', // Marqueur classique
            '/^_{10,}.*$/ms', // Séparateur de signature long (---)
        ];

        $cleanedContent = preg_replace($patterns, '', $content);

        // 2. Suppression des signatures (si l'on peut identifier un pattern clair)
        // Le nettoyage est un défi continu avec les e-mails. On peut utiliser des bibliothèques plus avancées.

        return trim($cleanedContent);
    }
}
