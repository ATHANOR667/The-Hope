<?php

namespace Modules\ContactEtNewsletter\Livewire\Admin\Messaging;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url; // Important pour Livewire v3

// Assurez-vous d'importer votre modèle Conversation
use Modules\ContactEtNewsletter\Models\Messaging\Conversation;

class ConversationList extends Component
{
    use WithPagination;

    // Utilisation de l'attribut #[Url] pour lier les propriétés à la query string
    #[Url]
    public string $channelFilter = 'all';

    #[Url]
    public string $statusFilter = 'open';

    #[Url]
    public string $search = '';

    #[On('newConversation')]
    public function updatedSearch(string $value): void
    {
        $this->resetPage();
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        $conversations = Conversation::query()
            ->with([
                'contact',
                'messages' => fn($q) => $q->latest()->limit(1)
            ])
            ->when($this->channelFilter !== 'all', fn($q) => $q->where('channel_type', $this->channelFilter))
            ->when($this->statusFilter && $this->statusFilter !== 'all', fn($q) => $q->where('status', $this->statusFilter))
            ->when($this->search, function ($q) {
                $q->where(function ($q) {

                    $q->where('id', 'like', "%{$this->search}%")

                        ->orWhereHas('contact', fn($cq) => $cq->where('name', 'like', "%{$this->search}%")
                            ->orWhere('email', 'like', "%{$this->search}%")
                            ->orWhere('phone_whatsapp', 'like', "%{$this->search}%")
                            ->orWhere('phone_sms', 'like', "%{$this->search}%"));
                });
            })
            ->latest('updated_at')
            ->paginate(15);

        return view('contactetnewsletter::livewire.admin.messaging.conversation-list', [
            'conversations' => $conversations
        ]);
    }
}
