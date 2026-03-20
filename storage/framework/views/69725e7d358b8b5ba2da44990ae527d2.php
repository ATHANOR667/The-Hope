<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    
    
    
    <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['class' => 'p-6 border-0 ring-1 ring-slate-200 dark:ring-slate-700 flex flex-col justify-between h-full relative overflow-hidden group hover:-translate-y-1 hover:shadow-lg transition-all duration-300 bg-gradient-to-br from-white to-indigo-50/30 dark:from-slate-800 dark:to-indigo-900/10 rounded-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6 border-0 ring-1 ring-slate-200 dark:ring-slate-700 flex flex-col justify-between h-full relative overflow-hidden group hover:-translate-y-1 hover:shadow-lg transition-all duration-300 bg-gradient-to-br from-white to-indigo-50/30 dark:from-slate-800 dark:to-indigo-900/10 rounded-2xl']); ?>

        
        <div class="absolute -right-8 -top-8 text-indigo-100 dark:text-indigo-900/20 transform rotate-12 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500">
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-server-stack'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-40 h-40 opacity-50']); ?>
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

        <div class="relative z-10">
            
            <div class="flex items-center gap-3 mb-3">
                <div class="p-2.5 bg-indigo-100 dark:bg-indigo-900/30 rounded-xl text-indigo-600 dark:text-indigo-400 shadow-sm shadow-indigo-100/50 dark:shadow-none">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-c-server'); ?>
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
                <h3 class="text-sm font-bold uppercase tracking-widest text-indigo-900/70 dark:text-indigo-300/70">Charge Totale</h3>
            </div>
            
            <div class="text-4xl font-black text-slate-900 dark:text-white tracking-tight leading-none">
                <?php echo e(number_format($kpis['volume']['total_hits'] ?? 0)); ?>

            </div>
            <p class="text-sm text-slate-500 font-medium mt-2">Requêtes HTTP traitées</p>
        </div>

        
        <div class="mt-8 space-y-5 relative z-10">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $kpis['volume']['breakdown']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $colorBg = match($row['key']) { 'bot' => 'bg-amber-500', 'guest' => 'bg-slate-400', default => 'bg-indigo-500' };
                    $colorText = match($row['key']) { 'bot' => 'text-amber-600', 'guest' => 'text-slate-500', default => 'text-indigo-600' };
                ?>
                <div class="flex flex-col gap-1.5">
                    <div class="flex justify-between items-end text-xs">
                        <div class="flex items-center gap-2 font-bold text-slate-700 dark:text-slate-200 uppercase tracking-wider">
                            <span class="w-2.5 h-2.5 rounded-full <?php echo e($colorBg); ?> shadow-sm"></span>
                            <?php echo e($row['label']); ?>

                        </div>
                        <div class="<?php echo e($colorText); ?> dark:text-slate-300 font-medium">
                            <span class="font-black text-slate-900 dark:text-white text-sm"><?php echo e(number_format($row['hits'])); ?></span> hits
                        </div>
                    </div>
                    
                    <div class="w-full h-2 rounded-full overflow-hidden bg-slate-100 dark:bg-slate-700/50">
                        <div class="h-full rounded-full <?php echo e($colorBg); ?>" style="width: <?php echo e($row['ratio']); ?>%"></div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['class' => 'p-6 border-0 ring-1 ring-slate-200 dark:ring-slate-700 flex flex-col justify-between h-full relative overflow-hidden group hover:-translate-y-1 hover:shadow-lg transition-all duration-300 bg-gradient-to-br from-amber-50/50 to-white dark:from-slate-800 dark:to-amber-900/10 rounded-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6 border-0 ring-1 ring-slate-200 dark:ring-slate-700 flex flex-col justify-between h-full relative overflow-hidden group hover:-translate-y-1 hover:shadow-lg transition-all duration-300 bg-gradient-to-br from-amber-50/50 to-white dark:from-slate-800 dark:to-amber-900/10 rounded-2xl']); ?>

        <div class="absolute -right-6 -top-6 text-amber-100 dark:text-amber-900/20 group-hover:scale-105 transition-transform duration-500">
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-cpu-chip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-36 h-36 opacity-50']); ?>
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

        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-3">
                <div class="p-2.5 bg-amber-100 dark:bg-amber-900/30 rounded-xl text-amber-600 dark:text-amber-400 shadow-sm shadow-amber-100/50 dark:shadow-none">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-c-cpu-chip'); ?>
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
                <h3 class="text-sm font-bold uppercase tracking-widest text-amber-900/70 dark:text-amber-300/70">Trafic Automatisé</h3>
            </div>

            <div class="flex items-baseline gap-3 mt-2">
                <div class="text-5xl font-black text-amber-500 tracking-tight leading-none drop-shadow-sm">
                    <?php echo e($kpis['volume']['bot_ratio']); ?><span class="text-2xl ml-1">%</span>
                </div>
            </div>
            <div class="mt-3 inline-flex items-center gap-1 text-sm font-bold text-amber-700/80 bg-amber-100/80 dark:bg-amber-900/30 dark:text-amber-400 px-3 py-1.5 rounded-lg">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-m-arrow-trending-up'); ?>
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
                <?php echo e(number_format($kpis['volume']['bot_hits'])); ?> hits
            </div>
        </div>

        <div class="mt-6 pt-5 border-t border-amber-100/50 dark:border-slate-700/50 relative z-10">
            <div class="flex justify-between items-center">
                <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Robots uniques identifiés</span>
                <span class="text-lg font-black text-slate-800 dark:text-white"><?php echo e(number_format($kpis['volume']['unique_bots'])); ?></span>
            </div>
            <p class="text-xs text-slate-400 mt-2 leading-relaxed">Inclut les crawlers (Google, Bing), les scripts et les outils d'analyse.</p>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['class' => 'p-6 border-0 ring-1 ring-slate-200 dark:ring-slate-700 flex flex-col h-full relative overflow-hidden group hover:-translate-y-1 hover:shadow-lg transition-all duration-300 bg-white dark:bg-slate-800 rounded-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6 border-0 ring-1 ring-slate-200 dark:ring-slate-700 flex flex-col h-full relative overflow-hidden group hover:-translate-y-1 hover:shadow-lg transition-all duration-300 bg-white dark:bg-slate-800 rounded-2xl']); ?>

        <div class="absolute -right-8 -top-8 text-sky-100 dark:text-sky-900/20 group-hover:scale-110 transition-transform duration-500">
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-users'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-40 h-40 opacity-50']); ?>
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

        
        <div class="flex justify-between items-start mb-6 relative z-10">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <div class="p-2.5 bg-sky-100 dark:bg-sky-900/30 rounded-xl text-sky-600 dark:text-sky-400 shadow-sm shadow-sky-100/50 dark:shadow-none">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-c-user-group'); ?>
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
                    <h3 class="text-sm font-bold uppercase tracking-widest text-sky-900/70 dark:text-sky-300/70">Audience Réelle</h3>
                </div>
                <div class="text-4xl font-black text-slate-900 dark:text-white tracking-tight leading-none">
                    <?php echo e(number_format($kpis['audience']['unique_visitors'] ?? 0)); ?>

                </div>
                <p class="text-sm text-slate-500 font-medium mt-2">Individus uniques</p>
            </div>
            <div class="text-right bg-sky-50 dark:bg-slate-700/50 px-4 py-2 rounded-xl">
                <span class="block text-2xl font-black text-sky-600 dark:text-sky-400 leading-none"><?php echo e(number_format($kpis['audience']['total_sessions'])); ?></span>
                <span class="text-[10px] font-bold text-sky-400/80 uppercase tracking-wider">Sessions Totales</span>
            </div>
        </div>

        
        <div class="flex-1 overflow-y-auto max-h-[140px] scrollbar-thin scrollbar-thumb-slate-200 dark:scrollbar-thumb-slate-600 scrollbar-track-transparent pr-3 space-y-4 relative z-10 my-2 py-2">

            
            <div class="flex justify-between items-center group/item hover:bg-slate-50 dark:hover:bg-slate-700/30 p-2 -mx-2 rounded-lg transition-colors">
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-slate-700 dark:text-slate-200 group-hover/item:text-sky-600 transition-colors">Invités (Non connectés)</span>
                    <span class="text-xs text-slate-400 font-medium"><?php echo e(number_format($kpis['audience']['guest_stats']['uniques'])); ?> visiteurs uniques</span>
                </div>
                <div class="text-right">
                    <span class="text-xs font-bold px-2 py-1 rounded-md bg-slate-100 text-slate-600 border border-slate-200 dark:bg-slate-700 dark:text-slate-300 dark:border-slate-600" title="Sessions moyennes par personne">
                        x<?php echo e($kpis['audience']['guest_stats']['freq']); ?> <span class="text-[9px] text-slate-400 font-normal">/visiteur</span>
                    </span>
                </div>
            </div>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $kpis['audience']['types_breakdown']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex justify-between items-center group/item hover:bg-sky-50 dark:hover:bg-slate-700/30 p-2 -mx-2 rounded-lg transition-colors border-t border-dashed border-slate-100 dark:border-slate-700/50">
                    <div class="flex flex-col">
                        <span class="text-sm font-bold text-sky-700 dark:text-sky-400"><?php echo e($type['label']); ?>s</span>
                        <span class="text-xs text-slate-400 font-medium"><?php echo e(number_format($type['uniques'])); ?> visiteurs uniques</span>
                    </div>
                    <div class="text-right">
                         <span class="text-xs font-bold px-2 py-1 rounded-md bg-sky-100 text-sky-700 border border-sky-200 dark:bg-sky-900/30 dark:text-sky-300 dark:border-sky-800/50" title="Sessions moyennes par personne">
                            x<?php echo e($type['freq']); ?> <span class="text-[9px] text-sky-400 font-normal">/visiteur</span>
                        </span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="mt-auto pt-4 border-t border-slate-100 dark:border-slate-700 flex items-center justify-between text-sm font-medium">
            <span class="text-slate-500 dark:text-slate-400 flex items-center gap-1">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-funnel'); ?>
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
<?php endif; ?> Qualité trafic
            </span>
            <span class="text-rose-600 dark:text-rose-400 font-bold bg-rose-50 dark:bg-rose-900/20 px-3 py-1 rounded-full"><?php echo e($kpis['audience']['bounce_rate']); ?>% Rebond</span>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['class' => 'p-0 border-0 ring-1 ring-slate-200 dark:ring-slate-700 overflow-hidden flex flex-col h-full group hover:-translate-y-1 hover:shadow-lg transition-all duration-300 bg-white dark:bg-slate-800 rounded-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-0 border-0 ring-1 ring-slate-200 dark:ring-slate-700 overflow-hidden flex flex-col h-full group hover:-translate-y-1 hover:shadow-lg transition-all duration-300 bg-white dark:bg-slate-800 rounded-2xl']); ?>

        
        <div class="p-6 flex-1 bg-gradient-to-br from-sky-100 via-sky-50 to-white dark:from-sky-900/40 dark:via-slate-800 dark:to-slate-800 border-b border-slate-100 dark:border-slate-700 relative overflow-hidden">
            
            <div class="absolute right-0 top-0 text-sky-200 dark:text-sky-900/30 transform -translate-y-1/4 translate-x-1/4 rotate-12 pointer-events-none">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-clock'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-32 h-32']); ?>
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

            <div class="relative z-10">
                <div class="flex items-center gap-2 mb-4">
                    <div class="p-2 bg-white dark:bg-slate-700 rounded-lg shadow-sm text-sky-600 dark:text-sky-400">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-c-clock'); ?>
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
                    <h3 class="text-xs font-bold uppercase text-sky-800/70 dark:text-sky-300/70 tracking-widest">Temps sur Site</h3>
                </div>

                <div class="flex flex-col xl:flex-row justify-between items-end gap-3">
                    
                    <div>
                        <div class="text-[10px] text-sky-700/60 dark:text-sky-400/60 uppercase font-bold mb-1">Médianne globale</div>
                        <div class="text-3xl font-black text-sky-900 dark:text-white leading-none">
                            <?php echo e($this->formatDurationMs($kpis['performance']['visit_duration']['med'] ?? 0)); ?>

                        </div>
                    </div>

                    
                    <div class="flex items-center gap-3 text-right bg-white/50 dark:bg-slate-800/50 p-2 rounded-lg backdrop-blur-sm border border-sky-100/50 dark:border-sky-900/30">
                        <div>
                            <div class="text-[9px] text-sky-700/60 dark:text-sky-400/60 font-bold uppercase">Min.</div>
                            <div class="text-xs font-bold text-sky-800 dark:text-sky-300">
                                <?php echo e($this->formatDurationMs($kpis['performance']['visit_duration']['min'] ?? 0)); ?>

                            </div>
                        </div>
                        <div class="border-l border-sky-200 dark:border-slate-600 pl-3">
                            <div class="text-[9px] text-sky-700/60 dark:text-sky-400/60 font-bold uppercase">Moy.</div>
                            <div class="text-xs font-bold text-sky-800 dark:text-sky-300">
                                <?php echo e($this->formatDurationMs($kpis['performance']['visit_duration']['avg'] ?? 0)); ?>

                            </div>
                        </div>
                        <div class="border-l border-sky-200 dark:border-slate-600 pl-3">
                            <div class="text-[9px] text-sky-700/60 dark:text-sky-400/60 font-bold uppercase">Max.</div>
                            <div class="text-xs font-bold text-sky-800 dark:text-sky-300">
                                <?php echo e($this->formatDurationMs($kpis['performance']['visit_duration']['max'] ?? 0)); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="p-6 flex-1 bg-slate-50/50 dark:bg-slate-800/50 relative overflow-hidden">
            <div class="absolute right-4 top-1/2 text-slate-200 dark:text-slate-700/50 transform -translate-y-1/2 pointer-events-none">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-bolt'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-24 h-24']); ?>
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

            <div class="relative z-10">
                <div class="flex items-center gap-2 mb-4">
                    <div class="p-2 bg-white dark:bg-slate-700 rounded-lg shadow-sm text-slate-500 dark:text-slate-400">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-c-bolt'); ?>
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
                    <h3 class="text-xs font-bold uppercase text-slate-600/70 dark:text-slate-400/70 tracking-widest">Latence Serveur</h3>
                </div>

                <div class="flex flex-col xl:flex-row justify-between items-end gap-3">
                    
                    <div>
                        <div class="text-[10px] text-slate-500/60 dark:text-slate-400/60 uppercase font-bold mb-1">Médianne globale</div>
                        <div class="text-3xl font-black text-slate-800 dark:text-slate-200 leading-none flex items-baseline gap-1">
                            <?php echo e($kpis['performance']['response_time']['med'] ?? 0); ?> <span class="text-lg font-bold text-slate-400">ms</span>
                        </div>
                    </div>

                    
                    <div class="flex items-center gap-3 text-right bg-white dark:bg-slate-700/50 p-2 rounded-lg shadow-sm dark:shadow-none border border-slate-200 dark:border-slate-600">
                        <div>
                            <div class="text-[9px] text-slate-500/60 dark:text-slate-400/60 font-bold uppercase">Min.</div>
                            <div class="text-xs font-bold text-slate-700 dark:text-slate-300">
                                <?php echo e($kpis['performance']['response_time']['min'] ?? 0); ?>

                            </div>
                        </div>
                        <div class="border-l border-slate-200 dark:border-slate-600 pl-3">
                            <div class="text-[9px] text-slate-500/60 dark:text-slate-400/60 font-bold uppercase">Moy.</div>
                            <div class="text-xs font-bold text-slate-700 dark:text-slate-300">
                                <?php echo e($kpis['performance']['response_time']['avg'] ?? 0); ?>

                            </div>
                        </div>
                        <div class="border-l border-slate-200 dark:border-slate-600 pl-3">
                            <div class="text-[9px] text-slate-500/60 dark:text-slate-400/60 font-bold uppercase">Max.</div>
                            <div class="text-xs font-black text-rose-500">
                                <?php echo e($kpis['performance']['response_time']['max'] ?? 0); ?>

                            </div>
                        </div>
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
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/Logs/resources/views/livewire/visit/overview/kpis.blade.php ENDPATH**/ ?>