<?php

namespace App\Livewire;

use App\Mail\Collab;
use App\Mail\CollabFeedBack;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class ContactUs extends Component
{
    public string $name = '';
    public string $email = '';
    public string $subject = '';
    public string $message = '';

    protected array $rules = [
        'name' => 'required|min:3|max:40|string',
        'email' => 'required|email',
        'subject' => 'required|in:web+search,social+media,others',
        'message' => 'required|min:3|max:1500|string',
    ];

    protected array $messages = [
        'name.required' => 'Le champ nom est obligatoire.',
        'name.min' => 'Le champ nom doit contenir au moins 3 caractères.',
        'name.max' => 'Le champ nom ne doit pas dépasser 40 caractères.',
        'email.required' => 'Le champ email est obligatoire.',
        'email.email' => 'Veuillez entrer une adresse email valide.',
        'subject.required' => 'Le champ sujet est obligatoire.',
        'subject.in' => 'Veuillez choisir une option valide.',
        'message.required' => 'Le champ message est obligatoire.',
        'message.min' => 'Le champ message doit contenir au moins 3 caractères.',
        'message.max' => 'Le champ message ne doit pas dépasser 1500 caractères.',
    ];

    public function sendMessage(): void
    {
        $this->validate();

        try {
            Mail::to(env('Mail_COLLAB'))->send(new Collab($this->email ,$this->name, $this->subject, $this->message));
            Mail::to($this->email)->send(new CollabFeedBack($this->name, $this->subject, $this->message));

            $this->reset();
            session()->flash('success', 'Proposition soumise avec succès. Consultez vos mails pour le feedback.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'envoi du mail : ' . $e->getMessage());
            session()->flash('error', 'Une erreur est survenue lors de l\'envoi du formulaire. Veuillez réessayer.');
        }
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.contact-us');
    }
}
