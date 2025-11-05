<div class="min-h-screen bg-gray-50 dark:bg-gray-900 antialiased">
    <header class="sticky top-0 z-10 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm border-b border-gray-100 dark:border-gray-800 shadow-sm">
        <div class="max-w-xl lg:max-w-4xl xl:max-w-6xl mx-auto flex items-center justify-between p-4 sm:p-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Historique des Newsletters</h1>

            <button
                wire:click="openCreate"
                class="hidden lg:flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 transition duration-150 transform hover:scale-[1.02]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nouvelle Campagne
            </button>
        </div>
    </header>

    <div class="max-w-xl lg:max-w-4xl xl:max-w-6xl mx-auto p-4 sm:p-6 pb-24">

        <div class="flex justify-between items-center mb-6 lg:mb-10">
            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Gérez et consultez les statistiques clés  de vos campagnes.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-8">
            @forelse($messages as $message)
                @php
                    // UTILISATION DU NOUVEAU COMPTEUR total_delivery_count
                    $total_deliveries = $message->total_delivery_count;
                    $read_percent = $total_deliveries > 0 ? round($message->read_count / $total_deliveries * 100) : 0;
                @endphp

                <button
                    wire:click="showDetails('{{ $message->id }}')"
                    class="w-full p-5 text-left bg-white dark:bg-gray-800 rounded-xl transition duration-200 ease-in-out
                       hover:bg-gray-50 dark:hover:bg-gray-700
                       border border-gray-200 dark:border-gray-800
                       focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-0 dark:focus:ring-offset-0
                       hover:shadow-lg dark:hover:shadow-xl dark:hover:shadow-indigo-950/20">

                    <div class="flex justify-between items-start mb-2">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white line-clamp-2 truncate mr-4">
                            {{ $message->title }}
                        </h2>
                        <span class="text-xs font-bold px-2.5 py-1 rounded-full flex-shrink-0 mt-0.5 uppercase tracking-wide
                        {{ $message->sent_at ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/60 dark:text-indigo-300' : 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300' }}">
                        {{ $message->sent_at ? $message->sent_at->format('d M') : 'Brouillon' }}
                    </span>
                    </div>

                    {{-- Affichage des canaux utilisés --}}
                    <div class="flex flex-wrap gap-2 mt-3">
                        @foreach($message->deliveries->unique('channel') as $d)
                            @php
                                $class = match($d->channel) {
                                    'mail' => 'bg-indigo-100 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-300',
                                    'sms' => 'bg-purple-100 text-purple-700 dark:bg-purple-900/40 dark:text-purple-300',
                                    'whatsapp' => 'bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300',
                                    default => 'bg-gray-100 text-gray-600 dark:bg-gray-700/50 dark:text-gray-300',
                                };
                                $label = match($d->channel) {
                                    'mail' => 'Email', 'sms' => 'SMS', 'whatsapp' => 'WhatsApp', default => ucfirst($d->channel),
                                };
                            @endphp
                            <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full {{ $class }}">
                            {{ $label }}
                        </span>
                        @endforeach
                    </div>

                    <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-800/50 grid grid-cols-2 gap-4">

                        <div class="flex items-center text-gray-500 dark:text-gray-400">
                            <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            <div>
                                <span class="text-xs font-normal">Envoyés</span>
                                {{-- UTILISATION DE LA NOUVELLE VARIABLE --}}
                                <strong class="block text-lg font-bold text-gray-800 dark:text-white">{{ $total_deliveries }}</strong>
                            </div>
                        </div>

                        <div class="text-gray-500 dark:text-gray-400">
                            <div class="flex items-center mb-1">
                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                <span class="text-xs font-normal">Taux de Lecture</span>
                            </div>
                            <strong class="text-lg font-bold {{ $read_percent > 50 ? 'text-green-600 dark:text-green-400' : 'text-yellow-600 dark:text-yellow-400' }}">
                                {{ $read_percent }}%
                            </strong>
                            <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700 mt-1">
                                <div class="h-1.5 rounded-full" style="width: {{ $read_percent }}%; background-color: {{ $read_percent > 50 ? 'rgb(16, 185, 129)' : 'rgb(245, 158, 11)' }}"></div>
                            </div>
                        </div>
                    </div>
                </button>
            @empty
                <div class="lg:col-span-full text-center py-20 px-4 bg-gray-100 dark:bg-gray-800 rounded-xl border border-dashed border-gray-300 dark:border-gray-700">
                    <svg class="w-12 h-12 mx-auto text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">Aucun historique de campagne</h3>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Lancez votre première campagne pour voir les statistiques ici.</p>
                </div>
            @endforelse
        </div>
    </div>

    <button
        wire:click="openCreate"
        class="lg:hidden fixed bottom-6 right-6 flex items-center gap-2 px-5 py-3 text-base font-semibold text-white bg-indigo-600 rounded-full shadow-2xl shadow-indigo-500/50 dark:shadow-indigo-900/50
           hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:scale-[1.05]
           focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-70 z-50">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Nouvelle
    </button>


</div>
