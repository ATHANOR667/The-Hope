<?php

namespace App\Livewire;

use App\Models\Cause;
use Livewire\Attributes\On;
use Livewire\Component;

class CommingCause extends Component
{

    public null|Cause $cause = null;

    #[On('CauseCreated')]
    public function CauseCreated(): void
    {
        $this->mount();
        $this->render();
    }
    #[On('refreshComingCause')]
    public function refreshComingCause(): void
    {
        $this->mount();
        $this->render();
    }


    public function mount(): void
    {
        $cause = Cause::withoutTrashed();
        $cause = Cause::whereDate('dateClotureContribution', '>=', now()->format('Y-m-d'));
        $this->cause = $cause->exists() ? $cause->first() : null;
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.comming-cause', [
            'donateurs' => $this->cause
                ? $this->cause->donnateurs()->get()
                : [],
            'totalDonations' => $this->cause ? $this->cause->dons()->sum('montant') : 0,
            'expectedAmount' => $this->cause ? $this->cause->montant : 0,
        ]);
    }

}
