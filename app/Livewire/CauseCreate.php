<?php

namespace App\Livewire;

use App\Models\Admin;
use App\Models\Cause;
use Livewire\Component;

class CauseCreate extends Component
{
    public array $causeData = [];
    public Admin $admin;

    public bool $isSubmitting = false;

    protected array $rules = [
        'causeData.titre' => 'required|string|max:40',
        'causeData.description' => 'required|string|max:255',
        'causeData.image' => 'nullable|string',
        'causeData.montant' => 'required|integer|min:0',
        'causeData.effectif' => 'integer|min:0',
        'causeData.dateClotureContribution' => 'nullable|date|after_or_equal:today',
        'causeData.dateRealisation' => 'nullable|date|after_or_equal:today',
        'causeData.imagePostRealisation' => 'nullable|string',
        'causeData.videoPostRealisation' => 'nullable|string',
    ];

    protected array $messages = [
        'causeData.titre.max' => 'Le titre ne peut pas dépasser 25 caractères.',
        'causeData.titre.required' => 'Le titre est obligatoire.',
        'causeData.description.required' => 'La description est obligatoire.',
        'causeData.description.max' => 'La description ne doit dépasser 255 caractères.',
        'causeData.montant.required' => 'Le montant est obligatoire.',
        'causeData.effectif.integer' => 'L\'effectif doit être un entier.',
        'causeData.effectif.min' => 'L\'effectif doit être au moins de 0.',
        'causeData.dateClotureContribution.date' => 'La date de clôture doit être une date valide.',
        'causeData.dateClotureContribution.after_or_equal' => 'La date de clôture ne peut pas être dans le passé.',
        'causeData.dateRealisation.date' => 'La date de réalisation doit être une date valide.',
        'causeData.dateRealisation.after_or_equal' => 'La date de réalisation ne peut pas être dans le passé.',
    ];


    public function createCause(): void
    {
        $this->validate();

        $this->isSubmitting = true;

        try {
            Cause::create([
                'admin_id' => $this->admin->id,
                'titre' => $this->causeData['titre'],
                'description' => $this->causeData['description'],
                'image' => $this->causeData['image'] ?? null,
                'montant' => $this->causeData['montant'] ,
                'effectif' => $this->causeData['effectif'] ?? 0,
                'dateClotureContribution' => $this->causeData['dateClotureContribution'] ?? null,
                'dateRealisation' => $this->causeData['dateRealisation'] ?? null,
                'imagePostRealisation' => $this->causeData['imagePostRealisation'] ?? null,
                'videoPostRealisation' => $this->causeData['videoPostRealisation'] ?? null,
            ]);
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return;
        }

        $this->isSubmitting = false;

        $this->dispatch('CauseCreated');
        $this->causeData = [];
        session()->flash('success', 'Cause créée avec succès !');
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.cause-create');
    }
}
