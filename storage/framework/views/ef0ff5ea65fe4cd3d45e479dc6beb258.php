<div class="space-y-6">

    
    
    
    <?php
        $isFocusMode = !empty($focusType) && !empty($focusId);
    ?>

    <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['class' => 'p-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-4']); ?>
        <div class="flex flex-col xl:flex-row gap-4 justify-between items-stretch xl:items-center">

            
            <div class="flex flex-col sm:flex-row gap-3 w-full xl:w-auto flex-wrap">

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$isFocusMode): ?>
                    <div class="w-full sm:w-64">
                        <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.live.debounce.300ms' => 'search','placeholder' => 'Nom, Email, IP...','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live.debounce.300ms' => 'search','placeholder' => 'Nom, Email, IP...','size' => 'sm']); ?>
                             <?php $__env->slot('leftIcon', null, []); ?> 
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-magnifying-glass'); ?>
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
                             <?php $__env->endSlot(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f)): ?>
<?php $attributes = $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f; ?>
<?php unset($__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald403b78e8b12be0ca768bd08f9c25b1f)): ?>
<?php $component = $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f; ?>
<?php unset($__componentOriginald403b78e8b12be0ca768bd08f9c25b1f); ?>
<?php endif; ?>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <div class="w-full sm:w-44">
                    <?php if (isset($component)) { $__componentOriginal0cb753607d745ad31de5c017a5eb9d5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.select','data' => ['wire:model.live' => 'outcome','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'outcome','size' => 'sm']); ?>
                        <option value="all">Toutes Actions</option>
                        <option value="success">Connexions Réussies</option>
                        <option value="failure">Échecs Connexion</option>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b)): ?>
<?php $attributes = $__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b; ?>
<?php unset($__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0cb753607d745ad31de5c017a5eb9d5b)): ?>
<?php $component = $__componentOriginal0cb753607d745ad31de5c017a5eb9d5b; ?>
<?php unset($__componentOriginal0cb753607d745ad31de5c017a5eb9d5b); ?>
<?php endif; ?>
                </div>

                
                <div x-show="$wire.outcome !== 'failure'" x-cloak class="w-full sm:w-44">
                    <?php if (isset($component)) { $__componentOriginal0cb753607d745ad31de5c017a5eb9d5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.select','data' => ['wire:model.live' => 'sessionStatus','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'sessionStatus','size' => 'sm']); ?>
                        <option value="all">Tout Statut Session</option>
                        <option value="active">Session Active</option>
                        <option value="closed">Déconnecté</option>
                        <option value="expired">Expirée</option>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b)): ?>
<?php $attributes = $__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b; ?>
<?php unset($__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0cb753607d745ad31de5c017a5eb9d5b)): ?>
<?php $component = $__componentOriginal0cb753607d745ad31de5c017a5eb9d5b; ?>
<?php unset($__componentOriginal0cb753607d745ad31de5c017a5eb9d5b); ?>
<?php endif; ?>
                </div>
            </div>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$isFocusMode): ?>
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 w-full xl:w-auto bg-slate-50 dark:bg-slate-900/50 p-1.5 rounded-xl border border-slate-100 dark:border-slate-800">

                    
                    <div x-data="{ show: <?php if ((object) ('period') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('period'->value()); ?>')<?php echo e('period'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('period'); ?>')<?php endif; ?> }" x-show="show === 'custom'" x-transition x-cloak class="flex flex-col sm:flex-row items-center gap-2 w-full sm:w-auto sm:border-r border-slate-200 dark:border-slate-800 sm:pr-2">
                        <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['type' => 'datetime-local','wire:model.blur' => 'start','size' => 'sm','class' => 'w-full sm:w-40']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'datetime-local','wire:model.blur' => 'start','size' => 'sm','class' => 'w-full sm:w-40']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f)): ?>
<?php $attributes = $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f; ?>
<?php unset($__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald403b78e8b12be0ca768bd08f9c25b1f)): ?>
<?php $component = $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f; ?>
<?php unset($__componentOriginald403b78e8b12be0ca768bd08f9c25b1f); ?>
<?php endif; ?>
                        <span class="text-slate-400 hidden sm:inline text-xs"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
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
                        <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['type' => 'datetime-local','wire:model.blur' => 'end','size' => 'sm','class' => 'w-full sm:w-40']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'datetime-local','wire:model.blur' => 'end','size' => 'sm','class' => 'w-full sm:w-40']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f)): ?>
<?php $attributes = $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f; ?>
<?php unset($__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald403b78e8b12be0ca768bd08f9c25b1f)): ?>
<?php $component = $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f; ?>
<?php unset($__componentOriginald403b78e8b12be0ca768bd08f9c25b1f); ?>
<?php endif; ?>
                    </div>

                    <div class="flex-1 sm:flex-none">
                        <?php
                            $periodOptions = [
                                '24h' => '24 Heures',
                                '7d' => '7 Jours',
                                '30d' => '30 Jours',
                                'custom' => 'Custom'
                            ];
                        ?>
                        <?php if (isset($component)) { $__componentOriginal0cb753607d745ad31de5c017a5eb9d5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.select','data' => ['wire:model.live' => 'period','options' => $periodOptions,'size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'period','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($periodOptions),'size' => 'sm']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b)): ?>
<?php $attributes = $__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b; ?>
<?php unset($__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0cb753607d745ad31de5c017a5eb9d5b)): ?>
<?php $component = $__componentOriginal0cb753607d745ad31de5c017a5eb9d5b; ?>
<?php unset($__componentOriginal0cb753607d745ad31de5c017a5eb9d5b); ?>
<?php endif; ?>
                    </div>
                </div>
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

    
    
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($logs->isEmpty()): ?>
        <div class="p-12 text-center bg-white dark:bg-slate-950 rounded-2xl border-2 border-dashed border-slate-200 dark:border-slate-800">
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-document-magnifying-glass'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-12 h-12 mx-auto text-slate-300 dark:text-slate-700 mb-3']); ?>
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
            <span class="text-sm font-bold text-slate-500">Aucun journal trouvé.</span>
        </div>
    <?php else: ?>
        <div class="space-y-4">
            
            <div class="grid grid-cols-1 gap-4 md:hidden">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('logs::livewire.auth.table.partials.card-mobile', ['log' => $log , 'resolver' => $resolver], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div class="hidden md:block">
                <?php if (isset($component)) { $__componentOriginaleef4679219997819b2b191f11d675e58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleef4679219997819b2b191f11d675e58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <thead class="bg-slate-50 dark:bg-slate-900 uppercase text-[10px] font-black tracking-widest text-slate-500 border-b border-slate-100 dark:border-slate-800">
                        <tr>
                            <?php if (isset($component)) { $__componentOriginal009eba386f1e174b9aa8efee17341773 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal009eba386f1e174b9aa8efee17341773 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => ['class' => 'px-6 py-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-6 py-4']); ?>Action <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $attributes = $__attributesOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__attributesOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $component = $__componentOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__componentOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal009eba386f1e174b9aa8efee17341773 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal009eba386f1e174b9aa8efee17341773 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => ['class' => 'px-6 py-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-6 py-4']); ?>Utilisateur <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $attributes = $__attributesOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__attributesOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $component = $__componentOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__componentOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal009eba386f1e174b9aa8efee17341773 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal009eba386f1e174b9aa8efee17341773 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => ['class' => 'px-6 py-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-6 py-4']); ?>Localisation <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $attributes = $__attributesOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__attributesOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $component = $__componentOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__componentOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal009eba386f1e174b9aa8efee17341773 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal009eba386f1e174b9aa8efee17341773 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => ['class' => 'px-6 py-4 text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-6 py-4 text-center']); ?>État Session <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $attributes = $__attributesOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__attributesOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $component = $__componentOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__componentOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal009eba386f1e174b9aa8efee17341773 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal009eba386f1e174b9aa8efee17341773 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => ['class' => 'px-6 py-4 text-right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-6 py-4 text-right']); ?>Date <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $attributes = $__attributesOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__attributesOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $component = $__componentOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__componentOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal009eba386f1e174b9aa8efee17341773 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal009eba386f1e174b9aa8efee17341773 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => ['class' => 'px-4 py-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-4 py-4']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $attributes = $__attributesOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__attributesOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $component = $__componentOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__componentOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800/50">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('logs::livewire.auth.table.partials.row-desktop', ['log' => $log  , 'resolver' => $resolver], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleef4679219997819b2b191f11d675e58)): ?>
<?php $attributes = $__attributesOriginaleef4679219997819b2b191f11d675e58; ?>
<?php unset($__attributesOriginaleef4679219997819b2b191f11d675e58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleef4679219997819b2b191f11d675e58)): ?>
<?php $component = $__componentOriginaleef4679219997819b2b191f11d675e58; ?>
<?php unset($__componentOriginaleef4679219997819b2b191f11d675e58); ?>
<?php endif; ?>
            </div>

            <div class="mt-4"><?php echo e($logs->links()); ?></div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/Logs/resources/views/livewire/auth/table/auth-log-list.blade.php ENDPATH**/ ?>