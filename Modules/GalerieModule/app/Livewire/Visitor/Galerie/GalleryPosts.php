<?php

namespace Modules\GalerieModule\Livewire\Visitor\Galerie;

use Livewire\Component;
use Modules\GalerieModule\Models\Post;

class GalleryPosts extends Component
{
    public $posts = [];
    public $mainMedia = null;

    public function mount(): void
    {
        $this->posts = Post::with(['medias'])
            ->where('moderation_status', 'approved')
            ->orderBy('published_at', 'desc')
            ->get();

        $firstPost = $this->posts->first();
        $this->mainMedia = $firstPost ? $firstPost->medias->first() : null;
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('galeriemodule::livewire.visitor.galerie.gallery-posts');
    }
}
