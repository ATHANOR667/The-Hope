<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['log' , 'resolver']));

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

foreach (array_filter((['log' , 'resolver']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<tbody x-data="{ expanded: false }" class="group border-b border-slate-50 dark:border-slate-700/50 hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-colors">
<tr class="cursor-pointer" @click="expanded = !expanded">

    
    <td class="px-6 py-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($log->is_failed): ?>
            <div class="flex items-center gap-2.5">
                <div class="p-1.5 bg-rose-50 dark:bg-rose-900/20 rounded-lg border border-rose-100 dark:border-rose-800 text-rose-600">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-m-exclamation-triangle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                </div>
                <span class="font-bold text-rose-700 dark:text-rose-400 text-xs uppercase tracking-wide">Échec</span>
            </div>
        <?php else: ?>
            <div class="flex items-center gap-2.5">
                <div class="p-1.5 bg-sky-50 dark:bg-sky-900/20 rounded-lg border border-sky-100 dark:border-sky-800 text-sky-600">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-m-arrow-right-end-on-rectangle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                </div>
                <span class="font-bold text-slate-700 dark:text-slate-300 text-xs uppercase tracking-wide">Connexion</span>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </td>

    <?php
        $resolved = $resolver->resolve($log->authenticatable_type , $log->authenticatable_id);
        $identity = $resolved['label'] ?? 'Compte #' . substr($log->authenticatable_id, 0, 8);
    ?>

    
    <td class="px-6 py-4">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-black border shadow-sm <?php echo e($log->is_failed ? 'bg-rose-50 text-rose-500 border-rose-200' : 'bg-slate-100 text-slate-500 border-slate-200'); ?>">
                <?php echo e(substr($identity, 0, 1)); ?>

            </div>
            <div class="min-w-0">
                <div class="font-bold text-slate-700 dark:text-slate-200 truncate max-w-[150px] text-xs">
                    <?php echo e($identity); ?>

                </div>
                <div class="text-[10px] text-slate-400 uppercase font-medium">
                    <?php echo e(class_basename($log->authenticatable_type)); ?>

                </div>
            </div>
        </div>
    </td>

    
    <td class="px-6 py-4">
        <div class="font-mono text-xs text-slate-600 dark:text-slate-400"><?php echo e($log->visit->ip_address); ?></div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($log->location_data['countryName'])): ?>
            <div class="flex items-center gap-1.5 mt-1 text-[10px] text-slate-400">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($log->location_data['countryCode'])): ?>
                    <img src="https://flagcdn.com/16x12/<?php echo e(strtolower($log->location_data['countryCode'])); ?>.png" class="h-2.5 rounded-[1px]">
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php echo e($log->location_data['cityName'] ?? $log->location_data['countryName']); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </td>

    
    <td class="px-6 py-4 text-center">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$log->is_failed): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($log->has_logout): ?>
                <span class="text-[10px] font-bold text-slate-400 uppercase bg-slate-100 dark:bg-slate-700 px-2 py-0.5 rounded border border-slate-200 dark:border-slate-600">Fermée</span>
            <?php elseif($log->is_expired): ?>
                <span class="text-[10px] font-bold text-amber-600 dark:text-amber-500 uppercase bg-amber-50 dark:bg-amber-900/20 px-2 py-0.5 rounded border border-amber-100 dark:border-amber-800">Expirée</span>
            <?php else: ?>
                <span class="inline-flex items-center gap-1.5 text-[10px] font-bold text-emerald-600 dark:text-emerald-400 uppercase bg-emerald-50 dark:bg-emerald-900/20 px-2 py-0.5 rounded border border-emerald-100 dark:border-emerald-800">
                    <span class="relative flex h-1.5 w-1.5">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-emerald-500"></span>
                    </span>
                    Active
                </span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php else: ?>
            <span class="text-slate-300 dark:text-slate-600">-</span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </td>

    
    <td class="px-6 py-4 text-right">
        <div class="font-bold text-slate-700 dark:text-slate-200 text-xs"><?php echo e($log->created_at->format('d/m H:i')); ?></div>
        <div class="text-[10px] text-slate-400"><?php echo e($log->created_at->diffForHumans()); ?></div>
    </td>

    
    <td class="px-4 py-4 text-center">
        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-m-chevron-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 text-slate-400 transition-transform duration-200',':class' => 'expanded ? \'rotate-180 text-sky-500\' : \'\'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
    </td>
</tr>


<tr x-show="expanded" x-collapse x-cloak class="bg-slate-50 dark:bg-slate-900/30 shadow-inner">
    <td colspan="6" class="p-0">
        <div class="p-6 border-t border-slate-100 dark:border-slate-700/50">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-xs mb-4">

                
                <div class="md:col-span-1 space-y-4">
                    <div>
                        <span class="block font-bold text-[10px] uppercase text-slate-400 mb-1.5">User Agent</span>
                        <div class="break-all text-slate-500 dark:text-slate-400 font-mono text-[10px] bg-white dark:bg-slate-800 p-2 rounded border border-slate-200 dark:border-slate-700 truncate"><?php echo e(($log->visit->user_agent)); ?></div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($log->is_failed && !empty($log->details)): ?>
                        <div class="rounded-lg border border-rose-200 dark:border-rose-800/50 bg-white dark:bg-slate-800 overflow-hidden">
                            <div class="px-3 py-2 bg-rose-50 dark:bg-rose-900/20 border-b border-rose-100 dark:border-rose-800/50 flex items-center gap-2">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-exclamation-triangle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3.5 h-3.5 text-rose-500']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                <span class="font-bold text-[10px] uppercase text-rose-600 dark:text-rose-400">Détails erreur</span>
                            </div>
                            <div class="p-3 space-y-2">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $log->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex flex-col">
                                        <span class="text-[9px] font-bold uppercase text-slate-400"><?php echo e(str_replace('_', ' ', $key)); ?></span>
                                        <code class="font-mono text-[10px] font-medium text-rose-600 dark:text-rose-400 break-all"><?php echo e(is_array($value) ? json_encode($value) : $value); ?></code>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <div>
                    <span class="block font-bold text-[10px] uppercase text-slate-400 mb-2">Localisation</span>
                    <div class="font-bold text-slate-700 dark:text-slate-200 text-sm"><?php echo e($log->location_data['cityName'] ?? '-'); ?></div>
                    <div class="text-slate-500 dark:text-slate-400"><?php echo e($log->location_data['countryName'] ?? '-'); ?></div>
                    <div class="text-slate-400 text-[10px] mt-1"><?php echo e($log->location_data['timeZone'] ?? 'UTC'); ?></div>
                </div>

                
                <div>
                    <span class="block font-bold text-[10px] uppercase text-slate-400 mb-2">Cycle Session</span>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($log->has_logout): ?>
                        <div class="flex flex-col gap-1 text-slate-500">
                            <span>Fin : <span class="font-mono font-bold text-slate-700 dark:text-slate-200"><?php echo e($log->ended_at?->format('H:i:s')); ?></span></span>
                            <span>Durée : <?php echo e($log->duration_label); ?></span>
                        </div>
                    <?php elseif($log->is_expired && $log->ended_at): ?>
                        <div class="flex flex-col gap-1">
                            <span class="text-amber-600 font-bold mb-1">Session expirée</span>
                            <span class="text-slate-500">Dernière activité : <span class="font-mono font-bold text-slate-700 dark:text-slate-200"><?php echo e($log->ended_at->format('H:i:s')); ?></span></span>
                            <span class="text-slate-500 mt-1 pt-1 border-t border-slate-100 dark:border-slate-700">Durée réelle : <span class="font-bold"><?php echo e($log->duration_label); ?></span></span>
                        </div>
                    <?php elseif($log->is_active): ?>
                        <div class="text-emerald-600 dark:text-emerald-400 font-bold bg-emerald-50 dark:bg-emerald-900/10 p-2 rounded border border-emerald-100 dark:border-emerald-900/50 inline-block">Session en cours</div>
                    <?php else: ?>
                        <div class="text-slate-400 italic">Non applicable</div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <div class="flex flex-col justify-between h-full">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$log->is_failed): ?>
                        <div>
                            <div class="bg-white dark:bg-slate-800 rounded border border-slate-200 dark:border-slate-700 overflow-hidden mb-4">
                                <div class="bg-slate-50 dark:bg-slate-700/50 px-3 py-1.5 border-b border-slate-200 dark:border-slate-700"><span class="font-bold text-[10px] uppercase text-sky-600 dark:text-sky-400">Limites Validité</span></div>
                                <div class="p-3 space-y-2">
                                    <div class="flex justify-between"><span class="text-slate-500 text-[10px] uppercase">Prévue</span><span class="font-mono font-bold text-slate-700 dark:text-slate-200"><?php echo e($log->scheduled_expires_at?->format('d/m H:i') ?? '-'); ?></span></div>
                                    <div class="flex justify-between"><span class="text-slate-500 text-[10px] uppercase">Effective</span><span class="font-mono font-bold <?php echo e($log->effective_expires_at?->isPast() ? 'text-rose-500' : 'text-slate-700 dark:text-slate-200'); ?>"><?php echo e($log->effective_expires_at?->format('d/m H:i') ?? '-'); ?></span></div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <div class="flex justify-end mt-auto">
                        <button wire:click.stop="openUserDashboard('<?php echo e($log->authenticatable_type); ?>', '<?php echo e($log->authenticatable_id); ?>')"
                                class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-lg text-xs font-bold text-sky-600 hover:bg-sky-50 dark:hover:bg-slate-700 hover:border-sky-200 transition-all shadow-sm active:scale-95 group">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-user-circle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 group-hover:scale-110 transition-transform']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                            Voir Historique
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </td>
</tr>
</tbody>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/Logs/resources/views/livewire/auth/table/partials/row-desktop.blade.php ENDPATH**/ ?>