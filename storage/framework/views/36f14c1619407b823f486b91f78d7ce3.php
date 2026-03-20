<div x-data="{ step: <?php if ((object) ('step') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('step'->value()); ?>')<?php echo e('step'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('step'); ?>')<?php endif; ?>.live }" class="w-full">

    <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline']); ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('password_reset_success')): ?>
            <?php if (isset($component)) { $__componentOriginal75091716ca600b9389447f9cdeedbdbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75091716ca600b9389447f9cdeedbdbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.alert','data' => ['variant' => 'success','class' => 'mb-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'success','class' => 'mb-6']); ?>
                <?php echo e(session('password_reset_success')); ?>

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
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div x-show="step === 1"
             x-transition
        >
            <h2 class="text-2xl font-bold mb-6 text-center text-slate-900 dark:text-white">
                Réinitialiser le mot de passe
            </h2>

            <p class="text-slate-600 dark:text-slate-300 mb-6 text-center text-sm">
                Pour changer votre mot de passe, nous enverrons un code de vérification à votre email enregistré
                <span class="font-bold text-slate-800 dark:text-white">(<?php echo e(Auth::guard($this->guard)->user()->email); ?>)</span>.
            </p>

            <form wire:submit.prevent="sendPasswordOtp">
                <div class="flex flex-col items-center space-y-2">
                    <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['type' => 'submit','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'w-full']); ?>
                        Envoyer le code
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
            </form>
        </div>

        
        <div x-show="step === 2"
             style="display: none;"
             x-transition
        >
            <h2 class="text-2xl font-bold mb-4 text-center text-slate-900 dark:text-white">
                Valider le code
            </h2>

            <p class="text-slate-600 dark:text-slate-300 mb-6 text-center text-sm">
                Un code a été envoyé à votre email.
            </p>

            <form wire:submit.prevent="processPasswordChange" class="space-y-5">

                <div class="flex justify-center mb-6" wire:ignore>
                    <?php if (isset($component)) { $__componentOriginal3f8fa59ae0401a908b021823d13c75ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3f8fa59ae0401a908b021823d13c75ec = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.otp-input','data' => ['name' => 'otp','xOn:otpChanged' => '$wire.set(\'otp\', $event.detail)','length' => '6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::otp-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'otp','x-on:otp-changed' => '$wire.set(\'otp\', $event.detail)','length' => '6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3f8fa59ae0401a908b021823d13c75ec)): ?>
<?php $attributes = $__attributesOriginal3f8fa59ae0401a908b021823d13c75ec; ?>
<?php unset($__attributesOriginal3f8fa59ae0401a908b021823d13c75ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3f8fa59ae0401a908b021823d13c75ec)): ?>
<?php $component = $__componentOriginal3f8fa59ae0401a908b021823d13c75ec; ?>
<?php unset($__componentOriginal3f8fa59ae0401a908b021823d13c75ec); ?>
<?php endif; ?>
                </div>

                <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['name' => 'newPassword','label' => 'Nouveau Mot de passe','type' => 'password','wire:model.live' => 'newPassword','required' => '','autocomplete' => 'new-password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'newPassword','label' => 'Nouveau Mot de passe','type' => 'password','wire:model.live' => 'newPassword','required' => '','autocomplete' => 'new-password']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['name' => 'newPasswordConfirmation','label' => 'Confirmer le nouveau Mot de passe','type' => 'password','wire:model.live' => 'newPasswordConfirmation','required' => '','autocomplete' => 'new-password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'newPasswordConfirmation','label' => 'Confirmer le nouveau Mot de passe','type' => 'password','wire:model.live' => 'newPasswordConfirmation','required' => '','autocomplete' => 'new-password']); ?>
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

                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-2">
                    
                    <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['type' => 'submit','class' => 'w-full sm:w-auto flex-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'w-full sm:w-auto flex-1']); ?>
                        Changer le Mot de Passe
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['type' => 'button','variant' => 'ghost','@click' => 'step = 1; $wire.goBackToStep1()','class' => 'w-full sm:w-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','variant' => 'ghost','@click' => 'step = 1; $wire.goBackToStep1()','class' => 'w-full sm:w-auto']); ?>
                        Retour
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
            </form>
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
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/AdminBase/resources/views/livewire/auth/password-reset-form.blade.php ENDPATH**/ ?>