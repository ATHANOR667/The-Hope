<div class="p-4 sm:p-6 bg-white dark:bg-gray-900 min-h-screen antialiased transition-colors duration-300" x-data="{ confirmingDelete: @entangle('confirmingDelete') }">

    @if (!$showModeration && !$editingPostId)
        <div class="max-w-7xl mx-auto">
            <header class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center pt-2 pb-6 border-b border-gray-100 dark:border-gray-800">
                <h1 class="text-3xl font-light tracking-tight text-gray-900 dark:text-gray-100 mb-4 sm:mb-0">
                    Galerie de Contenu
                </h1>
                <div class="flex space-x-3">
                    <button x-on:click="$dispatch('open-create-modal')"
                            class="w-full sm:w-auto px-6 py-2 bg-indigo-600 text-white font-medium rounded-full shadow-lg shadow-indigo-500/30 hover:bg-indigo-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 text-sm">
                        <svg class="w-4 h-4 inline mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Nouveau Post
                    </button>
                    <button wire:click="toggleFilterModal"
                            class="w-full sm:w-auto px-6 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-medium rounded-full hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 text-sm">
                        <svg class="w-4 h-4 inline mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1m-17 4h14m-10 4h6m-2 4h2"></path>
                        </svg>
                        Filtrer
                    </button>
                </div>
            </header>

            <div class="mb-8">
                <input wire:model.live.debounce.300ms="search" type="search" placeholder="Rechercher par titre ou description..."
                       class="w-full p-3 text-sm text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 placeholder-gray-400">
            </div>

            @if ($search || $moderationStatus || $startDate || $endDate)
                <div class="mb-6 flex flex-wrap gap-2 items-center">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Filtres actifs :</span>
                    @if ($search)
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300">
                            Recherche: {{ $search }}
                            <button wire:click="clearFilter('search')" class="ml-1 focus:outline-none">
                                <svg class="w-3 h-3 text-indigo-600 hover:text-indigo-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </span>
                    @endif
                    @if ($moderationStatus)
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300">
                            Statut: {{ ucfirst($moderationStatus) }}
                            <button wire:click="clearFilter('moderationStatus')" class="ml-1 focus:outline-none">
                                <svg class="w-3 h-3 text-indigo-600 hover:text-indigo-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </span>
                    @endif
                    @if ($startDate || $endDate)
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300">
                            Date: {{ $startDate ? $startDate : '...' }} à {{ $endDate ? $endDate : '...' }}
                            <button wire:click="clearFilter('startDate'); clearFilter('endDate')" class="ml-1 focus:outline-none">
                                <svg class="w-3 h-3 text-indigo-600 hover:text-indigo-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </span>
                    @endif
                    @if ($author_type)
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300">
                            Auteurs: {{ $author_type }}
                            <button wire:click="clearFilter('author_type'); " class="ml-1 focus:outline-none">
                                <svg class="w-3 h-3 text-indigo-600 hover:text-indigo-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </span>
                    @endif
                    <button wire:click="clearAllFilters" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                        Tout effacer
                    </button>
                </div>
            @endif

            @if ($posts->isEmpty() && ($search || $moderationStatus || $startDate || $endDate))
                <div class="p-8 bg-gray-50 dark:bg-gray-800 rounded-xl mt-10 shadow-inner border border-gray-100 dark:border-gray-700">
                    <p class="text-lg text-gray-500 dark:text-gray-400 text-center">
                        ❌ Aucune entrée trouvée pour les filtres sélectionnés.
                    </p>
                </div>
            @elseif ($posts->isEmpty())
                <div class="p-12 bg-gray-50 dark:bg-gray-800 rounded-2xl mt-10 flex flex-col items-center border border-gray-100 dark:border-gray-700">
                    <svg class="w-12 h-12 text-indigo-400 dark:text-indigo-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m-9 1v-3a2 2 0 012-2h12a2 2 0 012 2v3m-3 3H7a2 2 0 01-2-2v-3a2 2 0 012-2h10a2 2 0 012 2v3a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-xl font-medium text-gray-700 dark:text-gray-200 mb-2">Liste de posts vide</h3>
                    <p class="text-md text-gray-500 dark:text-gray-400 text-center">
                        Créez votre premier post pour commencer à remplir cette galerie.
                    </p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($posts as $post)
                        <div wire:key="post-{{ $post->id }}"
                             class="bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:border-indigo-300 transition duration-300 flex flex-col overflow-hidden">
                            @php
                                $firstMedia = $post->medias->first();
                                $mediaPath = $firstMedia ? (
                                    $firstMedia->file_path ? \Illuminate\Support\Facades\Storage::url($firstMedia->file_path) : $firstMedia->video_url
                                ) : null;
                            @endphp
                            @if ($firstMedia && $mediaPath)
                                <div class="relative overflow-hidden h-48">
                                    @if ($firstMedia->media_type === 'image')
                                        <img src="{{ $mediaPath }}" alt="{{ $post->title }}" loading="lazy"
                                             class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                    @else
                                        <div class="w-full h-full bg-black flex items-center justify-center">
                                            <svg class="h-10 w-10 text-white opacity-90" fill="currentColor" viewBox="0 0 24 24"><path d="M6 4v16l12-8-12-8z"/></svg>
                                        </div>
                                    @endif
                                    <span class="absolute top-3 right-3 px-2 py-0.5 text-xs font-semibold rounded-full
                                        @if($post->moderation_status === 'approved') bg-green-500/10 text-green-400 dark:bg-green-100/10 dark:text-green-300
                                        @elseif($post->moderation_status === 'pending') bg-amber-500/10 text-amber-700 dark:bg-amber-300/10 dark:text-amber-300
                                        @else bg-red-500/10 text-red-700 dark:bg-red-300/10 dark:text-red-300 @endif">
                                        {{ ucfirst($post->moderation_status) }}
                                    </span>
                                </div>
                            @else
                                <div class="w-full h-48 bg-gray-100 dark:bg-gray-700 rounded-t-xl flex items-center justify-center">
                                    <span class="text-gray-400 dark:text-gray-500 text-sm font-light">Aucun média</span>
                                </div>
                            @endif
                            <div class="p-4 flex-grow flex flex-col">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white line-clamp-2 mb-2" title="{{ $post->title }}">{{ $post->title }}</h3>
                                <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-4 space-x-3 pt-2 border-t border-gray-100 dark:border-gray-700">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 inline mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                        {{ $post->comments_count }} Comm.
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 inline mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        {{ $post->published_at->diffForHumans() }}
                                    </span>
                                </div>
                                <div class="flex space-x-2 mt-auto pt-2">
                                    <button wire:click="openEdit('{{ $post->id }}')" title="Modifier"
                                            class="p-2 text-indigo-600 dark:text-indigo-400 rounded-lg hover:bg-indigo-50 dark:hover:bg-gray-700 transition duration-150 flex-1 flex items-center justify-center">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-7-3L19 4.5 16.5 2 9 9.5M15 4l2 2"></path></svg>
                                    </button>
                                    <button wire:click="openModerate('{{ $post->id }}')" title="Modérer"
                                            class="p-2 text-orange-600 dark:text-orange-400 rounded-lg hover:bg-orange-50 dark:hover:bg-gray-700 transition duration-150 flex-1 flex items-center justify-center">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </button>
                                    <button wire:click="confirmDelete('{{ $post->id }}')" title="Supprimer"
                                            class="p-2 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-50 dark:hover:bg-gray-700 transition duration-150 flex-1 flex items-center justify-center">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $posts->links() }}
                </div>
            @endif

            <div x-show="$wire.showFilterModal" x-cloak
                 class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/70 dark:bg-gray-900/80 backdrop-blur-sm p-4 transition-opacity duration-300 ease-in-out">
                <div x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="transition ease-in duration-200 transform"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md max-h-[95vh] overflow-hidden flex flex-col border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between p-5 border-b border-gray-100 dark:border-gray-700 sticky top-0 bg-white dark:bg-gray-800 z-10">
                        <h3 class="text-2xl font-light text-gray-900 dark:text-gray-100 tracking-wide">Filtres Avancés</h3>
                        <button type="button" wire:click="toggleFilterModal"
                                class="text-gray-500 hover:text-gray-900 dark:hover:text-gray-200 rounded-full p-1.5 transition duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <span class="sr-only">Fermer modal</span>
                        </button>
                    </div>
                    <div class="p-5 space-y-6 overflow-y-auto">
                        <div>
                            <label for="moderationStatus" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Statut de modération</label>
                            <select wire:model.live="moderationStatus" id="moderationStatus"
                                    class="w-full p-3 text-sm bg-white dark:bg-gray-700/50 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                                <option value="">Tous</option>
                                <option value="approved">Approuvé</option>
                                <option value="pending">En attente</option>
                                <option value="rejected">Rejeté</option>
                            </select>
                        </div>
                        <div>
                            <label for="author_type" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Type d'auteur</label>
                            <select wire:model.live="author_type" id="author_type"
                                    class="w-full p-3 text-sm bg-white dark:bg-gray-700/50 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                                <option value="">Tous</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div>
                            <label for="startDate" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Date de début</label>
                            <input wire:model.live.debounce.300ms="startDate" type="date" id="startDate"
                                   class="w-full p-3 text-sm text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700/50 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                        </div>
                        <div>
                            <label for="endDate" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Date de fin</label>
                            <input wire:model.live.debounce.300ms="endDate" type="date" id="endDate"
                                   class="w-full p-3 text-sm text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700/50 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center p-5 border-t border-gray-200 dark:border-gray-700 space-y-3 sm:space-y-0 sm:space-x-3 sticky bottom-0 bg-white dark:bg-gray-800 z-10">
                        <button wire:click="applyFilters" type="button"
                                class="w-full sm:w-auto flex-1 px-6 py-3 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Appliquer les Filtres
                        </button>
                        <button wire:click="toggleFilterModal" type="button"
                                class="w-full sm:w-auto flex-1 px-6 py-3 text-sm font-semibold text-gray-600 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                            Annuler
                        </button>
                    </div>
                </div>
            </div>

            <div x-show="confirmingDelete" x-cloak
                 class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/60 backdrop-blur-sm p-4 transition-opacity duration-300 ease-in-out">
                <div x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="transition ease-in duration-200 transform"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     @click.away="confirmingDelete = false; $wire.cancelDelete()"
                     class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl p-6 w-full max-w-sm mx-auto border-t-4 border-red-500">
                    <div class="flex flex-col items-center">
                        <svg class="w-10 h-10 text-red-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.332 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2 text-center">Suppression</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-6 text-center">
                            Veuillez confirmer la suppression de ce post. Cette action est irréversible.
                        </p>
                    </div>
                    <div class="flex space-x-3 mt-4">
                        <button wire:click="cancelDelete" type="button"
                                class="flex-1 px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition text-sm font-medium">
                            Annuler
                        </button>
                        <button wire:click="delete" wire:loading.attr="disabled" wire:target="delete" type="button"
                                class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 transition text-sm font-medium disabled:bg-red-400">
                            <span wire:loading.remove wire:target="delete">Supprimer</span>
                            <span wire:loading wire:target="delete">Suppression...</span>
                        </button>
                    </div>
                </div>
            </div>

        </div> @endif

    @if ($editingPostId)
        @livewire('galeriemodule::admin.galerie.edit-post', ['postId' => $editingPostId])
    @endif
    @if ($showModeration && $moderatePostId)
        @livewire('galeriemodule::admin.galerie.moderate-post', ['postId' => $moderatePostId])
    @endif
</div>
