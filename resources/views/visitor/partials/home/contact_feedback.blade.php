<section id="contact-feedback-section" class="py-12 sm:py-16 bg-gray-50 dark:bg-gray-900/90 rounded-t-3xl mt-10 sm:mt-16 shadow-2xl shadow-gray-200/50 dark:shadow-gray-900/50 transition-colors duration-500 overflow-hidden">
    <div class="container mx-auto px-6 lg:px-8 max-w-4xl">

        <div class="text-center mb-10 sm:mb-12">
            <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100 sm:text-4xl tracking-tight">
                Votre Voix Est Essentielle
            </h2>
            <p class="mt-3 text-base sm:text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Nous sommes transparents et à l'écoute. Que ce soit une question, un avis ou un besoin de contact direct, nous vous répondons rapidement.
            </p>
        </div>

        <div class="flex flex-col md:flex-row justify-center items-stretch md:space-x-6 space-y-6 md:space-y-0">

            <div class="bg-white dark:bg-gray-800 p-6 sm:p-8 rounded-2xl shadow-xl hover:shadow-2xl transition duration-300 transform hover:translate-y-[-2px] border border-gray-100 dark:border-gray-700/50 w-full md:w-1/2">
                <svg class="w-10 h-10 text-green-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-17 4v6a2 2 0 002 2h12a2 2 0 002-2v-6"></path></svg>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                    Formulaire de Contact
                </h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm">
                    Pour toute question spécifique, partenariat ou support.
                </p>
                <a href="{{route('visitor.contact-us')}}" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-bold rounded-lg shadow-md text-white bg-green-600 hover:bg-green-700 transition duration-300 focus:outline-none focus:ring-4 focus:ring-green-500/50">
                    Échanger Maintenant
                    <span aria-hidden="true" class="ml-2 text-xl">→</span>
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 sm:p-8 rounded-2xl shadow-xl hover:shadow-2xl transition duration-300 transform hover:translate-y-[-2px] border border-gray-100 dark:border-gray-700/50 w-full md:w-1/2">
                <svg class="w-10 h-10 text-purple-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                    Foire Aux Questions (FAQ)
                </h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm">
                    Trouvez instantanément les réponses à nos questions les plus fréquentes.
                </p>
                <a href="{{route('visitor.contact-us')}}" class="w-full inline-flex items-center justify-center px-6 py-3 border-2 border-purple-500 text-base font-bold rounded-lg shadow-md text-purple-600 bg-white hover:bg-purple-50 dark:bg-gray-800 dark:text-purple-400 dark:hover:bg-gray-700 transition duration-300 focus:outline-none focus:ring-4 focus:ring-purple-500/50">
                    Consulter la FAQ
                    <span aria-hidden="true" class="ml-2 text-xl">?</span>
                </a>
            </div>

        </div>
    </div>
</section>
