<div class="p-4 md:p-8 bg-slate-50 min-h-screen dark:bg-slate-950 dark:text-slate-100 transition-colors duration-300">

    <div class="max-w-7xl mx-auto space-y-8">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">FAQ Manager</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-1">Organisez et gérez vos réponses pour un support client optimal.</p>
            </div>
            <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['wire:click' => '$dispatch(\'open-create-faq\')','class' => 'w-full md:w-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$dispatch(\'open-create-faq\')','class' => 'w-full md:w-auto']); ?>
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                Ajouter une FAQ
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333)): ?>
<?php $attributes = $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333; ?>
<?php unset($__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal580e1af29f3b65fbd4f30017fc1d1333)): ?>
<?php $component = $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333; ?>
<?php unset($__componentOriginal580e1af29f3b65fbd4f30017fc1d1333); ?>
<?php endif; ?>
        </div>

        
        <div class="grid grid-cols-1 gap-4 md:hidden">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['wire:key' => 'mobile-faq-'.e($faq->id).'','noPadding' => true,'class' => 'overflow-hidden border-l-4 '.e($faq->is_published ? 'border-l-success' : 'border-l-danger').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => 'mobile-faq-'.e($faq->id).'','noPadding' => true,'class' => 'overflow-hidden border-l-4 '.e($faq->is_published ? 'border-l-success' : 'border-l-danger').'']); ?>
                    <div x-data="{ open: false }">
                        <div class="p-4 cursor-pointer flex justify-between items-start gap-4" @click="open = !open">
                            <div class="flex-1">
                                <h3 class="font-bold text-slate-900 dark:text-white text-base leading-tight"><?php echo e($faq->question); ?></h3>
                                <div class="mt-2 flex items-center gap-2">
                                    <?php if (isset($component)) { $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.badge','data' => ['size' => 'sm','variant' => ''.e($faq->is_published ? 'success' : 'danger').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm','variant' => ''.e($faq->is_published ? 'success' : 'danger').'']); ?>
                                        <?php echo e($faq->is_published ? 'Publié' : 'Brouillon'); ?>

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
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Ordre: <?php echo e($faq->order); ?></span>
                                </div>
                            </div>
                            <svg :class="open ? 'rotate-180' : ''" class="w-5 h-5 text-slate-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>

                        <div x-show="open" x-collapse x-cloak>
                            <div class="px-4 pb-4 border-t border-slate-100 dark:border-slate-800 pt-4">
                                <div class="prose prose-sm dark:prose-invert text-slate-600 dark:text-slate-300 max-w-none mb-4">
                                    <?php echo $faq->answer; ?>

                                </div>
                                <div class="flex items-center gap-4 pt-4 border-t border-dashed border-slate-100 dark:border-slate-800">
                                    <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['size' => 'xs','variant' => 'ghost','class' => 'flex-1','wire:click' => '$dispatch(\'open-edit-faq\', { faqId: '.e($faq->id).' })']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','variant' => 'ghost','class' => 'flex-1','wire:click' => '$dispatch(\'open-edit-faq\', { faqId: '.e($faq->id).' })']); ?>
                                        Éditer
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333)): ?>
<?php $attributes = $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333; ?>
<?php unset($__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal580e1af29f3b65fbd4f30017fc1d1333)): ?>
<?php $component = $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333; ?>
<?php unset($__componentOriginal580e1af29f3b65fbd4f30017fc1d1333); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['size' => 'xs','variant' => 'ghost','class' => 'flex-1 text-danger','@click.stop' => '$dispatch(\'request-passcode-verification\', {
                                            component: \''.e($this->getName()).'\',
                                            action: \'execute-delete-faq\',
                                            params: { faqId: '.e($faq->id).' },
                                            guard: \'admin\'
                                        })']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','variant' => 'ghost','class' => 'flex-1 text-danger','@click.stop' => '$dispatch(\'request-passcode-verification\', {
                                            component: \''.e($this->getName()).'\',
                                            action: \'execute-delete-faq\',
                                            params: { faqId: '.e($faq->id).' },
                                            guard: \'admin\'
                                        })']); ?>
                                        Supprimer
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333)): ?>
<?php $attributes = $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333; ?>
<?php unset($__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal580e1af29f3b65fbd4f30017fc1d1333)): ?>
<?php $component = $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333; ?>
<?php unset($__componentOriginal580e1af29f3b65fbd4f30017fc1d1333); ?>
<?php endif; ?>
                                </div>
                                <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['size' => 'sm','variant' => 'secondary','outline' => true,'class' => 'w-full mt-3','@click.stop' => '$dispatch(\'request-passcode-verification\', {
                                        component: \''.e($this->getName()).'\',
                                        action: \'execute-toggle-faq-status\',
                                        params: { faqId: '.e($faq->id).' },
                                        guard: \'admin\'
                                    })']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm','variant' => 'secondary','outline' => true,'class' => 'w-full mt-3','@click.stop' => '$dispatch(\'request-passcode-verification\', {
                                        component: \''.e($this->getName()).'\',
                                        action: \'execute-toggle-faq-status\',
                                        params: { faqId: '.e($faq->id).' },
                                        guard: \'admin\'
                                    })']); ?>
                                    <?php echo e($faq->is_published ? 'Passer en Brouillon' : 'Publier'); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333)): ?>
<?php $attributes = $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333; ?>
<?php unset($__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal580e1af29f3b65fbd4f30017fc1d1333)): ?>
<?php $component = $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333; ?>
<?php unset($__componentOriginal580e1af29f3b65fbd4f30017fc1d1333); ?>
<?php endif; ?>
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
                <div class="py-12 text-center text-slate-500 bg-white dark:bg-slate-900 rounded-2xl border border-dashed border-slate-200 dark:border-slate-800">
                    Aucune FAQ trouvée.
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                <thead>
                    <?php if (isset($component)) { $__componentOriginal4d5960b9e7069b75153ebf06871577b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d5960b9e7069b75153ebf06871577b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.row','data' => ['class' => 'bg-slate-50/50 dark:bg-slate-900/50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-slate-50/50 dark:bg-slate-900/50']); ?>
                        <?php if (isset($component)) { $__componentOriginal009eba386f1e174b9aa8efee17341773 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal009eba386f1e174b9aa8efee17341773 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Question <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => ['align' => 'center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'center']); ?>Ordre <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => ['align' => 'center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'center']); ?>Statut <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => ['align' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right']); ?>Actions <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $attributes = $__attributesOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__attributesOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $component = $__componentOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__componentOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d5960b9e7069b75153ebf06871577b9)): ?>
<?php $attributes = $__attributesOriginal4d5960b9e7069b75153ebf06871577b9; ?>
<?php unset($__attributesOriginal4d5960b9e7069b75153ebf06871577b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d5960b9e7069b75153ebf06871577b9)): ?>
<?php $component = $__componentOriginal4d5960b9e7069b75153ebf06871577b9; ?>
<?php unset($__componentOriginal4d5960b9e7069b75153ebf06871577b9); ?>
<?php endif; ?>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if (isset($component)) { $__componentOriginal4d5960b9e7069b75153ebf06871577b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d5960b9e7069b75153ebf06871577b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.row','data' => ['class' => 'hover:bg-slate-50/50 dark:hover:bg-slate-900/50 transition-colors']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hover:bg-slate-50/50 dark:hover:bg-slate-900/50 transition-colors']); ?>
                            <?php if (isset($component)) { $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.td','data' => ['class' => 'max-w-md']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-md']); ?>
                                <div class="font-bold text-slate-900 dark:text-white truncate" title="<?php echo e($faq->question); ?>">
                                    <?php echo e($faq->question); ?>

                                </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $attributes = $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $component = $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.td','data' => ['align' => 'center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'center']); ?>
                                <span class="font-mono font-black text-xs text-primary bg-primary/5 px-2 py-1 rounded">
                                    <?php echo e($faq->order); ?>

                                </span>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $attributes = $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $component = $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.td','data' => ['align' => 'center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'center']); ?>
                                <button
                                    @click.stop="$dispatch('request-passcode-verification', {
                                        component: '<?php echo e($this->getName()); ?>',
                                        action: 'execute-toggle-faq-status',
                                        params: { faqId: <?php echo e($faq->id); ?> },
                                        guard: 'admin'
                                    })"
                                    class="transition-transform active:scale-95"
                                >
                                    <?php if (isset($component)) { $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.badge','data' => ['variant' => ''.e($faq->is_published ? 'success' : 'danger').'','class' => 'cursor-pointer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => ''.e($faq->is_published ? 'success' : 'danger').'','class' => 'cursor-pointer']); ?>
                                        <?php echo e($faq->is_published ? 'Publié' : 'Brouillon'); ?>

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
                                </button>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $attributes = $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $component = $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.td','data' => ['align' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right']); ?>
                                <div class="flex justify-end gap-2">
                                    <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['size' => 'xs','variant' => 'ghost','wire:click.stop' => '$dispatch(\'open-edit-faq\', { faqId: '.e($faq->id).' })']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','variant' => 'ghost','wire:click.stop' => '$dispatch(\'open-edit-faq\', { faqId: '.e($faq->id).' })']); ?>
                                        Éditer
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333)): ?>
<?php $attributes = $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333; ?>
<?php unset($__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal580e1af29f3b65fbd4f30017fc1d1333)): ?>
<?php $component = $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333; ?>
<?php unset($__componentOriginal580e1af29f3b65fbd4f30017fc1d1333); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['size' => 'xs','variant' => 'ghost','class' => 'text-danger','wire:click.stop' => '$dispatch(\'request-passcode-verification\', {
                                            component: \''.e($this->getName()).'\',
                                            action: \'execute-delete-faq\',
                                            params: { faqId: '.e($faq->id).' },
                                            guard: \'admin\'
                                        })']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','variant' => 'ghost','class' => 'text-danger','wire:click.stop' => '$dispatch(\'request-passcode-verification\', {
                                            component: \''.e($this->getName()).'\',
                                            action: \'execute-delete-faq\',
                                            params: { faqId: '.e($faq->id).' },
                                            guard: \'admin\'
                                        })']); ?>
                                        Supprimer
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333)): ?>
<?php $attributes = $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333; ?>
<?php unset($__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal580e1af29f3b65fbd4f30017fc1d1333)): ?>
<?php $component = $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333; ?>
<?php unset($__componentOriginal580e1af29f3b65fbd4f30017fc1d1333); ?>
<?php endif; ?>
                                </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $attributes = $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $component = $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d5960b9e7069b75153ebf06871577b9)): ?>
<?php $attributes = $__attributesOriginal4d5960b9e7069b75153ebf06871577b9; ?>
<?php unset($__attributesOriginal4d5960b9e7069b75153ebf06871577b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d5960b9e7069b75153ebf06871577b9)): ?>
<?php $component = $__componentOriginal4d5960b9e7069b75153ebf06871577b9; ?>
<?php unset($__componentOriginal4d5960b9e7069b75153ebf06871577b9); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php if (isset($component)) { $__componentOriginal4d5960b9e7069b75153ebf06871577b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d5960b9e7069b75153ebf06871577b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.row','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php if (isset($component)) { $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.td','data' => ['colspan' => '4','align' => 'center','class' => 'py-20']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['colspan' => '4','align' => 'center','class' => 'py-20']); ?>
                                <div class="text-slate-400">
                                    <svg class="w-16 h-16 mx-auto mb-4 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-lg font-bold text-slate-700 dark:text-slate-300">Aucune FAQ trouvée</p>
                                </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $attributes = $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $component = $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d5960b9e7069b75153ebf06871577b9)): ?>
<?php $attributes = $__attributesOriginal4d5960b9e7069b75153ebf06871577b9; ?>
<?php unset($__attributesOriginal4d5960b9e7069b75153ebf06871577b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d5960b9e7069b75153ebf06871577b9)): ?>
<?php $component = $__componentOriginal4d5960b9e7069b75153ebf06871577b9; ?>
<?php unset($__componentOriginal4d5960b9e7069b75153ebf06871577b9); ?>
<?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($faqs->hasPages()): ?>
            <div class="mt-8">
                <?php echo e($faqs->links()); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/ContactEtNewsletter/resources/views/livewire/admin/faq-manager/list-faqs.blade.php ENDPATH**/ ?>