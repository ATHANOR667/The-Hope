<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    
    
    
    <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['class' => 'p-6 border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col h-full bg-white dark:bg-slate-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6 border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col h-full bg-white dark:bg-slate-800']); ?>
        
        <div class="flex items-center gap-3 mb-6">
            <div class="p-2.5 bg-sky-50 dark:bg-sky-900/20 rounded-xl text-sky-600 ring-1 ring-sky-100 dark:ring-sky-800 animate-pulse">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-signal'); ?>
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
            <div>
                <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Temps Réel</div>
                <div class="text-xs text-slate-500 font-medium">Sessions en cours</div>
            </div>
        </div>

        
        <div class="mb-6">
            <div class="text-5xl font-black text-slate-800 dark:text-white tracking-tight">
                <?php echo e(number_format($stats['current_activity']['total'])); ?>

            </div>
            <div class="text-xs text-emerald-600 font-bold mt-1 flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Connectés maintenant
            </div>
        </div>

        
        <div class="flex-1 overflow-y-auto space-y-3 pr-2 scrollbar-thin scrollbar-thumb-slate-200 dark:scrollbar-thumb-slate-700">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $stats['current_activity']['breakdown']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="flex justify-between items-center text-xs p-2 rounded-lg bg-slate-50 dark:bg-slate-700/50 border border-slate-100 dark:border-slate-700 group hover:border-sky-200 dark:hover:border-sky-800 transition-colors">
                    <span class="font-bold text-slate-600 dark:text-slate-300 group-hover:text-sky-600 transition-colors"><?php echo e($role); ?></span>
                    <span class="font-black text-slate-800 dark:text-white bg-white dark:bg-slate-600 px-2 py-0.5 rounded shadow-sm">
                        <?php echo e($count); ?>

                    </span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-xs text-slate-400 text-center italic py-2">Aucune session active</div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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


    
    
    
    <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['class' => 'p-0 border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col h-full overflow-hidden bg-white dark:bg-slate-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-0 border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col h-full overflow-hidden bg-white dark:bg-slate-800']); ?>
        
        <div class="px-6 py-5 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/20">
            <div class="flex justify-between items-end mb-3">
                <div class="flex items-center gap-2">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-users'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 text-slate-400']); ?>
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
                    <span class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-wide">Audience</span>
                </div>
                <div class="text-right">
                    <span class="text-xl font-black text-slate-800 dark:text-white"><?php echo e($stats['retention']['active_total']); ?></span>
                    <span class="text-xs text-emerald-600 font-bold">Actifs</span>
                    <span class="text-[10px] text-slate-400">/ <?php echo e($stats['retention']['total_population']); ?> Total</span>
                </div>
            </div>

            
            <div class="flex h-2 rounded-full overflow-hidden w-full bg-slate-200 dark:bg-slate-700 mb-2">
                
                <div style="width: <?php echo e($stats['retention']['total_population'] > 0 ? ($stats['retention']['recurring'] / $stats['retention']['total_population']) * 100 : 0); ?>%" class="bg-sky-600 h-full"></div>
                
                <div style="width: <?php echo e($stats['retention']['total_population'] > 0 ? ($stats['retention']['new'] / $stats['retention']['total_population']) * 100 : 0); ?>%" class="bg-sky-300 h-full"></div>
            </div>

            <div class="flex gap-4 text-[10px] font-bold text-slate-500 uppercase">
                <span class="flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-sky-600"></span> Fidèles</span>
                <span class="flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-sky-300"></span> Nouveaux</span>
                <span class="flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span> Dormants</span>
            </div>
        </div>

        
        <div class="flex-1 grid grid-cols-2 divide-x divide-slate-100 dark:divide-slate-700">
            
            <div class="p-5 flex flex-col justify-between hover:bg-sky-50/30 dark:hover:bg-slate-800/50 transition-colors">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrow-right-start-on-rectangle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 text-sky-400']); ?>
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
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Déconnexion</span>
                    </div>
                    <div class="text-3xl font-black text-sky-600 dark:text-sky-500">
                        <?php echo e($stats['sessions']['clean_logout']['stats']['med']); ?> <span class="text-xs font-bold text-slate-400">min</span>
                    </div>
                    <div class="text-[10px] text-sky-500 font-bold mt-0.5">médiane</div>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 dark:border-slate-700/50">
                    <div class="flex justify-between text-[10px] text-slate-500"><span>Min</span><span class="font-bold"><?php echo e($stats['sessions']['clean_logout']['stats']['min']); ?>m</span></div>
                    <div class="flex justify-between text-[10px] text-slate-500"><span>Moy</span><span class="font-bold"><?php echo e($stats['sessions']['clean_logout']['stats']['avg']); ?>m</span></div>
                    <div class="flex justify-between text-[10px] text-slate-500"><span>Max</span><span class="font-bold"><?php echo e($stats['sessions']['clean_logout']['stats']['avg']); ?>m</span></div>
                    <div class="flex justify-between text-[10px] text-slate-500"><span>Eff : </span><span class="font-bold"><?php echo e($stats['sessions']['clean_logout']['count']); ?> sessions</span></div>
                </div>
            </div>

            
            <div class="p-5 flex flex-col justify-between bg-amber-50/10 dark:bg-amber-900/5 hover:bg-amber-50/30 transition-colors">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-clock'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 text-amber-500']); ?>
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
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Expiration</span>
                    </div>
                    <div class="text-3xl font-black text-amber-600 dark:text-amber-500">
                        <?php echo e($stats['sessions']['expiration']['stats']['med']); ?> <span class="text-xs font-bold text-slate-400">min</span>
                    </div>
                    <div class="text-[10px] text-amber-500 font-bold mt-0.5">perte médiane</div>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 dark:border-slate-700/50">
                    <div class="flex justify-between text-[10px] text-slate-500"><span>Min</span><span class="font-bold"><?php echo e($stats['sessions']['expiration']['stats']['min']); ?>m</span></div>
                    <div class="flex justify-between text-[10px] text-slate-500"><span>Moy</span><span class="font-bold"><?php echo e($stats['sessions']['expiration']['stats']['avg']); ?>m</span></div>
                    <div class="flex justify-between text-[10px] text-slate-500"><span>Max</span><span class="font-bold"><?php echo e($stats['sessions']['expiration']['stats']['max']); ?>m</span></div>
                    <div class="flex justify-between text-[10px] text-slate-500"><span>Eff : </span><span class="font-bold"><?php echo e($stats['sessions']['expiration']['count']); ?> sessions</span></div>
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


    
    
    
    <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['class' => 'p-6 border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col h-full bg-white dark:bg-slate-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6 border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col h-full bg-white dark:bg-slate-800']); ?>

        
        <div class="flex justify-between items-start mb-6">
            <div class="flex items-center gap-3">
                <div class="p-2.5 bg-sky-50 dark:bg-sky-900/20 rounded-xl text-sky-600 ring-1 ring-sky-100 dark:ring-sky-800">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-shield-check'); ?>
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
                <div>
                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Santé Trafic</div>
                    <div class="text-xs text-slate-500 font-medium">Authentification & Filtrage</div>
                </div>
            </div>
            <?php
                // Mapping des couleurs avec le thème Sky Tech
                $statusColor = match($stats['overview']['security_status']['level']) {
                    'excellent' => 'text-emerald-600 bg-emerald-100 border-emerald-200', // Succès
                    'normal'    => 'text-sky-600 bg-sky-100 border-sky-200',             // Standard -> Sky
                    'warning'   => 'text-amber-600 bg-amber-100 border-amber-200',       // Warning
                    'critical'  => 'text-rose-600 bg-rose-100 border-rose-200',          // Danger
                };
            ?>
            <span class="px-2.5 py-1 rounded-lg text-[10px] font-black uppercase border <?php echo e($statusColor); ?>">
                <?php echo e($stats['overview']['security_status']['label']); ?>

            </span>
        </div>

        <div class="flex-1 flex flex-col justify-center space-y-8">

            
            <?php
                $attempts = $stats['overview']['attempts'];
                $successRate = $stats['overview']['success_rate'];
                // LOGIQUE COULEUR TEXTE :
                // 1. Pas de données (0 tentatives) -> GRIS
                // 2. Données mais 0% succès -> ROUGE (Echec total)
                // 3. Données et succès > 0% -> VERT
                $humanTextColor = ($attempts == 0) ? 'text-slate-400' : (($successRate == 0) ? 'text-rose-500' : 'text-emerald-500');

                // LOGIQUE FOND BARRE :
                // Si données présentes -> Fond ROUGE (pour montrer l'échec si la barre verte est vide)
                $humanBarBg = ($attempts > 0) ? 'bg-rose-100 dark:bg-rose-900/50' : 'bg-slate-100 dark:bg-slate-800';
            ?>
            <div>
                <div class="flex justify-between items-end mb-2">
                    <div class="flex items-center gap-2">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 text-slate-400']); ?>
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
                        <span class="text-xs font-bold text-slate-600 dark:text-slate-300">Humains (Succès)</span>
                    </div>
                    <span class="text-2xl font-black <?php echo e($humanTextColor); ?>">
                        <?php echo e($successRate); ?>%
                    </span>
                </div>
                <div class="relative w-full h-2 rounded-full overflow-hidden <?php echo e($humanBarBg); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($attempts > 0): ?> <div class="absolute inset-0 bg-rose-500 opacity-20"></div> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="absolute top-0 left-0 h-full bg-emerald-500 transition-all duration-1000 ease-out" style="width: <?php echo e($successRate); ?>%"></div>
                </div>
                <div class="text-[9px] text-right text-slate-400 mt-1">sur <?php echo e(number_format($attempts)); ?> tentatives</div>
            </div>

            
            <?php
                $botTotal = $stats['bots']['total'];
                $botRate = $stats['bots']['rate'];
                // LOGIQUE COULEUR TEXTE (Idem Humains) :
                $botTextColor = ($botTotal == 0) ? 'text-slate-400' : (($botRate == 0) ? 'text-rose-500' : 'text-emerald-500');
                $botBarBg = ($botTotal > 0) ? 'bg-rose-100 dark:bg-rose-900/50' : 'bg-slate-100 dark:bg-slate-800';
            ?>
            <div>
                <div class="flex justify-between items-end mb-2">
                    <div class="flex items-center gap-2">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-cpu-chip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 text-slate-400']); ?>
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
                        <span class="text-xs font-bold text-slate-600 dark:text-slate-300">Bots (Filtrage)</span>
                    </div>
                    <span class="text-2xl font-black <?php echo e($botTextColor); ?>">
                        <?php echo e($botRate); ?>%
                    </span>
                </div>

                <div class="relative w-full h-2 rounded-full overflow-hidden <?php echo e($botBarBg); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($botTotal > 0): ?> <div class="absolute inset-0 bg-rose-500 opacity-20"></div> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    
                    <div class="absolute top-0 left-0 h-full bg-emerald-500 transition-all duration-1000 ease-out"
                         style="width: <?php echo e($botRate); ?>%"></div>
                </div>

                <div class="text-[9px] text-right text-slate-400 mt-1">
                    <?php echo e(number_format($botTotal)); ?> requêtes détectées
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

</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/Logs/resources/views/livewire/auth/global-stats/kpi-cards.blade.php ENDPATH**/ ?>