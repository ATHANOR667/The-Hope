<?php

namespace App\Livewire;

use App\Models\Cause;
use Livewire\Component;
use Livewire\WithPagination;

class DonnationList extends Component
{
    use WithPagination;

    public  Cause $cause;
    public string $search = '';
    public string $sortField = 'reference';
    public string $sortDirection = 'asc';

    public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        return view('livewire.donnation-list', [
            'donateurs' => $this->cause->donnateurs()
                ->where(function ($query) {
                    if ($this->sortField == 'nom'){
                        $query->orwhere('volontaires.nom', 'like', '%' . $this->search . '%');
                        $query->orWhere('dons.nom', 'like', '%' . $this->search . '%');
                    }

                    if ($this->sortField == 'prenom'){
                        $query->orwhere('volontaires.prenom', 'like', '%' . $this->search . '%');
                        $query->orWhere('dons.prenom', 'like', '%' . $this->search . '%');
                    }

                    if ($this->sortField == 'email'){
                        $query->orwhere('volontaires.email', 'like', '%' . $this->search . '%');
                        $query->orWhere('dons.emailDonateur', 'like', '%' . $this->search . '%');
                    }

                    if ($this->sortField == 'reference'){
                        $query->where('dons.reference', 'like', '%' . $this->search . '%');
                    }

                    if ($this->sortField == 'montant'){
                        $query->where('dons.montant', (int)$this->search);
                    }
                })
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10)
        ]);
    }
}
