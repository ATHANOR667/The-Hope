<?php

namespace Modules\ContactEtNewsletter\Livewire\Admin\Messaging;

use Livewire\Component;
use Livewire\Attributes\On;
use Modules\ContactEtNewsletter\Models\Messaging\Conversation;

class ConversationListItem extends Component
{
    public Conversation $conversation;

    public bool $isSelected = false;


    #[On('conversationSelected')]
    public function updateSelection(string $id): void
    {
        $this->isSelected = $id === $this->conversation->id;
    }


    public function select(): void
    {
        $this->dispatch('conversationSelected', id: $this->conversation->id);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('contactetnewsletter::livewire.admin.messaging.conversation-list-item');
    }
}
