<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['route', 'color' => 'sky']));

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

foreach (array_filter((['route', 'color' => 'sky']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div wire:click="inspectRoute('<?php echo e($route['url']); ?>', '<?php echo e($route['method']); ?>')"
     class="px-4 sm:px-6 py-3 flex justify-between items-center hover:bg-slate-50 dark:hover:bg-slate-700/30 cursor-pointer group transition-colors border-b border-slate-50 dark:border-slate-700/50 last:border-0">

    <div class="min-w-0 flex items-center gap-3">

        
        <?php
            $methodClass = match($route['method']) {
                'GET' => 'bg-emerald-100 text-emerald-700 border-emerald-200 dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20',
                'POST' => 'bg-sky-100 text-sky-700 border-sky-200 dark:bg-sky-500/10 dark:text-sky-400 dark:border-sky-500/20',
                'PUT', 'PATCH' => 'bg-amber-100 text-amber-700 border-amber-200 dark:bg-amber-500/10 dark:text-amber-400 dark:border-amber-500/20',
                'DELETE' => 'bg-rose-100 text-rose-700 border-rose-200 dark:bg-rose-500/10 dark:text-rose-400 dark:border-rose-500/20',
                default => 'bg-slate-100 text-slate-700 border-slate-200 dark:bg-slate-800 dark:text-slate-300',
            };
        ?>
        <span class="text-[9px] font-bold px-1.5 py-0.5 rounded border <?php echo e($methodClass); ?> shrink-0">
            <?php echo e($route['method']); ?>

        </span>

        
        <span class="text-xs font-mono font-medium text-slate-600 dark:text-slate-300 truncate max-w-[140px] sm:max-w-[200px] lg:max-w-[280px] group-hover:text-sky-600 dark:group-hover:text-sky-400 transition-colors"
              title="<?php echo e($route['url']); ?>">
            <?php echo e($route['url']); ?>

        </span>
    </div>

    
    <div class="text-[10px] font-bold text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 px-2 py-0.5 rounded-full group-hover:bg-sky-50 group-hover:text-sky-600 dark:group-hover:bg-sky-900/30 dark:group-hover:text-sky-400 transition-colors">
        <?php echo e(number_format($route['count'])); ?>

    </div>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/Logs/resources/views/livewire/visit/global-components/route/route-item.blade.php ENDPATH**/ ?>