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
        'avatar' => 'rounded-full bg-slate-100 dark:bg-slate-800',
        'text' => 'h-4 w-full bg-slate-100 dark:bg-slate-800 rounded',
    ];
?>

<div <?php echo e($attributes->merge(['class' => 'animate-pulse ' . ($variants[$variant] ?? $variants['default'])])); ?>></div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/CoreUI/resources/views/components/skeleton.blade.php ENDPATH**/ ?>