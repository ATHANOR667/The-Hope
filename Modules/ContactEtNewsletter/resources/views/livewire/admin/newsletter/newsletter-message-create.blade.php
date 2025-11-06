<div>
    <div>
        @if($showCreate)
            {{-- ARRIÈRE-PLAN --}}
            <div x-data
                 x-show="$wire.showCreate"
                 x-effect="document.body.style.overflow = $wire.showCreate ? 'hidden' : ''"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click.away="$wire.close()"
                 class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-gray-900/70 dark:bg-black/75">

                {{-- MODAL CONTAINER --}}
                <div @click.stop
                     x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-200 transform"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="
                     w-full
                     max-w-md          /* Mobile */
                     md:max-w-2xl      /* Tablette */
                     lg:max-w-5xl      /* PC moyen */
                     xl:max-w-7xl      /* Grand écran */
                     bg-white dark:bg-gray-800
                     rounded-2xl
                     shadow-2xl
                     flex flex-col
                     h-full max-h-[95vh]     /* Toujours limité en hauteur */
                     sm:h-auto               /* Hauteur auto à partir de sm */
                     sm:min-h-[600px]        /* Hauteur minimale sur desktop */
                 ">

                    {{-- HEADER (Sticky) --}}
                    <div class="sticky top-0 bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 p-5 flex justify-between items-center z-10 rounded-t-2xl">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Créer une Newsletter</h3>
                        <button wire:click="close"
                                class="p-2 rounded-full text-gray-500 hover:text-green-600 dark:hover:text-green-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    {{-- FORMULAIRE (Corps défilant) --}}
                    <form wire:submit.prevent="save" id="newsletter-form"
                          class="p-4 sm:p-6 space-y-6 flex-grow overflow-y-auto">
                        {{-- Titre --}}
                        <div>
                            <label for="title" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                                Titre <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="title" wire:model.lazy="title"
                                   class="block w-full py-3 px-4 rounded-xl border border-gray-200 text-base
                                      bg-gray-50 text-gray-900 placeholder-gray-500
                                      dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100
                                      focus:border-green-500 focus:ring-2 focus:ring-green-500 transition duration-200 shadow-inner-sm"
                                   placeholder="Ex: Mise à jour du mois d'octobre" required />
                            @error('title') <span class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                        </div>

                        {{-- Éditeur Quill --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                                Contenu <span class="text-red-500">*</span>
                            </label>
                            <div wire:ignore
                                 x-data="{
                                 quill: null,
                                 content: @entangle('content'),
                                 init() {
                                     const toolbarOptions = [
                                         [{ 'header': [1, 2, 3, false] }],
                                         ['bold', 'italic', 'underline', 'strike'],
                                         [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                                         [{ 'align': [] }],
                                         ['link', 'image', 'video', 'clean']
                                     ];
                                     if (typeof Quill === 'undefined' || this.quill) return;
                                     this.quill = new Quill(this.$refs.editor, {
                                         theme: 'snow',
                                         modules: { toolbar: toolbarOptions },
                                         placeholder: 'Écrivez le contenu de votre newsletter ici...'
                                     });
                                     this.quill.root.innerHTML = this.content;
                                     this.quill.on('text-change', () => {
                                         this.content = this.quill.root.innerHTML;
                                     });
                                 }
                             }"
                                 x-init="$watch('$wire.showCreate', value => { if (value) init(); })"
                                 class="rounded-xl border border-gray-200 dark:border-gray-600 shadow-inner-sm overflow-hidden bg-gray-50 dark:bg-gray-700">
                                <div x-ref="editor" class="quill-editor-container" style="min-height: 300px;"></div>
                            </div>
                            @error('content') <span class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                        </div>
                    </form>

                    {{-- FOOTER (Sticky) --}}
                    <div class="sticky bottom-0 bg-white dark:bg-gray-800 p-4 sm:p-6 border-t border-gray-100 dark:border-gray-700 flex justify-end gap-3 z-10 rounded-b-2xl">
                        <button type="button" wire:click="close"
                                class="px-5 py-2.5 text-sm font-semibold text-gray-600 bg-transparent rounded-full hover:bg-gray-100
                                   dark:text-gray-300 dark:hover:bg-gray-700 transition">
                            Annuler
                        </button>
                        <button type="submit" form="newsletter-form"
                                class="px-6 py-2.5 text-sm font-bold text-white bg-green-600 rounded-full shadow-lg shadow-green-500/50 hover:bg-green-700
                                   focus:ring-4 focus:ring-green-500 focus:ring-opacity-50 transition duration-150"
                                wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="save">Envoyer la Newsletter</span>
                            <span wire:loading wire:target="save" class="flex items-center">
                            <svg class="animate-spin h-5 w-5 text-white mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Envoi en cours...
                        </span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <style>
        /* Styles Quill (inchangés mais optimisés) */
        .ql-container.ql-snow, .ql-toolbar.ql-snow { border: none !important; }
        .ql-toolbar.ql-snow {
            border-bottom: 1px solid #e5e7eb !important;
            background-color: #ffffff;
            padding: 8px;
        }
        .dark .ql-toolbar.ql-snow {
            border-bottom: 1px solid #4b5563 !important;
            background-color: #374151;
        }
        .quill-editor-container { padding: 0; }
        .ql-editor {
            min-height: 300px;
            padding: 1rem;
            background-color: #f9fafb;
            color: #1f2937;
            line-height: 1.5;
        }
        .dark .ql-editor {
            background-color: #4b5563;
            color: #f3f4f6;
        }
        .dark .ql-snow .ql-stroke { stroke: #d1d5db; }
        .dark .ql-snow .ql-fill { fill: #d1d5db; }
        .dark .ql-snow.ql-toolbar button:hover .ql-stroke,
        .dark .ql-snow.ql-toolbar button:focus .ql-stroke,
        .dark .ql-snow.ql-toolbar button:hover .ql-fill,
        .dark .ql-snow.ql-toolbar button:focus .ql-fill,
        .dark .ql-snow .ql-picker-label:hover,
        .dark .ql-snow .ql-picker-options { color: #93c5fd; }
    </style>
</div>
