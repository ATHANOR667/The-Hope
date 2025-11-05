<?php

namespace Modules\GalerieModule\Livewire\Admin\Galerie;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\GalerieModule\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ListPosts extends Component
{
    use WithPagination;

    public bool $confirmingDelete = false;
    public ?string $postToDeleteId = null;
    public string $search = '';
    public string $moderationStatus = '';
    public ?string $startDate = null;
    public ?string $endDate = null;
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';

    public ?string $author_type = null;

    public ?string $editingPostId = null;
    public ?string $moderatePostId = null;
    public bool $showModeration = false;
    public int $perPage = 12;
    public bool $showFilterModal = false;

    protected $listeners = [
        'refreshList' => '$refresh',
        'closeEdit' => 'closeEdit',
        'closeModeration' => 'closeModeration'
    ];


    public function mount(): void
    {
        $this->search = (string) Session::get('list_posts_filters.search', '');
        $this->moderationStatus = (string) Session::get('list_posts_filters.moderationStatus', '');
        $this->startDate = Session::get('list_posts_filters.startDate');
        $this->author_type = Session::get('list_posts_filters.author_type');
        $this->endDate = Session::get('list_posts_filters.endDate');
    }


    public function updating(string $name, mixed $value): void
    {
        if (in_array($name, ['search', 'author_type', 'moderationStatus', 'startDate', 'endDate'])) {
            Session::put("list_posts_filters.{$name}", $value);
            $this->resetPage();
        }
    }

    /**
     * Efface un filtre spécifique.
     * @param string $filter Le nom du filtre à effacer (qui correspond à la propriété).
     */
    public function clearFilter(string $filter): void
    {
        $this->$filter = null;
        Session::forget("list_posts_filters.{$filter}");
        $this->resetPage();
    }

    /**
     * Efface tous les filtres.
     */
    public function clearAllFilters(): void
    {
        $this->search = '';
        $this->moderationStatus = '';
        $this->startDate = null;
        $this->endDate = null;
        $this->author_type = null;
        Session::forget('list_posts_filters');
        $this->resetPage();
    }


    public function toggleFilterModal(): void
    {
        $this->showFilterModal = !$this->showFilterModal;
    }


    public function applyFilters(): void
    {
        $this->showFilterModal = false;
        $this->resetPage();
    }


    public function confirmDelete(string $postId): void
    {
        $this->reset(['confirmingDelete', 'postToDeleteId']);

        $post = Post::find($postId);

        if (!$post) {
            $this->dispatch('flash-error', message: 'Post non trouvé.');
            return;
        }

        $this->confirmingDelete = true;
        $this->postToDeleteId = $postId;
        Log::debug('Confirming deletion for post', ['post_id' => $postId]);
    }


    public function delete(): void
    {
        $this->confirmingDelete = false;

        if ($this->postToDeleteId) {

            $post = Post::find($this->postToDeleteId);

            if ($post) {
                try {
                    $post->delete();
                    $this->dispatch('flash-success', message: 'Post supprimé avec succès.');
                    $this->dispatch('refreshList');
                } catch (\Exception $e) {
                    $this->dispatch('flash-error', message: 'Erreur lors de la suppression.');
                }
            } else {
                $this->dispatch('flash-error', message: 'Post non trouvé.');
            }
        }
        $this->postToDeleteId = null;
    }

    /**
     * Annule l'opération de suppression.
     */
    public function cancelDelete(): void
    {
        $this->reset(['confirmingDelete', 'postToDeleteId']);
    }

    /**
     * Ouvre le composant d'édition.
     * @param string $postId L'ID du post à éditer.
     */
    public function openEdit(string $postId): void
    {
        $post = Post::find($postId);

        if (!$post) {
            $this->dispatch('flash-error', message: 'Post non trouvé.');
            Log::error('Post not found when opening edit', ['post_id' => $postId]);
            return;
        }
        $this->editingPostId = $postId;
        Log::debug('Opening edit for post', ['post_id' => $postId]);
    }


    public function closeEdit(): void
    {
        $this->editingPostId = null;
        Log::debug('Closing edit');
    }


    public function openModerate(string $postId): void
    {
        // Utilisation de find() qui retourne Post|null
        $post = Post::find($postId);

        if (!$post) {
            $this->dispatch('flash-error', message: 'Post non trouvé.');
            return;
        }
        $this->moderatePostId = $postId;
        $this->showModeration = true;
    }


    public function closeModeration(): void
    {
        $this->moderatePostId = null;
        $this->showModeration = false;
    }


    public function render(): View
    {
        $query = Post::query()
            ->with(['medias' => fn($query) => $query->orderBy('sort_order', 'asc')->limit(1)])
            ->withCount('comments');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->moderationStatus) {
            $query->where('moderation_status', $this->moderationStatus);
        }

        if ($this->author_type) {
            $query->where('author_type', $this->author_type);
        }

        if ($this->startDate) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }

        if ($this->endDate) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        $posts = $query->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('galeriemodule::livewire.admin.galerie.list-posts', [
            'posts' => $posts,
        ]);
    }
}
