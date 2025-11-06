<div class="flex h-screen overflow-hidden md:min-h-[85vh] md:p-6 bg-gray-100 dark:bg-gray-900 transition-colors duration-300"
     x-data="{ selectedId: @entangle('selectedConversationId') }">

    <div
        class="
            w-full h-full md:w-80 lg:w-96 flex-shrink-0
            rounded-none md:rounded-2xl shadow-none md:shadow-xl
            border-r md:border-none border-gray-200 dark:border-gray-700
            overflow-y-auto transition-all duration-300 ease-in-out

            {{ $selectedConversationId ? 'hidden md:block' : 'block' }}
        "
    >
        <livewire:contactetnewsletter::admin.messaging.conversation-list
            :key="'list-'.$selectedConversationId"
        />
    </div>

    <div
        class="
            flex-1 h-full
            flex flex-col
            bg-white dark:bg-gray-800
            rounded-none md:rounded-2xl shadow-none md:shadow-xl
            overflow-hidden transition-all duration-300 ease-in-out

            {{-- Marge à gauche uniquement si la liste est affichée (Desktop) --}}
            md:ml-4

            {{ $selectedConversationId ? 'block' : 'hidden md:block' }}
        "
    >
        @if($selectedConversationId)
            <div class="p-4 border-b border-gray-100 dark:border-gray-700 md:hidden bg-white dark:bg-gray-800 sticky top-0 z-20 shadow-sm">
                <button
                    type="button"
                    wire:click="$set('selectedConversationId', null)"
                    class="text-green-600 dark:text-green-400 font-bold flex items-center text-base hover:text-green-700 transition"
                >
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Toutes les Conversations
                </button>
            </div>
        @endif

        <div class="flex-1 flex flex-col overflow-hidden">
            @if($selectedConversationId)
                <div class="flex-1 overflow-y-auto" id="messages-container">
                    <livewire:contactetnewsletter::admin.messaging.conversation-detail
                        :conversationId="$selectedConversationId"
                        :key="'conv-'.$selectedConversationId"
                    />
                </div>
            @else
                <div class="flex items-center justify-center h-full">
                    <div class="text-center text-gray-500 dark:text-gray-400 p-8">
                        <svg class="w-16 h-16 mx-auto mb-4 text-green-400 dark:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">Prêt à discuter</h3>
                        <p class="mt-2 text-lg">Sélectionnez une conversation dans la liste pour commencer.</p>
                    </div>
                </div>
            @endif
        </div>

        @if($selectedConversationId)
            <button
                x-data
                @click="$dispatch('open-reply-modal')"
                class="fixed bottom-6 right-6 md:hidden z-30 w-14 h-14 rounded-full bg-green-600 text-white shadow-xl flex items-center justify-center hover:bg-green-700 transition"
                title="Répondre"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
            </button>
        @endif


        <div class="border-t border-gray-200 dark:border-gray-700 p-4 bg-gray-50 dark:bg-gray-800 flex-shrink-0
            hidden md:block
            @if(!$selectedConversationId) hidden @endif"
        >
            @if($selectedConversationId)
                <livewire:contactetnewsletter::admin.messaging.reply-form
                    :conversationId="$selectedConversationId"
                    :key="'reply-desktop-'.$selectedConversationId"
                />
            @endif
        </div>

        <div x-data="{ open: false }"
             @open-reply-modal.window="open = true"
             @message-sent.window="open = false"
             x-show="open"
             class="md:hidden fixed inset-0 z-40"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-full"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-full"
             style="display: none;"
        >
            <div @click="open = false" class="absolute inset-0 bg-gray-900/70"></div>

            <div class="absolute bottom-0 w-full bg-white dark:bg-gray-800 rounded-t-xl shadow-2xl p-4">
                <div class="flex justify-between items-center pb-2 border-b border-gray-200 dark:border-gray-700 mb-4">
                    <h3 class="text-lg font-semibold dark:text-white">Répondre</h3>
                    <button @click="open = false" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                @if($selectedConversationId)
                    <livewire:contactetnewsletter::admin.messaging.reply-form
                        :conversationId="$selectedConversationId"
                        :key="'reply-mobile-'.$selectedConversationId"
                    />
                @endif
            </div>
        </div>
    </div>

    {{-- Script pour le scroll --}}
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('scroll-to-bottom', () => {
                const container = document.getElementById('messages-container');
                if (container) {
                    container.scrollTop = container.scrollHeight;
                }
            });
        });
    </script>
</div>
