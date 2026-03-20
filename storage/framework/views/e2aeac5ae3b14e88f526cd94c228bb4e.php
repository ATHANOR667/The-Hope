<div x-data="{ isVerifying: false }"
     x-on:request-passcode-verification.window="if ($event.detail.component === '<?php echo e($this->getName()); ?>') isVerifying = true"
     x-on:execute-save-meta.window="isVerifying = false"
     x-on:execute-save-hero.window="isVerifying = false"
     x-on:execute-save-founder.window="isVerifying = false"
     x-on:execute-save-social-links.window="isVerifying = false">

    <div class="p-4 md:p-8 bg-slate-50 min-h-screen dark:bg-slate-950 dark:text-slate-100 transition-colors duration-300">
        <div class="max-w-7xl mx-auto space-y-8">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">Gestion de l'Accueil</h1>
                    <p class="text-slate-500 dark:text-slate-400 mt-1">Configurez le contenu SEO, la vidéo de présentation, les fondateurs et les réseaux sociaux.</p>
                </div>
            </div>

            <?php if (isset($component)) { $__componentOriginalc8bbf7c6fb38f367f94e2639a4bc471c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8bbf7c6fb38f367f94e2639a4bc471c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.tabs','data' => ['tabs' => [
                ['id' => 'seo', 'label' => 'SEO & Meta'],
                ['id' => 'hero', 'label' => 'Vidéo Hero'],
                ['id' => 'founders', 'label' => 'Fondateurs'],
                ['id' => 'socials', 'label' => 'Réseaux Sociaux']
            ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tabs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                ['id' => 'seo', 'label' => 'SEO & Meta'],
                ['id' => 'hero', 'label' => 'Vidéo Hero'],
                ['id' => 'founders', 'label' => 'Fondateurs'],
                ['id' => 'socials', 'label' => 'Réseaux Sociaux']
            ])]); ?>
                
                 <?php $__env->slot('content_seo', null, []); ?> 
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
                         <?php $__env->slot('header', null, []); ?> 
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-primary/10 rounded-lg text-primary">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                                </div>
                                <h2 class="text-lg font-bold text-slate-900 dark:text-white">Méta-informations (SEO & OG)</h2>
                            </div>
                         <?php $__env->endSlot(); ?>

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <div class="md:col-span-3">
                                    <?php if (isset($component)) { $__componentOriginale59cbfc9fe6826a2536559f28ec4e416 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale59cbfc9fe6826a2536559f28ec4e416 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.field','data' => ['label' => 'Meta Description (150-160 caractères)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Meta Description (150-160 caractères)']); ?>
                                        <textarea wire:model.blur="meta.description"
                                                  class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-200 resize-none"
                                                  rows="3" placeholder="Description pour les moteurs de recherche..."></textarea>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['meta.description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-danger mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale59cbfc9fe6826a2536559f28ec4e416)): ?>
<?php $attributes = $__attributesOriginale59cbfc9fe6826a2536559f28ec4e416; ?>
<?php unset($__attributesOriginale59cbfc9fe6826a2536559f28ec4e416); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale59cbfc9fe6826a2536559f28ec4e416)): ?>
<?php $component = $__componentOriginale59cbfc9fe6826a2536559f28ec4e416; ?>
<?php unset($__componentOriginale59cbfc9fe6826a2536559f28ec4e416); ?>
<?php endif; ?>
                                </div>

                                <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'meta.keywords','label' => 'Mots-clés','placeholder' => 'mot1, mot2, mot3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'meta.keywords','label' => 'Mots-clés','placeholder' => 'mot1, mot2, mot3']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'meta.author','label' => 'Auteur']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'meta.author','label' => 'Auteur']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'meta.title','label' => 'Titre de la page']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'meta.title','label' => 'Titre de la page']); ?>
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

                                <div class="md:col-span-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                                    <h3 class="text-md font-bold text-primary dark:text-primary-light">Open Graph (Partage Social)</h3>
                                </div>

                                <div class="md:col-span-2 space-y-4">
                                    <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'meta.og:image','label' => 'URL de l\'image OG','placeholder' => 'URL si non uploadé']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'meta.og:image','label' => 'URL de l\'image OG','placeholder' => 'URL si non uploadé']); ?>
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

                                    <?php if (isset($component)) { $__componentOriginale59cbfc9fe6826a2536559f28ec4e416 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale59cbfc9fe6826a2536559f28ec4e416 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.field','data' => ['label' => 'Téléverser l\'image OG']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Téléverser l\'image OG']); ?>
                                        <input wire:model="meta_og_image_file" type="file" accept="image/*"
                                               class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['meta_og_image_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-danger mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale59cbfc9fe6826a2536559f28ec4e416)): ?>
<?php $attributes = $__attributesOriginale59cbfc9fe6826a2536559f28ec4e416; ?>
<?php unset($__attributesOriginale59cbfc9fe6826a2536559f28ec4e416); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale59cbfc9fe6826a2536559f28ec4e416)): ?>
<?php $component = $__componentOriginale59cbfc9fe6826a2536559f28ec4e416; ?>
<?php unset($__componentOriginale59cbfc9fe6826a2536559f28ec4e416); ?>
<?php endif; ?>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($meta['og:image'] || $meta_og_image_preview): ?>
                                        <div class="p-4 border border-slate-100 dark:border-slate-800 rounded-xl bg-slate-50/50 dark:bg-slate-900/50">
                                            <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Aperçu (Ratio 1.91:1)</p>
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($meta['og:image']): ?>
                                                    <div class="space-y-1">
                                                        <p class="text-[10px] font-medium text-slate-400">Actuelle</p>
                                                        <img src="<?php echo e($meta['og:image']); ?>" class="w-full aspect-[1.91/1] object-cover rounded-lg border border-slate-200 dark:border-slate-700 shadow-sm">
                                                    </div>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($meta_og_image_preview): ?>
                                                    <div class="space-y-1">
                                                        <p class="text-[10px] font-medium text-slate-400">Nouvelle</p>
                                                        <img src="<?php echo e($meta_og_image_preview); ?>" class="w-full aspect-[1.91/1] object-cover rounded-lg border border-primary/30 shadow-sm">
                                                    </div>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'meta.og:image:width','type' => 'number','label' => 'Largeur','placeholder' => '1200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'meta.og:image:width','type' => 'number','label' => 'Largeur','placeholder' => '1200']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'meta.og:image:height','type' => 'number','label' => 'Hauteur','placeholder' => '630']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'meta.og:image:height','type' => 'number','label' => 'Hauteur','placeholder' => '630']); ?>
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
                                    <div class="col-span-2">
                                        <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'meta.og:title','label' => 'Titre OG']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'meta.og:title','label' => 'Titre OG']); ?>
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

                                <div class="md:col-span-3">
                                    <?php if (isset($component)) { $__componentOriginale59cbfc9fe6826a2536559f28ec4e416 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale59cbfc9fe6826a2536559f28ec4e416 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.field','data' => ['label' => 'Description OG']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Description OG']); ?>
                                        <textarea wire:model.blur="meta.og:description"
                                                  class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-200 resize-none"
                                                  rows="3"></textarea>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['meta.og:description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-danger mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale59cbfc9fe6826a2536559f28ec4e416)): ?>
<?php $attributes = $__attributesOriginale59cbfc9fe6826a2536559f28ec4e416; ?>
<?php unset($__attributesOriginale59cbfc9fe6826a2536559f28ec4e416); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale59cbfc9fe6826a2536559f28ec4e416)): ?>
<?php $component = $__componentOriginale59cbfc9fe6826a2536559f28ec4e416; ?>
<?php unset($__componentOriginale59cbfc9fe6826a2536559f28ec4e416); ?>
<?php endif; ?>
                                </div>
                            </div>

                            <div class="flex justify-end pt-4 border-t border-slate-100 dark:border-slate-800">
                                <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['type' => 'button','wire:click' => '$dispatch(\'request-passcode-verification\', {
                                            component: \''.e($this->getName()).'\',
                                            action: \'execute-save-meta\',
                                            guard: \'admin\'
                                        })']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','wire:click' => '$dispatch(\'request-passcode-verification\', {
                                            component: \''.e($this->getName()).'\',
                                            action: \'execute-save-meta\',
                                            guard: \'admin\'
                                        })']); ?>
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Enregistrer Meta
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
                 <?php $__env->endSlot(); ?>

                
                 <?php $__env->slot('content_hero', null, []); ?> 
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
                         <?php $__env->slot('header', null, []); ?> 
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-primary/10 rounded-lg text-primary">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                </div>
                                <h2 class="text-lg font-bold text-slate-900 dark:text-white">Section Hero (Vidéo)</h2>
                            </div>
                         <?php $__env->endSlot(); ?>

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'hero.video_title','label' => 'Titre de la vidéo','placeholder' => 'Ex: Bienvenue chez Nous']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'hero.video_title','label' => 'Titre de la vidéo','placeholder' => 'Ex: Bienvenue chez Nous']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'hero.video_url','label' => 'URL YouTube (embed)','placeholder' => 'https://www.youtube.com/embed/...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'hero.video_url','label' => 'URL YouTube (embed)','placeholder' => 'https://www.youtube.com/embed/...']); ?>
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

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($hero['video_url'])): ?>
                                <div class="mt-4">
                                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Aperçu :</p>
                                    <div class="max-w-3xl aspect-video rounded-2xl overflow-hidden border-4 border-slate-100 dark:border-slate-800 shadow-lg">
                                        <iframe src="<?php echo e($hero['video_url']); ?>" class="w-full h-full" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <div class="flex justify-end pt-4 border-t border-slate-100 dark:border-slate-800">
                                <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['type' => 'button','wire:click' => '$dispatch(\'request-passcode-verification\', {
                                            component: \''.e($this->getName()).'\',
                                            action: \'execute-save-hero\',
                                            guard: \'admin\'
                                        })']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','wire:click' => '$dispatch(\'request-passcode-verification\', {
                                            component: \''.e($this->getName()).'\',
                                            action: \'execute-save-hero\',
                                            guard: \'admin\'
                                        })']); ?>
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Enregistrer Hero
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
                 <?php $__env->endSlot(); ?>

                
                 <?php $__env->slot('content_founders', null, []); ?> 
                    <div class="space-y-6">
                        <div class="flex items-center justify-between px-2">
                            <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-3">
                                <div class="p-2 bg-primary/10 rounded-lg text-primary">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20v-2c0-.656-.126-1.283-.356-1.857M9 20H4v-2a3 3 0 015-2.236M9 20v-2c0-.285.025-.565.072-.835M7.873 14H10.5m0-4a2.5 2.5 0 115 0a2.5 2.5 0 01-5 0z"></path></svg>
                                </div>
                                Profils des Fondateurs
                            </h2>
                            <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['size' => 'sm','wire:click' => 'addFounder']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm','wire:click' => 'addFounder']); ?>
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
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

                        <div class="grid grid-cols-1 gap-6">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $founders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $founder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['wire:key' => 'founder-'.e($index).'','xData' => '{ open: false }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => 'founder-'.e($index).'','x-data' => '{ open: false }']); ?>
                                    <div @click="open = !open" class="flex items-center justify-between cursor-pointer">
                                        <div class="flex items-center gap-4">
                                            <div class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center font-bold text-slate-500">
                                                <?php echo e($index + 1); ?>

                                            </div>
                                            <div>
                                                <h3 class="font-bold text-slate-900 dark:text-white"><?php echo e($founder['name'] ?: 'Nouveau Profil'); ?></h3>
                                                <p class="text-xs text-slate-500"><?php echo e($founder['role'] ?: 'Rôle non défini'); ?></p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['size' => 'xs','variant' => 'ghost','class' => 'text-danger','@click.stop' => 'if(confirm(\'Supprimer ce profil ?\')) $wire.removeFounder('.e($index).')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','variant' => 'ghost','class' => 'text-danger','@click.stop' => 'if(confirm(\'Supprimer ce profil ?\')) $wire.removeFounder('.e($index).')']); ?>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
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
                                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-slate-400 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    </div>

                                    <div x-show="open" x-collapse class="pt-6 mt-6 border-t border-slate-100 dark:border-slate-800">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                            <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'founders.'.e($index).'.name','label' => 'Nom Complet','placeholder' => 'Jean Dupont']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'founders.'.e($index).'.name','label' => 'Nom Complet','placeholder' => 'Jean Dupont']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'founders.'.e($index).'.role','label' => 'Rôle','placeholder' => 'CEO & Fondateur']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'founders.'.e($index).'.role','label' => 'Rôle','placeholder' => 'CEO & Fondateur']); ?>
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

                                            <div class="md:col-span-2">
                                                <?php if (isset($component)) { $__componentOriginale59cbfc9fe6826a2536559f28ec4e416 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale59cbfc9fe6826a2536559f28ec4e416 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.field','data' => ['label' => 'Citation']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Citation']); ?>
                                                    <textarea wire:model.blur="founders.<?php echo e($index); ?>.quote"
                                                              class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-200 resize-none"
                                                              rows="2" placeholder="Une citation inspirante..."></textarea>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ["founders.{$index}.quote"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-danger mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale59cbfc9fe6826a2536559f28ec4e416)): ?>
<?php $attributes = $__attributesOriginale59cbfc9fe6826a2536559f28ec4e416; ?>
<?php unset($__attributesOriginale59cbfc9fe6826a2536559f28ec4e416); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale59cbfc9fe6826a2536559f28ec4e416)): ?>
<?php $component = $__componentOriginale59cbfc9fe6826a2536559f28ec4e416; ?>
<?php unset($__componentOriginale59cbfc9fe6826a2536559f28ec4e416); ?>
<?php endif; ?>
                                            </div>

                                            <?php if (isset($component)) { $__componentOriginal0cb753607d745ad31de5c017a5eb9d5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.select','data' => ['wire:model.live' => 'founders.'.e($index).'.media_type','label' => 'Type de Média']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'founders.'.e($index).'.media_type','label' => 'Type de Média']); ?>
                                                <option value="image">Image</option>
                                                <option value="iframe">Vidéo YouTube (iframe)</option>
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

                                            <div class="space-y-4">
                                                <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'founders.'.e($index).'.media_src','label' => 'Source Média (URL)','placeholder' => 'URL']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'founders.'.e($index).'.media_src','label' => 'Source Média (URL)','placeholder' => 'URL']); ?>
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
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($founder['media_type'] === 'image'): ?>
                                                    <?php if (isset($component)) { $__componentOriginale59cbfc9fe6826a2536559f28ec4e416 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale59cbfc9fe6826a2536559f28ec4e416 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.field','data' => ['label' => 'Téléverser une Image']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Téléverser une Image']); ?>
                                                        <input wire:model="founderMediaFiles.<?php echo e($index); ?>" type="file" accept="image/*"
                                                               class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ["founderMediaFiles.{$index}"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-danger mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale59cbfc9fe6826a2536559f28ec4e416)): ?>
<?php $attributes = $__attributesOriginale59cbfc9fe6826a2536559f28ec4e416; ?>
<?php unset($__attributesOriginale59cbfc9fe6826a2536559f28ec4e416); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale59cbfc9fe6826a2536559f28ec4e416)): ?>
<?php $component = $__componentOriginale59cbfc9fe6826a2536559f28ec4e416; ?>
<?php unset($__componentOriginale59cbfc9fe6826a2536559f28ec4e416); ?>
<?php endif; ?>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>

                                            <?php $mediaUrl = $founderMediaFilesPreview[$index] ?? $founder['media_src'] ?? null; ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($mediaUrl): ?>
                                                <div class="md:col-span-2 p-4 border border-slate-100 dark:border-slate-800 rounded-xl bg-slate-50/50 dark:bg-slate-900/50">
                                                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-3">Aperçu du média :</p>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($founder['media_type'] === 'image'): ?>
                                                        <img src="<?php echo e($mediaUrl); ?>" class="w-full h-auto max-h-64 object-cover rounded-lg border border-slate-200 dark:border-slate-700 shadow-sm">
                                                    <?php elseif($founder['media_type'] === 'iframe'): ?>
                                                        <div class="aspect-video w-full rounded-lg overflow-hidden border border-slate-200 dark:border-slate-700">
                                                            <iframe src="<?php echo e($mediaUrl); ?>" class="w-full h-full" frameborder="0"></iframe>
                                                        </div>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </div>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                            <div class="md:col-span-2">
                                                <?php if (isset($component)) { $__componentOriginale59cbfc9fe6826a2536559f28ec4e416 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale59cbfc9fe6826a2536559f28ec4e416 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.field','data' => ['label' => 'Biographie']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Biographie']); ?>
                                                    <textarea wire:model.blur="founders.<?php echo e($index); ?>.bio"
                                                              class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-200"
                                                              rows="4"></textarea>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ["founders.{$index}.bio"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-danger mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale59cbfc9fe6826a2536559f28ec4e416)): ?>
<?php $attributes = $__attributesOriginale59cbfc9fe6826a2536559f28ec4e416; ?>
<?php unset($__attributesOriginale59cbfc9fe6826a2536559f28ec4e416); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale59cbfc9fe6826a2536559f28ec4e416)): ?>
<?php $component = $__componentOriginale59cbfc9fe6826a2536559f28ec4e416; ?>
<?php unset($__componentOriginale59cbfc9fe6826a2536559f28ec4e416); ?>
<?php endif; ?>
                                            </div>

                                            <div class="md:col-span-2"><?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'founders.'.e($index).'.expertise','label' => 'Expertise']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'founders.'.e($index).'.expertise','label' => 'Expertise']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f)): ?>
<?php $attributes = $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f; ?>
<?php unset($__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald403b78e8b12be0ca768bd08f9c25b1f)): ?>
<?php $component = $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f; ?>
<?php unset($__componentOriginald403b78e8b12be0ca768bd08f9c25b1f); ?>
<?php endif; ?></div>
                                            <div class="md:col-span-2"><?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'founders.'.e($index).'.zone_d_intervention','label' => 'Zone d\'intervention']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'founders.'.e($index).'.zone_d_intervention','label' => 'Zone d\'intervention']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f)): ?>
<?php $attributes = $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f; ?>
<?php unset($__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald403b78e8b12be0ca768bd08f9c25b1f)): ?>
<?php $component = $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f; ?>
<?php unset($__componentOriginald403b78e8b12be0ca768bd08f9c25b1f); ?>
<?php endif; ?></div>
                                            <div class="md:col-span-2"><?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'founders.'.e($index).'.realisation','label' => 'Réalisation']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'founders.'.e($index).'.realisation','label' => 'Réalisation']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f)): ?>
<?php $attributes = $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f; ?>
<?php unset($__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald403b78e8b12be0ca768bd08f9c25b1f)): ?>
<?php $component = $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f; ?>
<?php unset($__componentOriginald403b78e8b12be0ca768bd08f9c25b1f); ?>
<?php endif; ?></div>
                                        </div>

                                        
                                        <div class="p-6 rounded-2xl bg-slate-50 dark:bg-slate-900/50 border border-slate-100 dark:border-slate-800">
                                            <div class="flex items-center justify-between mb-4">
                                                <h4 class="text-sm font-bold text-slate-700 dark:text-slate-300">Réseaux Sociaux du Fondateur</h4>
                                                <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['size' => 'xs','variant' => 'secondary','outline' => true,'wire:click' => '$set(\'founders.'.e($index).'.socials\', [...$wire.get(\'founders.'.e($index).'.socials\'), { icon: \'\', url: \'\' }])']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','variant' => 'secondary','outline' => true,'wire:click' => '$set(\'founders.'.e($index).'.socials\', [...$wire.get(\'founders.'.e($index).'.socials\'), { icon: \'\', url: \'\' }])']); ?>
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
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

                                            <div class="space-y-3">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $founder['socials'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sIndex => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div wire:key="founder-<?php echo e($index); ?>-social-<?php echo e($sIndex); ?>" class="flex flex-col sm:flex-row gap-3 items-end p-3 bg-white dark:bg-slate-950 rounded-xl border border-slate-100 dark:border-slate-800 shadow-sm">
                                                        <div class="w-full sm:flex-1">
                                                            <?php if (isset($component)) { $__componentOriginal0cb753607d745ad31de5c017a5eb9d5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.select','data' => ['wire:model.blur' => 'founders.'.e($index).'.socials.'.e($sIndex).'.icon','label' => 'Réseau','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'founders.'.e($index).'.socials.'.e($sIndex).'.icon','label' => 'Réseau','size' => 'sm']); ?>
                                                                <option value="">Choisir...</option>
                                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $availableIcons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($icon); ?>"><?php echo e($label); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                                                        <div class="w-full sm:flex-1">
                                                            <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'founders.'.e($index).'.socials.'.e($sIndex).'.url','type' => 'url','label' => 'URL','placeholder' => 'https://...','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'founders.'.e($index).'.socials.'.e($sIndex).'.url','type' => 'url','label' => 'URL','placeholder' => 'https://...','size' => 'sm']); ?>
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
                                                        <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['size' => 'xs','variant' => 'ghost','class' => 'text-danger','@click' => 'if(confirm(\'Supprimer ce lien ?\')) $wire.removeFounderSocial('.e($index).', '.e($sIndex).')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','variant' => 'ghost','class' => 'text-danger','@click' => 'if(confirm(\'Supprimer ce lien ?\')) $wire.removeFounderSocial('.e($index).', '.e($sIndex).')']); ?>
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
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
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="flex justify-end pt-6">
                                            <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['type' => 'button','wire:click' => '$dispatch(\'request-passcode-verification\', {
                                                        component: \''.e($this->getName()).'\',
                                                        action: \'execute-save-founder\',
                                                        params: { index: '.e($index).' },
                                                        guard: \'admin\'
                                                    })']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','wire:click' => '$dispatch(\'request-passcode-verification\', {
                                                        component: \''.e($this->getName()).'\',
                                                        action: \'execute-save-founder\',
                                                        params: { index: '.e($index).' },
                                                        guard: \'admin\'
                                                    })']); ?>
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                                Enregistrer ce Profil
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
                    </div>
                 <?php $__env->endSlot(); ?>

                
                 <?php $__env->slot('content_socials', null, []); ?> 
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
                         <?php $__env->slot('header', null, []); ?> 
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-primary/10 rounded-lg text-primary">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path></svg>
                                </div>
                                <h2 class="text-lg font-bold text-slate-900 dark:text-white">Réseaux Sociaux de l'Organisation</h2>
                            </div>
                         <?php $__env->endSlot(); ?>

                        <div class="space-y-6">
                            <div class="space-y-4">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $social_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div wire:key="global-link-<?php echo e($index); ?>" class="flex flex-col sm:flex-row gap-4 p-4 bg-slate-50/50 dark:bg-slate-900/50 rounded-2xl border border-slate-100 dark:border-slate-800 items-end">
                                        <div class="flex-1 w-full">
                                            <?php if (isset($component)) { $__componentOriginal0cb753607d745ad31de5c017a5eb9d5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.select','data' => ['wire:model.blur' => 'social_links.'.e($index).'.icon','label' => 'Réseau']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'social_links.'.e($index).'.icon','label' => 'Réseau']); ?>
                                                <option value="">Choisir...</option>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $availableIcons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($icon); ?>"><?php echo e($label); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                                        <div class="flex-1 w-full">
                                            <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.blur' => 'social_links.'.e($index).'.url','type' => 'url','label' => 'URL','placeholder' => 'https://...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'social_links.'.e($index).'.url','type' => 'url','label' => 'URL','placeholder' => 'https://...']); ?>
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
                                        <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['size' => 'sm','variant' => 'ghost','class' => 'text-danger','wire:click' => 'removeSocialLink('.e($index).')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm','variant' => 'ghost','class' => 'text-danger','wire:click' => 'removeSocialLink('.e($index).')']); ?>
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-4 pt-4 border-t border-slate-100 dark:border-slate-800">
                                <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['variant' => 'secondary','outline' => true,'class' => 'flex-1','wire:click' => 'addSocialLink']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','outline' => true,'class' => 'flex-1','wire:click' => 'addSocialLink']); ?>
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    Ajouter un réseau
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['class' => 'flex-1','wire:click' => '$dispatch(\'request-passcode-verification\', {
                                            component: \''.e($this->getName()).'\',
                                            action: \'execute-save-social-links\',
                                            guard: \'admin\'
                                        })']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex-1','wire:click' => '$dispatch(\'request-passcode-verification\', {
                                            component: \''.e($this->getName()).'\',
                                            action: \'execute-save-social-links\',
                                            guard: \'admin\'
                                        })']); ?>
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                    Enregistrer l'organisation
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
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8bbf7c6fb38f367f94e2639a4bc471c)): ?>
<?php $attributes = $__attributesOriginalc8bbf7c6fb38f367f94e2639a4bc471c; ?>
<?php unset($__attributesOriginalc8bbf7c6fb38f367f94e2639a4bc471c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8bbf7c6fb38f367f94e2639a4bc471c)): ?>
<?php $component = $__componentOriginalc8bbf7c6fb38f367f94e2639a4bc471c; ?>
<?php unset($__componentOriginalc8bbf7c6fb38f367f94e2639a4bc471c); ?>
<?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/resources/views/livewire/manage-home-page.blade.php ENDPATH**/ ?>