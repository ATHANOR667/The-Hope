<?php

namespace Modules\ContactEtNewsletter\Livewire\Admin\Newsletter;

use Livewire\Component;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterDelivery;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterMessage;
use Modules\ContactEtNewsletter\Models\Newsletter\Subscriber;
use Modules\ContactEtNewsletter\Services\Newsletter\NewsletterService;
use Twilio\Exceptions\TwilioException;

class NewsletterMessageCreate extends Component
{
    public bool $showCreate = false;
    public string $title = '';
    public string $content = '';

    protected $listeners = ['open-create-modal' => 'open', 'close-create-modal' => 'close'];

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ];

    public function open(): void
    {
        $this->reset('title', 'content');
        $this->showCreate = true;
    }

    public function close(): void
    {
        $this->showCreate = false;
    }

    /**
     * @throws TwilioException
     */
    public function save(NewsletterService $newsletterService): void
    {
        $this->validate();

        $message = NewsletterMessage::create([
            'title' => $this->title,
            'content' => $this->content,
            'type' => 'newsletter',
            'sent_at' => now()
        ]);

        $subscribers = Subscriber::where('is_active', true)->get();

        foreach ($subscribers as $sub) {
            foreach ($sub->channels as $channel) {
                $del = NewsletterDelivery::create([
                    'subscriber_id' => $sub->id,
                    'newsletter_message_id' => $message->id,
                    'channel' => $channel,
                    'status' => 'pending',
                ]);

                $newsletterService->sendNewsletterMessage($sub , $message , $del , [$channel] );

            }
        }

        $this->dispatch('flash-success', message: 'Newsletter envoyée avec succès !');
        $this->close();
        $this->dispatch('refreshList');
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('contactetnewsletter::livewire.admin.newsletter.newsletter-message-create');
    }
}
