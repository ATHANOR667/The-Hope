<section id="contact-feedback-section" class="py-16 sm:py-20 bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-950 rounded-t-3xl mt-12 sm:mt-20 shadow-2xl shadow-gray-300/40 dark:shadow-black/30 overflow-hidden transition-all duration-500">
    <div class="container mx-auto px-6 lg:px-8 max-w-5xl">
        <!-- Titre & Sous-titre -->
        <div class="text-center mb-12 sm:mb-16 animate-fade-in">
            <h2 class="text-4xl sm:text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-gray-800 to-gray-600 dark:from-gray-100 dark:to-gray-300 tracking-tight">
                Votre Voix Compte
            </h2>
            <p class="mt-4 text-lg sm:text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Transparence, écoute, réactivité. Posez vos questions, partagez vos idées ou contactez-nous directement — <span class="font-medium text-green-600 dark:text-green-400">nous répondons sous 24h</span>.
            </p>
        </div>

        <!-- Cartes -->
        <div class="grid md:grid-cols-2 gap-8 lg:gap-10">
            <!-- Carte Contact -->
            <a href="{{ route('visitor.contact-us') }}" class="group block bg-white dark:bg-gray-800/90 p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-gray-100 dark:border-gray-700/50 transition-all duration-300 hover:-translate-y-1.5 hover:ring-4 hover:ring-green-500/10 backdrop-blur-sm">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-17 4v6a2 2 0 002 2h12a2 2 0 002-2v-6"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Formulaire de Contact</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-base leading-relaxed mb-5">
                            Questions, partenariats, support technique — un humain vous répond personnellement.
                        </p>
                        <span class="inline-flex items-center text-green-600 dark:text-green-400 font-semibold group-hover:text-green-700 dark:group-hover:text-green-300 transition-colors">
              Échanger maintenant
              <span class="ml-2 transform group-hover:translate-x-1 transition-transform duration-300">→</span>
            </span>
                    </div>
                </div>
            </a>

            <!-- Carte FAQ -->
            <a href="{{ route('visitor.contact-us') }}" class="group block bg-white dark:bg-gray-800/90 p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-gray-100 dark:border-gray-700/50 transition-all duration-300 hover:-translate-y-1.5 hover:ring-4 hover:ring-purple-500/10 backdrop-blur-sm">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Foire Aux Questions</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-base leading-relaxed mb-5">
                            Réponses claires et immédiates aux questions les plus posées par notre communauté.
                        </p>
                        <span class="inline-flex items-center text-purple-600 dark:text-purple-400 font-semibold group-hover:text-purple-700 dark:group-hover:text-purple-300 transition-colors">
              Explorer la FAQ
              <span class="ml-2 transform group-hover:scale-110 transition-transform duration-300">?</span>
            </span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Note de confiance -->
        <div class="mt-12 text-center">
            <p class="text-sm text-gray-500 dark:text-gray-400">
        <span class="inline-flex items-center">
          <svg class="w-4 h-4 mr-1 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
          Réponse garantie sous 24h • 100% humain • Sans robot
        </span>
            </p>
        </div>
    </div>

    <!-- Animation CSS (à ajouter dans votre stylesheet) -->
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeIn 0.6s ease-out forwards; }
    </style>
</section>

