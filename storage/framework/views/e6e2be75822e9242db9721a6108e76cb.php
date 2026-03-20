<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name', 'role', 'quote', 'bio', 'mediaType', 'mediaSrc',
    'expertise' => null, 'zone' => null, 'realisation' => null,
    'socials' => []
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'name', 'role', 'quote', 'bio', 'mediaType', 'mediaSrc',
    'expertise' => null, 'zone' => null, 'realisation' => null,
    'socials' => []
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $youtubeId = null;
    if ($mediaType === 'iframe' && str_contains($mediaSrc, 'youtube.com/embed/')) {
        $youtubeId = basename(parse_url($mediaSrc, PHP_URL_PATH));
    }
?>

<?php $__env->startPush('styles'); ?>
    <style>
        .perspective-1000 { perspective: 1000px; }
        .transform-gpu { transform: translateZ(0); }
    </style>
<?php $__env->stopPush(); ?>

<div
    class="flex-shrink-0 w-full sm:w-[380px] lg:w-[420px] p-4 snap-center perspective-1000"
    x-data="teamMemberCard()"
    x-init="init('<?php echo e($youtubeId); ?>')"
    @mousemove="tilt($event)"
    @mouseleave="resetTilt()"
>
    <div
        class="relative bg-white dark:bg-gray-800 rounded-4xl overflow-hidden shadow-xl transition-all duration-500 border border-gray-100 dark:border-gray-700 h-full flex flex-col transform-gpu group"
        :style="tiltStyle"
        style="transform-style: preserve-3d;"
    >
        
        <div class="relative h-64 overflow-hidden bg-gray-100 dark:bg-gray-900">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($mediaType === 'image'): ?>
                <img
                    src="<?php echo e($mediaSrc); ?>"
                    alt="Portrait de <?php echo e($name); ?>"
                    loading="lazy"
                    decoding="async"
                    class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
            <?php elseif($mediaType === 'iframe' && $youtubeId): ?>
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
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
        </div>

        
        <div class="p-6 md:p-7 text-center flex-grow flex flex-col space-y-4">
            <h3 class="text-3xl font-black text-gray-900 dark:text-white drop-shadow-sm"><?php echo e($name); ?></h3>
            <p class="text-xl font-bold text-green-600 dark:text-green-400"><?php echo e($role); ?></p>

            <blockquote class="italic text-gray-600 dark:text-gray-300 text-lg p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-gray-700 dark:to-gray-800 rounded-xl border-l-4 border-green-500 shadow-inner">
                "<?php echo e($quote); ?>"
            </blockquote>

            <div
                class="text-sm text-gray-600 dark:text-gray-400 overflow-hidden transition-all duration-700"
                :style="showDetail ? 'max-height: 600px' : 'max-height: 60px'"
            >
                <p x-show="!showDetail" class="line-clamp-3"><?php echo e($bio); ?></p>
                <div x-show="showDetail" x-transition x-cloak class="space-y-4 text-left">
                    <p><?php echo e($bio); ?></p>
                    <div class="p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-emerald-900/30 dark:to-green-900/20 rounded-xl">
                        <p class="font-bold text-green-600 dark:text-green-400 mb-2">Faits Clés :</p>
                        <ul class="space-y-1 text-sm">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($expertise): ?><li><strong>Expertise :</strong> <?php echo e($expertise); ?></li><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($zone): ?><li><strong>Zone :</strong> <?php echo e($zone); ?></li><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($realisation): ?><li><strong>Réalisation :</strong> <?php echo e($realisation); ?></li><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($socials)): ?>
                <div class="flex justify-center space-x-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($social['url']); ?>" target="_blank" rel="noopener"
                           class="group p-3 rounded-full bg-gray-100 dark:bg-gray-700 transition-all duration-300 hover:bg-green-600 hover:text-white hover:shadow-xl hover:-translate-y-1"
                        >

                            <i class="<?php echo e($social['icon']); ?> text-xl"></i>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/resources/views/components/team-member-card.blade.php ENDPATH**/ ?>