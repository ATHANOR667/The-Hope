<?php

// Fichier : Modules/GalerieModule/Livewire/Admin/Galerie/ModerateComments.php

namespace Modules\GalerieModule\Livewire\Admin\Galerie;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\GalerieModule\Models\Comment;
use Modules\GalerieModule\Models\Post;
use Illuminate\Support\Facades\Log;

class ModerateComments extends Component
{
    use WithPagination;

    public $postId;
    public $perPage = 10;

    public $confirmingDelete = false;
    public $commentToDeleteId = null;

    public $confirmingAction = false; // Pour Approuver/Rejeter
    public $actionDetails = [
        'id' => null,
        'status' => null,
        'message' => null,
    ];

    public function mount($postId): void
    {
        $this->postId = $postId;
    }

    public function confirmUpdateStatus($commentId, $status): void
    {
        $comment = Comment::find($commentId);
        if (!$comment || $comment->post_id !== $this->postId) {
            $this->dispatch('flash-error', message: 'Commentaire non trouvé.');
            return;
        }

        $this->actionDetails = [
            'id' => $commentId,
            'status' => $status,
            'message' => $status === 'approved'
                ? 'Voulez-vous vraiment APPROUVER ce commentaire ?'
                : 'Voulez-vous vraiment REJETER ce commentaire ?',
        ];

        $this->confirmingAction = true;
    }

    public function updateStatus(): void
    {
        $this->confirmingAction = false;

        $commentId = $this->actionDetails['id'];
        $status = $this->actionDetails['status'];

        if (!$commentId || !$status) {
            $this->dispatch('flash-error', message: 'Action invalide.');
            $this->resetActionDetails();
            return;
        }

        $comment = Comment::find($commentId);
        if (!$comment || $comment->post_id !== $this->postId) {
            $this->dispatch('flash-error', message: 'Commentaire non trouvé ou non autorisé.');
            $this->resetActionDetails();
            return;
        }

        try {
            $comment->update(['moderation_status' => $status]);
            $this->dispatch('flash-success', message: "Statut du commentaire mis à jour sur '{$status}'.");
        } catch (\Exception $e) {
            Log::error("Erreur mise à jour statut: " . $e->getMessage());
            $this->dispatch('flash-error', message: 'Erreur lors de la mise à jour du statut.');
        }

        $this->resetActionDetails();
    }

    public function cancelAction(): void
    {
        $this->confirmingAction = false;
        $this->resetActionDetails();
    }

    private function resetActionDetails(): void
    {
        $this->actionDetails = ['id' => null, 'status' => null, 'message' => null];
    }

    public function confirmDelete($commentId): void
    {
        $comment = Comment::find($commentId);
        if (!$comment || $comment->post_id !== $this->postId) {
            $this->dispatch('flash-error', message: 'Commentaire non trouvé.');
            return;
        }
        $this->confirmingDelete = true;
        $this->commentToDeleteId = $commentId;
    }

    public function delete(): void
    {
        $this->confirmingDelete = false;
        if ($this->commentToDeleteId) {
            $comment = Comment::find($this->commentToDeleteId);
            if ($comment && $comment->post_id === $this->postId) {
                try {
                    $comment->delete();
                    $this->dispatch('flash-success', message: 'Commentaire supprimé avec succès.');
                } catch (\Exception $e) {
                    Log::error("Erreur suppression commentaire: " . $e->getMessage());
                    $this->dispatch('flash-error', message: 'Erreur lors de la suppression.');
                }
            } else {
                $this->dispatch('flash-error', message: 'Commentaire non trouvé.');
            }
        }
        $this->commentToDeleteId = null;
    }

    public function cancelDelete(): void
    {
        $this->confirmingDelete = false;
        $this->commentToDeleteId = null;
    }

    public function cancel(): void
    {
        $this->dispatch('closeModerateComments');
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $comments = Comment::where('post_id', $this->postId)
            ->whereNull('parent_id')
            ->with(['replies' => fn ($query) => $query->with('replies')]) // Pré-charger un niveau de réponses
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('galeriemodule::livewire.admin.galerie.moderate-comments', [
            'comments' => $comments,
        ]);
    }
}
