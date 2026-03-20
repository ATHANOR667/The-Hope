<div>
    <?php if (isset($component)) { $__componentOriginalb1bb066c727747b1a857cded569d24b7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb1bb066c727747b1a857cded569d24b7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.modal','data' => ['wire:model' => 'showModal','maxWidth' => '5xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'showModal','maxWidth' => '5xl']); ?>

        
         <?php $__env->slot('title', null, []); ?> 
            <div class="flex items-center gap-3">
                <div class="p-2 bg-primary/10 rounded-lg">
                    <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9.973 9.973 0 0112 15c1.444 0 2.813.386 4.024 1.054M15 11a3 3 0 11-6 0 3 3 0 016 0zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <span class="text-xl font-bold text-slate-800 dark:text-white">
                    <?php echo e($admin ? 'Profil de ' . $admin->prenom . ' ' . $admin->nom : 'Chargement...'); ?>

                </span>
            </div>
         <?php $__env->endSlot(); ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($admin): ?>
            <form wire:submit.prevent="updateAdmin" class="space-y-8">

                
                <div class="space-y-4">
                    <div class="flex items-center gap-2 pb-2 border-b border-slate-100 dark:border-slate-700">
                        <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Détails Personnels</h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                        <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['label' => 'Nom','name' => 'nom','wire:model.defer' => 'nom','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Nom','name' => 'nom','wire:model.defer' => 'nom','required' => true]); ?>
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
                        <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['label' => 'Prénom','name' => 'prenom','wire:model.defer' => 'prenom','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Prénom','name' => 'prenom','wire:model.defer' => 'prenom','required' => true]); ?>
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
                        <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['label' => 'Email','name' => 'email','type' => 'email','wire:model.defer' => 'email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Email','name' => 'email','type' => 'email','wire:model.defer' => 'email']); ?>
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
                        <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['label' => 'Téléphone','name' => 'telephone','type' => 'tel','wire:model.defer' => 'telephone']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Téléphone','name' => 'telephone','type' => 'tel','wire:model.defer' => 'telephone']); ?>
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
                        <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['label' => 'Pays','name' => 'pays','wire:model.defer' => 'pays']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Pays','name' => 'pays','wire:model.defer' => 'pays']); ?>
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
                        <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['label' => 'Ville','name' => 'ville','wire:model.defer' => 'ville']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Ville','name' => 'ville','wire:model.defer' => 'ville']); ?>
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
                </div>

                
                <div class="space-y-4">
                    <div class="flex items-center gap-2 pb-2 border-b border-slate-100 dark:border-slate-700">
                        <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Sécurité</h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-slate-50 dark:bg-slate-800/50 p-3 rounded-lg border border-slate-200 dark:border-slate-700">
                            <span class="text-xs text-slate-400 block uppercase">Mot de passe</span>
                            <span class="font-mono text-sm font-semibold text-slate-700 dark:text-slate-200">
                                <?php echo e($admin->password ? '••••••••' : 'Non défini'); ?>

                            </span>
                            <span class="text-xs text-slate-400 block mt-1">
                                Modifié : <?php echo e($admin->password_changed_at ? $admin->password_changed_at->format('d/m/Y') : '-'); ?>

                            </span>
                        </div>

                        <div class="bg-slate-50 dark:bg-slate-800/50 p-3 rounded-lg border border-slate-200 dark:border-slate-700">
                            <span class="text-xs text-slate-400 block uppercase">Passcode</span>
                            <span class="font-mono text-sm font-semibold text-slate-700 dark:text-slate-200">
                                <?php echo e($admin->passcode ? '••••' : 'Non défini'); ?>

                            </span>
                            <span class="text-xs text-slate-400 block mt-1">
                                Reset : <?php echo e($admin->passcode_reset_date ? $admin->passcode_reset_date->format('d/m/Y') : '-'); ?>

                            </span>
                        </div>
                    </div>
                </div>

                
                <div class="space-y-4">
                    <div class="flex items-center gap-2 pb-2 border-b border-slate-100 dark:border-slate-700">
                        <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Documents & Identité</h4>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                        
                        <div class="bg-white dark:bg-slate-800 p-4 rounded-xl border border-slate-200 dark:border-slate-700">
                            <?php if (isset($component)) { $__componentOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.media-uploader','data' => ['label' => 'Photo de Profil','fileWire' => 'newPhotoProfil','previewUrl' => $admin->photoProfil ? asset('storage/' . $admin->photoProfil) : null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::media-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Photo de Profil','file-wire' => 'newPhotoProfil','preview-url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($admin->photoProfil ? asset('storage/' . $admin->photoProfil) : null)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7)): ?>
<?php $attributes = $__attributesOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7; ?>
<?php unset($__attributesOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7)): ?>
<?php $component = $__componentOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7; ?>
<?php unset($__componentOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7); ?>
<?php endif; ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($admin->photoProfil): ?>
                                <div class="mt-3">
                                    <label class="inline-flex items-center text-xs text-danger cursor-pointer hover:text-danger-700 transition-colors">
                                        <input type="checkbox" wire:model.defer="deletePhotoProfil" class="form-checkbox h-3 w-3 text-danger border-slate-300 rounded focus:ring-danger">
                                        <span class="ml-2 font-medium">Supprimer la photo actuelle</span>
                                    </label>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div class="bg-white dark:bg-slate-800 p-4 rounded-xl border border-slate-200 dark:border-slate-700">
                            <?php if (isset($component)) { $__componentOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.media-uploader','data' => ['label' => 'Pièce d\'Identité (Recto)','fileWire' => 'newPieceIdentiteRecto','previewUrl' => $admin->pieceIdentiteRecto ? asset('storage/' . $admin->pieceIdentiteRecto) : null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::media-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Pièce d\'Identité (Recto)','file-wire' => 'newPieceIdentiteRecto','preview-url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($admin->pieceIdentiteRecto ? asset('storage/' . $admin->pieceIdentiteRecto) : null)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7)): ?>
<?php $attributes = $__attributesOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7; ?>
<?php unset($__attributesOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7)): ?>
<?php $component = $__componentOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7; ?>
<?php unset($__componentOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7); ?>
<?php endif; ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($admin->pieceIdentiteRecto): ?>
                                <div class="mt-3">
                                    <label class="inline-flex items-center text-xs text-danger cursor-pointer hover:text-danger-700 transition-colors">
                                        <input type="checkbox" wire:model.defer="deletePieceIdentiteRecto" class="form-checkbox h-3 w-3 text-danger border-slate-300 rounded focus:ring-danger">
                                        <span class="ml-2 font-medium">Supprimer le recto actuel</span>
                                    </label>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div class="bg-white dark:bg-slate-800 p-4 rounded-xl border border-slate-200 dark:border-slate-700">
                            <?php if (isset($component)) { $__componentOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.media-uploader','data' => ['label' => 'Pièce d\'Identité (Verso)','fileWire' => 'newPieceIdentiteVerso','previewUrl' => $admin->pieceIdentiteVerso ? asset('storage/' . $admin->pieceIdentiteVerso) : null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::media-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Pièce d\'Identité (Verso)','file-wire' => 'newPieceIdentiteVerso','preview-url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($admin->pieceIdentiteVerso ? asset('storage/' . $admin->pieceIdentiteVerso) : null)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7)): ?>
<?php $attributes = $__attributesOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7; ?>
<?php unset($__attributesOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7)): ?>
<?php $component = $__componentOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7; ?>
<?php unset($__componentOriginalf2a7d3c9025718cd2b1f827bb4ddd6c7); ?>
<?php endif; ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($admin->pieceIdentiteVerso): ?>
                                <div class="mt-3">
                                    <label class="inline-flex items-center text-xs text-danger cursor-pointer hover:text-danger-700 transition-colors">
                                        <input type="checkbox" wire:model.defer="deletePieceIdentiteVerso" class="form-checkbox h-3 w-3 text-danger border-slate-300 rounded focus:ring-danger">
                                        <span class="ml-2 font-medium">Supprimer le verso actuel</span>
                                    </label>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                    </div>

                    
                    <div class="mt-4 p-4 bg-slate-50 dark:bg-slate-800/50 rounded-xl border border-slate-200 dark:border-slate-700 flex items-center justify-between">
                        <div>
                            <span class="block text-xs font-bold text-slate-500 uppercase">Matricule</span>
                            <span class="text-lg font-mono font-bold text-slate-800 dark:text-white"><?php echo e($admin->matricule); ?></span>
                        </div>
                        <div class="p-2 bg-white rounded-lg shadow-sm">
                            <?php echo QrCode::size(60)->generate($admin->matricule); ?>

                        </div>
                    </div>
                </div>

                
                <div class="space-y-4">
                    <div class="flex items-center gap-2 pb-2 border-b border-slate-100 dark:border-slate-700">
                        <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Attribution des Rôles</h4>
                    </div>
                    <div class="bg-slate-50 dark:bg-slate-800/50 rounded-xl p-4 border border-slate-200 dark:border-slate-700">
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('adminbase::super-admin.manage-admins.admin-role-selector', ['admin' => $admin]);

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1082338333-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    </div>
                </div>

            </form>
        <?php else: ?>
            <div class="p-12 text-center text-slate-500 dark:text-slate-400">
                <svg class="animate-spin h-8 w-8 mx-auto mb-4 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                Chargement du profil...
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
         <?php $__env->slot('footer', null, []); ?> 
            <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['type' => 'button','variant' => 'ghost','wire:click' => 'closeModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','variant' => 'ghost','wire:click' => 'closeModal']); ?>
                Fermer
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

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($admin): ?>
                <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['type' => 'button','variant' => 'danger','wire:click' => 'generatePdf','class' => 'flex items-center gap-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','variant' => 'danger','wire:click' => 'generatePdf','class' => 'flex items-center gap-2']); ?>
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    PDF
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['type' => 'button','variant' => 'primary','wire:click' => 'updateAdmin','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','variant' => 'primary','wire:click' => 'updateAdmin','wire:loading.attr' => 'disabled']); ?>
                    <span wire:loading.remove wire:target="updateAdmin">Mettre à jour</span>
                    <div wire:loading wire:target="updateAdmin" class="flex items-center gap-2">
                        <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        Sauvegarde...
                    </div>
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
         <?php $__env->endSlot(); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb1bb066c727747b1a857cded569d24b7)): ?>
<?php $attributes = $__attributesOriginalb1bb066c727747b1a857cded569d24b7; ?>
<?php unset($__attributesOriginalb1bb066c727747b1a857cded569d24b7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb1bb066c727747b1a857cded569d24b7)): ?>
<?php $component = $__componentOriginalb1bb066c727747b1a857cded569d24b7; ?>
<?php unset($__componentOriginalb1bb066c727747b1a857cded569d24b7); ?>
<?php endif; ?>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/AdminBase/resources/views/livewire/super-admin/manage-admins/admin-profile-card.blade.php ENDPATH**/ ?>