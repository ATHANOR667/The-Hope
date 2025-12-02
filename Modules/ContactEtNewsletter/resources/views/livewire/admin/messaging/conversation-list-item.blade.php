<div>
    @php
        $lastMessage = $conversation->messages->first();
        $isUnread = $conversation->is_unread ?? false;

        $channelData = match($conversation->channel_type) {
            'whatsapp' => ['color' => 'text-green-500', 'bg' => 'bg-green-100 dark:bg-green-900/50', 'icon' => '<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2C6.54 2 2.08 6.46 2.08 12s4.46 10 9.96 10c1.78 0 3.51-.49 5.01-1.42l3.43 1.15-1.17-3.32c.98-1.74 1.54-3.69 1.54-5.61C22 6.46 17.54 2 12.04 2z"/></svg>'],
            'sms' => ['color' => 'text-green-500', 'bg' => 'bg-green-100 dark:bg-green-900/50', 'icon' => '<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>'],
            default => ['color' => 'text-purple-500', 'bg' => 'bg-purple-100 dark:bg-purple-900/50', 'icon' => '<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/></svg>'],
        };
    @endphp

    <div
        wire:click="select('{{ $conversation->id }}')"
        wire:key="item-{{ $conversation->id }}"
        class="p-4 border-b border-gray-100 dark:border-gray-700 cursor-pointer transition-all duration-200 ease-in-out
           {{-- STYLE SELECTIONNÉ : Ajout d'une ombre et d'un arrière-plan plus fort --}}
           @if($isSelected)
               bg-green-100 dark:bg-green-700/60 shadow-inner
           {{-- STYLE NON LU : Plus d'accentuation --}}
           @elseif($isUnread)
               bg-green-50 dark:bg-gray-700/50 hover:bg-green-100/70
           {{-- STYLE NORMAL : Hover subtil --}}
           @else
               hover:bg-gray-50 dark:hover:bg-gray-700
           @endif"
    >
        <div class="flex items-center justify-between">

            <div class="flex items-center space-x-3 flex-1 min-w-0">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center text-white font-bold flex-shrink-0 text-lg
                        {{ $isSelected ? 'bg-green-600 shadow-md' : 'bg-gray-300 dark:bg-gray-600' }}">
                    {{ substr($conversation->contact->name ?? 'A', 0, 1) }}
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-base truncate text-gray-900 dark:text-white
                          {{ $isUnread ? 'font-extrabold' : 'font-semibold' }}">
                        {{ $conversation->contact->name ?? $conversation->contact->email }}
                    </p>

                    <p class="text-sm text-gray-500 dark:text-gray-400 truncate mt-0.5 {{ $isUnread ? 'font-semibold text-gray-700 dark:text-gray-300' : '' }}">
                        {{ Str::limit($lastMessage?->content ?? 'Pas de message', 45) }}
                    </p>
                </div>
            </div>

            <div class="flex flex-col items-end space-y-1 text-right ml-4 flex-shrink-0">

                {{-- Date --}}
                <span class="text-xs text-gray-500 dark:text-gray-400 {{ $isUnread ? 'font-bold text-green-600 dark:text-green-400' : '' }}">
                    {{ $conversation->updated_at->shortRelativeDiffForHumans() }}
                </span>

                <div class="flex items-center space-x-2">
                    {{-- Indicateur de Non Lu (déplacé ici pour être à côté de l'icône) --}}
                    @if ($isUnread)
                        <span class="w-2 h-2 rounded-full bg-green-500 block shadow-md flex-shrink-0" title="Nouveau message"></span>
                    @endif

                    {{-- Icône de Canal --}}
                    <span class="p-1 rounded-full {{ $channelData['bg'] }} {{ $channelData['color'] }} flex-shrink-0">
                        {!! $channelData['icon'] !!}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
