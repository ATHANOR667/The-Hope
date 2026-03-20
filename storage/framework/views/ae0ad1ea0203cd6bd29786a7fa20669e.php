<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'noPadding' => false,
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
    'noPadding' => false,
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
    $baseClasses = 'rounded-2xl border bg-white text-slate-950 shadow-sm transition-all duration-300 dark:bg-slate-950 dark:text-slate-50';
    $variants = [
        'default' => 'border-slate-200 dark:border-slate-800',
        'outline' => 'border-2 border-slate-200 dark:border-slate-800',
        'glass'   => 'bg-white/70 backdrop-blur-md border-white/20 dark:bg-slate-950/70 dark:border-slate-800/20 shadow-xl',
        'hover'   => 'border-slate-200 dark:border-slate-800 hover:shadow-md hover:border-primary/50 dark:hover:border-primary/50'
    ];
    $paddingClasses = $noPadding ? '' : 'p-6';
    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['default']) . ' ' . $paddingClasses;
?>

<div <?php echo e($attributes->merge(['class' => $classes])); ?>>
    <?php echo e($slot); ?>

</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/CoreUI/resources/views/components/card.blade.php ENDPATH**/ ?>