<div>
    <?php if (isset($component)) { $__componentOriginalb1bb066c727747b1a857cded569d24b7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb1bb066c727747b1a857cded569d24b7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.modal','data' => ['wire:model' => 'showCreate','title' => 'Créer une Newsletter','maxWidth' => '5xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'showCreate','title' => 'Créer une Newsletter','maxWidth' => '5xl']); ?>
        <div class="space-y-6">
            
            <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.lazy' => 'title','label' => 'Titre','placeholder' => 'Ex: Mise à jour du mois d\'octobre','error' => ''.e($errors->first('title')).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.lazy' => 'title','label' => 'Titre','placeholder' => 'Ex: Mise à jour du mois d\'octobre','error' => ''.e($errors->first('title')).'','required' => true]); ?>
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

            
            <div class="space-y-1">
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300">
                    Contenu <span class="text-danger">*</span>
                </label>
                <div wire:ignore
                     x-data="{
                     quill: null,
                     content: <?php if ((object) ('content') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('content'->value()); ?>')<?php echo e('content'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('content'); ?>')<?php endif; ?>,
                     init() {
                         const toolbarOptions = [
                             [{ 'header': [1, 2, 3, false] }],
                             ['bold', 'italic', 'underline', 'strike'],
                             [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                             [{ 'align': [] }],
                             ['link', 'image', 'video', 'clean']
                         ];
                         if (typeof Quill === 'undefined' || this.quill) return;
                         this.quill = new Quill(this.$refs.editor, {
                             theme: 'snow',
                             modules: { toolbar: toolbarOptions },
                             placeholder: 'Écrivez le contenu de votre newsletter ici...'
                         });
                         this.quill.root.innerHTML = this.content;
                         this.quill.on('text-change', () => {
                             this.content = this.quill.root.innerHTML;
                         });
                     }
                 }"
                     x-init="$watch('$wire.showCreate', value => { if (value) init(); })"
                     class="rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden bg-white dark:bg-slate-950 shadow-sm">
                    <div x-ref="editor" style="min-height: 350px;"></div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-danger mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div class="flex gap-3 pt-6 border-t border-slate-100 dark:border-slate-800">
                <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['variant' => 'secondary','outline' => true,'class' => 'flex-1','wire:click' => 'close']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','outline' => true,'class' => 'flex-1','wire:click' => 'close']); ?>
                    Annuler
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
                        action: \'execute-send-newsletter\',
                        guard: \'admin\'
                    })','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex-1','wire:click' => '$dispatch(\'request-passcode-verification\', {
                        component: \''.e($this->getName()).'\',
                        action: \'execute-send-newsletter\',
                        guard: \'admin\'
                    })','wire:loading.attr' => 'disabled']); ?>
                    <span wire:loading.remove wire:target="save">Envoyer la Newsletter</span>
                    <span wire:loading wire:target="save" class="flex items-center justify-center">
                        <svg class="animate-spin h-5 w-5 text-white mr-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        Envoi en cours...
                    </span>
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
<?php if (isset($__attributesOriginalb1bb066c727747b1a857cded569d24b7)): ?>
<?php $attributes = $__attributesOriginalb1bb066c727747b1a857cded569d24b7; ?>
<?php unset($__attributesOriginalb1bb066c727747b1a857cded569d24b7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb1bb066c727747b1a857cded569d24b7)): ?>
<?php $component = $__componentOriginalb1bb066c727747b1a857cded569d24b7; ?>
<?php unset($__componentOriginalb1bb066c727747b1a857cded569d24b7); ?>
<?php endif; ?>

    <style>
        .ql-container.ql-snow, .ql-toolbar.ql-snow { border: none !important; }
        .ql-toolbar.ql-snow { border-bottom: 1px solid #e2e8f0 !important; background-color: #ffffff; padding: 8px; }
        .dark .ql-toolbar.ql-snow { border-bottom: 1px solid #1e293b !important; background-color: #0f172a; }
        .ql-editor { min-height: 350px; padding: 1.5rem; background-color: #ffffff; color: #0f172a; line-height: 1.6; font-size: 0.875rem; }
        .dark .ql-editor { background-color: #020617; color: #f1f5f9; }
        .dark .ql-snow .ql-stroke { stroke: #94a3b8; }
        .dark .ql-snow .ql-fill { fill: #94a3b8; }
        .dark .ql-snow.ql-toolbar button:hover .ql-stroke,
        .dark .ql-snow.ql-toolbar button:focus .ql-stroke { stroke: #3b82f6; }
    </style>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/ContactEtNewsletter/resources/views/livewire/admin/newsletter/newsletter-message-create.blade.php ENDPATH**/ ?>