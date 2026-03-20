<div class="space-y-8">

    
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between border-b border-slate-200 dark:border-slate-700 pb-6 gap-4">
        <?php if (isset($component)) { $__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.heading','data' => ['as' => 'h1','size' => 'xl','subtitle' => 'Guard : ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'h1','size' => 'xl','subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Guard : ')]); ?>
            Statistiques des Accès
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

    
    <div class="space-y-6">
        <?php if (isset($component)) { $__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.heading','data' => ['size' => 'md']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'md']); ?>
            <div class="flex items-center gap-2">
                <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.617 7.243a4.004 4.004 0 00-7.368-2.189l-.27-.47a8.008 8.008 0 00-6.103-12.008l-.208-.008A8.012 8.012 0 004 20h.01"></path></svg>
                Permissions par Rôle
            </div>
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

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(empty($permissionRoleCounts)): ?>
            <?php if (isset($component)) { $__componentOriginal75091716ca600b9389447f9cdeedbdbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75091716ca600b9389447f9cdeedbdbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.alert','data' => ['type' => 'info']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info']); ?>
                Aucune statistique disponible. Créez des permissions et attachez-les à des rôles.
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal75091716ca600b9389447f9cdeedbdbb)): ?>
<?php $attributes = $__attributesOriginal75091716ca600b9389447f9cdeedbdbb; ?>
<?php unset($__attributesOriginal75091716ca600b9389447f9cdeedbdbb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal75091716ca600b9389447f9cdeedbdbb)): ?>
<?php $component = $__componentOriginal75091716ca600b9389447f9cdeedbdbb; ?>
<?php unset($__componentOriginal75091716ca600b9389447f9cdeedbdbb); ?>
<?php endif; ?>
        <?php else: ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $this->permissionsGroupedByCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $permissionsInGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div x-data="{ open: false }" class="bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm">
                    
                    <div @click="open = !open" class="p-4 flex items-center justify-between cursor-pointer hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-slate-800 dark:text-white capitalize">
                                <?php echo e(str_replace('_', ' ', $category ?: 'Général')); ?>

                            </span>
                            <span class="text-xs font-medium bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 px-2 py-0.5 rounded-full text-slate-500">
                                <?php echo e(count($permissionsInGroup)); ?> perms
                            </span>
                        </div>
                        <svg class="w-5 h-5 text-slate-400 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>

                    
                    <div x-show="open" x-collapse style="display: none;" class="p-4 border-t border-slate-200 dark:border-slate-700 bg-white/50 dark:bg-slate-900/30">
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $permissionsInGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $percentage = $allRolesCount > 0 ? round(($permission['count'] / $allRolesCount) * 100) : 0;
                                ?>

                                <div class="bg-white dark:bg-slate-950 p-4 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition-shadow">
                                    <h6 class="font-bold text-sm text-slate-900 dark:text-white mb-2 truncate" title="<?php echo e($permission['name']); ?>">
                                        <?php echo e($permission['name']); ?>

                                    </h6>

                                    
                                    <div class="mb-3">
                                        <div class="flex justify-between text-[10px] uppercase tracking-wider font-bold text-slate-400 mb-1">
                                            <span>Attribution</span>
                                            <span class="text-primary"><?php echo e($percentage); ?>%</span>
                                        </div>
                                        <?php if (isset($component)) { $__componentOriginal2b1550f64adc23dac2e5397534ea0ded = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2b1550f64adc23dac2e5397534ea0ded = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.progress-bar','data' => ['value' => $permission['count'],'max' => $allRolesCount,'class' => 'h-1.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::progress-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($permission['count']),'max' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($allRolesCount),'class' => 'h-1.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2b1550f64adc23dac2e5397534ea0ded)): ?>
<?php $attributes = $__attributesOriginal2b1550f64adc23dac2e5397534ea0ded; ?>
<?php unset($__attributesOriginal2b1550f64adc23dac2e5397534ea0ded); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2b1550f64adc23dac2e5397534ea0ded)): ?>
<?php $component = $__componentOriginal2b1550f64adc23dac2e5397534ea0ded; ?>
<?php unset($__componentOriginal2b1550f64adc23dac2e5397534ea0ded); ?>
<?php endif; ?>
                                    </div>

                                    
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($permission['count'] > 0): ?>
                                        <div x-data="{ rolesOpen: false }">
                                            <button @click="rolesOpen = !rolesOpen" class="text-xs text-slate-500 hover:text-primary flex items-center gap-1 w-full text-left">
                                                <span>Voir les <?php echo e($permission['count']); ?> rôles</span>
                                                <svg class="w-3 h-3 transition-transform" :class="{'rotate-90': rolesOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>

                                            <ul x-show="rolesOpen" style="display: none;" class="mt-2 space-y-1 pl-2 border-l-2 border-slate-100 dark:border-slate-700">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $permission['roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roleName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="text-xs text-slate-600 dark:text-slate-400 truncate">• <?php echo e($roleName); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </ul>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-xs text-slate-400 italic">Non attribuée</span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <div x-data="{ open: false }" class="border-t border-slate-200 dark:border-slate-700 pt-8">

        <button @click="open = !open" class="w-full flex items-center justify-between group">
            <?php if (isset($component)) { $__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.heading','data' => ['size' => 'md']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'md']); ?>
                <div class="flex items-center gap-2 group-hover:text-primary transition-colors">
                    <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20h-5.022m0-13-2.5 5.5m0 0a3.1 3.1 0 01-2.984 2.5H6.5a3.1 3.1 0 01-3.08-2.5m10.584 2.5a3.1 3.1 0 002.984-2.5H18.5a3.1 3.1 0 003.08-2.5H20M12 12a3 3 0 100-6 3 3 0 000 6z"></path></svg>
                    Répartition des Utilisateurs
                </div>
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
            <svg class="w-5 h-5 text-slate-400 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>

        <div x-show="open" x-collapse style="display: none;" class="mt-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(empty($roleUserCounts)): ?>
                <?php if (isset($component)) { $__componentOriginal75091716ca600b9389447f9cdeedbdbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75091716ca600b9389447f9cdeedbdbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.alert','data' => ['type' => 'info']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info']); ?>Aucune donnée utilisateur disponible. <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal75091716ca600b9389447f9cdeedbdbb)): ?>
<?php $attributes = $__attributesOriginal75091716ca600b9389447f9cdeedbdbb; ?>
<?php unset($__attributesOriginal75091716ca600b9389447f9cdeedbdbb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal75091716ca600b9389447f9cdeedbdbb)): ?>
<?php $component = $__componentOriginal75091716ca600b9389447f9cdeedbdbb; ?>
<?php unset($__componentOriginal75091716ca600b9389447f9cdeedbdbb); ?>
<?php endif; ?>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php
                        try { $totalUsers = app($userModelClass)::count(); } catch (\Exception $e) { $totalUsers = 0; }
                    ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $roleUserCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roleId => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['variant' => 'hover','xData' => '{ details: false }','class' => 'p-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'hover','x-data' => '{ details: false }','class' => 'p-5']); ?>

                            
                            <div class="flex justify-between items-start mb-4">
                                <h5 class="font-bold text-slate-800 dark:text-white"><?php echo e($data['name']); ?></h5>
                                <span class="bg-slate-100 dark:bg-slate-900 text-xs font-mono px-2 py-1 rounded text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-800">
                                    <?php echo e($data['count']); ?>

                                </span>
                            </div>

                            
                            <div class="mb-4">
                                <?php $userPercent = $totalUsers > 0 ? round(($data['count'] / $totalUsers) * 100) : 0; ?>
                                <div class="flex justify-between text-[10px] uppercase tracking-wider font-bold text-slate-400 mb-1">
                                    <span>Taux</span>
                                    <span><?php echo e($userPercent); ?>%</span>
                                </div>
                                <?php if (isset($component)) { $__componentOriginal2b1550f64adc23dac2e5397534ea0ded = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2b1550f64adc23dac2e5397534ea0ded = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.progress-bar','data' => ['value' => $data['count'],'max' => $totalUsers,'color' => 'success','class' => 'h-1.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::progress-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['count']),'max' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($totalUsers),'color' => 'success','class' => 'h-1.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2b1550f64adc23dac2e5397534ea0ded)): ?>
<?php $attributes = $__attributesOriginal2b1550f64adc23dac2e5397534ea0ded; ?>
<?php unset($__attributesOriginal2b1550f64adc23dac2e5397534ea0ded); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2b1550f64adc23dac2e5397534ea0ded)): ?>
<?php $component = $__componentOriginal2b1550f64adc23dac2e5397534ea0ded; ?>
<?php unset($__componentOriginal2b1550f64adc23dac2e5397534ea0ded); ?>
<?php endif; ?>
                            </div>

                            
                            <button @click="details = !details" class="text-xs text-primary hover:text-primary-hover font-medium flex items-center gap-1">
                                <span x-text="details ? 'Masquer détails' : 'Voir détails'"></span>
                                <svg class="w-3 h-3 transition-transform" :class="{'rotate-180': details}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>

                            
                            <div x-show="details" style="display: none;" class="mt-3 pt-3 border-t border-slate-100 dark:border-slate-700 text-xs space-y-3">
                                <div>
                                    <span class="font-bold text-slate-600 dark:text-slate-400 block mb-1">Utilisateurs :</span>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($data['users']) > 0): ?>
                                        <ul class="list-disc list-inside text-slate-500 space-y-0.5">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $data['users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="truncate"><?php echo e($user); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </ul>
                                    <?php else: ?>
                                        <span class="italic text-slate-400">Aucun</span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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

</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/AdminBase/resources/views/livewire/gestion-roles/permission-stats.blade.php ENDPATH**/ ?>