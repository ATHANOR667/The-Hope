<?php

namespace App\Livewire;

use App\Models\Admin;
use App\Models\Cause;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CauseDataTable extends Component
{
    #[On('CauseCreated')]
    public function updateCauseList(): void
    {
        $this->render();
    }

    use WithPagination;


    public string $search = '';
    public string $admin_key;
    public Admin $admin;
    public ?int $editingCauseId = null;
    public array $editingData = [];
    public ?int $confirmingDeleteId = null;

    // Tri des colonnes
    public string $sortField = 'titre';
    public string $sortDirection = 'asc';

    // Validation des données
    protected array $rules = [
        'editingData.titre' => 'required|string|max:40',
        'editingData.description' => 'required|string|max:255',
        'editingData.image' => 'nullable|string|max:255',
        'editingData.montant' => 'required|integer|min:0',
        'editingData.effectif' => 'required|integer|min:0',
        'editingData.dateClotureContribution' => 'nullable|date|after_or_equal:today',
        'editingData.dateRealisation' => 'nullable|date|after_or_equal:today',
    ];

    protected array $messages = [
        'editingData.titre.required' => 'Le titre est obligatoire.',
        'editingData.titre.max' => 'Le titre ne doit pas depasser 40 caractères.',
        'editingData.description.required' => 'La description est obligatoire.',
        'editingData.description.max' => 'La description ne doit dépasser 255 caractères.',
        'editingData.montant.required' => 'Le montant est obligatoire.',
        'editingData.montant.integer' => 'Le montant doit être un nombre entier.',
        'editingData.effectif.required' => 'L\'effectif est obligatoire.',
        'editingData.effectif.integer' => 'L\'effectif doit être un nombre entier.',
        'editingData.effectif.min' => 'L\'effectif doit être un nombre positif.',
        'editingData.dateClotureContribution.date' => 'La date de clôture doit être une date valide.',
        'editingData.dateClotureContribution.after_or_equal' => 'La date de clôture ne peut pas être dans le passé.',
        'editingData.dateRealisation.date' => 'La date de réalisation doit être une date valide.',
        'editingData.dateRealisation.after_or_equal' => 'La date de réalisation ne peut pas être dans le passé.',
    ];


    protected function resolveSortField(): string
    {
        return $this->sortField;
    }

    public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function startEdit($id): void
    {
        $this->editingCauseId = $id;
        $this->editingData = Cause::findOrFail($id)->toArray();
    }

    public function saveEdit(): void
    {
        $this->validate();

        try {
            Cause::find($this->editingCauseId)->update($this->editingData);
            session()->flash('success', 'Cause mise à jour avec succès !');
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }

        $this->editingCauseId = null;
        $this->editingData = [];
    }

    public function cancelEdit(): void
    {
        $this->editingCauseId = null;
        $this->editingData = [];
    }

    public function confirmDelete($id): void
    {
        $this->confirmingDeleteId = $id;
        session()->flash('success' , 'Cause supprimée');
        try {
            Cause::find($id)->delete();
        $this->dispatch('refreshComingCause');
        }catch (\Exception $exception){
            session()->flash('error', $exception->getMessage());
        }
    }


    public function restore( string $id): void
    {
        try {
            Cause::withTrashed()->findOrFail($id)->restore();
        $this->dispatch('refreshComingCause');
            session()->flash('success', 'Cause restaurée avec succèss !');
        }catch (\Exception $exception){
            session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        try {
            $causes = Cause::withTrashed()
                ->where('titre', 'like', '%' . $this->search . '%')
                ->orderBy($this->resolveSortField(), $this->sortDirection)
                ->paginate(10);

            return view('livewire.cause-data-table', [
                'causes' => $causes,
            ]);
        } catch (\Exception $exception) {
            Log::error('Problème avec la data table des causes (admin panel) :'.
                $exception->getMessage());
            session()->flash('error', 'Erreur lors du chargement des données.');
        }

    }

    public function show(Cause $cause): void
    {
        $this->dispatch('showCause' , cause: $cause);

    }


}
