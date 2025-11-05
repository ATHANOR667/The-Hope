<?php

namespace Modules\ContactEtNewsletter\Livewire\Admin\Newsletter;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterDelivery;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterMessage;
use Modules\ContactEtNewsletter\Services\Newsletter\NewsletterService;
use Twilio\Exceptions\TwilioException;

class NewsletterMessageDetails extends Component
{
    public bool $showDetails = false;
    public ?NewsletterMessage $message = null;
    public array $stats = [];
    public Collection $concernedUsers;

    public string $filterChannel = '';
    public string $filterStatus = '';
    public string $search = '';

    protected $listeners = [
        'show-message-details' => 'open',
        'close-details' => 'close'
    ];

    public function open($id): void
    {
        $this->message = NewsletterMessage::with('deliveries.subscriber')->find($id);
        if ($this->message) {
            $this->calculateStats();
            $this->loadConcernedUsers();
            $this->showDetails = true;
        } else {
            $this->dispatch('flash-error', message: "Erreur lors de l'ouverture de la fenêtre de détails");
        }
    }

    // Réagit à TOUS les filtres
    public function updated($property): void
    {
        if (in_array($property, ['filterChannel', 'filterStatus', 'search'])) {
            $this->loadConcernedUsers();
        }
    }

    /** @throws TwilioException */
    public function retry($delivery_id, NewsletterService $newsletterService): void
    {
        $delivery = NewsletterDelivery::find($delivery_id);
        try {
            $newsletterService->sendNewsletterMessage($delivery->subscriber, $delivery->message, $delivery);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            $this->dispatch('flash-error', message: "Une erreur inattendue est survenue lors de l'envoi");
            return;
        }

        $this->calculateStats();
        $this->loadConcernedUsers();
        $this->dispatch('flash-success', message: "Envoi effectué avec succès");
    }

    public function close(): void
    {
        $this->showDetails = false;
        $this->message = null;
        $this->reset(['filterChannel', 'filterStatus', 'search']);
    }

    private function calculateStats(): void
    {
        $d = $this->message->deliveries;

        $this->stats = [
            'mail' => $this->calcChannel($d, 'mail'),
            'sms' => $this->calcChannel($d, 'sms'),
            'whatsapp' => $this->calcChannel($d, 'whatsapp'),
            'errors' => $d->where('status', 'failed')->count(),
        ];
    }

    private function calcChannel($deliveries, $channel): array
    {
        $items = $deliveries->where('channel', $channel);
        $try = $items->count();
        $sent = $items->where('status', 'success')->count();
        $read = $items->where('is_read', true)->count();

        return [
            'try' => $try,
            'sent' => $sent,
            'read' => $read,
            'sent_rate' => $sent > 0 ? round($sent / $try * 100) : 0,
            'read_rate' => $sent > 0 ? round($read / $sent * 100) : 0,
        ];
    }

    private function loadConcernedUsers(): void
    {
        $query = $this->message->deliveries()->with(['subscriber' => function ($q) {
            $q->withTrashed();
        }]);

        if ($this->filterChannel) {
            $query->where('channel', $this->filterChannel);
        }

        if ($this->filterStatus) {
            $query->where('status', $this->filterStatus);
        }

        $this->concernedUsers = $query->get()
            ->map(function ($delivery) {
                $subscriber = $delivery->subscriber;
                $channelUsed = $delivery->channel;
                $contactUsed = $channelUsed === 'mail' ? $subscriber->email : $subscriber->phone;
                $otherContact = $channelUsed === 'mail' ? $subscriber->phone : $subscriber->email;

                return [
                    'delivery_id' => $delivery->id,
                    'subscriber_id' => $subscriber->id,
                    'contact_used' => $contactUsed,
                    'other_contact' => $otherContact,
                    'channel' => $channelUsed,
                    'status' => $delivery->status,
                    'is_read' => $delivery->is_read,
                    'sent_at' => $delivery->delivered_at?->format('d/m H\hi') ?? '-',
                    'read_at' => $delivery->read_at?->format('d/m H\hi') ?? '-',
                    'error' => $delivery->status === 'failed' ? Str::limit($delivery->error_message, 60) : null,
                ];
            })
            ->filter(function ($user) {
                if ($this->search && !Str::contains(strtolower($user['contact_used']), strtolower($this->search))) {
                    return false;
                }
                return true;
            })
            ->sortBy('contact_used');
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('contactetnewsletter::livewire.admin.newsletter.newsletter-message-details');
    }
}
