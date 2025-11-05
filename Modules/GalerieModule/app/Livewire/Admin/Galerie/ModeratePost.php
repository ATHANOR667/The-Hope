<?php

namespace Modules\GalerieModule\Livewire\Admin\Galerie;

use Livewire\Component;
use Modules\GalerieModule\Models\Post;
use Modules\GalerieModule\Models\Media;
use Illuminate\Support\Facades\Log;

class ModeratePost extends Component
{
    public $postId;
    public $post;
    public $moderation_status;
    public $moderation_notes;
    public $showModerateComments = false;
    public $showReplyComments = false;
    public $replyToCommentId = null;

    protected $rules = [
        'moderation_status' => 'required|in:approved,pending,rejected',
        'moderation_notes' => 'nullable|string|max:1000',
    ];

    protected $listeners = [
        'closeModerateComments' => 'closeModerateComments',
        'closeReplyComments' => 'closeReplyComments',
    ];

    public function mount($postId): void
    {
        $this->postId = $postId;
        $this->post = Post::with(['medias' => fn($query) => $query->orderBy('sort_order', 'asc')])
            ->withCount('comments')
            ->findOrFail($postId);
        $this->moderation_status = $this->post->moderation_status;
        $this->moderation_notes = $this->post->moderation_notes ?? '';
    }

    public function save(): void
    {
        $this->validate();

        try {
            $this->post->update([
                'moderation_status' => $this->moderation_status,
                'moderation_notes' => $this->moderation_notes,
            ]);

            $this->dispatch('flash-success', message: 'Post modéré avec succès.');
            $this->dispatch('refreshList');
            $this->dispatch('closeModeration');
            Log::info('Post moderated successfully', ['post_id' => $this->postId, 'status' => $this->moderation_status]);
        } catch (\Exception $e) {
            $this->dispatch('flash-error', message: 'Erreur lors de la modération.');
            Log::error('Error during post moderation', ['post_id' => $this->postId, 'error' => $e->getMessage()]);
        }
    }

    public function cancel(): void
    {
        $this->dispatch('closeModeration');
    }

    public function openModerateComments(): void
    {
        $this->showModerateComments = true;
        $this->showReplyComments = false;
        $this->replyToCommentId = null;
    }

    public function closeModerateComments(): void
    {
        $this->showModerateComments = false;
    }

    public function openReplyComments($commentId): void
    {
        $this->showReplyComments = true;
        $this->showModerateComments = false;
        $this->replyToCommentId = $commentId;
    }

    public function closeReplyComments(): void
    {
        $this->showReplyComments = false;
        $this->replyToCommentId = null;
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('galeriemodule::livewire.admin.galerie.moderate-post');
    }
}
