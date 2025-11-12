@push('styles')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .perspective-1000 { perspective: 1000px; }
        .transform-gpu { transform: translateZ(0); }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .animate-pulse-slow { animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
    </style>
@endpush

@push('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true, offset: 100 });
    </script>
@endpush

<section
    id="about-founders"
    class="py-24 sm:py-36 relative bg-white dark:bg-gray-900 overflow-hidden"
    x-data="foundersSection()"
    x-init="init()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Fond dégradé --}}
        <div class="absolute inset-0 bg-gradient-to-b from-gray-100/30 to-white dark:from-gray-950/50 dark:to-gray-900/30 pointer-events-none"></div>

        {{-- En-tête --}}
        <div class="text-center mb-20 max-w-5xl mx-auto" data-aos="fade-up">
            <span class="text-lg font-semibold uppercase tracking-widest text-green-700 dark:text-green-400 border-b-2 border-green-300 dark:border-green-600 pb-1">
                Notre Gouvernance
            </span>
            <h2 class="text-6xl font-extrabold text-gray-900 dark:text-white sm:text-7xl lg:text-8xl mt-6 leading-none">
                 Nos Leaders
            </h2>
            <p class="mt-8 text-xl text-gray-600 dark:text-gray-400 font-normal max-w-3xl mx-auto">
                La transparence et l'intégrité sont au cœur de notre direction. Découvrez les visionnaires qui guident "The Hope Charity" et leur engagement sans faille.
            </p>
        </div>

        {{-- DESKTOP : Scroll Horizontal --}}
        <div class="hidden lg:block">
            <p class="absolute -top-10 right-10 text-sm font-semibold text-gray-500 dark:text-gray-400 flex items-center opacity-70">
                <i class="fas fa-arrows-alt-h mr-2 text-green-500"></i> Défilez pour voir tous les membres
            </p>
            <div class="flex overflow-x-auto snap-x snap-mandatory space-x-8 pb-6 scrollbar-hide">
                @php $i = 0; @endphp
                @forelse($layoutContent->founders as $founder)
                    <div data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
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
                    </div>
                    @php $i++; @endphp
                @empty
                    <p class="text-gray-500">Aucun leader trouvé.</p>
                @endforelse
            </div>
        </div>

        {{-- MOBILE : Carrousel --}}
        <div class="lg:hidden">
            <p class="text-center text-sm font-semibold text-gray-500 dark:text-gray-400 mb-4 flex items-center justify-center">
                <i class="fas fa-arrows-alt-h mr-2 text-green-500"></i> Faites glisser latéralement pour voir tous les leaders
            </p>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 w-8 md:w-16 bg-gradient-to-r from-white dark:from-gray-900 z-20 pointer-events-none"></div>
                <div class="absolute inset-y-0 right-0 w-8 md:w-16 bg-gradient-to-l from-white dark:from-gray-900 z-20 pointer-events-none"></div>

                <div class="flex overflow-x-auto snap-x snap-mandatory space-x-8 pb-6 scrollbar-hide" x-ref="mobileCarousel">
                    @php $i = 0; @endphp
                    @forelse($layoutContent->founders as $founder)
                        <div class="w-full flex-shrink-0 px-2" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
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
                        </div>
                        @php $i++; @endphp
                    @empty
                    @endforelse
                </div>

                {{-- Boutons navigation --}}
                <div class="hidden md:flex absolute inset-y-0 w-full justify-between items-center px-4 pointer-events-none">
                    <button
                        @click="$refs.mobileCarousel.scrollLeft -= 400"
                        class="p-4 rounded-full shadow-lg bg-white/80 dark:bg-gray-800/80 text-green-600 dark:text-green-400 hover:bg-green-600 hover:text-white transition duration-300 transform hover:scale-110 pointer-events-auto backdrop-blur-sm focus:outline-none focus:ring-4 focus:ring-green-500/50"
                        aria-label="Précédent"
                    >
                        <i class="fas fa-arrow-left text-xl"></i>
                    </button>
                    <button
                        @click="$refs.mobileCarousel.scrollLeft += 400"
                        class="p-4 rounded-full shadow-lg bg-white/80 dark:bg-gray-800/80 text-green-600 dark:text-green-400 hover:bg-green-600 hover:text-white transition duration-300 transform hover:scale-110 pointer-events-auto backdrop-blur-sm focus:outline-none focus:ring-4 focus:ring-green-500/50"
                        aria-label="Suivant"
                    >
                        <i class="fas fa-arrow-right text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- CTA PULSE --}}
        <div class="mt-28 text-center" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('visitor.galerie') }}"
               class="group inline-flex items-center justify-center px-12 py-5 border border-transparent text-xl font-extrabold rounded-full text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 transition-all duration-500 shadow-2xl hover:shadow-green-500/60 ring-4 ring-green-500/40 hover:ring-green-400/60 ring-offset-4 dark:ring-offset-gray-900 transform hover:scale-105 animate-pulse-slow">
                <i class="fas fa-hand-holding-heart mr-3 text-2xl transition-transform group-hover:rotate-12"></i>
                Explorer Nos Actions et Notre Impact
            </a>
            <p class="mt-6 text-base text-gray-500 dark:text-gray-400 font-light">
                Consultez notre rapport annuel pour une transparence totale des projets et finances.
            </p>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        let ytAPILoaded = false;
        window.onYouTubeIframeAPIReady = function() {
            window.ytAPIReady = true;
        };

        function loadYTAPI() {
            if (ytAPILoaded) return;
            ytAPILoaded = true;
            const tag = document.createElement('script');
            tag.src = 'https://www.youtube.com/iframe_api';
            document.body.appendChild(tag);
        }

        function foundersSection() {
            return { init() { loadYTAPI(); } };
        }
    </script>
@endpush
