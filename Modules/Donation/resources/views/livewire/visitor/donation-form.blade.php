<div class="max-w-md w-full mx-auto p-4 sm:p-6  rounded-2xltransition-colors duration-300">
    <h2 class="text-2xl font-extrabold text-indigo-600 dark:text-indigo-400 mb-6 text-center">
        <svg class="inline-block w-6 h-6 mr-2 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
        Faire un Don
    </h2>

    <form action="{{ $psp === 'stripe' ? route('payment.donate.stripe') : route('payment.donate.notchpay') }}" method="POST" class="space-y-5">
        @csrf

        <input type="hidden" name="psp" value="{{ $psp }}">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

            <div>
                <label for="prenom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prénom</label>
                <input type="text" id="prenom" name="prenom" wire:model.blur="prenom" value="{{ old('prenom') }}"
                       class="mt-1 block w-full border-2 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2.5 transition-colors duration-300">
                @error('prenom') <span class="text-red-500 dark:text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                <input type="text" id="nom" name="nom" wire:model.blur="nom" value="{{ old('nom') }}"
                       class="mt-1 block w-full border-2 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2.5 transition-colors duration-300">
                @error('nom') <span class="text-red-500 dark:text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" id="email" name="email" wire:model.blur="email" value="{{ old('email') }}"
                   class="mt-1 block w-full border-2 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2.5 transition-colors duration-300">
            @error('email') <span class="text-red-500 dark:text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="montant" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Montant (min 100)</label>
                <input type="number" id="montant" name="montant" wire:model.debounce.500ms="montant" min="100" step="1"
                       class="mt-1 block w-full border-2 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2.5 transition-colors duration-300">
                @error('montant') <span class="text-red-500 dark:text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            @if($psp === 'stripe')
                <div>
                    <label for="currency" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Devise (Débitée)</label>
                    <select id="currency" name="currency" wire:model.live="currency"
                            class="mt-1 block w-full border-2 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2.5 transition-colors duration-300">
                        @foreach ($availableCurrencies as $cur)
                            <option value="{{ $cur }}">{{ $cur }} ({{ $cur === 'XAF' ? 'FCFA' : ($cur === 'USD' ? '$' : '€') }})</option>
                        @endforeach
                    </select>
                    @error('currency') <span class="text-red-500 dark:text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
            @else
                {{-- Pour NotchPay, la devise est fixe --}}
                <input type="hidden" name="currency" value="XAF">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Devise (Fixe)</label>
                    <div class="mt-1 block w-full border-2 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg shadow-sm sm:text-sm p-2.5 transition-colors duration-300 font-semibold flex items-center h-[42px]">
                        XAF (FCFA)
                    </div>
                </div>
            @endif
        </div>

        {{-- Affichage conditionnel de la conversion en temps réel pour Stripe --}}
        @if($psp === 'stripe')
            @if($isConverting)
                <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-lg text-sm text-gray-600 dark:text-gray-300 flex items-center transition-colors duration-300" role="status">
                    <svg class="animate-spin h-4 w-4 mr-3 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Calcul du montant...
                </div>
            @elseif($convertedAmount && $montant > 0)
                <div class="p-3 bg-indigo-50 dark:bg-indigo-900/40 rounded-lg text-sm text-indigo-700 dark:text-indigo-300 transition-colors duration-300 border border-indigo-200 dark:border-indigo-800">
                    <span class="font-semibold text-base block mb-1">
                        Montant estimé en USD: **{{ number_format($convertedAmount, 2) }} USD**
                    </span>
                    <span class="text-xs opacity-80">
                        Votre carte sera débitée de l'équivalent de {{ number_format($convertedAmount, 2) }} USD (devise cible).
                    </span>
                </div>
            @endif
        @endif

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Moyen de paiement</label>
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                @if($stripeEnabled)
                    <label class="flex items-center p-4 border rounded-xl cursor-pointer transition-all duration-300
                                  hover:bg-indigo-50 dark:hover:bg-gray-700
                                  {{ $psp === 'stripe' ? 'border-indigo-600 bg-indigo-50 dark:bg-gray-700' : 'border-gray-300 dark:border-gray-600 dark:bg-gray-800' }}">
                        <input type="radio" wire:model.live="psp" value="stripe" class="form-radio h-4 w-4 text-indigo-600 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600">
                        <span class="ml-3 flex-1 flex items-center">
                            <svg class="w-7 h-7 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                            <span class="ml-2 font-semibold text-gray-700 dark:text-gray-200">Carte Bancaire (Stripe)</span>
                        </span>
                    </label>
                @endif

                @if($notchpayEnabled)
                    <label class="flex items-center p-4 border rounded-xl cursor-pointer transition-all duration-300
                                  hover:bg-indigo-50 dark:hover:bg-gray-700
                                  {{ $psp === 'notchpay' ? 'border-indigo-600 bg-indigo-50 dark:bg-gray-700' : 'border-gray-300 dark:border-gray-600 dark:bg-gray-800' }}">
                        <input type="radio" wire:model.live="psp" value="notchpay" class="form-radio h-4 w-4 text-indigo-600 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600">
                        <span class="ml-3 flex-1 flex items-center">
                            <svg class="w-7 h-7 text-green-600 dark:text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            <span class="ml-2 font-semibold text-gray-700 dark:text-gray-200">Mobile Money (NotchPay)</span>
                        </span>
                    </label>
                @endif
            </div>
            @error('psp') <span class="text-red-500 dark:text-red-400 text-xs block mt-2">{{ $message }}</span> @enderror
        </div>

        {{-- L'état de chargement Livewire est ici pour désactiver le bouton pendant les changements de PSP/Montant/Devise --}}
        <button type="submit"
                class="w-full bg-indigo-600 text-white py-3 mt-6 rounded-lg font-bold text-lg hover:bg-indigo-700 transition-all duration-300 shadow-lg disabled:opacity-50 dark:disabled:opacity-40"
                wire:loading.attr="disabled"
                wire:target="psp, montant, currency">
            <span wire:loading.remove wire:target="psp, montant, currency">
                Procéder au Paiement ({{ $psp === 'stripe' ? 'Stripe' : 'NotchPay' }})
            </span>
            <span wire:loading wire:target="psp, montant, currency">
                <svg class="animate-spin inline-block h-5 w-5 mr-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Mise à jour du formulaire...
            </span>
        </button>
    </form>
</div>

