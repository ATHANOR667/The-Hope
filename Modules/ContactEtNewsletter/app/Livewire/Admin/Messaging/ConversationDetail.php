<?php

namespace Modules\ContactEtNewsletter\Livewire\Admin\Messaging;

use Livewire\Component;
use Livewire\Attributes\On;
use Modules\ContactEtNewsletter\Models\Messaging\Conversation;
use Illuminate\Database\Eloquent\Collection;

class ConversationDetail extends Component
{
    public ?string $conversationId = null;
    public Collection|array $messages = [];

    public function mount(?string $conversationId = null): void
    {
        if ($conversationId) {
            $this->loadConversation($conversationId);
        }
    }


    #[On('messageSent')]
    #[On('conversationSelected')]
    public function loadConversation(string $id): void
    {
        $this->conversationId = $id;
        $conversation = Conversation::with('messages.sender')->find($this->conversationId);
        $this->messages = $conversation?->messages ?? new Collection();
    }


    public function render(): \Illuminate\Contracts\View\View
    {
        $conversation = Conversation::find($this->conversationId);

        return view('contactetnewsletter::livewire.admin.messaging.conversation-detail', [
            'conversation' => $conversation
        ]);
    }
}
