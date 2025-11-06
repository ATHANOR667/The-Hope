<div class="flex space-x-3 {{ $comment->parent_id ? 'pl-4 sm:pl-8 border-l border-dashed border-gray-300 dark:border-gray-700' : '' }}">
    <div class="flex-shrink-0">
        {{-- Icône/Avatar (Simplifié) --}}
        <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center text-white text-sm font-bold">
            {{ $comment->commenterName() ? substr($comment->commenterName(), 0, 1) : '?' }}
        </div>
    </div>
    <div class="flex-1 min-w-0">
        {{-- En-tête du Commentaire --}}
        <div class="flex items-center space-x-2">
            <p class="font-bold text-gray-800 dark:text-gray-100">
                {{ $comment->guest_name ?? ($comment->commenterName() ) }}
            </p>
            <span class="text-xs text-gray-500 dark:text-gray-400">
                il y a {{ $comment->created_at->diffForHumans() }}
            </span>
            @if($comment->moderation_status !== 'approved')
                <span class="text-xs text-red-500 bg-red-100 dark:bg-red-800 px-2 py-0.5 rounded-full">
                    En attente
                </span>
            @endif
        </div>

        {{-- Contenu du Commentaire --}}
        <p class="mt-1 text-gray-700 dark:text-gray-300 break-words">
            {{ $comment->content }}
        </p>

        {{-- Bouton Répondre --}}
        <button wire:click="$dispatch('setReplyTo', { commentId: '{{ $comment->id }}' })"
                class="mt-2 text-xs font-semibold text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-300 transition duration-150">
            <i class="fa-solid fa-reply mr-1"></i> Répondre
        </button>

        {{-- Section Réponse Récursive --}}
        @if($comment->replies->count() > 0)
            <div class="mt-4 space-y-4">
                @foreach($comment->replies as $reply)
                    @include('galeriemodule::livewire.visitor.galerie.partials.comment-item', ['comment' => $reply])
                @endforeach
            </div>
        @endif
    </div>
</div>
