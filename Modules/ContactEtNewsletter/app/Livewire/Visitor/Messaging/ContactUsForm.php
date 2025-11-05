<?php

namespace Modules\ContactEtNewsletter\Livewire\Visitor\Messaging;

use Livewire\Component;
use Modules\ContactEtNewsletter\Models\Messaging\Conversation;
use Modules\ContactEtNewsletter\Services\Messaging\EmailInboundService;
use Modules\ContactEtNewsletter\Services\Messaging\ConversationService;
use Illuminate\Support\Facades\Log;

class ContactUsForm extends Component
{

    public string $name = '';
    public string $email = '';
    public string $subject = '';
    public string $content = '';

    public string $whatsappNumber = '';
    public string $smsNumber = '';


    protected array $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'content' => 'required|string|min:10',
    ];


    public function mount(): void
    {
        $this->whatsappNumber = config('twillio.Twilio_whatsapp');
        $this->smsNumber = config('twillio.Twilio_phone');
    }

    /**
     * Soumet le formulaire et crée une nouvelle Conversation de type 'email'.
     * @param EmailInboundService $emailInboundService
     * @param ConversationService $conversationService
     */
    public function submit(EmailInboundService $emailInboundService, ConversationService $conversationService): void
    {
        $this->validate();

        try {
            // 1. On trouve ou crée le Contact (Expéditeur)
            $contact = $conversationService->findOrCreateContact(
                Conversation::CHANNEL_EMAIL,
                $this->email,
                ['name' => $this->name]
            );

            // 2. On crée la Conversation initiale
            $conversation = $conversationService->findOrCreateConversation(
                $contact,
                Conversation::CHANNEL_EMAIL,
                $this->subject
            );

            // 3. On enregistre le premier Message (l'expéditeur est le Contact)
            $conversationService->createMessage(
                $conversation,
                $contact,
                $this->content
            );

            $this->reset(['name', 'email', 'subject', 'content']);

            $this->dispatch('flash-success', message: 'Votre message a été envoyé. Nous vous répondrons bientôt !');

        } catch (\Exception $e) {
            Log::error("Erreur lors de la soumission du formulaire Contact-Us: " . $e->getMessage());
            $this->dispatch('flash-error', message: 'Une erreur est survenue lors de l\'envoi. Veuillez réessayer.');
        }
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('contactetnewsletter::livewire.visitor.messaging.contact-us-form');
    }
}
