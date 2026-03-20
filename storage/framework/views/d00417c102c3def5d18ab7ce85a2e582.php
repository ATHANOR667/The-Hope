<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'variant' => 'default'
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
    'variant' => 'default'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $variants = [
        'default' => 'bg-slate-100 dark:bg-slate-800',
        'primary' => 'bg-primary/20',
        'success' => 'bg-success/20',
        'danger'  => 'bg-danger/20',
    ];
    $barVariants = [
        'default' => 'bg-slate-900 dark:bg-slate-100',
        'primary' => 'bg-primary',
        'success' => 'bg-success',
        'danger'  => 'bg-danger',
    ];
    $value = $attributes->get('value', 0);
?>

<div <?php echo e($attributes->merge(['class' => 'relative h-4 w-full overflow-hidden rounded-full ' . ($variants[$variant] ?? $variants['default'])])); ?>>
    <div
        class="h-full w-full flex-1 transition-all <?php echo e($barVariants[$variant] ?? $barVariants['default']); ?>"
        style="transform: translateX(-<?php echo e(100 - (int)$value); ?>%)"
    ></div>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/CoreUI/resources/views/components/progress.blade.php ENDPATH**/ ?>