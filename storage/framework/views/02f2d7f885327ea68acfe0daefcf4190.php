<div class="space-y-6">

    
    
    
    <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['class' => 'p-4 border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-4 border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800']); ?>
        <div class="flex flex-col xl:flex-row gap-4 justify-between items-start xl:items-center">

            
            <div class="flex flex-col sm:flex-row gap-3 w-full xl:w-auto flex-1">

                
                <div class="relative w-full sm:w-72 group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-sky-500 transition-colors">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-magnifying-glass'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
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
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Rechercher une route..."
                           class="pl-10 pr-4 py-2 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all shadow-sm">
                </div>

                
                <div class="relative w-full sm:w-64 group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-sky-500 transition-colors">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-globe-alt'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
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
                    <select wire:model.live="domain"
                            class="pl-10 pr-8 py-2 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900 text-sm font-medium focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 cursor-pointer shadow-sm">
                        <option value="">Tous les domaines</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $availableDomains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($dom); ?>"><?php echo e($dom); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </select>
                </div>
            </div>

            
            <div class="flex flex-col sm:flex-row items-center gap-3 w-full xl:w-auto">

                
                <div class="flex items-center bg-slate-50 dark:bg-slate-900/50 p-1 rounded-xl border border-slate-200 dark:border-slate-700 w-full sm:w-auto">

                    
                    <div x-data="{ show: <?php if ((object) ('period') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('period'->value()); ?>')<?php echo e('period'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('period'); ?>')<?php endif; ?> }"
                         x-show="show === 'custom'"
                         class="flex items-center gap-1 px-2 border-r border-slate-200 dark:border-slate-700 mr-1">

                        <input type="datetime-local" wire:model.blur="customFrom" class="text-xs border-0 bg-transparent p-0 w-28 text-right font-bold text-slate-700 dark:text-slate-300 focus:ring-0">
                        <span class="text-slate-400 text-[10px]"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-m-arrow-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?></span>
                        <input type="datetime-local" wire:model.blur="customTo" class="text-xs border-0 bg-transparent p-0 w-28 font-bold text-slate-700 dark:text-slate-300 focus:ring-0">
                    </div>

                    <select wire:model.live="period" class="text-xs sm:text-sm font-bold border-0 bg-transparent focus:ring-0 cursor-pointer py-1.5 pl-3 pr-8 text-slate-600 dark:text-slate-300 w-full sm:w-auto uppercase tracking-wide">
                        <option value="24h">24 Heures</option>
                        <option value="7d">7 Jours</option>
                        <option value="30d">30 Jours</option>
                        <option value="6m">6 Mois</option>
                        <option value="1y">1 An</option>
                        <option value="custom">📅 Personnalisé</option>
                    </select>
                </div>

                
                <select wire:model.live="perPage" class="w-full sm:w-auto py-2 pl-3 pr-8 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm font-medium shadow-sm focus:ring-sky-500 cursor-pointer">
                    <option value="10">10 / page</option>
                    <option value="25">25 / page</option>
                    <option value="50">50 / page</option>
                    <option value="100">100 / page</option>
                </select>
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

    
    
    
    <div class="block lg:hidden space-y-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $endpoints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['wire:click' => 'inspectRoute(\''.e($row['url']).'\', \''.e($row['method']).'\')','class' => 'p-4 relative overflow-hidden active:scale-[0.98] transition-transform bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'inspectRoute(\''.e($row['url']).'\', \''.e($row['method']).'\')','class' => 'p-4 relative overflow-hidden active:scale-[0.98] transition-transform bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700']); ?>

                
                <?php
                    $sideColor = match($row['method']) {
                        'GET' => 'bg-emerald-500',
                        'POST' => 'bg-sky-500',
                        'PUT', 'PATCH' => 'bg-amber-500',
                        'DELETE' => 'bg-rose-500',
                        default => 'bg-slate-500'
                    };
                ?>
                <div class="absolute left-0 top-0 bottom-0 w-1.5 <?php echo e($sideColor); ?>"></div>

                <div class="pl-3 space-y-3">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-2">
                            <span class="text-[10px] font-black px-1.5 py-0.5 rounded border bg-slate-100 dark:bg-slate-700 border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300">
                                <?php echo e($row['method']); ?>

                            </span>
                            <span class="text-sm font-bold text-slate-800 dark:text-white truncate max-w-[200px]">
                                <?php echo e($row['route_name'] ?: 'Route Inconnue'); ?>

                            </span>
                        </div>
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-chevron-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 text-slate-300']); ?>
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

                    <code class="block text-xs font-mono text-slate-500 break-all bg-slate-50 dark:bg-slate-900/50 p-2 rounded-lg border border-slate-100 dark:border-slate-800">
                        <?php echo e($row['path']); ?>

                    </code>

                    <div class="grid grid-cols-3 gap-2 text-center">
                        <div class="bg-slate-50 dark:bg-slate-700/30 p-2 rounded-lg">
                            <div class="text-[9px] uppercase font-bold text-slate-400">Hits</div>
                            <div class="font-bold text-slate-700 dark:text-slate-200"><?php echo e(number_format($row['hits'])); ?></div>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-700/30 p-2 rounded-lg">
                            <div class="text-[9px] uppercase font-bold text-slate-400">Lat.</div>
                            <div class="font-bold <?php echo e($row['latency']['med'] > 500 ? 'text-rose-500' : 'text-emerald-600'); ?>">
                                <?php echo e($row['latency']['med']); ?>ms
                            </div>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-700/30 p-2 rounded-lg">
                            <div class="text-[9px] uppercase font-bold text-slate-400">Bots</div>
                            <div class="font-bold <?php echo e($row['bot_rate'] > 20 ? 'text-amber-500' : 'text-slate-600'); ?>">
                                <?php echo e($row['bot_rate']); ?>%
                            </div>
                        </div>
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-12">
                <div class="inline-flex p-4 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-400 mb-3">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-magnifying-glass'); ?>
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
                </div>
                <p class="text-sm text-slate-500">Aucune route trouvée.</p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    
    
    <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['class' => 'hidden lg:block p-0 overflow-hidden border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hidden lg:block p-0 overflow-hidden border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800']); ?>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                <thead class="bg-slate-50 dark:bg-slate-800/80">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider w-24">Méthode</th>

                    <th wire:click="setSort('domain')" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider cursor-pointer hover:text-sky-600 group">
                        <div class="flex items-center gap-1">
                            Route / URL
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortBy === 'domain'): ?> <span class="text-sky-500"><?php echo e($sortDir === 'desc' ? '↓' : '↑'); ?></span> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </th>

                    <th wire:click="setSort('hits')" class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider cursor-pointer hover:text-sky-600 group">
                        <div class="flex items-center justify-end gap-1">
                            Hits
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortBy === 'hits'): ?> <span class="text-sky-500"><?php echo e($sortDir === 'desc' ? '↓' : '↑'); ?></span> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </th>

                    <th wire:click="setSort('med_latency')" class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider cursor-pointer hover:text-sky-600 group">
                        <div class="flex items-center justify-end gap-1">
                            Latence
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortBy === 'med_latency'): ?> <span class="text-sky-500"><?php echo e($sortDir === 'desc' ? '↓' : '↑'); ?></span> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </th>

                    <th wire:click="setSort('bot_rate')" class="px-6 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider cursor-pointer hover:text-sky-600 group">
                        <div class="flex items-center justify-center gap-1">
                            Qualité
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortBy === 'bot_rate'): ?> <span class="text-sky-500"><?php echo e($sortDir === 'desc' ? '↓' : '↑'); ?></span> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </th>

                    <th class="px-6 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider">Audience</th>
                    <th class="px-6 py-4"><span class="sr-only">Actions</span></th>
                </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 dark:divide-slate-700 bg-white dark:bg-slate-800">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $endpoints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr wire:click="inspectRoute('<?php echo e($row['url']); ?>', '<?php echo e($row['method']); ?>')" class="cursor-pointer group hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-colors">

                        
                        <td class="px-6 py-4 whitespace-nowrap align-top pt-5">
                            <?php
                                $badgeClass = match($row['method']) {
                                    'GET' => 'bg-emerald-100 text-emerald-700 border-emerald-200 dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20',
                                    'POST' => 'bg-sky-100 text-sky-700 border-sky-200 dark:bg-sky-500/10 dark:text-sky-400 dark:border-sky-500/20',
                                    'PUT' => 'bg-amber-100 text-amber-700 border-amber-200 dark:bg-amber-500/10 dark:text-amber-400 dark:border-amber-500/20',
                                    'DELETE' => 'bg-rose-100 text-rose-700 border-rose-200 dark:bg-rose-500/10 dark:text-rose-400 dark:border-rose-500/20',
                                    default => 'bg-slate-100 text-slate-600 border-slate-200 dark:bg-slate-700 dark:text-slate-400'
                                };
                            ?>
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-black border font-mono <?php echo e($badgeClass); ?>">
                                <?php echo e($row['method']); ?>

                            </span>
                        </td>

                        
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row['domain']): ?>
                                    <span class="text-[10px] uppercase font-bold text-slate-400 mb-1 tracking-widest"><?php echo e($row['domain']); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <span class="text-sm font-bold text-slate-700 dark:text-slate-200 truncate max-w-[300px] group-hover:text-sky-600 transition-colors" title="<?php echo e($row['route_name']); ?>">
                                    <?php echo e($row['route_name'] ?: 'Route Inconnue'); ?>

                                </span>
                                <span class="text-xs font-mono text-slate-500 mt-1 truncate max-w-[350px] select-all">
                                    <?php echo e($row['path']); ?>

                                </span>
                            </div>
                        </td>

                        
                        <td class="px-6 py-4 text-right">
                            <span class="font-bold text-slate-800 dark:text-white"><?php echo e(number_format($row['hits'])); ?></span>
                        </td>

                        
                        <td class="px-6 py-4 text-right">
                            <div class="flex flex-col items-end">
                                <span class="font-mono text-xs font-bold px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">
                                    <?php echo e($row['latency']['med']); ?> ms
                                </span>
                                <span class="text-[10px] text-slate-400 mt-1">max: <?php echo e(number_format($row['latency']['max'])); ?></span>
                            </div>
                        </td>

                        
                        <td class="px-6 py-4 text-center">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row['bot_rate'] > 0): ?>
                                <div class="flex flex-col items-center gap-1 w-24 mx-auto">
                                    <div class="w-full bg-slate-100 dark:bg-slate-700 rounded-full h-1.5 overflow-hidden">
                                        <div class="h-1.5 rounded-full <?php echo e($row['bot_rate'] > 20 ? 'bg-amber-500' : 'bg-emerald-500'); ?>" style="width: <?php echo e($row['bot_rate']); ?>%"></div>
                                    </div>
                                    <span class="text-[10px] font-bold <?php echo e($row['bot_rate'] > 20 ? 'text-amber-600' : 'text-slate-400'); ?>">
                                        <?php echo e($row['bot_rate']); ?>% robots
                                    </span>
                                </div>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1 text-xs text-emerald-600 font-bold bg-emerald-50 px-2 py-0.5 rounded-full">
                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-check-circle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?> Humain
                                </span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>

                        
                        <td class="px-6 py-4 text-center">
                            <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-users'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 text-slate-400']); ?>
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
                                <span class="text-xs font-bold text-slate-600 dark:text-slate-300"><?php echo e(number_format($row['visitors'])); ?></span>
                            </div>
                        </td>

                        
                        <td class="px-6 py-4 text-right">
                            <button class="p-2 rounded-lg text-slate-300 hover:text-sky-600 hover:bg-sky-50 dark:hover:bg-sky-900/30 transition-all">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-eye'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
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
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-slate-400 italic">
                            <div class="flex flex-col items-center">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-magnifying-glass'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-8 h-8 opacity-50 mb-2']); ?>
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
                                Aucune route trouvée.
                            </div>
                        </td>
                    </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
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

    
    
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($endpoints->hasPages()): ?>
        <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['class' => 'rounded-2xl px-6 py-4 border border-slate-200 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-center gap-4 shadow-sm bg-white dark:bg-slate-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'rounded-2xl px-6 py-4 border border-slate-200 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-center gap-4 shadow-sm bg-white dark:bg-slate-800']); ?>
            <div class="text-xs text-slate-500 font-medium">
                Affichage de <span class="font-bold text-slate-900 dark:text-white"><?php echo e($endpoints->firstItem()); ?></span>
                à <span class="font-bold text-slate-900 dark:text-white"><?php echo e($endpoints->lastItem()); ?></span>
                sur <span class="font-bold text-slate-900 dark:text-white"><?php echo e($endpoints->total()); ?></span> résultats
            </div>
            <div class="w-full sm:w-auto">
                <?php echo e($endpoints->links()); ?>

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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/Logs/resources/views/livewire/visit/route-list/endpoint-explorer.blade.php ENDPATH**/ ?>