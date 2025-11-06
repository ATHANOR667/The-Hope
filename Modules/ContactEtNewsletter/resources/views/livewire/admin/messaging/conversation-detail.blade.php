<div class="h-full flex flex-col bg-white dark:bg-gray-900 transition-colors duration-300">

    <div class="p-4 border-b-2 border-green-500 dark:border-green-700 bg-gray-50 dark:bg-gray-800 sticky top-0 z-10 shadow-lg transition-colors duration-300">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white truncate">
            @if($conversation)
                <span class="text-green-600 dark:text-green-400">#{{ $conversation->contact->email ?? $conversation->contact->phone }}</span>
                ( <span class="font-extrabold">{{ $conversation->contact->name ?? $conversation->contact->email }}</span> )
            @else
                <span class="text-gray-500 dark:text-gray-400">Sélectionnez une conversation</span>
            @endif
        </h2>

$        @if($conversation && $conversation->status)
            <p class="text-sm mt-1 text-gray-500 dark:text-gray-400">
                Statut :
                <span class="font-semibold {{ $conversation->status === 'open' ? 'text-green-500' : 'text-red-500' }}">
                {{ $conversation->status === 'open' ? 'Ouverte' : 'Fermée' }}
            </span>
                · Canal :
                <span class="font-semibold">{{ ucfirst($conversation->channel_type ?? 'Email') }}</span>
            </p>
        @endif
    </div>



    <div class="flex-1 overflow-y-auto p-4 sm:p-6 md:p-8 space-y-6 bg-gray-50 dark:bg-gray-900/90 transition-colors duration-300">

        @if($conversationId)
            @forelse($messages as $message)
                <livewire:contactetnewsletter::admin.messaging.message-component
                    :message="$message"
                    :key="$message->id"
                />
            @empty
                <div class="flex flex-col items-center justify-center h-full min-h-[40vh] p-8 bg-white/50 dark:bg-gray-800/50 rounded-lg border border-dashed border-green-300 dark:border-green-700">
                    <svg class="w-10 h-10 mx-auto mb-3 text-green-500 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    <p class="text-center text-lg font-semibold text-gray-700 dark:text-gray-300">
                        Commencez la discussion.
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        Utilisez le champ de réponse ci-dessous pour envoyer un message.
                    </p>
                </div>
            @endforelse
        @endif

        <div id="end-of-messages" class="h-0.5"></div>
    </div>
</div>
