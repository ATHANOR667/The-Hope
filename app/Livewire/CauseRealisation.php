<?php

namespace App\Livewire;

use App\Models\Cause;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CauseRealisation extends Component
{
    use WithFileUploads;

    public Cause $cause;
    public $videoLink = null;
    public $imageUpload = null;

    public array $rules = [
        'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'videoLink' => [
            'nullable',
            'url',
            //'regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/(?:[^\/]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/|vimeo\.com\/(\d+)|dailymotion\.com\/video\/([a-zA-Z0-9_-]+))$//'
        ],
    ];

    public array $messages = [
        'imageUpload.image' => 'Le fichier n\'est pas une image',
        'imageUpload.mimes' => 'L\'image doit être au format jpeg, png, jpg, gif ou svg',
        'imageUpload.max' => 'L\'image ne doit pas dépasser 2 Mo',
        'videoLink.url' => 'Pour la vidéo, nous attendons une URL valide',
        'videoLink.regex' => 'L\'URL de la vidéo n\'est pas valide. Veuillez utiliser une URL YouTube, Vimeo ou Dailymotion.',
    ];

    public function mount(Cause $cause): void
    {
        $this->cause = $cause;
    }

    public function updateVideo(): void
    {
        if ($this->videoLink) {
            if (preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $this->videoLink, $matches)) {
                $videoId = $matches[1];
                $this->cause->videoPostRealisation = 'https://www.youtube.com/embed/' . $videoId;
            }
            else {
                $this->cause->videoPostRealisation = $this->videoLink;
            }
        }
    }

    public function updateImage(): void
    {
        if ($this->imageUpload) {
            if ($this->cause->imagePostRealisation) {
                Storage::disk('public')->delete($this->cause->imagePostRealisation);
            }
            $this->cause->imagePostRealisation = $this->imageUpload->store('images/realisations', 'public');
        }
    }

    public function deleteVideo(): void
    {
        if ($this->cause->videoPostRealisation) {
            $this->cause->videoPostRealisation = null;
        }
    }

    public function deleteImage(): void
    {
        if ($this->cause->imagePostRealisation) {
            Storage::disk('public')->delete($this->cause->imagePostRealisation);
            $this->cause->imagePostRealisation = null;
            $this->cause->save();
        }
    }

    public function save(): void
    {
        $this->validate();
        $this->updateVideo();
        $this->updateImage();

        $this->cause->save();
        $this->reset(['imageUpload', 'videoLink']);

        session()->flash('message', 'Réalisation mise à jour avec succès!');
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.cause-realisation');
    }
}
