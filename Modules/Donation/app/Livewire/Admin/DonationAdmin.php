<?php

namespace Modules\Donation\Livewire\Admin;

use App\Services\DonationConfigService;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Donation\Models\Don;
use Modules\Donation\Models\Refund;
use App\Services\PSP\StripeService;

class DonationAdmin extends Component
{
    use WithPagination;

    public $search = '';
    public $filterStatus = '';
    public $filterPsp = '';
    public $showRefunds = false;
    public $selectedDon = null;
    public $refundAmount = '';
    public $showRefundModal = false;

    public $stripeEnabled;
    public $notchpayEnabled;

    protected $queryString = ['search', 'filterStatus', 'filterPsp'];

    /**
     * Initialise l'état des PSP au montage du composant.
     */
    public function mount(): void
    {
        $config = new DonationConfigService();

        $this->stripeEnabled = $config->get('psp.stripe.enabled', true);
        $this->notchpayEnabled = $config->get('psp.notchpay.enabled', true);

    }

    /**
     * Bascule l'état d'un PSP et met à jour la configuration et les propriétés Livewire.
     */
    public function togglePsp($psp): void
    {
        $configService = new DonationConfigService();
        $key = "psp.{$psp}.enabled";

        $current = $configService->get($key, true);

        $newValue = !$current;
        $configService->set($key, $newValue);

        if ($psp === 'stripe') {
            $this->stripeEnabled = $newValue;
        } elseif ($psp === 'notchpay') {
            $this->notchpayEnabled = $newValue;
        }

        $this->dispatch('flash-success', message: ucfirst($psp) . ' ' . ($newValue ? 'activé' : 'désactivé'));
    }
    public function showRefunds($donId): void
    {
        $this->selectedDon = $donId;
        $this->showRefunds = true;
    }

    public function openRefundModal($donId): void
    {
        $don = Don::find($donId);
        $this->selectedDon = $donId;
        // Le montant maximum remboursable est le montant total du don
        $this->refundAmount = $don->montant;
        $this->showRefundModal = true;
    }

    public function refund(StripeService $stripeService): void
    {
        $maxAmount = Don::find($this->selectedDon)->montant ?? 0;

        $this->validate([
            'refundAmount' => 'required|numeric|min:0.01|max:' . $maxAmount
        ]);

        try {
            $don = Don::findOrFail($this->selectedDon);

            // Assurez-vous que le don est éligible au remboursement Stripe
            if ($don->operateur !== 'Stripe' || $don->status !== 'completed') {
                throw new \Exception("Ce don n'est pas éligible à un remboursement Stripe.");
            }

            $stripeService->refundDon($don, $this->refundAmount);

            $this->dispatch('notify', ['message' => 'Remboursement initié !', 'type' => 'success']);
            $this->closeModal();
        } catch (\Exception $e) {
            $this->dispatch('notify', ['message' => 'Erreur : ' . $e->getMessage(), 'type' => 'error']);
        }
    }

    public function closeModal(): void
    {
        $this->showRefunds = false;
        $this->showRefundModal = false;
        $this->selectedDon = null;
        $this->refundAmount = '';
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $dons = Don::with('refunds')
            ->when($this->search, fn($q) => $q->where('emailDonateur', 'like', "%{$this->search}%")
                ->orWhere('nom', 'like', "%{$this->search}%")
                ->orWhere('prenom', 'like', "%{$this->search}%"))
            ->when($this->filterStatus, fn($q) => $q->where('status', $this->filterStatus))
            ->when($this->filterPsp, fn($q) => $q->where('operateur', $this->filterPsp))
            ->latest()
            ->paginate(10);

        $refunds = $this->selectedDon ? Refund::where('don_id', $this->selectedDon)->get() : collect();

        return view('donation::livewire.admin.donation-admin', compact('dons', 'refunds'));
    }
}
