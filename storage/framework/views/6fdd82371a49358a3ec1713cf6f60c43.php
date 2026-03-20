<div x-data="{ open: <?php if ((object) ('isOpen') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('isOpen'->value()); ?>')<?php echo e('isOpen'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('isOpen'); ?>')<?php endif; ?> }"
     x-show="open"
     x-on:keydown.escape.window="open = false"
     class="relative z-[100]"
     style="display: none;">

    
    <div x-show="open"
         x-transition.opacity.duration.300ms
         class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"
         @click="open = false"></div>

    
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-0 sm:pl-10">

                <div x-show="open"
                     x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:enter-start="translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="translate-x-full"
                     class="pointer-events-auto w-screen max-w-5xl">

                    <div class="flex h-full flex-col bg-white dark:bg-slate-900 shadow-2xl">

                        
                        <div class="px-6 py-4 bg-sky-50 dark:bg-sky-950/20 border-b border-sky-100 dark:border-sky-800 flex items-start justify-between shrink-0">
                            <div>
                                <h2 class="text-base font-black text-slate-800 dark:text-slate-200 uppercase tracking-tight">
                                    Chronologie & Versionning
                                </h2>
                                <div class="flex items-center gap-2 mt-2">
                                    <?php if (isset($component)) { $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.badge','data' => ['variant' => 'primary','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'primary','size' => 'sm']); ?>
                                        <?php echo e(class_basename($type)); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb)): ?>
<?php $attributes = $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb; ?>
<?php unset($__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalafe60356fc24a1df475a40bac4ca6eeb)): ?>
<?php $component = $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb; ?>
<?php unset($__componentOriginalafe60356fc24a1df475a40bac4ca6eeb); ?>
<?php endif; ?>
                                    <span class="text-xs font-mono text-slate-400 dark:text-slate-500">#<?php echo e($id); ?></span>
                                </div>
                            </div>
                            <button @click="open = false" class="text-slate-400 hover:text-sky-600 dark:text-slate-500 dark:hover:text-sky-400 transition-colors p-2 rounded-full hover:bg-sky-100 dark:hover:bg-sky-900/50">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-x-mark'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6']); ?>
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
                            </button>
                        </div>

                        
                        <div class="flex flex-1 overflow-hidden flex-col md:flex-row">

                            
                            <div class="group relative w-full md:w-72 bg-slate-50 dark:bg-slate-900 border-b md:border-b-0 md:border-r border-slate-200 dark:border-slate-800 overflow-y-auto shrink-0 p-4
                                        h-64 min-h-[150px] max-h-[60%] resize-y md:h-auto md:max-h-full md:resize-none">

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($history->isEmpty()): ?>
                                    <div class="flex flex-col items-center justify-center py-10 text-center">
                                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-clock'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-8 h-8 text-slate-300 dark:text-slate-700 mb-2']); ?>
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
                                        <span class="text-xs text-slate-400 dark:text-slate-500 italic">Aucun historique</span>
                                    </div>
                                <?php else: ?>
                                    <div class="relative border-l-2 border-slate-200 dark:border-slate-800 ml-3 space-y-6 py-2 mb-4">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $version): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="relative pl-6 cursor-pointer group/item"
                                                 wire:click="selectVersion('<?php echo e($version['auditId']); ?>')">

                                                
                                                <div class="absolute -left-[9px] top-0.5 w-4 h-4 rounded-full border-2 transition-all z-10
                                                    <?php echo e(isset($selectedVersion['auditId']) && $selectedVersion['auditId'] === $version['auditId']
                                                        ? 'bg-sky-600 border-sky-600 scale-110 shadow-md shadow-sky-500/30 dark:shadow-sky-400/20'
                                                        : 'bg-white dark:bg-slate-900 border-slate-300 dark:border-slate-700 group-hover/item:border-sky-400'); ?>"></div>

                                                <div class="flex flex-col">
                                                    <span class="text-xs font-black uppercase tracking-tight transition-colors
                                                        <?php echo e(isset($selectedVersion['auditId']) && $selectedVersion['auditId'] === $version['auditId'] ? 'text-sky-700 dark:text-sky-400' : 'text-slate-600 dark:text-slate-400 group-hover/item:text-sky-600 dark:group-hover/item:text-sky-400'); ?>">
                                                        <?php echo e($version['event']); ?>

                                                    </span>
                                                    <span class="text-[10px] text-slate-400 dark:text-slate-500 mt-0.5 font-mono">
                                                        <?php echo e(\Carbon\Carbon::parse($version['date'])->format('d/m/Y H:i')); ?>

                                                    </span>

                                                    <div class="flex items-center gap-1.5 mt-1.5 opacity-70 group-hover/item:opacity-100 transition-opacity">
                                                        <div class="w-4 h-4 rounded-full bg-sky-100 dark:bg-sky-900/30 flex items-center justify-center text-[8px] font-bold text-sky-700 dark:text-sky-400">
                                                            <?php echo e(substr($version['author']['name'] ?? 'S', 0, 1)); ?>

                                                        </div>
                                                        <span class="text-[9px] font-medium text-slate-500 dark:text-slate-400 truncate max-w-[120px]">
                                                            <?php echo e($version['author']['name'] ?? 'Système'); ?>

                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                
                                <div class="absolute bottom-1 left-0 right-0 flex justify-center md:hidden pointer-events-none opacity-50">
                                    <div class="h-1 w-12 bg-slate-300 dark:bg-slate-700 rounded-full"></div>
                                </div>
                            </div>

                            
                            <div class="flex-1 overflow-y-auto bg-white dark:bg-slate-900 p-4 md:p-8 border-t md:border-t-0 border-slate-100 dark:border-slate-800">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedVersion): ?>

                                    
                                    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 pb-4 border-b border-slate-100 dark:border-slate-800 gap-4">
                                        <div>
                                            <div class="text-[10px] uppercase font-bold text-slate-400 dark:text-slate-500 tracking-wider mb-1">État de l'objet au</div>
                                            <div class="text-xl font-bold text-slate-800 dark:text-slate-100">
                                                <?php echo e(\Carbon\Carbon::parse($selectedVersion['date'])->format('d F Y à H:i:s')); ?>

                                            </div>
                                        </div>
                                        <div>
                                            <?php if (isset($component)) { $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.badge','data' => ['variant' => 'neutral','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'neutral','size' => 'sm']); ?>
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-m-globe-alt'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 mr-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?> IP: <?php echo e($selectedVersion['ip'] ?? 'N/A'); ?>

                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb)): ?>
<?php $attributes = $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb; ?>
<?php unset($__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalafe60356fc24a1df475a40bac4ca6eeb)): ?>
<?php $component = $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb; ?>
<?php unset($__componentOriginalafe60356fc24a1df475a40bac4ca6eeb); ?>
<?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                                        
                                        <div class="space-y-4">
                                            <h4 class="text-xs font-black text-sky-600 dark:text-sky-400 uppercase flex items-center gap-2">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-m-table-cells'); ?>
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
<?php endif; ?> Attributs
                                            </h4>

                                            <div class="border-t border-slate-100 dark:border-slate-800">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $selectedVersion['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                    <?php if(in_array($key, ['created_at', 'updated_at', 'deleted_at', 'id', 'password', 'passcode', 'remember_token'])) continue; ?>

                                                    <div class="py-3 border-b border-slate-100 dark:border-slate-800 grid grid-cols-1 md:grid-cols-3 gap-2 group hover:bg-slate-50/50 dark:hover:bg-slate-800/50 transition-colors px-2 -mx-2 rounded-lg">
                                                        
                                                        <div class="md:col-span-1">
                                                            <span class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wide break-words">
                                                                <?php echo e($key); ?>

                                                            </span>
                                                        </div>

                                                        
                                                        <div class="md:col-span-2 text-sm text-slate-700 dark:text-slate-300 break-words">
                                                            
                                                            <?php echo $__env->make('logs::livewire.audit.components.value-renderer', ['val' => $val], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                        </div>

                                        
                                        <div class="space-y-4">
                                            <h4 class="text-xs font-black text-sky-600 dark:text-sky-400 uppercase flex items-center gap-2">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-m-share'); ?>
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
<?php endif; ?> Relations Snapshot
                                            </h4>

                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(empty($selectedVersion['relations'])): ?>
                                                <div class="p-6 border-2 border-dashed border-slate-200 dark:border-slate-800 rounded-xl text-center bg-slate-50 dark:bg-slate-900">
                                                    <span class="text-xs text-slate-400 dark:text-slate-500 font-medium">Aucune relation capturée.</span>
                                                </div>
                                            <?php else: ?>
                                                <div class="space-y-3">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $selectedVersion['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relName => $relData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['class' => '!p-0 overflow-hidden','xData' => '{ expanded: false }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!p-0 overflow-hidden','x-data' => '{ expanded: false }']); ?>
                                                            <button @click="expanded = !expanded" class="w-full flex justify-between items-center px-4 py-3 bg-slate-50 dark:bg-slate-900 hover:bg-sky-50 dark:hover:bg-sky-950/30 transition-colors group">
                                                                <span class="text-[10px] font-black uppercase text-slate-600 dark:text-slate-300 group-hover:text-sky-700 dark:group-hover:text-sky-400"><?php echo e($relName); ?></span>
                                                                <div class="flex items-center gap-2">
                                                                    <?php if (isset($component)) { $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.badge','data' => ['variant' => 'neutral','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'neutral','size' => 'sm']); ?><?php echo e(count($relData)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb)): ?>
<?php $attributes = $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb; ?>
<?php unset($__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalafe60356fc24a1df475a40bac4ca6eeb)): ?>
<?php $component = $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb; ?>
<?php unset($__componentOriginalafe60356fc24a1df475a40bac4ca6eeb); ?>
<?php endif; ?>
                                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-m-chevron-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 text-slate-400 transition-transform',':class' => 'expanded ? \'rotate-180\' : \'\'']); ?>
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
                                                            </button>

                                                            <div x-show="expanded" x-cloak class="p-3 border-t border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900">
                                                                <div class="flex flex-wrap gap-2">
                                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $relData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <span class="px-2 py-1 rounded bg-sky-50 dark:bg-sky-900/30 border border-sky-100 dark:border-sky-800 text-[10px] font-medium text-sky-700 dark:text-sky-400 truncate max-w-full">
                                                                            <?php echo e($item['name'] ?? $item['title'] ?? $item['label'] ?? $item['email'] ?? ('ID: ' . ($item['id'] ?? '?'))); ?>

                                                                        </span>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                                </div>
                                                                <div class="mt-2 pt-2 border-t border-slate-50 dark:border-slate-800">
                                                                    <details class="text-[9px] text-slate-400 dark:text-slate-500 cursor-pointer group">
                                                                        <summary class="group-hover:text-sky-600 dark:group-hover:text-sky-400 transition-colors">Voir JSON brut</summary>
                                                                        <pre class="mt-2 overflow-x-auto p-3 bg-slate-800 dark:bg-slate-950 text-slate-300 dark:text-slate-400 rounded-lg"><?php echo e(json_encode($relData, JSON_PRETTY_PRINT)); ?></pre>
                                                                    </details>
                                                                </div>
                                                            </div>
                                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalae18524f0320527e26bec58d05c014c4)): ?>
<?php $attributes = $__attributesOriginalae18524f0320527e26bec58d05c014c4; ?>
<?php unset($__attributesOriginalae18524f0320527e26bec58d05c014c4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae18524f0320527e26bec58d05c014c4)): ?>
<?php $component = $__componentOriginalae18524f0320527e26bec58d05c014c4; ?>
<?php unset($__componentOriginalae18524f0320527e26bec58d05c014c4); ?>
<?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </div>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    
                                    <div class="h-full flex flex-col items-center justify-center text-slate-300 dark:text-slate-700 opacity-60">
                                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-cursor-arrow-rays'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-12 h-12 mb-3 text-sky-300 dark:text-sky-900']); ?>
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
                                        <span class="text-xs font-bold uppercase tracking-widest text-center text-slate-500 dark:text-slate-600">Sélectionnez une version<br>dans la chronologie</span>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/Logs/resources/views/livewire/audit/focus/model-history.blade.php ENDPATH**/ ?>