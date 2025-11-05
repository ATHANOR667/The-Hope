<div>
    @if($showModal)
        <div
            x-data
            x-show="$wire.showModal"
            x-effect="document.body.style.overflow = $wire.showModal ? 'hidden' : ''"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click.away="$wire.close()"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-gray-900/70 dark:bg-black/75"
        >
            <div
                @click.stop
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="w-full max-w-md md:max-w-2xl lg:max-w-4xl bg-white dark:bg-gray-800 rounded-2xl shadow-2xl flex flex-col max-h-[95vh] sm:min-h-[600px]"
            >
                <!-- Header -->
                <div class="sticky top-0 bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 p-5 flex justify-between items-center z-10 rounded-t-2xl">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Modifier la FAQ</h3>
                    <button
                        wire:click="close"
                        class="p-2 rounded-full text-gray-500 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Formulaire -->
                <form class="p-4 sm:p-6 space-y-6 flex-grow overflow-y-auto">
                    <!-- Question -->
                    <div>
                        <label for="question" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            Question <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="question"
                            wire:model.blur="question"
                            class="block w-full py-3 px-4 rounded-xl border border-gray-200 text-base bg-gray-50 text-gray-900 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition duration-200 shadow-inner-sm"
                            required
                        />
                        @error('question') <span class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>

                    <!-- Réponse -->
                    <div>
                        <label for="answer" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            Réponse <span class="text-red-500">*</span>
                        </label>
                        <div
                            wire:ignore
                            x-data="{
                                quill: null,
                                content: @entangle('answer'),
                                init() {
                                    if (typeof Quill === 'undefined' || this.quill) return;
                                    const toolbarOptions = [
                                        [{ 'header': [1, 2, 3, false] }],
                                        ['bold', 'italic', 'underline'],
                                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                                        [{ 'align': [] }],
                                        ['link', 'clean']
                                    ];
                                    this.quill = new Quill(this.$refs.editor, {
                                        theme: 'snow',
                                        modules: { toolbar: toolbarOptions }
                                    });
                                    this.quill.root.innerHTML = this.content;
                                    this.quill.on('text-change', () => {
                                        this.content = this.quill.root.innerHTML;
                                    });
                                }
                            }"
                            x-init="$watch('$wire.showModal', value => { if (value) init(); })"
                            class="rounded-xl border border-gray-200 dark:border-gray-600 shadow-inner-sm overflow-hidden bg-gray-50 dark:bg-gray-700"
                        >
                            <div x-ref="editor" class="min-h-[300px]"></div>
                        </div>
                        @error('answer') <span class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>

                    <!-- Ordre + Publié -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="order" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">
                                Ordre
                            </label>
                            <input
                                type="number"
                                id="order"
                                wire:model="order"
                                min="0"
                                class="block w-full py-3 px-4 rounded-xl border border-gray-200 text-base bg-gray-50 text-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition duration-200 shadow-inner-sm"
                            />
                        </div>
                        <div class="flex items-center pt-6">
                            <input
                                wire:model="is_published"
                                id="is_published"
                                type="checkbox"
                                class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                            />
                            <label for="is_published" class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Publié
                            </label>
                        </div>
                    </div>
                </form>

                <!-- Footer -->
                <div class="sticky bottom-0 bg-white dark:bg-gray-800 p-4 sm:p-6 border-t border-gray-100 dark:border-gray-700 flex justify-end gap-3 z-10 rounded-b-2xl">
                    <button
                        type="button"
                        wire:click="close"
                        class="px-5 py-2.5 text-sm font-semibold text-gray-600 bg-transparent rounded-full hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 transition"
                    >
                        Annuler
                    </button>
                    <button
                        wire:click="save"
                        form="newsletter-form"
                        class="px-6 py-2.5 text-sm font-bold text-white bg-indigo-600 rounded-full shadow-lg shadow-indigo-500/50 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-150"
                        wire:loading.attr="disabled"
                    >
                        <span wire:loading.remove>Sauvegarder</span>
                        <span wire:loading class="flex items-center">
                            <svg class="animate-spin h-5 w-5 text-white mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Sauvegarde...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <style>
        .ql-container.ql-snow, .ql-toolbar.ql-snow { border: none !important; }
        .ql-toolbar.ql-snow { border-bottom: 1px solid #e5e7eb !important; background-color: #ffffff; padding: 8px; }
        .dark .ql-toolbar.ql-snow { border-bottom: 1px solid #4b5563 !important; background-color: #374151; }
        .ql-editor { min-height: 300px; padding: 1rem; background-color: #f9fafb; color: #1f2937; line-height: 1.6; }
        .dark .ql-editor { background-color: #4b5563; color: #f3f4f6; }
        .dark .ql-snow .ql-stroke { stroke: #d1d5db; }
        .dark .ql-snow .ql-fill { fill: #d1d5db; }
        .dark .ql-snow.ql-toolbar button:hover .ql-stroke { stroke: #93c5fd; }
    </style>
</div>
