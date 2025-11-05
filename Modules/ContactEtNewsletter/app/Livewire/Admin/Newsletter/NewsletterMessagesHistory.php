<?php

namespace Modules\ContactEtNewsletter\Livewire\Admin\Newsletter;

use Livewire\Component;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterMessage;

class NewsletterMessagesHistory extends Component
{
    public $listeners = ['refreshList' => '$refresh'];

    public function openCreate(): void
    {
        $this->dispatch('open-create-modal');
    }

    public function showDetails($id): void
    {
        // Utilise l'événement du composant de détails pour ouvrir le modal
        $this->dispatch('show-message-details', id: $id);
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $messages = NewsletterMessage::withCount([
            'deliveries as total_delivery_count',

            'deliveries as read_count' => fn($q) => $q->where('is_read', true)
        ])
            ->with(['deliveries' => fn($q) => $q->select('newsletter_message_id', 'channel')->distinct()])
            ->latest('sent_at')
            ->get();

        return view('contactetnewsletter::livewire.admin.newsletter.newsletter-messages-history', [
            'messages' => $messages
        ]);
    }
}
