<?php

namespace Modules\ContactEtNewsletter\Livewire\Admin\Messaging;

use Livewire\Component;
use Livewire\Attributes\On;

class InboxLayout extends Component
{
    public ?string $selectedConversationId = null;
    public string $channelFilter = 'all';
    public string $statusFilter = 'open';


    #[On('conversationSelected')]
    public function selectConversation(string $id): void
    {
        $this->selectedConversationId = $id;
        $this->dispatch('conversation-selected', id: $id)->to(ConversationDetail::class);
    }


    #[On('messageSent')]
    public function refreshConversation(): void
    {
        $this->dispatch('scroll-to-bottom');
    }

    public function render(): \Illuminate\View\View
    {
        return view('contactetnewsletter::livewire.admin.messaging.inbox-layout');
    }
}
