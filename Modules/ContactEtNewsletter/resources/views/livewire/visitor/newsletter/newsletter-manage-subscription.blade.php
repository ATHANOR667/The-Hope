<div class="max-w-xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-3xl p-6 md:p-10 border border-gray-100 dark:border-gray-700">

        <div class="text-center mb-8">
            <svg class="mx-auto h-12 w-12 text-indigo-600 dark:text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
            </svg>
            <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mt-3 tracking-tight">
                Gérer mon Abonnement 📬
            </h1>
            <p class="text-md text-gray-500 dark:text-gray-400 mt-2">
                Entrez votre adresse email pour voir ou modifier vos préférences de communication.
            </p>
        </div>

        @if ($statusMessage)
            <div @class([
            'p-4 rounded-xl mb-6 font-medium text-sm transition-opacity duration-300',
            'bg-red-100 text-red-800 dark:bg-red-900/40 dark:text-red-300' => str_contains($statusMessage, 'Erreur'),
            'bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-300' => str_contains($statusMessage, 'succès') || str_contains($statusMessage, 'désinscrit'),
            'bg-indigo-100 text-indigo-800 dark:bg-indigo-900/40 dark:text-indigo-300' => str_contains($statusMessage, 'préférences') || str_contains($statusMessage, 'trouvé'),
        ]) role="alert">
                {{ $statusMessage }}
            </div>
        @endif

        <form wire:submit.prevent="loadSubscription" class="space-y-5 mb-8">
            <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                Votre Adresse Email
            </label>
            <div class="flex space-x-3">
                <input
                    wire:model.defer="email"
                    type="email"
                    id="email"
                    required
                    placeholder="votre.email@exemple.com"
                    @if($subscriberFound) disabled @endif
                    class="flex-1 block w-full rounded-xl border-gray-300 shadow-inner
                       dark:bg-gray-700 dark:border-gray-600 dark:text-white
                       focus:ring-indigo-500 focus:border-indigo-500 disabled:opacity-70 disabled:cursor-not-allowed transition duration-150 p-3">

                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    @if($subscriberFound) disabled @endif
                    class="px-5 py-3 text-sm font-semibold rounded-xl shadow-lg
                       bg-indigo-600 text-white hover:bg-indigo-700 transition duration-200 ease-in-out
                       disabled:bg-gray-400 dark:disabled:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span wire:loading.remove wire:target="loadSubscription">
                    {{ $subscriberFound ? 'Préférences Chargées' : 'Charger Mes Préférences' }}
                </span>
                    <span wire:loading wire:target="loadSubscription">
                    Chargement...
                </span>
                </button>
            </div>
            @error('email') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
        </form>

        @if ($email && !$errors->has('email'))

            <div class="relative flex items-center mb-8">
                <div class="flex-grow border-t border-gray-200 dark:border-gray-700"></div>
                <span class="flex-shrink mx-4 text-gray-400 dark:text-gray-500 text-sm font-medium">
                    {{ $subscriberFound ? 'Votre Abonnement' : 'Nouveaux Paramètres' }}
                </span>
                <div class="flex-grow border-t border-gray-200 dark:border-gray-700"></div>
            </div>

            <form wire:submit.prevent="updateSubscription" class="space-y-6">

                @unless($isUnsubscribed)
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                        Choisir mon canal de communication
                    </h2>
                @endunless

                <div class="space-y-2">
                <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Canal de communication unique :
                </span>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($allChannels as $channelKey => $channelName)
                            <label
                                for="{{ $channelKey }}"
                                class="flex items-center p-4 rounded-xl shadow-md cursor-pointer transition duration-200 ease-in-out
                                   {{ $selectedChannel === $channelKey ? 'bg-indigo-50 dark:bg-indigo-900/30 ring-2 ring-indigo-500' : 'bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 border border-gray-200 dark:border-gray-600' }}">
                                <input
                                    wire:model.live="selectedChannel"
                                    type="radio"
                                    id="{{ $channelKey }}"
                                    value="{{ $channelKey }}"
                                    name="selectedChannelGroup"
                                    required
                                    class="h-5 w-5 text-indigo-600 border-gray-300 rounded-full focus:ring-indigo-500 dark:bg-gray-900 dark:border-gray-500">
                                <span class="ml-3 text-sm font-semibold text-gray-900 dark:text-gray-100">
                                {{ $channelName }}
                            </span>
                            </label>
                        @endforeach
                    </div>
                    @error('selectedChannel') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                </div>

                @if(in_array($selectedChannel, ['sms', 'whatsapp']))
                    <div class="pt-2">
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Numéro de Téléphone (Requis pour {{ $selectedChannel === 'sms' ? 'SMS' : 'WhatsApp' }})
                        </label>
                        <input
                            wire:model.defer="phone"
                            type="tel"
                            id="phone"
                            required
                            placeholder="Ex: +33612345678"
                            class="mt-1 block w-full rounded-xl p-3 border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
                        @error('phone') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                    </div>
                @endif


                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-lg text-base font-bold text-white
                       bg-green-600 hover:bg-green-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 disabled:opacity-50 mt-8">
                <span wire:loading.remove wire:target="updateSubscription">
                    {{ $isUnsubscribed ? 'Me Réabonner 🚀' : 'Enregistrer le Canal Préféré ✨' }}
                </span>
                    <span wire:loading wire:target="updateSubscription">
                    Enregistrement...
                </span>
                </button>
            </form>

            @unless($isUnsubscribed)
                <div class="mt-10 pt-6 border-t border-gray-100 dark:border-gray-700 text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                        Vous ne souhaitez plus recevoir de communications ?
                    </p>
                    <button
                        wire:click="unsubscribe"
                        wire:confirm="Êtes-vous sûr de vouloir vous désinscrire de toutes les communications ? Vous pourrez vous réabonner plus tard."
                        wire:loading.attr="disabled"
                        class="text-sm font-medium text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 transition duration-150 disabled:opacity-50 underline underline-offset-4">
                    <span wire:loading.remove wire:target="unsubscribe">
                        Me Désinscrire Complètement
                    </span>
                        <span wire:loading wire:target="unsubscribe">
                        Désinscription en cours...
                    </span>
                    </button>
                </div>
            @endunless
        @endif
    </div>
</div>
