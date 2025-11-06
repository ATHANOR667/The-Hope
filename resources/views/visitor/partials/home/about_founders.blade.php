<section id="about-founders" class="py-24 sm:py-36 relative bg-white dark:bg-gray-900 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 relative">

        {{-- Effet de fond --}}
        <div class="absolute inset-0 bg-gradient-to-b from-gray-100/30 to-white dark:from-gray-950/50 dark:to-gray-900/30 pointer-events-none z-0"></div>

        {{-- En-tête de Section --}}
        <div class="text-center mb-20 max-w-5xl mx-auto">
            <span class="text-lg font-semibold uppercase tracking-widest text-green-700 dark:text-green-400 border-b-2 border-green-300 dark:border-green-600 pb-1">
                Notre Gouvernance
            </span>
            <h2 class="text-6xl font-extrabold text-gray-900 dark:text-white sm:text-7xl lg:text-8xl mt-6 leading-none">
                <span class="text-green-600 dark:text-green-400">Rencontrez</span> Nos Leaders
            </h2>
            <p class="mt-8 text-xl text-gray-600 dark:text-gray-400 font-normal max-w-3xl mx-auto">
                La transparence et l'intégrité sont au cœur de notre direction. Découvrez les visionnaires qui guident "The Hope Charity" et leur engagement sans faille.
            </p>
        </div>

        {{-- Conteneur des Cartes PC (SCROLL LATÉRAL) --}}
        <div class="hidden lg:block">
            <div class="flex overflow-x-scroll snap-x snap-mandatory space-x-8 pb-6 scrollbar-hide relative">

                {{-- Indication de Scroll PC (Subtile) --}}
                <p class="absolute -top-10 right-10 text-sm font-semibold text-gray-500 dark:text-gray-400 flex items-center">
                    <i class="fas fa-arrows-alt-h mr-2 text-green-500"></i>
                    Défilez pour voir tous les membres
                </p>

                {{-- ****************************************************** --}}
                {{--              CARTES POUR AFFICHAGE GRILLE PC   --}}
                {{-- ****************************************************** --}}

                @forelse($layoutContent->founders as $founder)
                    <x-team-member-card
                        :name="$founder['name']"
                        :role="$founder['role']"
                        :mediaType="$founder['media_type']"
                        :mediaSrc="$founder['media_src']"
                        :quote="$founder['quote']"
                        :bio="$founder['bio']"
                        :expertise="$founder['expertise'] ?? null"
                        :zone="$founder['zone_d_intervention'] ?? null"
                        :realisation="$founder['realisation'] ?? null"
                        :socials="$founder['socials'] ?? []"
                    />

                @empty
                @endforelse


            </div>
        </div>

        {{-- Carrousel Mobile  --}}
        <div x-data="{ currentSlide: 0, totalSlides: 8 }" class="lg:hidden">

            {{-- Indication de Scroll Mobile --}}
            <p class="text-center text-sm font-semibold text-gray-500 dark:text-gray-400 mb-4 flex items-center justify-center">
                <i class="fas fa-arrows-alt-h mr-2 text-green-500"></i>
                Faites glisser latéralement pour voir tous les leaders
            </p>

            <div class="relative">
                {{-- Gradients de masquage --}}
                <div class="absolute inset-y-0 left-0 w-8 md:w-16 bg-gradient-to-r from-white dark:from-gray-900 z-20 pointer-events-none"></div>
                <div class="absolute inset-y-0 right-0 w-8 md:w-16 bg-gradient-to-l from-white dark:from-gray-900 z-20 pointer-events-none"></div>

                {{-- SCROLLBAR MASQUÉE (Carrousel) --}}
                <div
                    class="flex overflow-x-scroll snap-x snap-mandatory space-x-8 pb-6 scrollbar-hide"
                    x-ref="carousel"
                >

                    @forelse($layoutContent->founders as $founder)
                        <x-team-member-card
                            :name="$founder['name']"
                            :role="$founder['role']"
                            :mediaType="$founder['media_type']"
                            :mediaSrc="$founder['media_src']"
                            :quote="$founder['quote']"
                            :bio="$founder['bio']"
                            :expertise="$founder['expertise'] ?? null"
                            :zone="$founder['zone_d_intervention'] ?? null"
                            :realisation="$founder['realisation'] ?? null"
                            :socials="$founder['socials'] ?? []"
                        />
                    @empty
                    @endforelse

                </div>

                {{-- Boutons de navigation Latéraux  --}}
                <div class="hidden md:flex absolute inset-y-0 w-full justify-between items-center px-4 pointer-events-none">
                    <button @click="$refs.carousel.scrollLeft -= 400" aria-label="Précédent"
                            class="p-4 rounded-full shadow-lg bg-white/80 dark:bg-gray-800/80 text-green-600 dark:text-green-400 hover:bg-green-600 hover:text-white transition duration-300 transform hover:scale-110 pointer-events-auto backdrop-blur-sm focus:outline-none focus:ring-4 focus:ring-green-500/50">
                        <i class="fas fa-arrow-left text-xl"></i>
                    </button>

                    <button @click="$refs.carousel.scrollLeft += 400" aria-label="Suivant"
                            class="p-4 rounded-full shadow-lg bg-white/80 dark:bg-gray-800/80 text-green-600 dark:text-green-400 hover:bg-green-600 hover:text-white transition duration-300 transform hover:scale-110 pointer-events-auto backdrop-blur-sm focus:outline-none focus:ring-4 focus:ring-green-500/50">
                        <i class="fas fa-arrow-right text-xl"></i>
                    </button>
                </div>
            </div>
        </div> {{-- Fin du carrousel mobile --}}

        {{-- Call to Action (CTA) --}}
        <div class="mt-28 text-center">
            <a href="{{route("visitor.galerie")}}"
               class="inline-flex items-center justify-center  px-12 py-5 border border-transparent    text-xl font-extrabold rounded-full
                text-white bg-green-600 hover:bg-green-700      transition duration-500 ease-out transform hover:scale-105

                shadow-3xl shadow-green-600/60 hover:shadow-green-500/80
                dark:shadow-green-500/60 dark:hover:shadow-green-400/80

                ring-4 ring-green-500/50 hover:ring-green-400
                ring-offset-4 dark:ring-offset-gray-800">
                <i class="fas fa-hand-holding-heart mr-3 text-2xl"></i>
                Explorer Nos Actions et Notre Impact
            </a>
            <p class="mt-6 text-base text-gray-500 dark:text-gray-400 font-light">
                Consultez notre rapport annuel pour une transparence totale des projets et finances.
            </p>
        </div>

    </div>
</section>
