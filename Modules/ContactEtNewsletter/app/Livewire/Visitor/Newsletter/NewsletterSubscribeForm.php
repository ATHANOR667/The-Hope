<?php

namespace Modules\ContactEtNewsletter\Livewire\Visitor\Newsletter;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Modules\ContactEtNewsletter\Services\Newsletter\NewsletterService;
use Twilio\Exceptions\TwilioException;
use Illuminate\Validation\ValidationException;

class NewsletterSubscribeForm extends Component
{
    public $email = '';
    public $phone = '';
    public $selectedChannel = 'mail';
    public $message = null;

    public string $whatsappNumber = '';
    public string $smsNumber = '';


    /**
     * Règles de validation
     */
    protected function rules(): array
    {
        $emailUniqueRule = Rule::unique('subscribers', 'email')->where(function ($query) {
            return $query->where('is_active', true)->whereNull('deleted_at');
        });

        $phoneUniqueRule = Rule::unique('subscribers', 'phone')->where(function ($query) {
            return $query->where('is_active', true)
                ->whereNotNull('phone')
                ->whereNull('deleted_at');
        });

        return [
            'email' => ['required', 'email', $emailUniqueRule],
            'phone' => [
                'nullable',
                'string',
                $phoneUniqueRule,
            ],
            'selectedChannel' => [
                'required',
                'string',
                Rule::in(['mail', 'sms', 'whatsapp']),
                function ($attribute, $value, $fail) {
                    if (in_array($value, ['sms', 'whatsapp']) && empty($this->phone)) {
                        $fail('Le canal SMS ou WhatsApp nécessite un numéro de téléphone.');
                    }
                },
            ],
        ];
    }


    public function updated($propertyName): void
    {
        if (in_array($propertyName, ['email', 'phone', 'selectedChannel'])) {
            $this->validateOnly($propertyName);
        }
    }


    public function subscribe(NewsletterService $newsletterService): void
    {

        try {
            $this->validate();
        } catch (ValidationException $e) {
            $this->message = null;
            throw $e;
        }
        $this->phone =$this->phone ==  '' ? null : $this->phone ;

        try {
            $newsletterService->subscribe(
                $this->email,
                $this->phone,
                [$this->selectedChannel]
            );

            $this->dispatch('flash-success', 'Inscription réussie ! Veuillez vérifier votre boîte de réception ou vos messages.');
            $this->resetForm();

        } catch (TwilioException $e) {
            $this->dispatch('flash-error', 'Erreur lors de l\'envoi de la notification de bienvenue. Votre inscription a été enregistrée.');
            Log::error("Newsletter subscription Twilio failed for {$this->email}: " . $e->getMessage());
        } catch (\Exception $e) {
            $this->dispatch('flash-error', 'Une erreur inattendue est survenue. Veuillez réessayer plus tard.');
            Log::error("Newsletter subscription failed for {$this->email}: " . $e->getMessage());
        }
    }


    public function resetForm(): void
    {
        $this->email = '';
        $this->phone = '';
        $this->selectedChannel = 'mail';
        $this->message = null;
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('contactetnewsletter::livewire.visitor.newsletter.newsletter-subscribe-form');
    }
}
