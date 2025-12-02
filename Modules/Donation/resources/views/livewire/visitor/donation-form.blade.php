<div class="max-w-md w-full mx-auto">
    <div class=" rounded-3xl border-gray-100 dark:border-gray-700 p-6 sm:p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1">

        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-500 dark:from-green-400 dark:to-emerald-300 flex items-center justify-center">
                <svg class="w-8 h-8 mr-2 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                </svg>
                Faire un Don
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Votre soutien change des vies. <span class="font-medium text-green-600 dark:text-green-400">100% sécurisé</span>.
            </p>
        </div>

        <form action="{{ $psp === 'stripe' ? route('payment.donate.stripe') : route('payment.donate.notchpay') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="psp" value="{{ $psp }}">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="prenom" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5">Prénom</label>
                    <input type="text" id="prenom" name="prenom" wire:model.blur="prenom" value="{{ old('prenom') }}"
                           class="w-full px-4 py-2.5 rounded-xl border-2 @error('prenom') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-4 focus:ring-green-500/20 focus:border-green-500 transition-all duration-200 shadow-sm"
                           placeholder="Jean">
                    @error('prenom') <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="nom" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5">Nom</label>
                    <input type="text" id="nom" name="nom" wire:model.blur="nom" value="{{ old('nom') }}"
                           class="w-full px-4 py-2.5 rounded-xl border-2 @error('nom') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-4 focus:ring-green-500/20 focus:border-green-500 transition-all duration-200 shadow-sm"
                           placeholder="Dupont">
                    @error('nom') <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5">Email</label>
                <input type="email" id="email" name="email" wire:model.blur="email" value="{{ old('email') }}"
                       class="w-full px-4 py-2.5 rounded-xl border-2 @error('email') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-4 focus:ring-green-500/20 focus:focus:border-green-500 transition-all duration-200 shadow-sm"
                       placeholder="jean@example.com">
                @error('email') <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="montant" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5">Montant (min 100 XAF)</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 font-medium">XAF</span>
                        <input type="number" id="montant" name="montant" wire:model.debounce.500ms="montant" min="100" step="1"
                               class="w-full pl-12 pr-4 py-2.5 rounded-xl border-2 @error('montant') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-4 focus:ring-green-500/20 focus:border-green-500 transition-all duration-200 shadow-sm"
                               placeholder="5000">
                    </div>
                    @error('montant') <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                </div>

                @if($psp === 'stripe')
                    <div>
                        <label for="currency" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5">Devise débitée</label>
                        <select id="currency" name="currency" wire:model.live="currency"
                                class="w-full px-4 py-2.5 rounded-xl border-2 border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-4 focus:ring-green-500/20 focus:border-green-500 transition-all duration-200 shadow-sm">
                            @foreach ($availableCurrencies as $cur)
                                <option value="{{ $cur }}">{{ $cur }} {{ $cur === 'XAF' ? '(FCFA)' : ($cur === 'USD' ? '($)' : '(€)') }}</option>
                            @endforeach
                        </select>
                        @error('currency') <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                    </div>
                @else
                    <input type="hidden" name="currency" value="XAF">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5">Devise</label>
                        <div class="w-full px-4 py-2.5 rounded-xl border-2 border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 font-medium flex items-center shadow-sm h-[46px]">
                            XAF (FCFA)
                        </div>
                    </div>
                @endif
            </div>

            @if($psp === 'stripe')
                <div aria-live="polite"> @if($isConverting)
                        <div class="p-3 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 rounded-xl flex items-center text-sm text-green-700 dark:text-green-300">
                            <svg class="animate-spin h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Calcul du montant en cours...
                        </div>
                    @elseif($convertedAmount && $montant >= 100)
                        <div class="p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/30 dark:to-emerald-900/30 border border-green-200 dark:border-green-800 rounded-xl text-sm">
                            <p class="font-bold text-green-800 dark:text-green-300">
                                ≈ {{ number_format($convertedAmount, 2) }} {{ $currency }}
                            </p>
                            <p class="text-xs text-green-700 dark:text-green-400 mt-1">
                                Votre carte sera débitée de cet équivalent (taux en temps réel).
                            </p>
                        </div>
                    @endif
                </div>
            @endif

            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3">Choisir le moyen de paiement</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @if($stripeEnabled)
                        <label class="group relative flex items-center p-4 rounded-2xl border-2 cursor-pointer transition-all duration-300
                          {{ $psp === 'stripe' ? 'border-green-600 bg-green-50 dark:bg-green-900/30 ring-4 ring-green-500/10' : 'border-gray-300 dark:border-gray-600 hover:border-green-400 dark:hover:border-green-500' }}">
                            <input type="radio" wire:model.live="psp" value="stripe" class="sr-only" aria-label="Paiement par Stripe">
                            <div class="flex items-center w-full">
                                <div class="w-10 h-10 bg-green-100 dark:bg-green-800 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                    </svg>
                                </div>
                                <span class="ml-3 font-semibold text-gray-800 dark:text-gray-100">Carte Bancaire (Stripe)</span>
                            </div>
                        </label>
                    @endif

                    @if($notchpayEnabled)
                        <label class="group relative flex items-center p-4 rounded-2xl border-2 cursor-pointer transition-all duration-300
                          {{ $psp === 'notchpay' ? 'border-green-600 bg-green-50 dark:bg-green-900/30 ring-4 ring-green-500/10' : 'border-gray-300 dark:border-gray-600 hover:border-green-400 dark:hover:border-green-500' }}">
                            <input type="radio" wire:model.live="psp" value="notchpay" class="sr-only" aria-label="Paiement par Mobile Money (NotchPay)">
                            <div class="flex items-center w-full">
                                <div class="w-10 h-10 bg-green-100 dark:bg-green-800 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <span class="ml-3 font-semibold text-gray-800 dark:text-gray-100">Mobile Money (NotchPay)</span>
                            </div>
                        </label>
                    @endif
                </div>
                @error('psp') <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
            </div>

            <button type="submit"
                    class="w-full mt-8 py-3.5 px-6 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold text-lg rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center"
                    wire:loading.attr="disabled"
                    wire:target="psp, montant, currency"
                    aria-label="Procéder au paiement sécurisé">

                <span wire:loading.remove wire:target="psp, montant, currency">
                  Procéder au paiement sécurisé
                  <span class="ml-2">→</span>
                </span>

                <span wire:loading wire:target="psp, montant, currency" aria-live="polite">
                  <svg class="animate-spin h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  Préparation...
                </span>
            </button>
        </form>

        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700 text-center text-xs text-gray-500 dark:text-gray-400 space-y-1">
            <p class="flex items-center justify-center">
                <svg class="w-4 h-4 mr-1 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                Paiement 100% sécurisé
            </p>
            <p class="flex items-center justify-center">
                <svg class="w-4 h-4 mr-1 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                Don anonyme possible • Aucun compte requis
            </p>
        </div>
    </div>
</div>
