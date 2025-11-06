<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <div class="max-w-4xl mx-auto">

        <div class="p-0 sm:p-0 rounded-xl transition duration-500">

            <h2 class="text-4xl sm:text-5xl font-black bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-green-800 leading-tight mb-8">
                Contactez-nous
            </h2>

            <form wire:submit.prevent="submit" class="space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- CHAMP NOM COMPLET --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition duration-500">
                            Nom Complet <span class="text-red-500 dark:text-red-400">*</span>
                        </label>
                        <input type="text" id="name" wire:model.lazy="name" placeholder="Ex: Jean Dupont" required
                               class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                      focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent
                                      @error('name') border-red-500 dark:border-red-500 @enderror transition duration-500">
                        @error('name')
                        <p class="text-red-500 dark:text-red-400 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- CHAMP EMAIL --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition duration-500">
                            Adresse E-mail <span class="text-red-500 dark:text-red-400">*</span>
                        </label>
                        <input type="email" id="email" wire:model.lazy="email" placeholder="exemple@domaine.com" required
                               class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                      focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent
                                      @error('email') border-red-500 dark:border-red-500 @enderror transition duration-500">
                        @error('email')
                        <p class="text-red-500 dark:text-red-400 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- CHAMP SUJET --}}
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition duration-500">
                        Sujet <span class="text-red-500 dark:text-red-400">*</span>
                    </label>
                    <input type="text" id="subject" wire:model.debounce.500ms="subject" placeholder="Ex: Demande de devis ou Support" required
                           class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                  focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent
                                  @error('subject') border-red-500 dark:border-red-500 @enderror transition duration-500">
                    @error('subject')
                    <p class="text-red-500 dark:text-red-400 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- CHAMP CONTENU (MESSAGE) --}}
                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition duration-500">
                        Votre Message <span class="text-red-500 dark:text-red-400">*</span>
                    </label>
                    <textarea id="content" wire:model.lazy="content" rows="6" placeholder="Décrivez votre demande en détail ici..." required
                              class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                     focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent
                                     @error('content') border-red-500 dark:border-red-500 @enderror transition duration-500"></textarea>
                    @error('content')
                    <p class="text-red-500 dark:text-red-400 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- BOUTON DE SOUMISSION LIVEWIRE --}}
                <button type="submit"
                        class="w-full flex justify-center items-center bg-green-600 text-white font-semibold py-3 px-4 rounded-lg
                               hover:bg-green-700 dark:hover:bg-green-500 transition duration-300 ease-in-out
                               focus:outline-none focus:ring-4 focus:ring-green-500 focus:ring-opacity-70 disabled:opacity-75"
                        wire:loading.attr="disabled"
                        wire:target="submit">

                    <span wire:loading.remove wire:target="submit">
                        Envoyer le message
                    </span>

                    <span wire:loading wire:target="submit">
                        {{-- Spinner --}}
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Envoi en cours...
                    </span>
                </button>
            </form>
        </div>

        @if($whatsappNumber || $smsNumber)
            <div class="mt-10 pt-6 border-t border-gray-200 dark:border-gray-700 text-center ">
                <p class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                    Ou contactez-nous via les canaux rapides :
                </p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-8">

                    {{-- Lien WhatsApp --}}
                    @if ($whatsappNumber)
                        <a href="https://wa.me/{{ $whatsappNumber }}?text=Bonjour%2C%20j'ai%20une%20question%20concernant..." target="_blank"
                           class="flex items-center justify-center space-x-2 py-3 px-8 rounded-full font-bold text-white bg-green-600 hover:bg-green-700 transition duration-300 shadow-xl transform hover:scale-105">
                            <i class="fab fa-whatsapp text-xl"></i>
                            <span>WhatsApp</span>
                        </a>
                    @endif

                    {{-- Lien SMS --}}
                    @if ($smsNumber)
                        <a href="sms:{{ $smsNumber }}?body=Bonjour%2C%20j'ai%20une%20question%20concernant..."
                           class="flex items-center justify-center space-x-2 py-3 px-8 rounded-full font-bold text-white bg-blue-600 hover:bg-blue-700 transition duration-300 shadow-xl transform hover:scale-105">
                            <i class="fas fa-sms text-xl"></i>
                            <span>SMS</span>
                        </a>
                    @endif
                </div>
            </div>
        @endif

    </div>
</div>
