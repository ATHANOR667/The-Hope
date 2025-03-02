<?php


namespace App\Livewire;

use App\Models\Cause;
use Livewire\Component;
use Livewire\Attributes\On;

class CauseShow extends Component
{
    public Cause $cause;


    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.cause-show', [
            'totalDonations' => $this->cause ? $this->cause->dons()->sum('montant') : 0,
            'expectedAmount' => $this->cause ? $this->cause->montant : 0,
        ]);
    }
}
