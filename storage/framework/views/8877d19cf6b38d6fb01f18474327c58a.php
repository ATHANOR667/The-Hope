<div
    x-data="{
        createFormOpen: false,
        selectedRoleId: <?php if ((object) ('selectedRoleId') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selectedRoleId'->value()); ?>')<?php echo e('selectedRoleId'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selectedRoleId'); ?>')<?php endif; ?>.live,
        rolePermissions: <?php if ((object) ('rolePermissions') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('rolePermissions'->value()); ?>')<?php echo e('rolePermissions'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('rolePermissions'); ?>')<?php endif; ?>.live,

        isPermissionsModified: false,
        initialPermissions: [],

        checkIfModified() {
            if (! Array.isArray(this.rolePermissions)) {
                this.isPermissionsModified = false;
                return;
            }
            const current = new Set(this.rolePermissions.map(id => parseInt(id)));
            const initial = new Set(this.initialPermissions.map(id => parseInt(id)));

            if (current.size !== initial.size) {
                this.isPermissionsModified = true;
                return;
            }
            this.isPermissionsModified = ![...initial].every(id => current.has(id));
        },

        updateInitialState() {
            this.initialPermissions = [...this.rolePermissions];
            this.isPermissionsModified = false;
        },

        init() {
            this.updateInitialState();
            this.$watch('rolePermissions', () => this.checkIfModified());
            Livewire.on('roleSelected', () => this.updateInitialState());
            Livewire.on('dataUpdate', () => this.updateInitialState());
            Livewire.on('roleDeselected', () => {
                this.initialPermissions = [];
                this.isPermissionsModified = false;
            });
        }
    }"
    class="space-y-8"
>

    
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-slate-200 dark:border-slate-700">
        <?php if (isset($component)) { $__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.heading','data' => ['as' => 'h1','size' => 'xl','subtitle' => 'Guard actif : ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'h1','size' => 'xl','subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Guard actif : ')]); ?>
            Gestion des Accès
            <?php if (isset($component)) { $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.badge','data' => ['variant' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'primary']); ?><?php echo e($guardName); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb)): ?>
<?php $attributes = $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb; ?>
<?php unset($__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalafe60356fc24a1df475a40bac4ca6eeb)): ?>
<?php $component = $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb; ?>
<?php unset($__componentOriginalafe60356fc24a1df475a40bac4ca6eeb); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3)): ?>
<?php $attributes = $__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3; ?>
<?php unset($__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3)): ?>
<?php $component = $__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3; ?>
<?php unset($__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3); ?>
<?php endif; ?>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

        
        <div class="lg:col-span-1 space-y-6">

            
            <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="flex items-center justify-between mb-4">
                    <?php if (isset($component)) { $__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.heading','data' => ['size' => 'md']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'md']); ?>Rôles <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3)): ?>
<?php $attributes = $__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3; ?>
<?php unset($__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3)): ?>
<?php $component = $__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3; ?>
<?php unset($__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['variant' => 'ghost','size' => 'icon','@click' => 'createFormOpen = !createFormOpen']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'ghost','size' => 'icon','@click' => 'createFormOpen = !createFormOpen']); ?>
                        <svg x-show="!createFormOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        <svg x-show="createFormOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
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

                <div x-show="createFormOpen" x-collapse class="mb-4 space-y-3">
                    <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['name' => 'newRoleName','placeholder' => 'Nom (ex: éditeur)','wire:model.live.debounce.300ms' => 'newRoleName','wire:keydown.enter' => 'createRole']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'newRoleName','placeholder' => 'Nom (ex: éditeur)','wire:model.live.debounce.300ms' => 'newRoleName','wire:keydown.enter' => 'createRole']); ?>
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

                    <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['wire:click' => 'createRole','class' => 'w-full justify-center','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'createRole','class' => 'w-full justify-center','size' => 'sm']); ?>
                        Ajouter
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

                <div class="space-y-2 max-h-[500px] overflow-y-auto pr-1 custom-scrollbar">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $isProtected = in_array($role->name, ['super-admin', 'admin']);
                            $isSelected = $selectedRoleId == $role->id;
                        ?>

                        <div
                            wire:click="selectRole(<?php echo e($role->id); ?>)"
                            class="group flex items-center justify-between p-3 rounded-xl cursor-pointer transition-all border
                            <?php echo e($isSelected
                                ? 'bg-primary text-white border-primary shadow-md'
                                : 'bg-slate-50 dark:bg-slate-900/50 border-slate-100 dark:border-slate-800 text-slate-700 dark:text-slate-300 hover:border-primary/30 hover:shadow-sm'); ?>"
                        >
                            <span class="font-medium truncate"><?php echo e(ucfirst($role->name)); ?></span>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (! ($isProtected)): ?>
                                <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['variant' => 'ghost','size' => 'icon','wire:click.stop' => 'deleteRole('.e($role->id).')','class' => ''.e($isSelected ? 'text-white hover:bg-white/20' : 'text-slate-400 hover:text-danger hover:bg-danger-50').' opacity-0 group-hover:opacity-100 transition-opacity']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'ghost','size' => 'icon','wire:click.stop' => 'deleteRole('.e($role->id).')','class' => ''.e($isSelected ? 'text-white hover:bg-white/20' : 'text-slate-400 hover:text-danger hover:bg-danger-50').' opacity-0 group-hover:opacity-100 transition-opacity']); ?>
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
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
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-center py-4 text-sm text-slate-400 italic">Aucun rôle</div>
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
        </div>

        
        <div class="lg:col-span-3">

            
            <div x-show="selectedRoleId === null" class="h-full flex flex-col items-center justify-center p-12 text-center border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-3xl bg-slate-50/50 dark:bg-slate-800/30">
                <div class="w-16 h-16 bg-slate-100 dark:bg-slate-700 rounded-full flex items-center justify-center text-slate-400 mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path></svg>
                </div>
                <h3 class="text-lg font-medium text-slate-900 dark:text-white">Sélectionnez un rôle</h3>
                <p class="text-slate-500">Choisissez un rôle dans la liste de gauche pour configurer ses permissions.</p>
            </div>

            
            <div x-show="selectedRoleId" x-transition class="space-y-6">

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedRole): ?>
                    <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100 dark:border-slate-700">
                            <?php if (isset($component)) { $__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.heading','data' => ['size' => 'lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'lg']); ?>
                                <span class="text-primary"><?php echo e(ucfirst($selectedRole->name)); ?></span>
                                <span class="text-slate-400 text-sm font-normal">— Configuration</span>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3)): ?>
<?php $attributes = $__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3; ?>
<?php unset($__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3)): ?>
<?php $component = $__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3; ?>
<?php unset($__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3); ?>
<?php endif; ?>

                            
                            <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['wire:click' => 'updateRolePermissions','wire:loading.attr' => 'disabled','variant' => 'success','xBind:disabled' => '!isPermissionsModified','class' => 'shadow-md']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'updateRolePermissions','wire:loading.attr' => 'disabled','variant' => 'success','x-bind:disabled' => '!isPermissionsModified','class' => 'shadow-md']); ?>
                                <span x-show="!isPermissionsModified">À jour</span>
                                <span x-show="isPermissionsModified">Sauvegarder</span>
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

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $this->groupedPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie => $permissionsOfCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div x-data="{ open: true }" class="border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden">

                                    
                                    <button @click="open = !open" class="w-full flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-900 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                                        <span class="font-bold text-sm uppercase tracking-wider text-slate-600 dark:text-slate-400">
                                            <?php echo e(str_replace('_', ' ', $categorie ?: 'Divers')); ?>

                                        </span>
                                        <span class="bg-white dark:bg-slate-950 text-xs font-mono px-2 py-1 rounded border border-slate-200 dark:border-slate-800">
                                            <?php echo e($permissionsOfCategory->count()); ?>

                                        </span>
                                    </button>

                                    
                                    <div x-show="open" x-collapse class="p-4 bg-white dark:bg-slate-900/50 space-y-3">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $permissionsOfCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if (isset($component)) { $__componentOriginalc3128ae6082e5ed9aade2c1e89834076 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc3128ae6082e5ed9aade2c1e89834076 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.checkbox','data' => ['wire:model.live' => 'rolePermissions','value' => $permission->id,'label' => $permission->name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'rolePermissions','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($permission->id),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($permission->name)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc3128ae6082e5ed9aade2c1e89834076)): ?>
<?php $attributes = $__attributesOriginalc3128ae6082e5ed9aade2c1e89834076; ?>
<?php unset($__attributesOriginalc3128ae6082e5ed9aade2c1e89834076); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3128ae6082e5ed9aade2c1e89834076)): ?>
<?php $component = $__componentOriginalc3128ae6082e5ed9aade2c1e89834076; ?>
<?php unset($__componentOriginalc3128ae6082e5ed9aade2c1e89834076); ?>
<?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="col-span-full text-center text-slate-400 py-8">Aucune permission disponible.</p>
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
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

        </div>
    </div>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/AdminBase/resources/views/livewire/gestion-roles/manage-roles-permissions.blade.php ENDPATH**/ ?>