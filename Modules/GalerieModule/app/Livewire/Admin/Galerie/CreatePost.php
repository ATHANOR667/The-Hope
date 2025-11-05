<?php

namespace Modules\GalerieModule\Livewire\Admin\Galerie;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\GalerieModule\Models\Post;
use Modules\GalerieModule\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CreatePost extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $mediaInputs = [];

    const ALLOWED_MIMES = ['jpg', 'jpeg', 'png', 'mp4', 'mov', 'webm'];
    const MAX_FILE_SIZE = 10240;

    public function mount(): void
    {
        if (empty($this->mediaInputs)) {
            $this->addMediaInput();
        }
    }

    protected function rules(): array
    {
        $urlRule = [
            'required_if:mediaInputs.*.type,url',
            'nullable',
            'url',
            'regex:/^(https?:\/\/.*\.(jpg|jpeg|png|mp4|mov|webm)(\?.*)?)$/i',
        ];

        $fileRule = [
            'required_if:mediaInputs.*.type,file',
            'nullable',
            'file',
            'mimes:' . implode(',', self::ALLOWED_MIMES),
            'max:' . self::MAX_FILE_SIZE,
        ];

        return [
            'title' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|max:1000',
            'mediaInputs' => 'required|array|min:1',
            'mediaInputs.*.type' => ['required', Rule::in(['file', 'url'])],
            'mediaInputs.*.value' => [
                'nullable',
                Rule::when(fn ($input) => $input->type === 'file', $fileRule),
                Rule::when(fn ($input) => $input->type === 'url', $urlRule),
            ],
        ];
    }

    public function resetInputFields(): void
    {
        $this->title = '';
        $this->description = '';
        $this->mediaInputs = [];
        $this->addMediaInput();
        $this->resetErrorBag();
    }

    public function addMediaInput(): void
    {
        $this->mediaInputs[] = ['type' => 'file', 'value' => null, 'preview_url' => null, 'media_type' => null];
    }

    public function updated($name, $value): void
    {
        if (Str::startsWith($name, 'mediaInputs.') && Str::endsWith($name, '.value')) {
            $parts = explode('.', $name);
            $index = $parts[1];
            if ($this->mediaInputs[$index]['type'] == 'url' && $value) {
                $this->validateOnly($name);
                // Vérification de l'URL
                try {
                    $response = Http::head($value);
                    if (!$response->successful()) {
                        $this->addError("mediaInputs.{$index}.value", "L'URL semble inaccessible.");
                    }
                } catch (\Exception $e) {
                    $this->addError("mediaInputs.{$index}.value", "Impossible de vérifier l'URL.");
                }
            }
        } else {
            $this->validateOnly($name);
        }
    }

    public function removeMedia($index): void
    {
        unset($this->mediaInputs[$index]);
        $this->mediaInputs = array_values($this->mediaInputs);
        if (empty($this->mediaInputs)) {
            $this->addMediaInput();
        }
    }

    public function generateUniqueSlug($title): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        return $slug;
    }

    protected function determineMediaType($value, $isUrl = false): ?string
    {
        try {
            if ($isUrl) {
                if (preg_match('/(youtube\.com|youtu\.be)/i', $value)) {
                    return 'youtube';
                } elseif (preg_match('/vimeo\.com/i', $value)) {
                    return 'vimeo';
                }
                $extension = strtolower(pathinfo(parse_url($value, PHP_URL_PATH), PATHINFO_EXTENSION));
                return in_array($extension, ['jpg', 'jpeg', 'png']) ? 'image' : 'video';
            }
            if (is_a($value, \Livewire\Features\SupportFileUploads\TemporaryUploadedFile::class)) {
                $mime = $value->getMimeType();
                return Str::startsWith($mime, 'image/') ? 'image' : 'video';
            }
        } catch (\Exception $e) {
            Log::error("Error determining media type: {$e->getMessage()}", ['value' => $value]);
        }
        return null;
    }

    public function create(): void
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $admin = Auth::guard('admin')->user();

            $post = Post::create([
                'title' => $this->title,
                'description' => $this->description,
                'slug' => $this->generateUniqueSlug($this->title),
                'author_id' => $admin->id,
                'author_type' => $admin->getMorphClass(),
                'published_at' => now(),
                'moderation_status' => 'approved',
            ]);

            foreach ($this->mediaInputs as $index => $media) {
                $file_path = null;
                $video_url = null;
                $media_type = null;
                $sort_order = $index + 1;

                if ($media['type'] == 'file') {
                    $uploadedFile = $media['value'];
                    if (!is_a($uploadedFile, \Livewire\Features\SupportFileUploads\TemporaryUploadedFile::class)) {
                        Log::warning("Média #{$index} marqué comme 'file' mais l'objet uploadé est manquant ou invalide.");
                        continue;
                    }
                    $media_type = $this->determineMediaType($uploadedFile, false);
                    $file_path = $uploadedFile->store('gallery_media', 'public');
                } else {
                    $media_type = $this->determineMediaType($media['value'], true);
                    $video_url = $media['value'];
                }

                if ($media_type) {
                    Media::create([
                        'post_id' => $post->id,
                        'media_type' => $media_type,
                        'file_path' => $file_path,
                        'video_url' => $video_url,
                        'sort_order' => $sort_order,
                    ]);
                }
            }

            DB::commit();
            $this->dispatch('flash-success', message: 'Post créé avec succès.');
            $this->dispatch('refreshList');
            $this->dispatch('close-create-modal');
            $this->resetInputFields();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Échec de la création du post : " . $e->getMessage());
            $this->dispatch('flash-error', message: 'Erreur lors de la création du post.');
        }
    }

    public function getMediaInputsWithPreviewProperty(): array
    {
        return collect($this->mediaInputs)->map(function ($media) {
            $previewUrl = null;
            $mediaType = null;

            if ($media['type'] === 'file' && is_a($media['value'], \Livewire\Features\SupportFileUploads\TemporaryUploadedFile::class)) {
                $previewUrl = $media['value']->temporaryUrl();
                $mediaType = $this->determineMediaType($media['value'], false);
                // Vérification de la taille pour les vidéos
                if ($mediaType === 'video' && $media['value']->getSize() > 5 * 1024 * 1024) { // 5MB
                    $previewUrl = null; // Désactiver la prévisualisation pour les vidéos lourdes
                }
            } elseif ($media['type'] === 'url' && is_string($media['value'])) {
                $previewUrl = $media['value'];
                $mediaType = $this->determineMediaType($media['value'], true);
                // Gestion des vignettes pour YouTube/Vimeo
                if ($mediaType === 'video') {
                    if (Str::contains($media['value'], ['youtube.com', 'youtu.be'])) {
                        $videoId = $this->extractYouTubeId($media['value']);
                        $previewUrl = $videoId ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg" : $media['value'];
                        $mediaType = 'image'; // Utiliser une image pour la prévisualisation
                    } elseif (Str::contains($media['value'], 'vimeo.com')) {
                        $videoId = $this->extractVimeoId($media['value']);
                        if ($videoId) {
                            $response = Http::get("https://vimeo.com/api/v2/video/{$videoId}.json");
                            if ($response->successful()) {
                                $previewUrl = $response->json()[0]['thumbnail_large'] ?? $media['value'];
                                $mediaType = 'image';
                            }
                        }
                    }
                }
            }

            $media['preview_url'] = $previewUrl;
            $media['media_type'] = $mediaType;
            return $media;
        })->toArray();
    }

    protected function extractYouTubeId($url): ?string
    {
        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $url, $match)) {
            return $match[1];
        }
        return null;
    }

    protected function extractVimeoId($url): ?string
    {
        if (preg_match('/vimeo\.com\/(?:video\/)?(\d+)/i', $url, $match)) {
            return $match[1];
        }
        return null;
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('galeriemodule::livewire.admin.galerie.create-post', [
            'enhancedMediaInputs' => $this->getMediaInputsWithPreviewProperty(),
        ]);
    }
}
