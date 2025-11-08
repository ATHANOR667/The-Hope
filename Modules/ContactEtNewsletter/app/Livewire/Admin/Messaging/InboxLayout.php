<?php

namespace Modules\ContactEtNewsletter\Livewire\Admin\Messaging;

use Livewire\Component;
use Livewire\Attributes\On;

class InboxLayout extends Component
{
    public ?string $selectedConversationId = null;


    #[On('conversationSelected')]
    public function selectConversation(string $id): void
    {
        $this->selectedConversationId = $id;
    }




    public function render(): \Illuminate\View\View
    {
        return view('contactetnewsletter::livewire.admin.messaging.inbox-layout');
    }
}
