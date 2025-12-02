<section id="hero-section"
         class="relative overflow-hidden min-h-screen flex items-center justify-center bg-black"
         x-data="heroVideo()"
         x-init="initVideo()">

    <div class="absolute inset-0 z-0 bg-cover bg-center bg-no-repeat transition-transform duration-1000 transform scale-105"
         :style="{ backgroundImage: `url('${posterUrl}')` }">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-black/30"></div>
    </div>

    <div class="relative z-20 max-w-4xl mx-auto px-4 text-center"
         x-show="textVisible"
         x-transition:enter="transition ease-out duration-700"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100">

        <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-3xl p-6 md:p-10 shadow-2xl">
            <p class="text-xs md:text-sm font-bold uppercase tracking-widest text-emerald-400 mb-3">
                The Hope Charity
            </p>

            <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white mb-4 leading-tight min-h-[1.2em]">
                <span x-data="typewriter('Bâtir l\'Espoir, Transformer l\'Avenir', 60)"
                      x-init="start()"
                      x-text="displayedText"
                      class="inline-block"></span>
                <span x-show="$store.typewriter && !$store.typewriter.done" class="animate-pulse">_</span>
            </h1>

            <p class="text-sm md:text-lg text-gray-100 mb-8 max-w-2xl mx-auto leading-relaxed opacity-90">
                Découvrez l'âme de The Hope Charity, notre engagement pour un impact durable...
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('visitor.galerie') }}"
                   class="group inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white bg-emerald-600 rounded-full shadow-lg transform transition-all duration-300 hover:scale-105 hover:bg-emerald-500">
                    Nos Réalisations
                    <svg class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>

                <button @click="openFullscreen()"
                        class="group inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white border-2 border-white/60 rounded-full backdrop-blur-sm transition-all duration-300 hover:bg-white/10 hover:border-white">
                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"></path>
                    </svg>
                    <span>Voir en vidéo</span>
                </button>
            </div>
        </div>
    </div>

    <div x-show="modalOpen"
         style="display: none;"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 bg-black flex items-center justify-center"
         @keydown.escape.window="closeModal()">

        <button @click="closeModal()"
                class="absolute top-6 right-6 z-50 p-2 text-white/70 hover:text-white bg-black/50 rounded-full hover:bg-black/80 transition backdrop-blur-sm">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div x-show="isLoading" class="absolute inset-0 flex items-center justify-center text-emerald-500">
            <svg class="animate-spin h-12 w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>

        <div class="w-full h-full max-w-7xl max-h-[90vh] aspect-video relative px-4 sm:px-0">
            <div id="youtube-player-container" class="w-full h-full rounded-lg overflow-hidden shadow-2xl"></div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        // Chargement API YouTube
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        document.addEventListener('alpine:init', () => {
            Alpine.store('typewriter', { done: false });
        });

        function heroVideo() {
            return {
                modalOpen: false,
                textVisible: true,
                isLoading: false,
                player: null,
                posterUrl: '{{ ($layoutContent->meta ?? [])["og:image"] ?? "" }}',
                // On récupère l'URL brute, on extraira l'ID via JS pour éviter l'erreur PHP
                videoRawUrl: '{{ ($layoutContent->hero ?? [])["video_url"] ?? "" }}',
                videoId: null,

                initVideo() {
                    // Extraction ID Youtube en JS (plus sûr)
                    if (this.videoRawUrl) {
                        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
                        const match = this.videoRawUrl.match(regExp);
                        this.videoId = (match && match[2].length === 11) ? match[2] : null;
                    }

                    if (this.posterUrl) new Image().src = this.posterUrl;
                },

                openFullscreen() {
                    if (!this.videoId) {
                        console.error('Impossible de trouver l\'ID vidéo YouTube');
                        return;
                    }

                    this.modalOpen = true;
                    this.textVisible = false;
                    this.isLoading = true;

                    this.$nextTick(() => {
                        if (this.player) {
                            this.player.playVideo();
                            // S'assurer que le son est activé au redémarrage
                            this.player.unMute();
                            this.isLoading = false;
                        } else {
                            this.createPlayer();
                        }
                    });
                },

                createPlayer() {
                    if (typeof YT === 'undefined' || !YT.Player) {
                        setTimeout(() => this.createPlayer(), 100);
                        return;
                    }

                    this.player = new YT.Player('youtube-player-container', {
                        height: '100%',
                        width: '100%',
                        videoId: this.videoId,
                        playerVars: {
                            'autoplay': 1,      // Démarrage auto
                            'controls': 1,      // AFFICHER les contrôles
                            'rel': 0,           // Pas de vidéos suggérées externes
                            'showinfo': 0,
                            'modestbranding': 1,
                            'mute': 0,          // PAS de muet (mais nécessite interaction utilisateur, ce qui est le cas ici via le clic)
                            'playsinline': 1
                        },
                        events: {
                            'onReady': (event) => {
                                this.isLoading = false;
                                // Force le volume max et active le son
                                event.target.setVolume(100);
                                event.target.unMute();
                                event.target.playVideo();
                            }
                        }
                    });
                },

                closeModal() {
                    this.modalOpen = false;
                    this.textVisible = true;
                    if (this.player && typeof this.player.pauseVideo === 'function') {
                        this.player.pauseVideo();
                    }
                }
            };
        }

        function typewriter(text, speed) {
            return {
                displayedText: '',
                fullText: text,
                index: 0,
                start() {
                    this.displayedText = '';
                    this.index = 0;
                    Alpine.store('typewriter').done = false;
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
