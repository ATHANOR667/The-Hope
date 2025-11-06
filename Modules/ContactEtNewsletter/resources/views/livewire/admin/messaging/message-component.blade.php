<div>
    @php
        $isAdmin = $message->sender_type === 'admin';
        // Utilisation de variables pour le SVG comme dans la correction ci-dessus
        $channelData = match($message->conversation->channel_type) {
            'whatsapp' => ['color' => 'text-green-500', 'svg' => '<svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2C6.54 2 2.08 6.46 2.08 12s4.46 10 9.96 10z"/></svg>'],
            'sms' => ['color' => 'text-blue-500', 'svg' => '<svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1z"/></svg>'],
            default => ['color' => 'text-purple-500', 'svg' => '<svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1z"/></svg>'],
        };
    @endphp

    <div class="flex {{ $isAdmin ? 'justify-end' : 'justify-start' }} w-full">

        {{-- CONTENEUR GLOBAL : Limitation de la largeur maximale (plus petit sur mobile) --}}
        <div class="max-w-[90%] sm:max-w-[70%] md:max-w-[60%] lg:max-w-md flex flex-col {{ $isAdmin ? 'items-end' : 'items-start' }}">

            {{-- BULLE DE MESSAGE : Retrait de whitespace-pre-wrap et usage d'un max-w-full pour la sécurité --}}
            <div class="
            px-3 py-2 text-sm whitespace-normal break-words max-w-full
            {{ $isAdmin
                ? 'bg-green-600 text-white rounded-t-xl rounded-bl-xl rounded-br-sm shadow-md'
                : 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-t-xl rounded-br-xl rounded-bl-sm shadow-sm'
            }}"
            >
                {!! nl2br(e($message->content)) !!}
            </div>

            {{-- Méta-données (Heure/Statut/Nom) --}}
            <div class="flex items-center mt-1 space-x-2 text-xs text-gray-400 dark:text-gray-500 {{ $isAdmin ? 'pr-1' : 'pl-1' }}">

                @if(!$isAdmin)
                    {{-- Ajout de flex-shrink-0 pour s'assurer que le nom n'écrase pas les autres éléments --}}
                    <span class="font-medium text-gray-600 dark:text-gray-300 truncate max-w-[120px] flex-shrink-0">{{ $message->sender->nom ?? $message->conversation->contact->name ?? 'Contact' }}</span>
                    <span class="text-xs flex-shrink-0">·</span>
                @endif


                <span class="flex-shrink-0">{{ $message->sent_at->format('H:i') }}</span>


                <span class="{{ $channelData['color'] }} flex-shrink-0">
                {!! $channelData['svg'] !!}
            </span>
            </div>

        </div>
    </div>
</div>
