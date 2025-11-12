@props([
    'name', 'role', 'quote', 'bio', 'mediaType', 'mediaSrc',
    'expertise' => null, 'zone' => null, 'realisation' => null,
    'socials' => []
])

@php
    $youtubeId = null;
    if ($mediaType === 'iframe' && str_contains($mediaSrc, 'youtube.com/embed/')) {
        $youtubeId = basename(parse_url($mediaSrc, PHP_URL_PATH));
    }
@endphp

@push('styles')
    <style>
        .perspective-1000 { perspective: 1000px; }
        .transform-gpu { transform: translateZ(0); }
    </style>
@endpush

<div
    class="flex-shrink-0 w-full sm:w-[380px] lg:w-[420px] p-4 snap-center perspective-1000"
    x-data="teamMemberCard()"
    x-init="init('{{ $youtubeId }}')"
    @mousemove="tilt($event)"
    @mouseleave="resetTilt()"
>
    <div
        class="relative bg-white dark:bg-gray-800 rounded-4xl overflow-hidden shadow-xl transition-all duration-500 border border-gray-100 dark:border-gray-700 h-full flex flex-col transform-gpu group"
        :style="tiltStyle"
        style="transform-style: preserve-3d;"
    >
        {{-- Média --}}
        <div class="relative h-64 overflow-hidden bg-gray-100 dark:bg-gray-900">
            @if ($mediaType === 'image')
                <img
                    src="{{ $mediaSrc }}"
                    alt="Portrait de {{ $name }}"
                    loading="lazy"
                    decoding="async"
                    class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
            @elseif ($mediaType === 'iframe' && $youtubeId)
                <div x-ref="videoContainer" class="w-full h-full"></div>
                <div
                    x-show="!isVideoPlaying"
                    @click="isVideoPlaying = true; play()"
                    class="absolute inset-0 flex flex-col items-center justify-center bg-gradient-to-br from-green-900/90 to-emerald-900/70 backdrop-blur-md cursor-pointer transition-all duration-500 group-hover:from-green-800/90"
                >
                    <div class="p-6 rounded-full bg-white/20 backdrop-blur-xl shadow-2xl ring-8 ring-white/30 animate-pulse">
                        <i class="fas fa-play text-3xl text-white"></i>
                    </div>
                    <span class="mt-4 text-lg font-bold text-white drop-shadow-lg">Lancer la vidéo</span>
                </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
        </div>

        {{-- Contenu --}}
        <div class="p-6 md:p-7 text-center flex-grow flex flex-col space-y-4">
            <h3 class="text-3xl font-black text-gray-900 dark:text-white drop-shadow-sm">{{ $name }}</h3>
            <p class="text-xl font-bold text-green-600 dark:text-green-400">{{ $role }}</p>

            <blockquote class="italic text-gray-600 dark:text-gray-300 text-lg p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-gray-700 dark:to-gray-800 rounded-xl border-l-4 border-green-500 shadow-inner">
                "{{ $quote }}"
            </blockquote>

            <div
                class="text-sm text-gray-600 dark:text-gray-400 overflow-hidden transition-all duration-700"
                :style="showDetail ? 'max-height: 600px' : 'max-height: 60px'"
            >
                <p x-show="!showDetail" class="line-clamp-3">{{ $bio }}</p>
                <div x-show="showDetail" x-transition x-cloak class="space-y-4 text-left">
                    <p>{{ $bio }}</p>
                    <div class="p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-emerald-900/30 dark:to-green-900/20 rounded-xl">
                        <p class="font-bold text-green-600 dark:text-green-400 mb-2">Faits Clés :</p>
                        <ul class="space-y-1 text-sm">
                            @if($expertise)<li><strong>Expertise :</strong> {{ $expertise }}</li>@endif
                            @if($zone)<li><strong>Zone :</strong> {{ $zone }}</li>@endif
                            @if($realisation)<li><strong>Réalisation :</strong> {{ $realisation }}</li>@endif
                        </ul>
                    </div>
                </div>
            </div>

            <button
                @click="showDetail = !showDetail"
                class="w-full py-3 font-bold rounded-xl shadow-lg transition-all duration-300 transform hover:scale-105"
                :class="showDetail ? 'bg-gradient-to-r from-gray-700 to-gray-800 text-white' : 'bg-gradient-to-r from-green-600 to-emerald-600 text-white'"
            >
                <i class="fas mr-2" :class="showDetail ? 'fa-chevron-up' : 'fa-info-circle'"></i>
                <span x-text="showDetail ? 'Masquer' : 'En savoir plus'"></span>
            </button>

            @if (!empty($socials))
                <div class="flex justify-center space-x-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                    @foreach ($socials as $social)
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener"
                           class="group p-3 rounded-full bg-gray-100 dark:bg-gray-700 transition-all duration-300 hover:bg-green-600 hover:text-white hover:shadow-xl hover:-translate-y-1"
                        >

                            <i class="{{ $social['icon'] }} text-xl"></i>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script>

    function loadYTAPI() {
        if (typeof YT === 'undefined' && !window.ytApiLoading) {
            const tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            const firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            window.ytApiLoading = true;
        }
    }

    function teamMemberCard() {
        return {
            isVideoPlaying: false,
            showDetail: false,
            player: null,
            youtubeId: null,
            tiltStyle: '',

            init(id) {
                this.youtubeId = id;
                if (this.youtubeId) {
                    loadYTAPI();
                }
    },

    tilt(e) {
    const card = e.currentTarget.querySelector('div[style*="transform-style"]');
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    const centerX = rect.width / 2;
    const centerY = rect.height / 2;
    const rotateY = (x - centerX) / 15;
    const rotateX = (centerY - y) / 15;

    this.tiltStyle = `transform: rotateY(${rotateY}deg) rotateX(${rotateX}deg) scale(1.03); box-shadow: 0 30px 60px -12px rgba(0,0,0,0.3);`;
    },

    resetTilt() {
    this.tiltStyle = 'transform: rotateY(0deg) rotateX(0deg) scale(1); box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);';
    },

    play() {

    if (!this.youtubeId || this.player || typeof YT === 'undefined' || !YT.Player) return;

    this.player = new YT.Player(this.$refs.videoContainer, {
    videoId: this.youtubeId,
    playerVars: { autoplay: 1, mute: 0, controls: 1, rel: 0, modestbranding: 1 },
    events: {
    onReady: () => this.isVideoPlaying = true,
    // Optionnel: Gérer la fin de la vidéo
    onStateChange: (event) => {
    if (event.data === YT.PlayerState.ENDED) {
    this.isVideoPlaying = false;
    }
    }
    }
    });
    }
    };
    }
    </script>
@endpush
