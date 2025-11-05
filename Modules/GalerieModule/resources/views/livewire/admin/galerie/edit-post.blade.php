<div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/70 dark:bg-gray-900/80 backdrop-blur-sm p-4 transition-opacity duration-300 ease-in-out">
    <div class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-sm sm:max-w-lg md:max-w-xl lg:max-w-3xl max-h-[95vh] overflow-hidden flex flex-col border border-gray-100 dark:border-gray-700 transform transition-all duration-300 scale-100">
        <div class="flex items-center justify-between p-5 border-b border-gray-100 dark:border-gray-700 sticky top-0 bg-white dark:bg-gray-800 z-10">
            <h3 class="text-2xl font-light text-gray-900 dark:text-gray-100 tracking-wide">Modifier le Post</h3>
            <button type="button" wire:click="resetInputFields"
                    class="text-gray-500 hover:text-gray-900 dark:hover:text-gray-200 rounded-full p-1.5 transition duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <span class="sr-only">Fermer modal</span>
            </button>
        </div>

        <form wire:submit.prevent="update" class="overflow-y-auto flex-grow">
            <div class="p-5 space-y-6">
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Titre</label>
                    <input wire:model.live.debounce.300ms="title" type="text" id="title" placeholder="Titre du post galerie..."
                           class="w-full p-3 text-sm text-gray-800 dark:text-gray-200 bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 placeholder-gray-400 shadow-inner">
                    @error('title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Description (Optionnel)</label>
                    <textarea wire:model.live="description" id="description" rows="3" placeholder="Description courte, contexte..."
                              class="w-full p-3 text-sm text-gray-800 dark:text-gray-200 bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 placeholder-gray-400 shadow-inner resize-y"></textarea>
                    @error('description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="pt-4">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 space-y-3 sm:space-y-0">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Liste des Médias</h4>
                        <button type="button" wire:click="addMediaInput"
                                class="w-full sm:w-auto px-4 py-2 text-sm font-medium text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-gray-700/50 border border-indigo-200 dark:border-indigo-800/50 rounded-lg hover:bg-indigo-100 dark:hover:bg-gray-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm">
                            + Ajouter un média
                        </button>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        @forelse ($enhancedMediaInputs as $index => $media)
                            <div wire:key="media-{{ isset($media['id']) ? 'existing-'.$media['id'] : 'new-'.$media['input_index'] }}"
                                 class="p-4 rounded-xl transition-all duration-300 shadow-sm
                                        @if(isset($media['id'])) bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 @else bg-indigo-50/50 dark:bg-indigo-900/10 border border-indigo-200/50 dark:border-indigo-800/50 @endif
                                        @error('mediaInputs.'.($media['input_index'] ?? $index).'.value') !border-red-400 !bg-red-50/50 dark:!bg-red-900/30 @enderror">
                                <div class="flex justify-between items-start mb-4 pb-2 border-b border-gray-100 dark:border-gray-700">
                                    <span class="font-medium text-sm text-gray-800 dark:text-gray-200">
                                        Média #{{ $index + 1 }}
                                        <span class="text-xs font-light text-indigo-600 dark:text-indigo-400">
                                            ({{ isset($media['id']) ? 'Existant' : 'Nouveau' }})
                                        </span>
                                    </span>
                                    <button type="button"
                                            @if(isset($media['id']))
                                                wire:click="removeExistingMedia('{{ $media['id'] }}')"
                                            title="Supprimer définitivement ce média"
                                            class="px-3 py-1 rounded-md text-sm font-semibold text-white bg-red-500 hover:bg-red-600 transition duration-200 flex items-center focus:outline-none focus:ring-2 focus:ring-red-500">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Supprimer
                                        @else
                                            wire:click="removeMedia({{ $media['input_index'] }})"
                                            title="Retirer ce champ (non sauvegardé)"
                                            class="p-1 rounded-full text-gray-500 hover:text-gray-700 dark:hover:text-gray-400 transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        @endif
                                    </button>
                                </div>

                                @if(!isset($media['id']))
                                    <div class="mb-3 space-y-3">
                                        <div>
                                            <label for="media-type-{{ $media['input_index'] }}" class="block mb-1 text-xs font-medium text-gray-700 dark:text-gray-300">Source</label>
                                            <select wire:model.live="mediaInputs.{{ $media['input_index'] }}.type" id="media-type-{{ $media['input_index'] }}"
                                                    class="w-full p-2.5 text-sm bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm">
                                                <option value="file">Téléverser Fichier (Image/Vidéo)</option>
                                                <option value="url">URL Externe</option>
                                            </select>
                                        </div>

                                        <div>
                                            @if ($media['type'] == 'file')
                                                <label for="media-file-{{ $media['input_index'] }}" class="block mb-1 text-xs font-medium text-gray-700 dark:text-gray-300">Fichier (Max 10MB)</label>
                                                <input type="file" wire:model="mediaInputs.{{ $media['input_index'] }}.value" id="media-file-{{ $media['input_index'] }}"
                                                       accept="image/jpeg,image/png,video/mp4,video/mov,video/webm"
                                                       class="block w-full text-sm text-gray-800 dark:text-gray-200 border border-gray-200 dark:border-gray-700 rounded-lg cursor-pointer bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-indigo-900/50 dark:file:text-indigo-300">
                                                <div wire:loading wire:target="mediaInputs.{{ $media['input_index'] }}.value" class="mt-2 text-xs font-medium text-indigo-600 dark:text-indigo-400 flex items-center">
                                                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                    </svg>
                                                    Téléversement en cours...
                                                </div>
                                                @error('mediaInputs.'.$media['input_index'].'.value') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                            @else
                                                <label for="media-url-{{ $media['input_index'] }}" class="block mb-1 text-xs font-medium text-gray-700 dark:text-gray-300">URL du Média Externe</label>
                                                <input type="text" wire:model.live.debounce.500ms="mediaInputs.{{ $media['input_index'] }}.value" id="media-url-{{ $media['input_index'] }}"
                                                       placeholder="Ex: https://youtube.com/watch?v=..."
                                                       class="w-full p-2.5 text-sm bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm">
                                                @error('mediaInputs.'.$media['input_index'].'.value') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                @if ($media['preview_url'])
                                    <div class="mt-4 p-3 bg-gray-100 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 shadow-inner">
                                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400 mb-2">Aperçu:</p>
                                        <div class="relative flex justify-center items-center w-full h-48 overflow-hidden rounded-lg">
                                            @if ($media['media_type'] === 'image')
                                                <img src="{{ $media['preview_url'] }}" alt="Aperçu image" class="max-w-full max-h-full object-contain">
                                            @elseif ($media['media_type'] === 'youtube' || $media['media_type'] === 'vimeo')
                                                <iframe src="{{ $media['preview_url'] }}" class="w-full h-full" frameborder="0" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>
                                            @elseif ($media['media_type'] === 'video' && !isset($media['id']))
                                                <video src="{{ $media['preview_url'] }}" class="max-w-full max-h-full object-contain" controls muted></video>
                                            @else
                                                <p class="text-sm text-gray-500 dark:text-gray-400">Prévisualisation indisponible.</p>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="text-gray-500 dark:text-gray-400 text-sm p-4 text-center border border-dashed border-gray-300 dark:border-gray-700 rounded-xl bg-gray-50 dark:bg-gray-800/50">
                                Cliquez sur "Ajouter un média" pour commencer.
                            </div>
                        @endforelse
                    </div>
                    @error('mediaInputs') <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center p-5 border-t border-gray-200 dark:border-gray-700 space-y-3 sm:space-y-0 sm:space-x-3 sticky bottom-0 bg-white dark:bg-gray-800 z-10">
                <button type="submit" wire:loading.attr="disabled" wire:target="update, mediaInputs.*.value"
                        class="w-full sm:w-auto flex-1 px-6 py-3 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:bg-indigo-400 dark:disabled:bg-indigo-700/50 disabled:cursor-not-allowed">
                    <span wire:loading.remove wire:target="update, mediaInputs.*.value">💾 Mettre à jour le Post</span>
                    <span wire:loading wire:target="update, mediaInputs.*.value" class="flex items-center justify-center">
                        <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Sauvegarde en cours...
                    </span>
                </button>
                <button type="button" wire:click="resetInputFields"
                        class="w-full sm:w-auto flex-1 px-6 py-3 text-sm font-semibold text-gray-600 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Annuler
                </button>
            </div>
        </form>
    </div>
</div>
