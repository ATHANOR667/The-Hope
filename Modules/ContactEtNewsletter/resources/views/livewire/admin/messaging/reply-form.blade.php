<div>
    @if($conversationId)
        <form wire:submit="send" class="flex flex-col space-y-3">

            <div
                x-data="{}"
                @keydown.ctrl.enter="$wire.send()"
                class="flex-1"
            >
                <textarea
                    wire:model="message"
                    rows="4"
                    placeholder="Écrivez votre réponse ici..."
                    class="w-full px-4 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm
                           focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:text-white
                           min-h-[120px] max-h-[250px] overflow-y-auto resize-none"
                    id="reply-textarea"
                ></textarea>
            </div>

            <div class="flex justify-between items-center">

                <button type="submit"
                        wire:loading.attr="disabled"
                        wire:loading.class="opacity-50"
                        class="px-5 py-2 text-sm font-medium bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-500 focus:ring-opacity-50 transition ease-in-out duration-150 disabled:opacity-75"
                >
                    <span wire:loading.remove>Envoyer le message</span>
                    <span wire:loading>Envoi...</span>
                </button>

                <small class="text-gray-500 dark:text-gray-400 text-xs hidden sm:block">
                    Raccourci : Ctrl+Entrée
                </small>
            </div>
        </form>

        @error('message')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

    @else
        <div class="text-center text-sm text-gray-400 py-4">
            Veuillez sélectionner une conversation pour répondre.
        </div>
    @endif

    <script>
        document.addEventListener('livewire:load', () => {
            Livewire.on('conversationSelected', () => {
                setTimeout(() => document.getElementById('reply-textarea')?.focus(), 100);
            });
        });
    </script>
</div>
