<div class="p-6 md:p-8 transition-colors duration-300">
    <form wire:submit.prevent="subscribe" class="space-y-6">

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Adresse Email
            </label>
            <input type="email"
                   id="email"
                   placeholder="votre.email@exemple.com"
                   class="w-full px-4 py-2 border rounded-lg focus:ring-green-500 focus:border-green-500
                      bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                      border-gray-300 dark:border-gray-600
                      @error('email') border-red-500 @enderror"
                   wire:model.live="email">

            @error('email')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Numéro de Téléphone (optionnel)
            </label>
            <input type="tel"
                   id="phone"
                   placeholder="+33 6 XX XX XX XX"
                   class="w-full px-4 py-2 border rounded-lg focus:ring-green-500 focus:border-green-500
                      bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                      border-gray-300 dark:border-gray-600
                      @error('phone') border-red-500 @enderror"
                   wire:model.live="phone">

            @error('phone')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <fieldset>
            <legend class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Choisissez votre canal de réception unique
            </legend>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                @php
                    // Définition locale des canaux pour la boucle (si non fournie par le composant parent)
                    $allChannels = [
                        'mail' => ['name' => 'Email', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />'],
                        //'sms' => ['name' => 'SMS', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />'],
                        //'whatsapp' => ['name' => 'WhatsApp', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.827 12.868A7.95 7.95 0 0012 5C7.942 5 4.542 8.358 4.004 12.55L3 21l8.473-2.824a7.95 7.95 0 005.354 1.342 7.952 7.952 0 004.288-1.127l.955 2.545 2.824-8.473zM12 21a9 9 0 100-18 9 9 0 000 18z" />'],
                    ];
                @endphp

                @foreach($allChannels as $channelKey => $channelData)
                    <label for="{{ $channelKey }}-channel"
                           class="relative flex flex-col items-center justify-center p-3 border rounded-lg cursor-pointer
                              text-gray-700 dark:text-gray-300
                              transition-all duration-200 ease-in-out
                              @if($selectedChannel === $channelKey)
                                  bg-green-50 dark:bg-green-800/30 border-green-500 ring-2 ring-green-500
                              @else
                                  bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600 hover:border-green-400 dark:hover:border-green-500
                              @endif">
                        <input id="{{ $channelKey }}-channel"
                               name="selectedChannel"
                               type="radio"
                               value="{{ $channelKey }}"
                               wire:model.live="selectedChannel"
                               class="sr-only">
                        <svg class="h-5 w-5 mb-1 {{ $selectedChannel === $channelKey ? 'text-green-600 dark:text-green-400' : 'text-gray-400 dark:text-gray-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            {!! $channelData['icon'] !!}
                        </svg>
                        <span class="text-xs font-medium">{{ $channelData['name'] }}</span>
                        @if($selectedChannel === $channelKey)
                            <svg class="h-3 w-3 text-green-600 dark:text-green-400 absolute top-1 right-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 00-1.414-1.414L10 10.586 8.707 9.293z" clip-rule="evenodd" />
                            </svg>
                        @endif
                    </label>
                @endforeach
            </div>

            @error('selectedChannel')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </fieldset>

        <button type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-base font-medium text-white
                   bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500
                   dark:bg-green-700 dark:hover:bg-green-600 dark:focus:ring-offset-gray-900 transition duration-150 ease-in-out"
                wire:loading.attr="disabled"
                wire:target="subscribe">

        <span wire:loading.remove wire:target="subscribe">
            M'abonner
        </span>

            <span wire:loading wire:target="subscribe" class="flex items-center">
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Inscription...
        </span>
        </button>
    </form>


</div>
