<?php

namespace Modules\ContactEtNewsletter\Livewire\Admin\Messaging;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use Modules\ContactEtNewsletter\Models\Messaging\Conversation;
use Illuminate\Support\Facades\Auth;
use Modules\ContactEtNewsletter\Services\Messaging\MessagingOutboundService;

class ReplyForm extends Component
{
    public ?string $conversationId = null;

    #[Rule('required|string|min:1|max:5000')]
    public string $message = '';



    #[On('conversationSelected')]
    public function setConversation(string $id): void
    {
        $this->conversationId = $id;
        $this->message = '';
    }

    public function send( MessagingOutboundService $messagingOutboundService ): void
    {
        if (is_null($this->conversationId)) {
            return;
        }

        $this->validate();

        $conversation = Conversation::find($this->conversationId);
        $admin = Auth::guard('admin')->user();

        if (!$conversation || !$admin) {
            $this->dispatch('flash-error', message: 'Erreur: Conversation ou Admin introuvable.');
            return;
        }

        $messagingOutboundService->sendReply($conversation, $admin, $this->message);

        $this->message = '';
        $this->dispatch('messageSent', id: $conversation->id);
        $this->dispatch('flash-success', message: 'Message envoyé !');
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('contactetnewsletter::livewire.admin.messaging.reply-form');
    }
}
