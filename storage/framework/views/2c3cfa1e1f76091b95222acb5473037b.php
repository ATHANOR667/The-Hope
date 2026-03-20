<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => config('app.name'),
    'heading' => null
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
    'heading' => null
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

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>


    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

</head>
<body class="h-full bg-slate-50 text-slate-900 dark:bg-slate-900 dark:text-slate-100 transition-colors duration-300 ease-in-out flex flex-col min-h-screen font-sans antialiased">

<header class="bg-primary dark:bg-slate-800 text-white p-4 shadow-md transition-colors duration-300 ease-in-out">
    <div class="container mx-auto flex justify-between items-center">

        <div class="flex-grow text-center">
            <h1 class="text-2xl md:text-3xl font-extrabold">
                <?php echo e($heading ?? config('app.name')); ?>

            </h1>
        </div>

        <div class="flex-shrink-0 ml-4">
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
        </div>
    </div>
</header>

<main class="flex-grow container mx-auto p-4 flex flex-col items-center justify-center">
    <div class="w-full max-w-sm md:max-w-md mb-6 space-y-4">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <?php if (isset($component)) { $__componentOriginal75091716ca600b9389447f9cdeedbdbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75091716ca600b9389447f9cdeedbdbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.alert','data' => ['type' => 'success']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'success']); ?>
                <?php echo e(session('success')); ?>

             <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.alert','data' => ['type' => 'error']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'error']); ?>
                <?php echo e(session('error')); ?>

             <?php echo $__env->renderComponent(); ?>
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

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('message')): ?>
            <?php if (isset($component)) { $__componentOriginal75091716ca600b9389447f9cdeedbdbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75091716ca600b9389447f9cdeedbdbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.alert','data' => ['type' => 'info']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info']); ?>
                <?php echo e(session('message')); ?>

             <?php echo $__env->renderComponent(); ?>
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

    </div>

    <?php echo e($slot); ?>


</main>

<footer class="bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 p-4 text-center shadow-inner mt-auto transition-colors duration-300 ease-in-out">
    <div class="container mx-auto">
        <p class="text-sm md:text-base">
            &copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>.
            <span class="hidden sm:inline">Tous droits réservés.</span>
        </p>
    </div>
</footer>

</body>
</html>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/CoreUI/resources/views/components/layouts/admin-disconnected.blade.php ENDPATH**/ ?>