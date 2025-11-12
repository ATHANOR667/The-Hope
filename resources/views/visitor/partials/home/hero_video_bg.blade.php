{{-- resources/views/partials/_hero.blade.php --}}
<section
    id="hero-section"
    class="relative overflow-hidden min-h-screen flex items-center justify-center bg-black"
    x-data="heroController()"
    x-init="init()"
>
    {{-- Image de fond (og:image) --}}
    <div
        class="absolute inset-0 z-0 bg-cover bg-center bg-no-repeat"
        :style="{ backgroundImage: `url('${posterUrl}')` }"
    >
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-black/30"></div>
    </div>

    {{-- Contenu texte --}}
    <div
        class="relative z-20 max-w-4xl mx-auto px-4 text-center"
        x-show="textVisible"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
    >
        <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-3xl p-6 md:p-10 shadow-2xl">
            <p class="text-xs md:text-sm font-bold uppercase tracking-widest text-emerald-400 mb-3">
                The Hope Charity
            </p>

            <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white mb-4 leading-tight">
                <span
                    x-data="typewriter('Bâtir l\'Espoir, Transformer l\'Avenir', 60)"
                    x-init="start()"
                    x-text="displayedText"
                    class="inline-block"
                ></span>
                <span x-show="$store.typewriter.done" class="animate-pulse">_</span>
            </h1>

            <p class="text-sm md:text-lg text-gray-100 mb-8 max-w-2xl mx-auto leading-relaxed opacity-90">
                Découvrez l'âme de The Hope Charity, notre engagement pour un impact durable et la force que nous puisons dans chaque communauté que nous servons.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('visitor.galerie') }}"
                   class="group inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white bg-emerald-600 rounded-full shadow-lg transform transition-all duration-300 hover:scale-105 hover:bg-emerald-500">
                    Nos Réalisations
                    <svg class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>

                <button @click="openModal()"
                        class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white border-2 border-white/60 rounded-full backdrop-blur-sm transition-all duration-300 hover:bg-white/10">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"></path>
                    </svg>
                    Voir en plein écran
                </button>
            </div>
        </div>
    </div>

    {{-- MODALE VIDÉO --}}
    <div
        x-show="modalOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/95 p-4"
        @click.self="closeModal()"
        @keydown.escape.window="closeModal()"
    >
        <div class="relative w-full max-w-6xl">
            <button @click="closeModal()"
                    class="absolute -top-12 right-0 p-2 text-white hover:text-gray-300 transition z-10">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            {{-- Conteneur vidéo responsive --}}
            <div class="relative w-full bg-black rounded-xl overflow-hidden shadow-2xl">
                <div class="aspect-video">
                    <div x-ref="modalYoutubeContainer" class="absolute inset-0 w-full h-full"></div>
                </div>
            </div>
        </div>
    </div>
</section>


@push('scripts')
    <script>
        let youtubeAPILoaded = false;
        let youtubeAPIReady = false;
        const pendingPlayers = [];

        // API YouTube
        window.onYouTubeIframeAPIReady = function () {
            youtubeAPIReady = true;
            pendingPlayers.forEach(fn => fn());
            pendingPlayers.length = 0;
        };

        function loadYouTubeAPI() {
            if (youtubeAPILoaded) return;
            youtubeAPILoaded = true;
            const tag = document.createElement('script');
            tag.src = 'https://www.youtube.com/iframe_api';
            document.body.appendChild(tag);
        }

        function heroController() {
            return {
                modalOpen: false,
                modalPlayer: null,
                textVisible: true,
                posterUrl: '{{ $layoutContent->meta['og:image'] ?? '' }}',
                rawUrl: '{{ $layoutContent->hero['video_url'] ?? '' }}',

                // EXTRACTION D’ID YOUTUBE – 100% ROBUSTE
                get videoId() {
                    const url = this.rawUrl?.trim();
                    if (!url) return null;

                    // Normalisation
                    let id = null;

                    try {
                        const u = new URL(url);
                        if (u.hostname.includes('youtu.be')) {
                            id = u.pathname.slice(1);
                        } else if (u.searchParams.has('v')) {
                            id = u.searchParams.get('v');
                        } else if (u.pathname.includes('embed')) {
                            id = u.pathname.split('/').pop();
                        } else if (u.pathname.includes('shorts')) {
                            id = u.pathname.split('/').pop();
                        }
                    } catch {
                        // Fallback regex
                        const match = url.match(/(?:v=|\/embed\/|\/shorts\/|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
                        id = match ? match[1] : null;
                    }

                    // Validation longueur
                    return (id && id.length === 11) ? id : null;
                },

                init() {
                    if (this.posterUrl) new Image().src = this.posterUrl;
                    loadYouTubeAPI();
                },

                openModal() {
                    if (!this.videoId) {
                        alert('Erreur : URL YouTube invalide ou manquante.');
                        return;
                    }

                    this.textVisible = false;
                    this.modalOpen = true;

                    this.$nextTick(() => {
                        const createPlayer = () => {
                            if (this.modalPlayer) {
                                this.modalPlayer.loadVideoById(this.videoId);
                                this.modalPlayer.playVideo();
                                return;
                            }

                            this.modalPlayer = new YT.Player(this.$refs.modalYoutubeContainer, {
                                videoId: this.videoId,
                                playerVars: {
                                    autoplay: 1,
                                    mute: 0,
                                    rel: 0,
                                    modestbranding: 1,
                                    controls: 1,
                                    playsinline: 1
                                },
                                events: {
                                    onReady: (e) => e.target.playVideo(),
                                    onError: () => alert('Vidéo YouTube non disponible.')
                                }
                            });
                        };

                        youtubeAPIReady ? createPlayer() : pendingPlayers.push(createPlayer);
                    });
                },

                closeModal() {
                    this.modalOpen = false;
                    this.textVisible = true;
                    if (this.modalPlayer) {
                        this.modalPlayer.pauseVideo();
                    }
                }
            };
        }

        // Typewriter
        document.addEventListener('alpine:init', () => {
            Alpine.store('typewriter', { done: false });
        });

        function typewriter(text, speed) {
            return {
                displayedText: '', fullText: text, index: 0,
                start() {
                    const interval = setInterval(() => {
                        if (this.index < this.fullText.length) {
                            this.displayedText += this.fullText[this.index++];
                        } else {
                            clearInterval(interval);
                            Alpine.store('typewriter').done = true;
                        }
                    }, speed);
                }
            };
        }
    </script>
@endpush
