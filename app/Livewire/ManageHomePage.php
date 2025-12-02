<?php

namespace App\Livewire;

use App\Models\HomeContent;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ManageHomePage extends Component
{
    use WithFileUploads;

    public $meta = [];
    public $hero = [];
    public $founders = [];
    public $social_links = [];

    public $meta_og_image_file;
    public $meta_image_x_icon_file;
    public $meta_image_png_file;
    public $meta_apple_touch_icon_file;
    public $meta_image_file;

    public $founderMediaFiles = [];

    public $meta_og_image_preview;
    public $founderMediaFilesPreview = [];

    public $availableIcons = [
        'fab fa-facebook' => 'Facebook',
        'fab fa-x-twitter' => 'Twitter (X)',
        'fab fa-instagram' => 'Instagram',
        'fab fa-linkedin' => 'LinkedIn',
        'fab fa-youtube' => 'YouTube',
        'fab fa-tiktok' => 'TikTok',
    ];

    public function mount(): void
    {
        $content = HomeContent::firstOrCreate([]);
        $this->meta = $content->meta ?? $this->getDefaultMeta();
        $this->hero = $content->hero ?? ['video_title' => '', 'video_url' => ''];
        $this->founders = $this->normalizeFounders($content->founders ?? []);
        $this->social_links = $this->assocToIndexed($content->social_links ?? []);

        $this->founderMediaFiles = array_fill(0, count($this->founders), null);
    }

    protected function getDefaultMeta(): array
    {
        return [
            'description' => '', 'keywords' => '', 'author' => '',
            'og:title' => '', 'og:description' => '', 'og:image' => '',
            'og:image:width' => '1200', 'og:image:height' => '630',
            'image/x-icon' => '', 'image/png' => '', 'apple-touch-icon' => '',
            'title' => '', 'image' => '',
        ];
    }

    protected function normalizeFounders($founders)
    {
        return collect($founders)->map(function ($f) {
            return array_merge([
                'name' => '', 'role' => '', 'media_type' => 'image', 'media_src' => '',
                'quote' => '', 'bio' => '', 'expertise' => '',
                'zone_d_intervention' => '', 'realisation' => '', 'socials' => [],
            ], $f);
        })->values()->toArray();
    }

    protected function assocToIndexed($assoc): array
    {
        $indexed = [];
        foreach ($assoc as $network => $url) {
            if (!$url) continue;
            $icon = $this->getIconForNetwork($network);
            if ($icon) $indexed[] = ['icon' => $icon, 'url' => $url];
        }
        return $indexed;
    }

    protected function indexedToAssoc($indexed): array
    {
        $assoc = [];
        foreach ($indexed as $item) {
            if (empty($item['url']) || empty($item['icon'])) continue;
            $network = $this->getNetworkForIcon($item['icon']);
            if ($network) $assoc[$network] = $item['url'];
        }
        return $assoc;
    }

    protected function getIconForNetwork($network): string
    {
        return match (strtolower($network)) {
            'facebook' => 'fab fa-facebook', 'twitter' => 'fab fa-x-twitter',
            'instagram' => 'fab fa-instagram', 'linkedin' => 'fab fa-linkedin',
            'youtube' => 'fab fa-youtube', 'tiktok' => 'fab fa-tiktok', default => '',
        };
    }

    protected function getNetworkForIcon($icon): ?string
    {
        return match ($icon) {
            'fab fa-facebook' => 'facebook', 'fab fa-x-twitter' => 'twitter',
            'fab fa-instagram' => 'instagram', 'fab fa-linkedin' => 'linkedin',
            'fab fa-youtube' => 'youtube', 'fab fa-tiktok' => 'tiktok', default => null,
        };
    }


    public function updatedMetaOgImageFile(): void
    { $this->meta_og_image_preview = $this->meta_og_image_file?->temporaryUrl(); }

    public function updatedFounderMediaFiles($value, $index): void
    {
        if (isset($this->founderMediaFiles[$index]) && is_object($this->founderMediaFiles[$index])) {
            $this->founderMediaFilesPreview[$index] = $this->founderMediaFiles[$index]->temporaryUrl();
        } else {
            unset($this->founderMediaFilesPreview[$index]);
        }
    }


    public function addFounder(): void
    {
        $this->founders[] = $this->normalizeFounders([[]])[0];
        $this->founderMediaFiles[] = null;
        $this->dispatch('flash-info', "Nouveau profil ajouté. N'oubliez pas de sauvegarder !");
    }

    public function removeFounder($index): void
    {
        unset($this->founders[$index]);
        $this->founders = array_values($this->founders);

        unset($this->founderMediaFiles[$index]);
        $this->founderMediaFiles = array_values($this->founderMediaFiles);
        unset($this->founderMediaFilesPreview[$index]);
        $this->founderMediaFilesPreview = array_values($this->founderMediaFilesPreview);

        $this->saveContent(['founders' => $this->founders]);
        $this->dispatch('flash-success', "Profil supprimé et contenu sauvegardé !");
    }

    public function saveFounder($index): void
    {
        $this->validateFounder($index);

        if (!empty($this->founderMediaFiles[$index])) {
            $file = $this->founderMediaFiles[$index];
            $url = $this->storeImage($file, 'founders');

            if ($url) {
                $this->founders[$index]['media_src'] = $url;
                $this->founderMediaFiles[$index] = null;
                unset($this->founderMediaFilesPreview[$index]);
            }
        }

        $founder = $this->founders[$index] ?? null;
        if ($founder) {
            $this->founders[$index]['socials'] = array_values(array_filter($founder['socials'] ?? [], fn($s) => !empty($s['url']) && !empty($s['icon'])));
        }

        $this->saveContent(['founders' => $this->founders]);
        $this->dispatch('flash-success', "Profil du fondateur sauvegardé !");
    }

    // Assurez-vous que cette fonction d'aide est disponible dans la même classe
// ou dans un trait qu'elle utilise.

    /**
     * Convertit une URL YouTube standard (watch, short, embed, etc.) en URL embed standard (iframe src).
     * Retourne null si le format n'est pas reconnu.
     */
    private function convertYoutubeToEmbedUrl(string $url): ?string
    {
        // Regex pour extraire l'ID de la vidéo de différents formats d'URL YouTube
        $patterns = [
            '/(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]{11})/', // watch?v=...
            '/(?:https?:\/\/)?(?:www\.)?youtu\.be\/([a-zA-Z0-9_-]{11})/', // youtu.be/
            '/(?:https?:\/\/)?(?:www\.)?youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/', // embed/
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                $videoId = $matches[1];
                // Format standard pour l'attribut src de l'iframe
                return "https://www.youtube.com/embed/{$videoId}";
            }
        }

        return null;
    }

    protected function validateFounder($index): void
    {
        // --- Prétraitement de l'URL media_src ---
        $mediaSrc = $this->founders[$index]['media_src'] ?? null;
        $mediaType = $this->founders[$index]['media_type'] ?? 'image';

        if ($mediaType === 'iframe' && $mediaSrc) {
            $embedUrl = $this->convertYoutubeToEmbedUrl($mediaSrc);

            if ($embedUrl) {
                // Mise à jour de la variable avec l'URL embed normalisée
                $this->founders[$index]['media_src'] = $embedUrl;
            } else {
                // Si la conversion échoue, cela signifie que l'URL fournie n'est pas un lien YouTube valide.
                $this->addError("founders.{$index}.media_src", "Si le type est 'iframe', l'URL doit être un lien YouTube valide (watch, share, etc.).");
                return; // Arrêter la validation
            }
        }
        // --- Fin du Prétraitement ---

        // Règles de validation mises à jour
        $rules = [
            "founders.{$index}.name" => 'required|string|max:100',
            "founders.{$index}.role" => 'required|string|max:100',
            "founders.{$index}.media_type" => ['required', Rule::in(['image', 'iframe'])],
            // Si iframe, l'URL a été normalisée en "embed"
            "founders.{$index}.media_src" => [
                'nullable',
                'url',
                // Conditionnel : Si le type est 'iframe', exige le format embed normalisé
                Rule::when($mediaType === 'iframe', ['required', 'starts_with:https://www.youtube.com/embed/']),
            ],
            "founders.{$index}.quote" => 'required|string|max:255',
            "founders.{$index}.bio" => 'required|string|max:1000',
            "founders.{$index}.expertise" => 'required|string|max:80',
            "founders.{$index}.zone_d_intervention" => 'required|string|max:80',
            "founders.{$index}.realisation" => 'required|string|max:80',
            "founderMediaFiles.{$index}" => 'nullable|image|max:1024',
        ];

        if (!empty($this->founders[$index]['socials'])) {
            $rules["founders.{$index}.socials.*.icon"] = ['required', Rule::in(array_keys($this->availableIcons))];
            $rules["founders.{$index}.socials.*.url"] = 'required|url';
        }

        $this->validate($rules);
    }

    public function removeFounderSocial($founderIndex, $socialIndex): void
    {
        if (isset($this->founders[$founderIndex]['socials'][$socialIndex])) {

            unset($this->founders[$founderIndex]['socials'][$socialIndex]);

            $this->founders[$founderIndex]['socials'] = array_values($this->founders[$founderIndex]['socials']);

            $this->saveFounder($founderIndex);

            $this->dispatch('flash-success', "Lien social du fondateur supprimé et profil sauvegardé !");
        } else {
            $this->dispatch('flash-error', "Erreur : Lien social non trouvé.");
        }
    }


    public function addSocialLink(): void
    {
        $this->social_links[] = ['icon' => '', 'url' => ''];
        $this->dispatch('flash-info', "Nouveau lien social ajouté. N'oubliez pas de sauvegarder !");
    }

    public function removeSocialLink($index): void
    {
        unset($this->social_links[$index]);
        $this->social_links = array_values($this->social_links);

        $assoc = $this->indexedToAssoc(array_filter($this->social_links, fn($s) => !empty($s['url'])));
        $this->saveContent(['social_links' => $assoc]);
        $this->dispatch('flash-success', "Lien social supprimé et sauvegardé.");
    }

    protected function saveContent($data): void
    {
        try {
            $content = HomeContent::firstOrCreate([]);
            $content->fill($data)->save();
        } catch (\Exception $e) {
            Log::error('DB save failed', ['error' => $e->getMessage()]);
            $this->dispatch('flash-error', 'Échec sauvegarde DB: ' . $e->getMessage());
        }
    }


    public function saveMeta(): void
    {
        $this->validate([
            'meta.description' => 'required|string|max:255', 'meta.keywords' => 'required|string|max:255',
            'meta.author' => 'required|string|max:100', 'meta.og:title' => 'required|string|max:100',
            'meta.og:description' => 'required|string|max:255', 'meta.title' => 'required|string|max:100',
            'meta_og_image_file' => 'nullable|image|max:1024', 'meta_image_x_icon_file' => 'nullable|mimes:ico|max:100',
            'meta_image_png_file' => 'nullable|image|max:1024', 'meta_apple_touch_icon_file' => 'nullable|image|max:1024',
            'meta_image_file' => 'nullable|image|max:1024',
        ]);
        $this->uploadMetaImages();
        $this->saveContent(['meta' => $this->meta]);
        $this->resetUploadsAndPreviews();
        $this->dispatch('flash-success', 'Meta sauvegardée');
    }



    public function saveHero(): void
    {
        // 1. Convertir l'URL avant la validation
        $embedUrl = $this->convertYoutubeToEmbedUrl($this->hero['video_url']);

        // Si la conversion réussit, mettre à jour la variable pour la sauvegarde
        if ($embedUrl) {
            $this->hero['video_url'] = $embedUrl;

            // La nouvelle règle de validation est plus simple, car l'URL est déjà dans le format 'embed'
            $this->validate([
                'hero.video_title' => 'required|string|max:100',
                // Nous vérifions simplement que c'est une URL valide et qu'elle contient 'youtube.com/embed/'
                'hero.video_url' => 'required|url|starts_with:https://www.youtube.com/embed/',
            ]);

            $this->saveContent(['hero' => $this->hero]);
            $this->dispatch('flash-success', 'Hero sauvegardée');
        } else {
            // 2. Échec de la conversion : l'URL n'est pas un lien YouTube valide
            // Cela remplace la validation par regex échouée
            $this->addError('hero.video_url', "Le lien YouTube fourni est invalide ou son format n'est pas reconnu. Veuillez utiliser un lien standard (watch ou share).");
            return;
        }
    }

    public function saveSocialLinks(): void
    {
        $this->validate([
            'social_links.*.icon' => ['required', Rule::in(array_keys($this->availableIcons))],
            'social_links.*.url' => 'required|url',
        ]);

        $assoc = $this->indexedToAssoc(array_filter($this->social_links, fn($s) => !empty($s['url'])));
        $this->social_links = $this->assocToIndexed($assoc);
        $this->saveContent(['social_links' => $assoc]);
        $this->dispatch('flash-success', 'Liens sociaux sauvegardés');
    }

    protected function uploadMetaImages(): void
    {
        $fields = [
            'meta_og_image_file' => 'og:image', 'meta_image_x_icon_file' => 'image/x-icon',
            'meta_image_png_file' => 'image/png', 'meta_apple_touch_icon_file' => 'apple-touch-icon',
            'meta_image_file' => 'image',
        ];

        foreach ($fields as $fileProp => $metaKey) {
            if ($this->$fileProp) {
                $url = $this->storeImage($this->$fileProp, 'meta');
                if ($url) $this->meta[$metaKey] = $url;
            }
        }
    }

    protected function storeImage($file, $path): string|\Illuminate\Contracts\Routing\UrlGenerator|null
    {
        if (!$file) return null;
        try {
            $filename = $file->store($path, 'public');
            return url('storage/' . $filename);
        } catch (\Exception $e) {
            Log::error('Upload failed', ['error' => $e->getMessage()]);
            $this->dispatch('flash-error', 'Échec upload: ' . $e->getMessage());
            return null;
        }
    }

    protected function resetUploadsAndPreviews(): void
    {
        $this->meta_og_image_file = $this->meta_image_x_icon_file = $this->meta_image_png_file = null;
        $this->meta_apple_touch_icon_file = $this->meta_image_file = null;
        $this->meta_og_image_preview = null;
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('livewire.manage-home-page');
    }
}
