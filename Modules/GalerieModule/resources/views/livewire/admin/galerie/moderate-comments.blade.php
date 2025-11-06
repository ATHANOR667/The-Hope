<div class="p-3 bg-gray-50 dark:bg-gray-900 min-h-screen antialiased transition-colors duration-300 sm:p-6" x-data="{ confirmingDelete: @entangle('confirmingDelete') }">
    <div class="max-w-7xl mx-auto">

        <header class="mb-5 flex justify-between items-center pt-1 pb-4 border-b border-gray-100 dark:border-gray-800 sm:mb-8 sm:pb-6">
            <h1 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-gray-100 sm:text-3xl sm:font-light">
                Modération des Commentaires
            </h1>
            <button wire:click="cancel" class="p-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 text-sm sm:px-4 sm:py-2">
                <span class="flex items-center justify-center">
                    <svg class="w-5 h-5 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    <span class="hidden sm:inline">Retour au Post</span>
                </span>
            </button>
        </header>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 p-4 sm:p-6">
            @if ($comments->isEmpty())
                <div class="p-6 bg-gray-50 dark:bg-gray-700/50 rounded-lg text-center">
                    <p class="text-base text-gray-500 dark:text-gray-400">
                        Aucun commentaire à modérer.
                    </p>
                </div>
            @else
                <div class="space-y-6">
                    {{-- BOUCLE PRINCIPALE : UTILISATION DE LA VUE ENFANT --}}
                    @foreach ($comments as $comment)
                        @include('galeriemodule::livewire.admin.galerie.partials.comment-item', [
                            'comment' => $comment,
                            'isReply' => false,
                            'level' => 1
                        ])
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $comments->links() }}
                </div>
            @endif
        </div>
    </div>

    {{-- MODALES DE CONFIRMATION --}}

    {{-- Modale pour Approuver/Rejeter --}}
    @if ($confirmingAction)
        <div class="fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-75 flex items-center justify-center p-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-lg w-full p-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Confirmation de la modération</h3>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">{{ $actionDetails['message'] }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Cette action mettra à jour le statut du commentaire. Voulez-vous continuer ?</p>
                <div class="mt-6 flex justify-end space-x-3">
                    <button wire:click="cancelAction" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                        Annuler
                    </button>
                    <button wire:click="updateStatus"
                            class="px-4 py-2 text-sm font-medium text-white rounded-lg transition"
                            x-bind:class="{
                                'bg-green-600 hover:bg-green-700': '{{ $actionDetails['status'] }}' === 'approved',
                                'bg-red-600 hover:bg-red-700': '{{ $actionDetails['status'] }}' === 'rejected'
                            }"
                            wire:loading.attr="disabled">
                        Confirmer
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Modale pour la Suppression --}}
    @if ($confirmingDelete)
        <div class="fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-75 flex items-center justify-center p-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-lg w-full p-6">
                <h3 class="text-xl font-bold text-red-600 mb-4">Confirmation de la suppression</h3>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Êtes-vous sûr de vouloir supprimer ce commentaire ?</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Cette opération est irréversible et supprimera également toutes ses réponses associées.</p>
                <div class="mt-6 flex justify-end space-x-3">
                    <button wire:click="cancelDelete" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                        Annuler
                    </button>
                    <button wire:click="delete" class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition" wire:loading.attr="disabled">
                        Supprimer Définitivement
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
