<?php


namespace Modules\GalerieModule\Livewire\Visitor\Galerie;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\GalerieModule\Models\Comment;
use Modules\GalerieModule\Models\Media;
use Modules\GalerieModule\Models\Post;

class MediaDetails extends Component
{
    public ?Media   $media = null;
    public ?Post    $post = null;
    public ?Authenticatable $user = null ;
    public $isOpen = false;

    public string $newCommentContent = '';
    public ?string $newCommentGuestName = null;
    public ?string $newCommentGuestEmail = null;
    public ?string $replyToCommentId = null;

    protected $listeners = [
        'open-media-modal' => 'openModal',
        'setReplyTo' => 'setReplyToComment',
        'refreshComments' => '$refresh',
    ];

    protected $rules = [
        'newCommentContent' => 'required|string|min:3|max:500',
        'newCommentGuestName' => 'nullable|string|max:100',
        'newCommentGuestEmail' => 'nullable|email|max:100',
    ];

    public function openModal($mediaId): void
    {
        $this->media = Media::with('post')->find($mediaId);
        $this->post = $this->media ? $this->media->post : null;
        $this->user = Auth::guard('admin')->user();
        $this->isOpen = true;
    }

    public function setReplyToComment(?string $commentId): void
    {
        $this->replyToCommentId = $commentId;
    }

    public function makeComment(): void
    {
        if (!$this->user) {
            $this->rules['newCommentGuestName'] = 'required|string|max:100';
            $this->rules['newCommentGuestEmail'] = 'required|email|max:100';
        }

        $this->validate();

        $data = [
            'post_id' => $this->post->id,
            'content' => $this->newCommentContent,
            'moderation_status' => 'pending' ,
            'parent_id' => $this->replyToCommentId,
        ];

        if ($this->user) {
            $data['commenter_id'] = $this->user->id;
            $data['commenter_type'] =$this->user->getMorphClass();
        } else {
            $data['guest_name'] = $this->newCommentGuestName;
            $data['guest_email'] = $this->newCommentGuestEmail;
        }

        Comment::create($data);

        $this->newCommentContent = '';
        $this->newCommentGuestName = null;
        $this->newCommentGuestEmail = null;
        $this->replyToCommentId = null;

        $this->dispatch('refreshComments');
        $this->dispatch('comment-created');
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
        $this->media = null;
        $this->post = null;
        $this->replyToCommentId = null;
        $this->resetErrorBag();
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {

         $comments = $this->post
            ? $this->post->comments()
                 ->whereNull('parent_id')->with('replies')
                 ->where('moderation_status', 'approved')
                 //->where('replies.moderation_status', 'approved')
                 ->get()
            : collect();

        return view('galeriemodule::livewire.visitor.galerie.media-details', compact('comments'));
    }
}
