<?php

namespace Modules\Donation\Livewire\Visitor;

use App\Services\DonationConfigService;
use Livewire\Component;
use App\Services\PSP\ExchangeApi;
use Illuminate\Support\Facades\Log;

class DonationForm extends Component
{
    public $montant = '';
    public $email = '';
    public $nom = '';
    public $prenom = '';
    public $psp = 'stripe'; // Valeur par défaut
    public $currency = 'USD'; // Stripe étant le défaut, USD est un bon choix initial.
    public $convertedAmount = null;
    public $isConverting = false;

    // Définir les devises disponibles pour Stripe
    public $availableCurrencies = ['XAF', 'USD', 'EUR'];

    protected $rules = [
        'montant' => 'required|numeric|min:100',
        'email' => 'required|email',
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'psp' => 'required|in:stripe,notchpay',
        // Le champ 'currency' est validé par l'interface, et par la logique 'updated'
        'currency' => 'required|in:XAF,USD,EUR',
    ];

    /**
     * Exécuté à chaque mise à jour de propriété.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);

        if ($field === 'psp') {
            if ($this->psp === 'notchpay') {
                // NotchPay utilise uniquement XAF. On force la devise.
                $this->currency = 'XAF';
                $this->convertedAmount = null; // Pas de conversion affichée
            } else {
                // Si on passe à Stripe, on remet une devise courante si l'ancienne était XAF
                if ($this->currency === 'XAF') {
                    $this->currency = 'USD';
                }
            }
            $this->convertInRealTime();
            return;
        }

        // Déclencher la conversion uniquement si c'est pour Stripe et que le montant/devise change
        if ($this->psp === 'stripe' && in_array($field, ['montant', 'currency']) && $this->montant > 0) {
            $this->convertInRealTime();
        } elseif ($field === 'montant' && $this->psp === 'notchpay') {
            // S'assurer que la conversion est effacée pour NotchPay
            $this->convertedAmount = null;
        }
    }

    /**
     * Gère la conversion en temps réel pour l'affichage (seulement pour Stripe).
     * On affiche toujours la conversion vers USD pour Stripe si la devise d'entrée est différente de USD.
     */
    public function convertInRealTime(): void
    {
        $this->convertedAmount = null;

        // NotchPay est en XAF, pas de conversion affichée.
        if ($this->psp === 'notchpay' || $this->montant <= 0 || ! $this->currency) {
            $this->isConverting = false;
            return;
        }

        // --- Stripe Conversion Logic (pour feedback utilisateur) ---
        // On affiche la conversion vers USD (devise cible supposée de la plateforme Stripe)
        $targetCurrency = 'USD';

        if ($this->currency === $targetCurrency) {
            $this->isConverting = false;
            return;
        }

        $this->isConverting = true;

        try {
            $exchangeApi = app(ExchangeApi::class);
            $this->convertedAmount = $exchangeApi->convertCurrency(
                $this->currency,
                $targetCurrency,
                $this->montant
            );
        } catch (\Exception $e) {
            $this->convertedAmount = null;
            Log::error('Stripe Conversion échouée : ' . $e->getMessage());
            $this->addError('montant', 'Conversion pour Stripe impossible. Veuillez réessayer.');
        } finally {
            $this->isConverting = false;
        }
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('donation::livewire.visitor.donation-form', [
            'stripeEnabled' => (new DonationConfigService())->get('psp.stripe.enabled'),
            'notchpayEnabled' => (new DonationConfigService())->get('psp.notchpay.enabled'),
        ]);
    }
}
