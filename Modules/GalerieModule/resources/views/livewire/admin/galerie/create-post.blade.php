<div x-data="{ isOpen: false }" x-on:open-create-modal.window="isOpen = true" x-on:close-create-modal.window="isOpen = false; $wire.resetInputFields()">
    <div x-show="isOpen" x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/70 dark:bg-gray-900/90 backdrop-blur-sm p-4 transition-opacity duration-300 ease-in-out">
        <div x-show="isOpen"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             @click.away="isOpen = false; $wire.resetInputFields()"
             class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl p-0 w-full max-w-lg md:max-w-xl lg:max-w-2xl max-h-[90vh] overflow-hidden flex flex-col">
            <div class="flex items-center justify-between p-5 border-b border-gray-200 dark:border-gray-700 sticky top-0 bg-white dark:bg-gray-800 z-10">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Créer un Post Galerie</h3>
                <button type="button" x-on:click="isOpen = false; $wire.resetInputFields()"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white transition duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    <span class="sr-only">Fermer modal</span>
                </button>
            </div>
            <form wire:submit.prevent="create" class="p-6 space-y-6 overflow-y-auto flex-grow">
                <div class="space-y-4">
                    <div>
                        <label for="title" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Titre du Post</label>
                        <input wire:model.live.debounce.300ms="title" type="text" id="title" placeholder="Titre accrocheur..."
                               class="w-full p-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white transition duration-200">
                        @error('title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="description" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Description (Optionnel)</label>
                        <textarea wire:model="description" id="description" rows="3" placeholder="Détails, contexte..."
                                  class="w-full p-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white transition duration-200"></textarea>
                        @error('description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="border-t pt-4 border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <label class="block text-base font-bold text-gray-900 dark:text-white">Médias (Images/Vidéos)</label>
                        <button type="button" wire:click="addMediaInput"
                                class="w-full sm:w-auto px-4 py-2 text-sm font-medium text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-gray-700/50 border border-indigo-200 dark:border-indigo-800/50 rounded-lg hover:bg-indigo-100 dark:hover:bg-gray-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm">
                            + Ajouter un média
                        </button>
                    </div>
                    <div class="space-y-4 max-h-[300px] overflow-y-auto p-2 -m-2">
                        @forelse ($enhancedMediaInputs as $index => $media)
                            <div wire:key="media-{{ $index }}"
                                 class="p-4 border-2 border-dashed rounded-xl transition duration-300
                                        @error('mediaInputs.{$index}.value') border-red-500 bg-red-50 dark:bg-red-950/30 @else border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 @enderror shadow-sm">
                                <div class="flex justify-between items-start mb-3">
                                    <span class="font-medium text-sm text-gray-800 dark:text-gray-200">Média #{{ $index + 1 }}</span>
                                    <button type="button" wire:click="removeMedia({{ $index }})"
                                            class="text-red-500 hover:text-red-700 text-sm font-medium transition duration-200">
                                        Supprimer
                                    </button>
                                </div>
                                <div class="mb-3">
                                    <label for="media-type-{{ $index }}" class="block mb-1 text-xs font-medium text-gray-700 dark:text-gray-300">Sélectionner le Type</label>
                                    <select wire:model.live="mediaInputs.{{ $index }}.type" id="media-type-{{ $index }}"
                                            class="w-full p-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white transition duration-200">
                                        <option value="file">Fichier (Image/Vidéo)</option>
                                        <option value="url">URL Externe</option>
                                    </select>
                                    @error('mediaInputs.{$index}.type') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    @if ($media['type'] == 'file')
                                        <label for="media-file-{{ $index }}" class="block mb-1 text-xs font-medium text-gray-700 dark:text-gray-300">
                                            Téléverser Fichier (JPG, PNG, MP4, MOV, WEBM | Max 10MB)
                                        </label>
                                        <input type="file" wire:model="mediaInputs.{{ $index }}.value" id="media-file-{{ $index }}"
                                               accept="image/jpeg,image/png,video/mp4,video/mov,video/webm"
                                               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-400 focus:outline-none dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400
                                                      file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-indigo-900/50 dark:file:text-indigo-300">
                                        <div wire:loading wire:target="mediaInputs.{{ $index }}.value" class="mt-2 text-xs font-medium text-indigo-600 dark:text-indigo-400 flex items-center">
                                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                            Téléversement en cours...
                                        </div>
                                    @else
                                        <label for="media-url-{{ $index }}" class="block mb-1 text-xs font-medium text-gray-700 dark:text-gray-300">URL de Média Externe</label>
                                        <input type="text" wire:model.live.debounce.500ms="mediaInputs.{{ $index }}.value" id="media-url-{{ $index }}"
                                               placeholder="Ex: https://example.com/image.jpg ou https://youtu.be/video"
                                               class="w-full p-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white transition duration-200">
                                    @endif
                                    @error('mediaInputs.{$index}.value') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                @if ($media['preview_url'])
                                    <div class="mt-4 p-3 bg-white dark:bg-gray-900 rounded-lg border border-gray-300 dark:border-gray-700 shadow-inner">
                                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400 mb-2">Prévisualisation:</p>
                                        <div class="flex justify-center items-center h-40 overflow-hidden">
                                            @if ($media['media_type'] === 'image')
                                                <img src="{{ $media['preview_url'] }}" alt="Aperçu image" class="max-w-full max-h-full object-contain rounded-lg">
                                            @elseif ($media['media_type'] === 'video')
                                                <video src="{{ $media['preview_url'] }}" class="max-w-full max-h-full object-contain rounded-lg" controls muted></video>
                                            @else
                                                <p class="text-sm text-yellow-600 dark:text-yellow-400">Prévisualisation indisponible pour ce média.</p>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <p class="text-gray-500 dark:text-gray-400 text-sm p-4 text-center border rounded-lg bg-gray-100 dark:bg-gray-700/50">
                                Cliquez sur "Ajouter un média" pour joindre une image ou une vidéo à votre post.
                            </p>
                        @endforelse
                    </div>
                    @error('mediaInputs') <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span> @enderror
                </div>
                <div class="flex items-center pt-6 border-t border-gray-200 dark:border-gray-700 space-x-3 rtl:space-x-reverse sticky bottom-0 bg-white dark:bg-gray-800 z-10">
                    <button type="submit" wire:loading.attr="disabled" wire:target="create, mediaInputs.*.value"
                            class="px-6 py-3 text-sm font-medium rounded-lg text-center transition duration-300 ease-in-out text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:ring-indigo-800 disabled:bg-indigo-400 dark:disabled:bg-indigo-700/50 disabled:cursor-not-allowed">
                        <span wire:loading.remove wire:target="create, mediaInputs.*.value">Créer le Post</span>
                        <span wire:loading wire:target="create, mediaInputs.*.value" class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Traitement...
                        </span>
                    </button>
                    <button type="button" x-on:click="isOpen = false; $wire.resetInputFields()"
                            class="py-3 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-indigo-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600 transition duration-200">
                        Annuler
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
