<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => config('app.name'),
    'brand' => config('app.name'),
    'homeUrl' => '#'
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
    'title' => config('app.name'),
    'brand' => config('app.name'),
    'homeUrl' => '#'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

    <!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>

    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme') || 'system';
            const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (savedTheme === 'dark' || (savedTheme === 'system' && systemDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <?php echo e($head ?? ''); ?>


    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body x-data="{ sidebarOpen: false }" class="h-full bg-slate-50 text-slate-900 dark:bg-slate-900 dark:text-slate-100 font-sans antialiased flex flex-col min-h-screen">


<div wire:loading.delay.longest class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-900/50 backdrop-blur-sm transition-opacity" x-cloak>
    <div class="flex flex-col items-center p-4 bg-white dark:bg-slate-800 rounded-lg shadow-xl">
        <svg class="animate-spin h-10 w-10 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span class="mt-3 text-sm font-medium text-slate-700 dark:text-slate-300">Chargement...</span>
    </div>
</div>


<nav
    x-data="{ scrolled: false }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 10;
        });
    "

    class="
        bg-white/80 dark:bg-slate-800/80
        backdrop-blur-md
        supports-backdrop-blur:bg-white/70
        dark:supports-backdrop-blur:bg-slate-800/70
        border-b border-slate-200 dark:border-slate-700
        transition-all duration-300

        sticky top-0 z-40
    "

    :class="{
        'bg-white/60 dark:bg-slate-800/60 shadow-md': scrolled
    }"
>
    <div class="container mx-auto px-4">
        <div class="flex justify-between h-16">

            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="<?php echo e($homeUrl); ?>" class="text-xl font-bold text-primary hover:text-primary-hover transition-colors">
                        <?php echo e($brand); ?>

                    </a>
                </div>

                <div class="hidden md:ml-6 md:flex md:space-x-8">
                    <?php echo e($desktop_menu ?? ''); ?>

                </div>
            </div>

            <div class="hidden md:flex md:items-center md:space-x-4">
                <?php if (isset($component)) { $__componentOriginal1946be3c57627ed92349d74c1708ce09 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1946be3c57627ed92349d74c1708ce09 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.theme-toggle','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::theme-toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1946be3c57627ed92349d74c1708ce09)): ?>
<?php $attributes = $__attributesOriginal1946be3c57627ed92349d74c1708ce09; ?>
<?php unset($__attributesOriginal1946be3c57627ed92349d74c1708ce09); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1946be3c57627ed92349d74c1708ce09)): ?>
<?php $component = $__componentOriginal1946be3c57627ed92349d74c1708ce09; ?>
<?php unset($__componentOriginal1946be3c57627ed92349d74c1708ce09); ?>
<?php endif; ?>
                <?php echo e($actions ?? ''); ?>

            </div>

            <div class="-mr-2 flex items-center md:hidden gap-2">
                <?php if (isset($component)) { $__componentOriginal1946be3c57627ed92349d74c1708ce09 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1946be3c57627ed92349d74c1708ce09 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.theme-toggle','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::theme-toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1946be3c57627ed92349d74c1708ce09)): ?>
<?php $attributes = $__attributesOriginal1946be3c57627ed92349d74c1708ce09; ?>
<?php unset($__attributesOriginal1946be3c57627ed92349d74c1708ce09); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1946be3c57627ed92349d74c1708ce09)): ?>
<?php $component = $__componentOriginal1946be3c57627ed92349d74c1708ce09; ?>
<?php unset($__componentOriginal1946be3c57627ed92349d74c1708ce09); ?>
<?php endif; ?>

                <button @click="sidebarOpen = !sidebarOpen"
                        type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary"
                        aria-controls="mobile-menu"
                        :aria-expanded="sidebarOpen">

                    <span class="sr-only">Ouvrir le menu</span>

                    <svg x-show="!sidebarOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <svg x-show="sidebarOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="sidebarOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden bg-white/90 dark:bg-slate-800/90 backdrop-blur-md border-b border-slate-200 dark:border-slate-700"
         id="mobile-menu"
         style="display: none;">

        <div class="pt-2 pb-3 space-y-1 px-2">
            <?php echo e($menu ?? ''); ?>

        </div>

        <div class="pt-4 pb-4 border-t border-slate-200 dark:border-slate-700 px-4">
            <?php echo e($mobile_actions ?? ''); ?>

        </div>
    </div>
</nav>

<main class="flex-grow container mx-auto px-4 py-8">

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <?php if (isset($component)) { $__componentOriginal75091716ca600b9389447f9cdeedbdbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75091716ca600b9389447f9cdeedbdbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.alert','data' => ['type' => 'success','class' => 'mb-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'success','class' => 'mb-6']); ?><?php echo e(session('success')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal75091716ca600b9389447f9cdeedbdbb)): ?>
<?php $attributes = $__attributesOriginal75091716ca600b9389447f9cdeedbdbb; ?>
<?php unset($__attributesOriginal75091716ca600b9389447f9cdeedbdbb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal75091716ca600b9389447f9cdeedbdbb)): ?>
<?php $component = $__componentOriginal75091716ca600b9389447f9cdeedbdbb; ?>
<?php unset($__componentOriginal75091716ca600b9389447f9cdeedbdbb); ?>
<?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
        <?php if (isset($component)) { $__componentOriginal75091716ca600b9389447f9cdeedbdbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75091716ca600b9389447f9cdeedbdbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.alert','data' => ['type' => 'error','class' => 'mb-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'error','class' => 'mb-6']); ?><?php echo e(session('error')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal75091716ca600b9389447f9cdeedbdbb)): ?>
<?php $attributes = $__attributesOriginal75091716ca600b9389447f9cdeedbdbb; ?>
<?php unset($__attributesOriginal75091716ca600b9389447f9cdeedbdbb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal75091716ca600b9389447f9cdeedbdbb)): ?>
<?php $component = $__componentOriginal75091716ca600b9389447f9cdeedbdbb; ?>
<?php unset($__componentOriginal75091716ca600b9389447f9cdeedbdbb); ?>
<?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php echo e($notifications ?? ''); ?>


    <?php echo e($slot); ?>

</main>

<footer class="bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-400 py-6 border-t border-slate-200 dark:border-slate-700 transition-colors duration-300">
    <div class="container mx-auto px-4 text-center">
        <p class="text-sm">
            &copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. Tous droits réservés.
        </p>
    </div>
</footer>

</body>
</html>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/CoreUI/resources/views/components/layouts/admin-connected.blade.php ENDPATH**/ ?>