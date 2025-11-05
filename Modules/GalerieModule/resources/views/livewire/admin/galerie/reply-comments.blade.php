<div class="p-4 sm:p-6 bg-white dark:bg-gray-900 min-h-screen antialiased transition-colors duration-300">
    <div class="max-w-7xl mx-auto">
        <header class="mb-8 flex justify-between items-center pt-2 pb-6 border-b border-gray-100 dark:border-gray-800">
            <h1 class="text-3xl font-light tracking-tight text-gray-900 dark:text-gray-100">
                Répondre à un Commentaire
            </h1>
            <button wire:click="cancel" class="px-6 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-medium rounded-full hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 text-sm">
                Retour au Post
            </button>
        </header>

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-700 p-6">
            <div class="mb-6 bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 border border-gray-200 dark:border-gray-700">
                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                    {{ $parentComment->user ? $parentComment->user->name : 'Utilisateur inconnu' }}
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $parentComment->created_at->format('d/m/Y H:i') }}</p>
                <p class="text-sm text-gray-700 dark:text-gray-300 mt-2">{{ $parentComment->content }}</p>
            </div>

            <div class="space-y-6">
                <div>
                    <label for="content" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Votre Réponse</label>
                    <textarea wire:model="content" id="content" rows="6"
                              class="w-full p-3 text-sm bg-white dark:bg-gray-700/50 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"></textarea>
                    @error('content') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                <div class="flex space-x-3">
                    <button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                            class="flex-1 px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg shadow-md hover:bg-indigo-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 text-sm disabled:bg-indigo-400">
                        <span wire:loading.remove wire:target="save">Enregistrer</span>
                        <span wire:loading wire:target="save">Enregistrement...</span>
                    </button>
                    <button wire:click="cancel"
                            class="flex-1 px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-medium rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300 text-sm">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
