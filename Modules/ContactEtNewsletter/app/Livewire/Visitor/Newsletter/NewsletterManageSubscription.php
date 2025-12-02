<?php

namespace Modules\ContactEtNewsletter\Livewire\Visitor\Newsletter;

use Exception;
use Livewire\Component;
use Modules\ContactEtNewsletter\Models\Newsletter\Subscriber;
use Modules\ContactEtNewsletter\Services\Newsletter\NewsletterService;

class NewsletterManageSubscription extends Component
{
    public string $email = '';
    public ?string $phone = null;
    public string $selectedChannel = 'mail';
    public bool $subscriberFound = false;
    public ?Subscriber $subscriber = null;
    public ?string $statusMessage = null;
    public bool $isUnsubscribed = false;

    public array $allChannels = [
        'mail' => 'Email',
        //'sms' => 'SMS',
        //'whatsapp' => 'WhatsApp',
    ];

    protected $rules = [
        'email' => 'required|email',
        'phone' => 'nullable|string|max:20',
        'selectedChannel' => 'required|string|in:mail,sms,whatsapp',
    ];

    public function loadSubscription(): void
    {
        $this->validate(['email' => 'required|email']);
        $this->statusMessage = null;
        $this->subscriberFound = false;

        $subscriber = Subscriber::withTrashed()->where('email', $this->email)->first();

        if ($subscriber && $subscriber->is_active) {
            $this->subscriber = $subscriber;
            $this->phone = $subscriber->phone;

            $channels = is_array($subscriber->channels) ? $subscriber->channels : [];
            $this->selectedChannel = !empty($channels) ? $channels[0] : 'mail';

            $this->subscriberFound = true;
            $this->isUnsubscribed = false;
            $this->statusMessage = "Vos préférences actuelles ont été chargées.";
        } else if ($subscriber && $subscriber->trashed()) {
            $this->isUnsubscribed = true;
            $this->statusMessage = "Cette adresse email est actuellement désinscrite. Vous pouvez vous réabonner ci-dessous.";
            $this->subscriberFound = true;
        } else {
            $this->statusMessage = "Aucun abonnement trouvé pour cet email. Vous pouvez vous inscrire ci-dessous.";
            $this->isUnsubscribed = false;

            $this->phone = null;
            $this->selectedChannel = 'mail';
            $this->subscriberFound = false;
        }
    }

    public function updateSubscription(NewsletterService $service): void
    {
        $this->validate();
        $this->statusMessage = null;

        try {
            $this->phone =$this->phone ==  '' ? null : $this->phone ;
            $service->subscribe($this->email, $this->phone, [$this->selectedChannel]);

            $this->isUnsubscribed = false;
            $this->subscriberFound = true;
            $this->statusMessage = "Vos préférences d'abonnement ont été mises à jour avec succès.";
        } catch (Exception $e) {
            $this->statusMessage = "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }

    public function unsubscribe(NewsletterService $service): void
    {
        $this->validateOnly('email');
        $this->statusMessage = null;

        try {
            $service->unsubscribe($this->email);
            $this->isUnsubscribed = true;
            $this->subscriberFound = true;
            $this->statusMessage = "Vous avez été désinscrit(e) de notre newsletter. Nous en sommes désolés !";
        } catch (Exception $e) {
            $this->statusMessage = "Erreur lors de la désinscription : " . $e->getMessage();
        }
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('contactetnewsletter::livewire.visitor.newsletter.newsletter-manage-subscription');
    }
}
