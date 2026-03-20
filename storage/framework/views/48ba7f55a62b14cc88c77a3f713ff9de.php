<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'value' => 0,
    'max' => 100,
    'variant' => 'primary',
    'color' => null // Alias pour variant pour compatibilité
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
    'value' => 0,
    'max' => 100,
    'variant' => 'primary',
    'color' => null // Alias pour variant pour compatibilité
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $variant = $color ?? $variant;
    $percent = $max > 0 ? min(100, round(($value / $max) * 100)) : 0;
?>

<?php if (isset($component)) { $__componentOriginal2cb5c5e501f3b40eb88d107c8748d27c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2cb5c5e501f3b40eb88d107c8748d27c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.progress','data' => ['value' => $percent,'variant' => $variant,'attributes' => $attributes->except(['value', 'max'])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::progress'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($percent),'variant' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($variant),'attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->except(['value', 'max']))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2cb5c5e501f3b40eb88d107c8748d27c)): ?>
<?php $attributes = $__attributesOriginal2cb5c5e501f3b40eb88d107c8748d27c; ?>
<?php unset($__attributesOriginal2cb5c5e501f3b40eb88d107c8748d27c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2cb5c5e501f3b40eb88d107c8748d27c)): ?>
<?php $component = $__componentOriginal2cb5c5e501f3b40eb88d107c8748d27c; ?>
<?php unset($__componentOriginal2cb5c5e501f3b40eb88d107c8748d27c); ?>
<?php endif; ?>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/CoreUI/resources/views/components/progress-bar.blade.php ENDPATH**/ ?>