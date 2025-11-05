@props(['comment', 'isReply' => false, 'level' => 1])

@php
    $status = $comment->moderation_status;

    // Définition des classes de fond et de bordure basées sur le statut
    $bgClass = match ($status) {
        'approved' => 'bg-green-50/70 dark:bg-green-900/10', // Vert pâle pour Approuvé
        'pending' => 'bg-amber-50/70 dark:bg-amber-900/10',  // Ambre pâle pour En attente
        'rejected' => 'bg-red-50/70 dark:bg-red-900/10',    // Rouge pâle pour Rejeté
        default => $isReply ? 'bg-white dark:bg-gray-800' : 'bg-gray-50 dark:bg-gray-700/50', // Classes par défaut/réponse
    };

    // Ajout d'une bordure colorée (optionnel, mais visuellement utile)
    $borderClass = match ($status) {
        'approved' => 'border-l-4 border-green-400',
        'pending' => 'border-l-4 border-amber-400',
        'rejected' => 'border-l-4 border-red-400',
        default => 'border border-gray-200 dark:border-gray-700',
    };

    $shadowClass = 'shadow-sm';
    $paddingClass = $isReply ? 'p-3' : 'p-4';
    $actionSizeClass = $isReply ? 'p-1 text-xs' : 'p-1.5 text-sm sm:px-3 sm:py-1.5';
    $actionIconSize = $isReply ? 'w-4 h-4' : 'w-4 h-4';
@endphp

<div wire:key="comment-{{ $comment->id }}" class="{{ $bgClass }} rounded-lg {{ $shadowClass }} {{ $borderClass }} {{ $paddingClass }} relative">

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-1.5">
        <div class="order-2 mt-1 sm:order-none sm:mt-0">
            <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                {{ $comment->commenterName() ?? 'N/A' }} ( {{ $comment->commenterType() ?? 'Invité' }} )
            </p>
            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $comment->created_at->format('d/m/Y à H:i') }}</p>
        </div>

        {{-- STATUT TEXTUEL EXPLICITE --}}
        <span class="order-1 px-2 py-0.5 text-xs font-bold rounded-md min-w-max self-start sm:self-auto
            @if($status === 'approved') bg-green-200/50 text-green-800 dark:bg-green-700/30 dark:text-green-300
            @elseif($status === 'pending') bg-amber-200/50 text-amber-800 dark:bg-amber-700/30 dark:text-amber-300
            @else bg-red-200/50 text-red-800 dark:bg-red-700/30 dark:text-red-300 @endif">
            Statut : {{ ucfirst($status) }}
        </span>
    </div>
    <div class="whitespace-break-spaces max-w-full">
        <p class="text-sm text-gray-700 dark:text-gray-300 mb-3 break-words">
            {{ $comment->content }}
        </p>
    </div>

    <div class="flex flex-wrap gap-2 pt-2 border-t border-gray-200/60 dark:border-gray-700/60">

        {{-- Bouton Approuver avec confirmation --}}
        @if ($status !== 'approved')
            <button wire:click="confirmUpdateStatus('{{ $comment->id }}', 'approved')" title="Approuver"
                    class="flex items-center justify-center {{ $actionSizeClass }} text-green-600 dark:text-green-400 hover:bg-green-100 dark:hover:bg-gray-600 rounded-md sm:rounded-lg transition duration-150">
                <svg class="{{ $actionIconSize }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                @if (!$isReply)<span class="hidden sm:inline ml-1 font-medium">Approuver</span>@endif
            </button>
        @endif

        {{-- Bouton Rejeter avec confirmation --}}
        @if ($status !== 'rejected')
            <button wire:click="confirmUpdateStatus('{{ $comment->id }}', 'rejected')" title="Rejeter"
                    class="flex items-center justify-center {{ $actionSizeClass }} text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-gray-600 rounded-md sm:rounded-lg transition duration-150">
                <svg class="{{ $actionIconSize }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                @if (!$isReply)<span class="hidden sm:inline ml-1 font-medium">Rejeter</span>@endif
            </button>
        @endif

        {{-- Bouton Supprimer avec confirmation --}}
        <button wire:click="confirmDelete('{{ $comment->id }}')" title="Supprimer"
                class="flex items-center justify-center {{ $actionSizeClass }} text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-gray-600 rounded-md sm:rounded-lg transition duration-150">
            <svg class="{{ $actionIconSize }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4"></path></svg>
            @if (!$isReply)<span class="hidden sm:inline ml-1 font-medium">Supprimer</span>@endif
        </button>

        @if (!$isReply || $level < 5)
            <button wire:click="$parent.openReplyComments('{{ $comment->id }}')" title="Répondre"
                    class="flex items-center justify-center {{ $actionSizeClass }} text-indigo-600 dark:text-indigo-400 hover:bg-indigo-100 dark:hover:bg-gray-600 rounded-md sm:rounded-lg transition duration-150">
                <svg class="{{ $actionIconSize }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                @if (!$isReply)<span class="hidden sm:inline ml-1 font-medium">Répondre</span>@endif
            </button>
        @endif
    </div>

    {{-- Affichage récursif des réponses --}}
    @if ($comment->replies->count() > 0)
        <div class="mt-4 border-l-2 border-gray-200 dark:border-gray-700 pl-3 space-y-3 sm:pl-4 sm:space-y-4">
            <p class="text-xs text-gray-500 dark:text-gray-400 font-medium ml-1">
                {{ $comment->replies->count() }} Réponse(s) de niveau {{ $level + 1 }}
            </p>
            @foreach ($comment->replies as $reply)
                {{-- Appel de ce même composant (récursivité) --}}
                @include('galeriemodule::livewire.admin.galerie.partials.comment-item', [
                    'comment' => $reply,
                    'isReply' => true,
                    'level' => $level + 1
                ])
            @endforeach
        </div>
    @endif
</div>
