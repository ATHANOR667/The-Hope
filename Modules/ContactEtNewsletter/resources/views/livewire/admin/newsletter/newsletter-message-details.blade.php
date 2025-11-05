<div>
    @if($showDetails && $message)
        <div x-data="{ open: true }"
             x-show="open"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-full md:opacity-0 md:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 md:opacity-100 md:scale-100"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 translate-y-0 md:opacity-100 md:scale-100"
             x-transition:leave-end="opacity-0 translate-y-full md:opacity-0 md:scale-95"
             class="fixed inset-0 z-50 flex items-end justify-center bg-black bg-opacity-60 md:items-center p-4"
             @keydown.escape.window="$wire.call('close')"
             @click.away="$wire.call('close')">

            <div class="bg-white dark:bg-gray-800 rounded-t-3xl shadow-2xl w-full max-w-5xl relative h-[95vh] overflow-hidden flex flex-col md:rounded-xl md:h-[90vh] md:max-h-[90vh] md:max-w-6xl">
                {{-- Handle mobile swipe to dismiss --}}
                <div class="flex justify-center pt-3 pb-2 md:hidden">
                    <div class="w-16 h-2 bg-gray-300 dark:bg-gray-600 rounded-full cursor-pointer"></div>
                </div>

                {{-- Header --}}
                <div class="flex items-start justify-between px-6 pb-4 pt-4 flex-shrink-0">
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white leading-snug">
                        {{ $message->title }}
                    </h3>
                    <button wire:click="close"
                            class="text-gray-400 p-2 ml-4 hover:text-gray-600 dark:hover:text-gray-200 transition rounded-full flex-shrink-0"
                            aria-label="Fermer">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                {{-- Scrollable Content --}}
                <div class="px-6 pb-8 space-y-8 overflow-y-auto flex-grow">
                    {{-- Status & Date --}}
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-2 sm:space-y-0 text-base border-b dark:border-gray-700 pb-4">
                        <div class="font-medium text-gray-700 dark:text-gray-300">
                            Statut :
                            @if($message->sent_at)
                                <span class="text-green-600 dark:text-green-400 font-bold ml-1">Envoyée</span>
                            @else
                                <span class="text-orange-600 dark:text-orange-400 font-bold ml-1">Brouillon</span>
                            @endif
                        </div>
                        @if($message->sent_at)
                            <span class="text-sm text-gray-500 dark:text-gray-400 italic">
                                Le {{ $message->sent_at->format('d F Y') }} à {{ $message->sent_at->format('H:i') }}
                            </span>
                        @endif
                    </div>

                    {{-- Stats Grid --}}
                    <div class="space-y-3">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach([
                                'mail' => ['Email', 'M3 8L7 12L3 16 M21 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75'],
                                'sms' => ['SMS', 'M8 10C8 10.5523 8.44772 11 9 11C9.55228 11 10 10.5523 10 10C10 9.44772 9.55228 9 9 9C8.44772 9 8 9.44772 8 10Z M12 10C12 10.5523 12.4477 11 13 11C13.5523 11 14 10.5523 14 10C14 9.44772 13.5523 9 13 9C12.4477 9 12 9.44772 12 10Z M16 10C16 10.5523 16.4477 11 17 11C17.5523 11 18 10.5523 18 10C18 9.44772 17.5523 9 17 9C16.4477 9 16 9.44772 16 10Z M21 20H4C2.89543 20 2 19.1046 2 18V6C2 4.89543 2.89543 4 4 4H21C22.1046 4 23 4.89543 23 6V18C23 19.1046 22.1046 20 21 20Z M21 6H4V18H21V6Z'],
                                'whatsapp' => ['WhatsApp', 'M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2Z M16.7126 15.2285C16.5926 15.0185 15.2026 14.3485 14.9626 14.2585C14.7226 14.1685 14.5426 14.0785 14.3626 14.3185C14.1826 14.5585 13.6726 15.1585 13.5126 15.3485C13.3526 15.5385 13.2026 15.5585 12.9326 15.4285C12.2926 15.1185 10.7426 14.5285 9.8726 13.1085C9.6226 12.6985 9.7726 12.5285 9.9126 12.3985C10.0326 12.2785 10.1826 12.0785 10.3226 11.9185C10.4626 11.7585 10.5126 11.6485 10.6026 11.4785C10.7026 11.2785 10.6526 11.1085 10.5726 10.9585C10.5026 10.8285 9.9926 9.6185 9.7926 9.1085C9.5926 8.5985 9.3826 8.6885 9.2226 8.6885C9.0926 8.6885 8.9026 8.6885 8.7126 8.6885C8.5226 8.6885 8.2126 8.7585 7.9726 9.0385C7.7326 9.3185 7.1526 9.8585 7.1526 10.9485C7.1526 12.0385 7.9526 13.0685 8.0626 13.2085C8.1726 13.3485 9.6726 15.5985 11.8326 16.5185C13.9926 17.4385 14.4426 17.2985 14.8526 17.2585C15.2626 17.2185 16.2026 16.6185 16.3926 16.0585C16.5826 15.4985 16.8226 15.0585 16.7126 15.2285Z']
                            ] as $key => [$label, $svgPath])
                                @if(isset($stats[$key]) && $stats[$key]['try'] > 0)
                                    @php
                                        $stat = $stats[$key];
                                        $try = $stat['try'];
                                        $sent = $stat['sent'];
                                        $read = $stat['read'];
                                        $sentRate = $stat['sent_rate'];
                                        $readRate = $stat['read_rate'];
                                        $accentClass = match($key) {
                                            'mail' => 'text-blue-600 dark:text-blue-400 bg-blue-100 dark:bg-blue-800',
                                            'sms' => 'text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-800',
                                            'whatsapp' => 'text-emerald-600 dark:text-emerald-400 bg-emerald-100 dark:bg-emerald-800',
                                            default => 'text-gray-600 dark:text-gray-400 bg-gray-100 dark:bg-gray-700',
                                        };
                                        $sentRateClass = match(true) {
                                            $sentRate >= 90 => 'text-green-600 dark:text-green-400',
                                            $sentRate >= 50 => 'text-yellow-600 dark:text-yellow-400',
                                            default => 'text-red-600 dark:text-red-400',
                                        };
                                    @endphp

                                    <div class="bg-white dark:bg-gray-900 rounded-xl p-5 shadow-lg border border-gray-100 dark:border-gray-700 hover:shadow-xl transition duration-300 transform hover:scale-[1.01] flex flex-col justify-between">
                                        <div class="flex items-center space-x-3 mb-4 pb-3 border-b border-gray-200 dark:border-gray-700">
                                            <div class="flex-shrink-0 p-2 rounded-lg {{ $accentClass }} shadow-sm">
                                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="{{ $svgPath }}"></path>
                                                </svg>
                                            </div>
                                            <div class="text-xl font-extrabold text-gray-900 dark:text-gray-100">{{ $label }}</div>
                                        </div>

                                        <div class="flex flex-col space-y-4 mb-5">
                                            <div class="flex justify-between items-center">
                                                <div class="text-sm font-semibold text-gray-500 dark:text-gray-400">Taux d'envoi</div>
                                                <div class="text-4xl font-black {{ $sentRateClass }} leading-none tracking-tight">{{ $sentRate }}%</div>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <div class="text-sm font-semibold text-gray-500 dark:text-gray-400">Taux de lecture</div>
                                                <div class="text-4xl font-black text-indigo-600 dark:text-indigo-400 leading-none tracking-tight">{{ $readRate }}%</div>
                                            </div>
                                        </div>

                                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700 grid grid-cols-2 gap-x-4">
                                            <div>
                                                <div class="text-xs font-medium text-gray-600 dark:text-gray-300">Tentatives</div>
                                                <div class="text-lg font-bold text-gray-900 dark:text-gray-50 leading-tight">{{ number_format($try) }}</div>
                                            </div>
                                            <div class="text-right">
                                                <div class="text-xs font-medium text-gray-600 dark:text-gray-300">Envoyés / Lus</div>
                                                <div class="text-lg font-bold text-gray-900 dark:text-gray-50 leading-tight">
                                                    {{ number_format($sent) }} <span class="text-sm font-normal text-blue-600 dark:text-blue-400">/ {{ number_format($read) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    {{-- Errors Summary --}}
                    @if(($stats['errors'] ?? 0) > 0)
                        <div class="p-4 bg-red-50 dark:bg-red-900/30 border border-red-300 dark:border-red-700 rounded-xl">
                            <p class="font-bold text-red-800 dark:text-red-300 text-base mb-2">
                                {{ $stats['errors'] }} Échecs d'envoi à analyser :
                            </p>
                            <div class="space-y-2 text-xs font-mono max-h-40 overflow-y-auto">
                                @foreach($message->deliveries->where('status', 'failed') as $d)
                                    <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2 text-red-700 dark:text-red-300 break-words border-b border-red-200 dark:border-red-800 pb-1 last:border-b-0">
                                        <span class="font-semibold w-full sm:w-auto truncate text-sm">
                                            {{ $d->subscriber->email ?? $d->subscriber->phone }}
                                        </span>
                                        <span class="text-red-500 hidden sm:inline">→</span>
                                        <span class="flex-grow text-xs text-red-600 dark:text-red-400">
                                            {{ Str::limit($d->error_message, 80) }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Subscribers List --}}
                    <div>
                        {{-- Filtres + Recherche --}}
                        <div class="flex flex-col gap-4 mb-6">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white">
                                    Liste des abonnés
                                    <span class="text-base font-normal text-gray-600 dark:text-gray-400">
                                        ({{ $concernedUsers->count() }})
                                    </span>
                                </h4>

                                {{-- Barre de recherche --}}
                                <div class="relative">
                                    <input
                                        type="text"
                                        wire:model.live.debounce.300ms="search"
                                        placeholder="Rechercher un contact..."
                                        class="w-full sm:w-64 pl-10 pr-4 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition"
                                    />
                                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                            </div>

                            {{-- Filtres Canal + Statut --}}
                            <div class="flex flex-col sm:flex-row gap-3">
                                <select wire:model.live="filterChannel"
                                        class="text-sm border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                                    <option value="">Tous les canaux</option>
                                    <option value="mail">Email</option>
                                    <option value="sms">SMS</option>
                                    <option value="whatsapp">WhatsApp</option>
                                </select>

                                <select wire:model.live="filterStatus"
                                        class="text-sm border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                                    <option value="">Tous les statuts</option>
                                    <option value="success">Envoyé</option>
                                    <option value="failed">Échec</option>
                                    <option value="pending">En attente</option>
                                </select>
                            </div>
                        </div>

                        {{-- Mobile: Cards --}}
                        <div class="space-y-4 sm:hidden">
                            @forelse($concernedUsers as $user)
                                <div class="p-4 rounded-xl shadow-md border {{ $user['status'] === 'failed' ? 'bg-red-50 dark:bg-red-900/20 border-red-300 dark:border-red-800' : 'bg-white dark:bg-gray-700 border-gray-200 dark:border-gray-600' }}">
                                    <div class="flex items-start justify-between mb-2">
                                        <span class="inline-flex px-3 py-1 text-xs font-bold rounded-full {{ $user['channel'] === 'mail' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : ($user['channel'] === 'sms' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200') }}">
                                            {{ strtoupper($user['channel']) }}
                                        </span>
                                        <div class="flex items-center space-x-1 text-xs font-medium">
                                            <span class="h-2.5 w-2.5 rounded-full {{ $user['is_read'] ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                                            <span class="text-gray-600 dark:text-gray-300">{{ $user['is_read'] ? 'Lu' : 'Non lu' }}</span>
                                        </div>
                                    </div>
                                    <p class="text-sm font-mono text-gray-800 dark:text-gray-200 break-words mb-2 font-semibold">
                                        {{ $user['contact_used'] }}
                                    </p>
                                    <div class="text-xs mb-3">
                                        @if($user['status'] === 'failed')
                                            <span class="text-red-600 dark:text-red-400 font-bold">Échec :</span>
                                            <p class="text-red-600 dark:text-red-300 mt-1 italic text-xs">{{ $user['error'] }}</p>
                                        @elseif($user['status'] === 'pending')
                                            <span class="text-orange-600 dark:text-orange-400 font-semibold">Non envoyé</span>
                                            <span class="block text-gray-500 dark:text-gray-400 mt-1">Planifié pour: {{ $user['sent_at'] }}</span>
                                        @else
                                            <span class="text-green-600 dark:text-green-400 font-semibold">Envoyé</span>
                                            <span class="block text-gray-500 dark:text-gray-400 mt-1">Le: {{ $user['sent_at'] }}</span>
                                        @endif
                                    </div>
                                    @if($user['status'] != 'success')
                                        <button wire:click="retry('{{ $user['delivery_id'] }}')"
                                                wire:loading.attr="disabled"
                                                wire:loading.target="retry('{{ $user['delivery_id'] }}')"
                                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 inline-flex items-center justify-center text-sm disabled:opacity-50">
                                            <span wire:loading.remove wire:target="retry('{{ $user['delivery_id'] }}')" class="inline-flex items-center">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 0011.002 4zM20 20v-5h-.581m-15.356-2A8.001 8.001 0 0013.001 20z"></path>
                                                </svg>
                                                Réessayer
                                            </span>
                                            <span wire:loading wire:target="retry('{{ $user['delivery_id'] }}')">
                                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                </svg>
                                                Chargement..
                                            </span>
                                        </button>
                                    @endif
                                </div>
                            @empty
                                <div class="p-4 text-center text-gray-500 dark:text-gray-400 italic rounded-xl bg-gray-50 dark:bg-gray-700/50">
                                    Aucun abonné correspondant.
                                </div>
                            @endforelse
                        </div>

                        {{-- Desktop: Table --}}
                        <div class="hidden sm:block overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-400">Canal</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-400">Contact</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-400">Statut</th>
                                    <th class="px-4 py-3 text-center font-semibold text-gray-600 dark:text-gray-400">Lu</th>
                                    <th class="px-4 py-3 text-center font-semibold text-gray-600 dark:text-gray-400">Action</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($concernedUsers as $user)
                                    <tr class="{{ $user['status'] === 'failed' ? 'bg-red-50/50 dark:bg-red-900/20' : 'hover:bg-gray-50 dark:hover:bg-gray-700/50' }} transition">
                                        <td class="px-4 py-3">
                                                <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full {{ $user['channel'] === 'mail' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : ($user['channel'] === 'sms' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200') }}">
                                                    {{ strtoupper($user['channel']) }}
                                                </span>
                                        </td>
                                        <td class="px-4 py-3 text-xs font-mono text-gray-700 dark:text-gray-300 break-words max-w-[150px] truncate">
                                            {{ $user['contact_used'] }}
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            @if($user['status'] === 'failed')
                                                <div>
                                                    <span class="text-red-600 dark:text-red-400 font-bold">Échec</span>
                                                    <p class="text-xs text-red-600 dark:text-red-300 mt-1 truncate max-w-[150px]">{{ $user['error'] }}</p>
                                                </div>
                                            @elseif($user['status'] === 'pending')
                                                <div>
                                                    <span class="text-orange-600 dark:text-orange-400 font-semibold">Non envoyé</span>
                                                </div>
                                            @else
                                                <div>
                                                    <span class="text-green-600 dark:text-green-400 font-semibold">Envoyé</span>
                                                    <span class="block text-xs text-gray-500 dark:text-gray-400">{{ $user['sent_at'] }}</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            @if($user['is_read'])
                                                <span class="h-3 w-3 bg-green-500 inline-block rounded-full" title="Lu"></span>
                                                <span class="block text-xs text-gray-500 dark:text-gray-400">{{ $user['read_at'] }}</span>
                                            @else
                                                <span class="h-3 w-3 bg-gray-400 inline-block rounded-full" title="Non lu"></span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            @if($user['status'] != 'success')
                                                <button wire:click="retry('{{ $user['delivery_id'] }}')"
                                                        wire:loading.attr="disabled"
                                                        wire:loading.target="retry('{{ $user['delivery_id'] }}')"
                                                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-1.5 px-3 rounded-lg shadow-md transition duration-300 inline-flex items-center text-xs disabled:opacity-50">
                                                        <span wire:loading.remove wire:target="retry('{{ $user['delivery_id'] }}')" class="inline-flex items-center">
                                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 0011.002 4zM20 20v-5h-.581m-15.356-2A8.001 8.001 0 0013.001 20z"></path>
                                                            </svg>
                                                            Réessayer
                                                        </span>
                                                    <span wire:loading wire:target="retry('{{ $user['delivery_id'] }}')">
                                                            <svg class="animate-spin h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                            </svg>
                                                            ...
                                                        </span>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400 italic">
                                            Aucun abonné correspondant.
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Message Content --}}
                    <div class="p-5 bg-gray-50 dark:bg-gray-700 rounded-xl prose prose-base dark:prose-invert max-w-none text-gray-700 dark:text-gray-300 break-words border border-gray-200 dark:border-gray-600">
                        {!! $message->content !!}
                    </div>

                    <div class="h-4"></div>
                </div>
            </div>
        </div>
    @endif
</div>
