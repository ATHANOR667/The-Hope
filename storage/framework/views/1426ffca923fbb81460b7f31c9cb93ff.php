<?php $__env->startPush('styles'); ?>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .perspective-1000 { perspective: 1000px; }
        .transform-gpu { transform: translateZ(0); }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .animate-pulse-slow { animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true, offset: 100 });
    </script>
<?php $__env->stopPush(); ?>

<section
    id="about-founders"
    class="py-24 sm:py-36 relative bg-white dark:bg-gray-900 overflow-hidden"
    x-data="foundersSection()"
    x-init="init()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="absolute inset-0 bg-gradient-to-b from-gray-100/30 to-white dark:from-gray-950/50 dark:to-gray-900/30 pointer-events-none"></div>

        
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

        
        <div class="hidden lg:block">
            <p class="absolute -top-10 right-10 text-sm font-semibold text-gray-500 dark:text-gray-400 flex items-center opacity-70">
                <i class="fas fa-arrows-alt-h mr-2 text-green-500"></i> Défilez pour voir tous les membres
            </p>
            <div class="flex overflow-x-auto snap-x snap-mandatory space-x-8 pb-6 scrollbar-hide">
                <?php $i = 0; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $layoutContent->founders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $founder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div data-aos="fade-up" data-aos-delay="<?php echo e($i * 100); ?>">
                        <?php if (isset($component)) { $__componentOriginal3d199dc0aa2915ff13eca7cb6ae45be2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3d199dc0aa2915ff13eca7cb6ae45be2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.team-member-card','data' => ['name' => $founder['name'],'role' => $founder['role'],'mediaType' => $founder['media_type'],'mediaSrc' => $founder['media_src'],'quote' => $founder['quote'],'bio' => $founder['bio'],'expertise' => $founder['expertise'] ?? null,'zone' => $founder['zone_d_intervention'] ?? null,'realisation' => $founder['realisation'] ?? null,'socials' => $founder['socials'] ?? []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('team-member-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['name']),'role' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['role']),'mediaType' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['media_type']),'mediaSrc' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['media_src']),'quote' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['quote']),'bio' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['bio']),'expertise' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['expertise'] ?? null),'zone' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['zone_d_intervention'] ?? null),'realisation' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['realisation'] ?? null),'socials' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['socials'] ?? [])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3d199dc0aa2915ff13eca7cb6ae45be2)): ?>
<?php $attributes = $__attributesOriginal3d199dc0aa2915ff13eca7cb6ae45be2; ?>
<?php unset($__attributesOriginal3d199dc0aa2915ff13eca7cb6ae45be2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3d199dc0aa2915ff13eca7cb6ae45be2)): ?>
<?php $component = $__componentOriginal3d199dc0aa2915ff13eca7cb6ae45be2; ?>
<?php unset($__componentOriginal3d199dc0aa2915ff13eca7cb6ae45be2); ?>
<?php endif; ?>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-gray-500">Aucun leader trouvé.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        
        <div class="lg:hidden">
            <p class="text-center text-sm font-semibold text-gray-500 dark:text-gray-400 mb-4 flex items-center justify-center">
                <i class="fas fa-arrows-alt-h mr-2 text-green-500"></i> Faites glisser latéralement pour voir tous les leaders
            </p>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 w-8 md:w-16 bg-gradient-to-r from-white dark:from-gray-900 z-20 pointer-events-none"></div>
                <div class="absolute inset-y-0 right-0 w-8 md:w-16 bg-gradient-to-l from-white dark:from-gray-900 z-20 pointer-events-none"></div>

                <div class="flex overflow-x-auto snap-x snap-mandatory space-x-8 pb-6 scrollbar-hide" x-ref="mobileCarousel">
                    <?php $i = 0; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $layoutContent->founders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $founder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="w-full flex-shrink-0 px-2" data-aos="fade-up" data-aos-delay="<?php echo e($i * 100); ?>">
                            <?php if (isset($component)) { $__componentOriginal3d199dc0aa2915ff13eca7cb6ae45be2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3d199dc0aa2915ff13eca7cb6ae45be2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.team-member-card','data' => ['name' => $founder['name'],'role' => $founder['role'],'mediaType' => $founder['media_type'],'mediaSrc' => $founder['media_src'],'quote' => $founder['quote'],'bio' => $founder['bio'],'expertise' => $founder['expertise'] ?? null,'zone' => $founder['zone_d_intervention'] ?? null,'realisation' => $founder['realisation'] ?? null,'socials' => $founder['socials'] ?? []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('team-member-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['name']),'role' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['role']),'mediaType' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['media_type']),'mediaSrc' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['media_src']),'quote' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['quote']),'bio' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['bio']),'expertise' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['expertise'] ?? null),'zone' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['zone_d_intervention'] ?? null),'realisation' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['realisation'] ?? null),'socials' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($founder['socials'] ?? [])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3d199dc0aa2915ff13eca7cb6ae45be2)): ?>
<?php $attributes = $__attributesOriginal3d199dc0aa2915ff13eca7cb6ae45be2; ?>
<?php unset($__attributesOriginal3d199dc0aa2915ff13eca7cb6ae45be2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3d199dc0aa2915ff13eca7cb6ae45be2)): ?>
<?php $component = $__componentOriginal3d199dc0aa2915ff13eca7cb6ae45be2; ?>
<?php unset($__componentOriginal3d199dc0aa2915ff13eca7cb6ae45be2); ?>
<?php endif; ?>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
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

        
        <div class="mt-28 text-center" data-aos="fade-up" data-aos-delay="200">
            <a href="<?php echo e(route('visitor.galerie')); ?>"
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

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/resources/views/visitor/partials/home/about_founders.blade.php ENDPATH**/ ?>