<div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-inner border border-indigo-200 dark:border-indigo-800">

    <h5 class="font-semibold text-gray-800 dark:text-gray-100 mb-3">
        @if($replyToCommentId)
            Répondre au commentaire : <button wire:click="setReplyToComment(null)" class="text-indigo-600 hover:text-red-500 text-sm font-normal"> (Annuler la réponse)</button>
        @else
            Ajouter un commentaire
        @endif
    </h5>

    <form wire:submit.prevent="makeComment">
        <textarea wire:model.defer="newCommentContent"
                  class="w-full p-3 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                  rows="3"
                  placeholder="Votre commentaire..."
        ></textarea>
        @error('newCommentContent') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

        @if(!$user)
            {{-- Champs Invité (si non connecté) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
                <div>
                    <input type="text" wire:model.defer="newCommentGuestName"
                           placeholder="Votre Nom (requis)"
                           class="w-full p-3 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                    >
                    @error('newCommentGuestName') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <input type="email" wire:model.defer="newCommentGuestEmail"
                           placeholder="Votre Email (requis)"
                           class="w-full p-3 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                    >
                    @error('newCommentGuestEmail') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        @endif

        <div class="mt-3 flex justify-end">
            <button type="submit"
                    class="px-5 py-2 bg-indigo-600 text-white font-semibold rounded-full hover:bg-indigo-700 transition duration-300"
                    wire:loading.attr="disabled"
                    wire:target="makeComment"
            >
                <i class="fa-solid fa-paper-plane mr-2" wire:loading.remove wire:target="makeComment"></i>
                <span wire:loading.remove wire:target="makeComment">Envoyer</span>
                <span wire:loading wire:target="makeComment">Envoi...</span>
            </button>
        </div>
    </form>
</div>
