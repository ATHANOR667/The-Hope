<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'variant' => 'neutral',
    'size' => 'md',
    'outline' => false,
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
    'variant' => 'neutral',
    'size' => 'md',
    'outline' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $baseClasses = 'inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2';

    if ($outline) {
        $variants = [
            'primary' => 'border-primary text-primary',
            'secondary' => 'border-slate-500 text-slate-500',
            'success' => 'border-success text-success',
            'danger' => 'border-danger text-danger',
            'warning' => 'border-warning text-warning',
            'info' => 'border-info text-info',
            'neutral' => 'border-slate-200 text-slate-900 dark:border-slate-800 dark:text-slate-50',
        ];
    } else {
        $variants = [
            'primary' => 'border-transparent bg-primary text-white shadow hover:bg-primary-hover',
            'secondary' => 'border-transparent bg-slate-100 text-slate-900 hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-100 dark:hover:bg-slate-700',
            'success' => 'border-transparent bg-success text-white hover:opacity-80',
            'danger' => 'border-transparent bg-danger text-white hover:opacity-80',
            'warning' => 'border-transparent bg-warning text-white hover:opacity-80',
            'info' => 'border-transparent bg-info text-white hover:opacity-80',
            'neutral' => 'border-transparent bg-slate-100 text-slate-900 hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-100 dark:hover:bg-slate-700',
        ];
    }

    $sizes = [
        'sm' => 'px-2 py-0.5 text-[10px]',
        'md' => 'px-2.5 py-0.5 text-xs',
        'lg' => 'px-3 py-1 text-sm',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['neutral']) . ' ' . ($sizes[$size] ?? $sizes['md']);
?>

<span <?php echo e($attributes->merge(['class' => $classes])); ?>>
    <?php echo e($slot); ?>

</span>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/CoreUI/resources/views/components/badge.blade.php ENDPATH**/ ?>