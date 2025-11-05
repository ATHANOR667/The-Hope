<?php

namespace Modules\GalerieModule\Livewire\Admin\Galerie;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\GalerieModule\Models\Post;
use Modules\GalerieModule\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class EditPost extends Component
{
    use WithFileUploads;

    public $postId;
    public $title;
    public $description;
    public $mediaInputs = [];
    public $existingMedia = [];

    const ALLOWED_MIMES = ['jpg', 'jpeg', 'png', 'mp4', 'mov', 'webm'];
    const MAX_FILE_SIZE = 10240; // 10MB

    public function mount($postId): void
    {
        $this->postId = $postId;
        $post = Post::with(['medias' => fn($query) => $query->orderBy('sort_order')])->find($postId);

        if (!$post) {
            $this->dispatch('flash-error', message: 'Post non trouvé.');
            $this->dispatch('closeEdit');
            return;
        }

        $this->title = $post->title;
        $this->description = $post->description;
        $this->existingMedia = $post->medias->map(function ($media) {
            return [
                'id' => $media->id,
                'media_type' => $media->media_type,
                'file_path' => $media->file_path,
                'video_url' => $media->video_url,
                'sort_order' => $media->sort_order,
                'preview_url' => $media->file_path ? Storage::url($media->file_path) : $media->video_url,
            ];
        })->toArray();

        if (empty($this->mediaInputs)) {
            $this->addMediaInput();
        }
    }

    protected function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|max:1000',
            'mediaInputs' => 'array',
            'mediaInputs.*.type' => ['required', Rule::in(['file', 'url'])],
            'mediaInputs.*.value' => [
                'sometimes',
                'nullable',
                Rule::when(
                    fn($input) => data_get($input, 'type') === 'file',
                    ['file', 'mimes:' . implode(',', self::ALLOWED_MIMES), 'max:' . self::MAX_FILE_SIZE]
                ),
                Rule::when(
                    fn($input) => data_get($input, 'type') === 'url',
                    ['url', 'max:2048', 'regex:/^(https?:\/\/(www\.)?(youtube\.com|youtu\.be|vimeo\.com)\/.*$|https?:\/\/.*\.(jpg|jpeg|png|mp4|mov|webm)(\?.*)?)$/i']
                ),
            ],
            'existingMedia' => 'array',
        ];
    }

    public function resetInputFields(): void
    {
        $this->mediaInputs = [];
        $this->addMediaInput();
        $this->resetErrorBag();
        $this->dispatch('closeEdit');
    }

    public function addMediaInput(): void
    {
        $this->mediaInputs[] = ['type' => 'file', 'value' => null, 'preview_url' => null, 'media_type' => null];
    }

    public function updatedMediaInputs($value, $key): void
    {
        $parts = explode('.', $key);
        if (count($parts) !== 2 || $parts[1] !== 'type') {
            return;
        }

        $index = $parts[0];
        if (!isset($this->mediaInputs[$index])) {
            Log::warning("Media input index {$index} does not exist.", ['mediaInputs' => $this->mediaInputs]);
            return;
        }

        $this->mediaInputs[$index] = array_merge(
            ['type' => 'file', 'value' => null, 'preview_url' => null, 'media_type' => null],
            $this->mediaInputs[$index]
        );

        $this->mediaInputs[$index]['value'] = null;
        $this->mediaInputs[$index]['preview_url'] = null;
        $this->mediaInputs[$index]['media_type'] = null;
        $this->resetValidation("mediaInputs.{$index}.value");
    }

    public function updated($name, $value): void
    {
        if (Str::startsWith($name, 'mediaInputs.') && Str::endsWith($name, '.value') && $value) {
            $parts = explode('.', $name);
            $index = $parts[1];

            if (!isset($this->mediaInputs[$index]['type'])) {
                Log::warning("Media input index {$index} missing 'type' key.", ['mediaInputs' => $this->mediaInputs]);
                $this->mediaInputs[$index]['type'] = 'file';
            }

            if ($this->mediaInputs[$index]['type'] === 'url') {
                try {
                    $response = Http::timeout(5)->head($value);
                    if (!$response->successful()) {
                        $this->addError("mediaInputs.{$index}.value", "L'URL semble inaccessible ou invalide.");
                    }
                } catch (\Exception $e) {
                    $this->addError("mediaInputs.{$index}.value", "Erreur lors de la vérification de l'URL : " . $e->getMessage());
                }
            }

            try {
                $this->validateOnly($name);
            } catch (\Illuminate\Validation\ValidationException $e) {
                $this->addError("mediaInputs.{$index}.value", $e->getMessage());
            }
        } else {
            $this->validateOnly($name);
        }
    }

    public function removeMedia($index): void
    {
        if (!isset($this->mediaInputs[$index])) {
            Log::warning("Attempted to remove non-existent media input index {$index}.", ['mediaInputs' => $this->mediaInputs]);
            return;
        }

        unset($this->mediaInputs[$index]);
        $this->mediaInputs = array_values($this->mediaInputs);

        if (empty($this->mediaInputs)) {
            $this->addMediaInput();
        }

        $this->resetErrorBag();
    }

    public function removeExistingMedia($mediaId): void
    {
        $media = Media::where('post_id', $this->postId)->find($mediaId);
        if (!$media) {
            $this->dispatch('flash-error', message: 'Média non trouvé ou n\'appartient pas à ce post.');
            Log::warning('Media not found or does not belong to post', ['media_id' => $mediaId, 'post_id' => $this->postId]);
            return;
        }

        DB::beginTransaction();
        try {
            if ($media->file_path && Storage::disk('public')->exists($media->file_path)) {
                Storage::disk('public')->delete($media->file_path);
                Log::info('Media file deleted from storage', ['media_id' => $mediaId, 'file_path' => $media->file_path]);
            }
            $media->delete();
            $this->existingMedia = array_values(array_filter($this->existingMedia, fn($item) => $item['id'] !== $mediaId));
            DB::commit();
            $this->dispatch('flash-success', message: 'Média supprimé avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to delete media', ['media_id' => $mediaId, 'post_id' => $this->postId, 'error' => $e->getMessage()]);
            $this->dispatch('flash-error', message: 'Erreur lors de la suppression du média.');
        }
    }

    public function generateUniqueSlug($title): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->where('id', '!=', $this->postId)->exists()) {
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

    public function update(): void
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $post = Post::findOrFail($this->postId);
            $post->update([
                'title' => $this->title,
                'description' => $this->description,
                'slug' => $this->generateUniqueSlug($this->title),
            ]);

            $existingMediaIds = collect($this->existingMedia)->pluck('id')->filter()->toArray();
            $maxSortOrder = 0;

            // Delete removed media
            Media::where('post_id', $this->postId)
                ->whereNotIn('id', $existingMediaIds)
                ->each(function ($media) {
                    if ($media->file_path && Storage::disk('public')->exists($media->file_path)) {
                        Storage::disk('public')->delete($media->file_path);
                        Log::info('Deleted media file during update', ['media_id' => $media->id, 'file_path' => $media->file_path]);
                    }
                    $media->delete();
                });

            // Update sort order for existing media
            foreach ($this->existingMedia as $index => $media) {
                if (isset($media['id'])) {
                    $sort_order = $index + 1;
                    Media::where('id', $media['id'])->update(['sort_order' => $sort_order]);
                    $maxSortOrder = $sort_order;
                }
            }

            // Add new media
            foreach ($this->mediaInputs as $index => $media) {
                if (empty($media['value']) || !isset($media['type'])) {
                    Log::warning("Skipping media input index {$index} due to missing value or type.", ['media' => $media]);
                    continue;
                }

                $file_path = null;
                $video_url = null;
                $media_type = $this->determineMediaType($media['value'], $media['type'] === 'url');

                if (!$media_type) {
                    Log::warning("Invalid media type for input index {$index}.", ['media' => $media]);
                    continue;
                }

                $sort_order = ++$maxSortOrder;

                if ($media['type'] === 'file') {
                    $uploadedFile = $media['value'];
                    if (!is_a($uploadedFile, \Livewire\Features\SupportFileUploads\TemporaryUploadedFile::class)) {
                        Log::warning("Media #{$index} marked as 'file' but uploaded object is invalid.", ['post_id' => $this->postId]);
                        continue;
                    }
                    if (!$uploadedFile->isValid()) {
                        Log::warning("Uploaded file at index {$index} is invalid.", ['post_id' => $this->postId]);
                        $this->addError("mediaInputs.{$index}.value", "Le fichier téléversé est invalide.");
                        continue;
                    }
                    $file_path = $uploadedFile->store('gallery_media', 'public');
                } else {
                    $video_url = $media['value'];
                }

                Media::create([
                    'post_id' => $post->id,
                    'media_type' => $media_type,
                    'file_path' => $file_path,
                    'video_url' => $video_url,
                    'sort_order' => $sort_order,
                ]);
            }

            DB::commit();
            $this->dispatch('flash-success', message: 'Post mis à jour avec succès.');
            $this->dispatch('refreshList');
            $this->dispatch('closeEdit');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatch('flash-error', message: 'Erreur lors de la mise à jour du post : ' . $e->getMessage());
        }
    }

    public function getMediaInputsWithPreviewProperty(): array
    {
        $newMedia = collect($this->mediaInputs)->map(function ($media, $index) {
            $previewUrl = null;
            $mediaType = null;

            if (!isset($media['type'])) {
                $media['type'] = 'file';
            }

            if ($media['type'] === 'file' && is_a($media['value'], \Livewire\Features\SupportFileUploads\TemporaryUploadedFile::class)) {
                try {
                    if ($media['value']->isValid()) {
                        $previewUrl = $media['value']->temporaryUrl();
                        $mediaType = $this->determineMediaType($media['value'], false);
                        if ($mediaType === 'video' && $media['value']->getSize() > 5 * 1024 * 1024) {
                            $previewUrl = null; // Avoid large video previews
                        }
                    }
                } catch (\Exception $e) {
                }
            } elseif ($media['type'] === 'url' && is_string($media['value']) && !empty($media['value'])) {
                $previewUrl = $media['value'];
                $mediaType = $this->determineMediaType($media['value'], true);
                if ($mediaType === 'youtube') {
                    $videoId = $this->extractYouTubeId($media['value']);
                    $previewUrl = $videoId ? "https://www.youtube.com/embed/{$videoId}" : $media['value'];
                } elseif ($mediaType === 'vimeo') {
                    $videoId = $this->extractVimeoId($media['value']);
                    $previewUrl = $videoId ? "https://player.vimeo.com/video/{$videoId}" : $media['value'];
                }
            }

            $media['preview_url'] = $previewUrl;
            $media['media_type'] = $mediaType;
            $media['input_index'] = $index;
            return $media;
        })->toArray();

        return array_merge($this->existingMedia, array_values($newMedia));
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
        return view('galeriemodule::livewire.admin.galerie.edit-post', [
            'enhancedMediaInputs' => $this->getMediaInputsWithPreviewProperty(),
        ]);
    }
}
