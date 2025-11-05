<?php

namespace Modules\GalerieModule\Livewire\Admin\Galerie;

use Illuminate\Contracts\Auth\Authenticatable;
use Livewire\Component;
use Modules\GalerieModule\Models\Comment;
use Modules\GalerieModule\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ReplyComments extends Component
{
    public string $postId;
    public ?Authenticatable $user ;
    public string $commentId;
    public $content;

    protected $rules = [
        'content' => 'required|string|min:1|max:1000',
    ];

    public function mount(string $postId, string $commentId): void
    {
        $this->postId = $postId;
        $this->commentId = $commentId;
        $this->user = Auth::guard('admin')->user();
    }

    public function save(): void
    {
        $this->validate();

        try {

            $this->validate();

            $data = [
                'content' => $this->content,
                'moderation_status' => 'approved' ,

                'parent_id' => $this->commentId,
                'post_id' => $this->postId,

                'commenter_id' => $this->user->id,
                'commenter_type' => $this->user->getMorphClass(),
            ];


            Comment::create($data);

            $this->content = '';
            $this->dispatch('flash-success', message: 'Réponse enregistrée avec succès.');
            $this->dispatch('closeReplyComments');
            Log::info('Comment reply created', ['post_id' => $this->postId, 'comment_id' => $this->commentId]);
        } catch (\Exception $e) {
            $this->dispatch('flash-error', message: 'Erreur lors de l\'enregistrement de la réponse.');
            Log::error('Error creating comment reply', ['post_id' => $this->postId, 'comment_id' => $this->commentId, 'error' => $e->getMessage()]);
        }
    }

    public function cancel()
    {
        $this->content = '';
        $this->dispatch('closeReplyComments');
    }

    public function render()
    {
        $parentComment = Comment::findOrFail($this->commentId);
        return view('galeriemodule::livewire.admin.galerie.reply-comments', [
            'parentComment' => $parentComment,
        ]);
    }
}
