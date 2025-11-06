<section id="hero-section" class="relative overflow-hidden min-h-[50vh] flex items-center justify-center mb-8 rounded-b-2xl shadow-lg">
    <div class="absolute inset-0 z-0">
        <iframe
            id="hero-video"
            class="w-full h-full object-cover aspect-video"
            src="{{ $layoutContent->hero['video_url'] }}"
            title="{{ $layoutContent->hero['video_title'] }}"
            frameborder="0"
            allow="autoplay; encrypted-media; picture-in-picture; fullscreen"
            style="pointer-events: none;"
            loading="lazy"
        ></iframe>
        <div class="absolute inset-0 bg-gray-900/50 dark:bg-gray-900/60 z-10 transition-colors duration-300"></div>
        <div id="autoplay-overlay" class="absolute inset-0 flex items-center justify-center bg-black/70 z-20 hidden">
            <button id="start-video-btn" class="px-6 py-3 text-lg font-bold text-white bg-gray-500 rounded-full shadow-lg cursor-not-allowed" aria-label="Vidéo indisponible" disabled>
                Vidéo indisponible, essayez une autre
            </button>
        </div>
    </div>

    <div id="text-content-wrapper" class="relative z-20 max-w-3xl mx-auto px-4">
        <div id="text-content" class="text-center py-6 bg-white/10 dark:bg-gray-900/20 backdrop-blur-sm rounded-2xl border border-white/20 shadow-lg transition-opacity duration-300">
            <p class="text-sm font-semibold uppercase tracking-widest text-green-400 drop-shadow-md mb-2">
                The Hope Charity
            </p>
            <h1 class="text-2xl font-black tracking-tight text-white drop-shadow-lg mb-4 leading-tight">
                Bâtir l'Espoir, Transformer l'Avenir
            </h1>
            <p class="text-base font-light text-white drop-shadow-sm leading-relaxed opacity-90">
                Découvrez l'âme de The Hope Charity, notre engagement pour un impact durable et la force que nous puisons dans chaque communauté que nous servons.
            </p>
            <div class="mt-6">
                <a
                    href="{{route("visitor.galerie")}}"
                    class="inline-flex items-center justify-center px-6 py-3 text-base font-bold text-white bg-green-600 rounded-full shadow-md transition-transform duration-200 hover:scale-105 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
                    aria-label="Découvrez nos réalisations"
                >
                    Nos Réalisations
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
    </div>

    <div class="absolute bottom-2 right-2 z-30 flex space-x-2">
        <button
            id="mute-toggle"
            class="p-3 rounded-full bg-white/15 hover:bg-white/25 backdrop-blur-sm text-white shadow-md transition-transform duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
            aria-label="Activer le son de la vidéo"
            title="Activer le son"
        >
            <svg id="volume-up-icon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.899a9 9 0 010 12.728M5.586 15H3a1 1 0 01-1-1v-4a1 1 0 011-1h2.586l4.293-4.293a1 1 0 01.707-.293h4.414a1 1 0 011 1v12a1 1 0 01-1 1h-4.414a1 1 0 01-.707-.293L5.586 15z"></path></svg>
            <svg id="volume-off-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H3a1 1 0 01-1-1v-4a1 1 0 011-1h2.586l4.293-4.293a1 1 0 01.707-.293h4.414a1 1 0 011 1v12a1 1 0 01-1 1h-4.414a1 1 0 01-.707-.293L5.586 15zm9.414-7l-8 8m8 0l-8-8"></path></svg>
        </button>
        <button
            id="play-pause-toggle"
            class="p-3 rounded-full bg-white/15 hover:bg-white/25 backdrop-blur-sm text-white shadow-md transition-transform duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
            aria-label="Mettre en pause la vidéo"
            title="Pause"
        >
            <svg id="pause-icon" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"></path></svg>
            <svg id="play-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M8 5v14l11-7z"></path></svg>
        </button>
        <button
            id="toggle-text-btn"
            class="p-3 rounded-full bg-white/15 hover:bg-white/25 backdrop-blur-sm text-white shadow-md transition-transform duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
            aria-label="Masquer le contenu textuel"
            title="Masquer le contenu"
        >
            <svg id="eye-open-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            <svg id="eye-closed-icon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 2.09 0 4.103.62 5.8 1.77M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.825 13.875A10.05 10.05 0 0119 12c-1.274-4.057-5.064-7-9.542-7-2.09 0-4.103.62-5.8 1.77M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 18l-6-6"></path></svg>
        </button>
        <button
            id="open-modal-btn"
            class="p-3 rounded-full bg-white/15 hover:bg-white/25 backdrop-blur-sm text-white shadow-md transition-transform duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
            aria-label="Afficher la vidéo en plein écran"
            title="Plein écran"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-5v4m0 0h-4m4-4l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
        </button>
    </div>
</section>

<div id="video-modal" class="fixed inset-0 bg-black/90 z-50 flex items-center justify-center transition-opacity duration-300 opacity-0 pointer-events-none" aria-modal="true" role="dialog" aria-hidden="true">
    <div class="relative w-full h-full p-4 flex items-center justify-center">
        <div id="modal-video-container" class="w-full max-w-4xl aspect-video relative">
        </div>
        <button
            id="close-modal-btn"
            class="absolute top-2 right-2 p-3 rounded-full bg-white/20 hover:bg-white/30 text-white transition-transform duration-200 hover:rotate-90 focus:outline-none focus:ring-2 focus:ring-white/50"
            aria-label="Fermer la fenêtre de la vidéo"
            title="Fermer"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
</div>

@push('style')
    <style>
        #hero-section {
            min-height: 50vh;
        }

        #text-content {
            padding: 1.5rem;
        }

        h1 {
            font-size: 1.75rem;
        }

        p.text-base {
            font-size: 0.875rem;
        }

        a[href="#realisations"], #start-video-btn {
            padding: 0.75rem 1.5rem;
            font-size: 0.875rem;
        }

        .absolute.bottom-2.right-2 button {
            padding: 0.75rem;
        }

        #video-modal .relative {
            padding: 1rem;
        }

        #autoplay-overlay {
            transition: opacity 0.3s ease;
        }

        #autoplay-overlay.hidden {
            opacity: 0;
            pointer-events: none;
        }

        @media (min-width: 640px) {
            #hero-section {
                min-height: 60vh;
            }

            #text-content {
                padding: 2rem;
            }

            h1 {
                font-size: 2.5rem;
            }

            p.text-base {
                font-size: 1rem;
            }

            a[href="#realisations"], #start-video-btn {
                padding: 1rem 2rem;
                font-size: 1rem;
            }

            .absolute.bottom-2.right-2 button {
                padding: 1rem;
            }
        }

        @media (min-width: 768px) {
            #hero-section {
                min-height: 70vh;
            }

            h1 {
                font-size: 3.5rem;
            }

            p.text-base {
                font-size: 1.25rem;
            }

            a[href="#realisations"], #start-video-btn {
                padding: 1.25rem 2.5rem;
                font-size: 1.125rem;
            }
        }

        @media (min-width: 1024px) {
            #hero-section {
                min-height: 80vh;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Load YouTube Iframe API
        const tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        const firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        let player = null;
        let isMuted = true;
        let isPlaying = true;
        let isTextVisible = true;
        let isModalOpen = false;
        let restoreState = {}; // État à restaurer après la fermeture de la modale

        // DOM elements
        const elements = {
            muteToggle: document.getElementById('mute-toggle'),
            volumeUpIcon: document.getElementById('volume-up-icon'),
            volumeOffIcon: document.getElementById('volume-off-icon'),
            playPauseToggle: document.getElementById('play-pause-toggle'),
            playIcon: document.getElementById('play-icon'),
            pauseIcon: document.getElementById('pause-icon'),
            toggleTextBtn: document.getElementById('toggle-text-btn'),
            eyeOpenIcon: document.getElementById('eye-open-icon'),
            eyeClosedIcon: document.getElementById('eye-closed-icon'),
            openModalBtn: document.getElementById('open-modal-btn'),
            closeModalBtn: document.getElementById('close-modal-btn'),
            videoModal: document.getElementById('video-modal'),
            heroVideoIframe: document.getElementById('hero-video'),
            modalVideoContainer: document.getElementById('modal-video-container'),
            videoOriginalParent: document.querySelector('#hero-section > .absolute.inset-0.z-0'),
            autoplayOverlay: document.getElementById('autoplay-overlay'),
            startVideoBtn: document.getElementById('start-video-btn'),
            textContentWrapper: document.getElementById('text-content-wrapper')
        };

        function initializePlayer(iframeId = 'hero-video', state = {}) {
            restoreState = state; // Stocker l'état à restaurer
            try {
                player = new YT.Player(iframeId, {
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange,
                        'onError': onPlayerError
                    }
                });
            } catch (error) {
                elements.autoplayOverlay.classList.remove('hidden');
            }
        }

        function onPlayerReady(event) {
            if (restoreState.currentTime !== undefined) {
                // RESTAURATION D'ÉTAT APRÈS LA FERMETURE DE LA MODALE
                player.seekTo(restoreState.currentTime, true);
                isMuted = restoreState.wasMuted;
                isPlaying = restoreState.wasPlaying;

                // Appliquer l'état de muet
                if (isMuted) {
                    player.mute();
                } else {
                    player.unMute();
                }

                // Appliquer l'état de lecture/pause
                if (isPlaying) {
                    player.playVideo();
                } else {
                    player.pauseVideo();
                }

                // Réinitialiser l'état
                restoreState = {};
            } else {
                // Initialisation normale au chargement
                event.target.playVideo();
            }

            // Mettre à jour l'interface utilisateur
            updateMuteUI();
            updatePlayPauseUI();
        }

        function onPlayerStateChange(event) {
            isPlaying = event.data === YT.PlayerState.PLAYING;
            updatePlayPauseUI();
            if (isPlaying) {
                elements.autoplayOverlay.classList.add('hidden');
            }
        }

        function onPlayerError() {
            isPlaying = false;
            updatePlayPauseUI();
            elements.autoplayOverlay.classList.remove('hidden');
        }

        function updateMuteUI() {
            if (isMuted) {
                elements.volumeUpIcon.classList.add('hidden');
                elements.volumeOffIcon.classList.remove('hidden');
                elements.muteToggle.setAttribute('aria-label', 'Activer le son de la vidéo');
                elements.muteToggle.title = 'Activer le son';
            } else {
                elements.volumeUpIcon.classList.remove('hidden');
                elements.volumeOffIcon.classList.add('hidden');
                elements.muteToggle.setAttribute('aria-label', 'Désactiver le son de la vidéo');
                elements.muteToggle.title = 'Désactiver le son';
            }
        }

        function updatePlayPauseUI() {
            if (isPlaying) {
                elements.pauseIcon.classList.remove('hidden');
                elements.playIcon.classList.add('hidden');
                elements.playPauseToggle.setAttribute('aria-label', 'Mettre en pause la vidéo');
                elements.playPauseToggle.title = 'Pause';
            } else {
                elements.pauseIcon.classList.add('hidden');
                elements.playIcon.classList.remove('hidden');
                elements.playPauseToggle.setAttribute('aria-label', 'Lire la vidéo');
                elements.playPauseToggle.title = 'Lecture';
            }
        }

        function toggleMute() {
            if (!player) return;
            if (isMuted) {
                player.unMute();
                isMuted = false;
            } else {
                player.mute();
                isMuted = true;
            }
            updateMuteUI();
        }

        function togglePlayPause() {
            if (!player) return;
            if (isPlaying) {
                player.pauseVideo();
            } else {
                player.playVideo();
            }
        }

        function toggleText() {
            isTextVisible = !isTextVisible;
            if (isTextVisible) {
                elements.textContentWrapper.classList.remove('opacity-0', 'pointer-events-none');
                elements.eyeOpenIcon.classList.remove('hidden');
                elements.eyeClosedIcon.classList.add('hidden');
                elements.toggleTextBtn.setAttribute('aria-label', 'Masquer le contenu textuel');
                elements.toggleTextBtn.title = 'Masquer le contenu';
            } else {
                elements.textContentWrapper.classList.add('opacity-0', 'pointer-events-none');
                elements.eyeOpenIcon.classList.add('hidden');
                elements.eyeClosedIcon.classList.remove('hidden');
                elements.toggleTextBtn.setAttribute('aria-label', 'Afficher le contenu textuel');
                elements.toggleTextBtn.title = 'Afficher le contenu';
            }
        }

        function openModal() {
            if (isModalOpen) return;
            isModalOpen = true;

            // Sauvegarder l'état actuel et détruire le lecteur principal
            const currentTime = player ? player.getCurrentTime() : 0;
            const wasPlaying = isPlaying;
            const wasMuted = isMuted;

            if (player) {
                player.pauseVideo();
                player.destroy();
                player = null;
            }

            // Créer un nouvel iframe pour la modale
            const modalIframe = document.createElement('iframe');
            modalIframe.id = 'modal-video';
            modalIframe.className = 'w-full h-full';
            // Utiliser l'état de muet actuel pour le lecteur de la modale
            let modalSrc = elements.heroVideoIframe.src.replace('mute=1', `mute=${wasMuted ? 1 : 0}`);
            modalIframe.src = modalSrc;
            modalIframe.title = elements.heroVideoIframe.title;
            modalIframe.frameBorder = '0';
            modalIframe.allow = 'autoplay; encrypted-media; picture-in-picture; fullscreen';
            elements.modalVideoContainer.appendChild(modalIframe);

            // Initialiser le nouveau lecteur pour la modale et lui passer l'état
            initializePlayer('modal-video', {
                currentTime,
                wasPlaying: true, // Toujours jouer dans la modale
                wasMuted // Conserver l'état de muet de la modale
            });

            // Afficher la modale
            elements.videoModal.classList.remove('opacity-0', 'pointer-events-none');
            elements.videoModal.classList.add('opacity-100');
            elements.videoModal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            if (!isModalOpen) return;
            isModalOpen = false;

            // Sauvegarder l'état et le temps du lecteur de la modale AVANT DE LE DÉTRUIRE
            const currentTime = player ? player.getCurrentTime() : 0;
            const wasPlaying = isPlaying;
            const wasMuted = isMuted;

            if (player) {
                player.pauseVideo();
                player.destroy();
                player = null;
            }

            // Commencer à masquer la modale
            elements.videoModal.classList.remove('opacity-100');
            elements.videoModal.classList.add('opacity-0');
            elements.videoModal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';

            // Attendre la fin de la transition avant de nettoyer
            setTimeout(() => {
                elements.modalVideoContainer.innerHTML = '';

                // 1. Recréer l'iframe principale (utiliser l'ID 'hero-video')
                const newHeroIframe = document.createElement('iframe');
                newHeroIframe.id = 'hero-video'; // ID CRUCIAL
                newHeroIframe.className = 'w-full h-full object-cover aspect-video';
                // Assurez-vous qu'il est mute=1 au départ pour l'autoplay
                newHeroIframe.src = 'https://www.youtube.com/embed/KBaM03WrTgo?controls=0&rel=0&autoplay=1&mute=1&loop=1&playlist=KBaM03WrTgo&enablejsapi=1';
                newHeroIframe.title = elements.heroVideoIframe.title;
                newHeroIframe.frameBorder = '0';
                newHeroIframe.allow = 'autoplay; encrypted-media; picture-in-picture; fullscreen';
                newHeroIframe.style.pointerEvents = 'none';
                newHeroIframe.loading = 'lazy';

                const existingHeroIframe = document.getElementById('hero-video');
                if (existingHeroIframe) {
                    elements.videoOriginalParent.replaceChild(newHeroIframe, existingHeroIframe);
                } else {
                    elements.videoOriginalParent.appendChild(newHeroIframe);
                }

                // 2. Mettre à jour la référence
                elements.heroVideoIframe = newHeroIframe;

                // 3. Réinitialiser le lecteur principal et lui passer l'état
                initializePlayer('hero-video', {
                    currentTime,
                    wasPlaying,
                    wasMuted
                });

                elements.videoModal.classList.add('pointer-events-none');
            }, 300);
        }

        // Event listeners
        function setupEventListeners() {
            elements.muteToggle.addEventListener('click', toggleMute);
            elements.playPauseToggle.addEventListener('click', togglePlayPause);
            elements.toggleTextBtn.addEventListener('click', toggleText);
            elements.openModalBtn.addEventListener('click', openModal);
            elements.closeModalBtn.addEventListener('click', closeModal);
            elements.videoModal.addEventListener('click', (e) => {
                if (e.target === elements.videoModal) closeModal();
            });
            elements.startVideoBtn.addEventListener('click', () => {
                if (player && !isPlaying) player.playVideo();
            });
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && isModalOpen) closeModal();
            });
        }

        // Initialize
        window.onYouTubeIframeAPIReady = () => initializePlayer();
        setupEventListeners();
    </script>
@endpush
