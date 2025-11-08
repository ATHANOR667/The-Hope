<div class="flex flex-col h-full  rounded-2xl  transition-colors duration-300">

    <div class="p-4 sticky top-0 z-10  border-b border-gray-100 dark:border-gray-700 rounded-t-2xl transition-colors duration-300">

        <input
            type="search"
            wire:model.live.debounce.300ms="search"
            placeholder="Rechercher des conversations..."
            class="w-full px-4 py-2 text-sm border-2 border-gray-200 dark:border-gray-700 rounded-lg focus:ring-green-500 focus:border-green-500 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 transition-all duration-300 "
        >

        <div class="flex flex-wrap gap-3 mt-4 text-sm font-medium">

            <select wire:model.live="statusFilter"
                    class="flex-1 min-w-[120px] appearance-none px-4 py-2 border border-gray-200 dark:border-gray-600 rounded-xl
                       bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 cursor-pointer transition-all duration-300
                       hover:border-green-300 dark:hover:border-green-500 focus:ring-green-500 focus:border-green-500 ">
                <option value="all">Tous statuts</option>
                <option value="open">Ouvertes ({{ $conversations->where('status', 'open')->count() }})</option>
                <option value="closed">Fermées</option>
            </select>

            <select wire:model.live="channelFilter"
                    class="flex-1 min-w-[120px] appearance-none px-4 py-2 border border-gray-200 dark:border-gray-600 rounded-xl
                       bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 cursor-pointer transition-all duration-300
                       hover:border-green-300 dark:hover:border-green-500 focus:ring-green-500 focus:border-green-500 ">
                <option value="all">Tous canaux</option>
                <option value="email">Email</option>
                <option value="whatsapp">WhatsApp</option>
                <option value="sms">SMS</option>
            </select>
        </div>
    </div>

    <div class="flex-1 overflow-y-auto">
        @if($conversations->count())
            @foreach($conversations as $conversation)

                <livewire:contactetnewsletter::admin.messaging.conversation-list-item
                    :conversation="$conversation"
                    :key="'item-'.$conversation->id"
                />
            @endforeach

            <div class="p-4 border-t border-gray-100 dark:border-gray-700 text-sm bg-white dark:bg-gray-800 transition-colors duration-300">
                {{ $conversations->links() }}
            </div>
        @else
            <div class="p-8 text-center text-gray-500 dark:text-gray-400">
                <svg class="w-12 h-12 mx-auto mb-4 text-green-500 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.69A9.79 9.79 0 015 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <p class="text-lg font-semibold mb-1">Aucune conversation trouvée</p>
                <p>Vérifiez les critères de recherche ou les filtres appliqués.</p>
            </div>
        @endif
    </div>
</div>
