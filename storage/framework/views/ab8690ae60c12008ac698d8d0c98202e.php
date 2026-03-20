<div>
    <div x-data="{
            show: <?php if ((object) ('showModal') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('showModal'->value()); ?>')<?php echo e('showModal'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('showModal'); ?>')<?php endif; ?>,
            lockoutSeconds: 0,
            timerInterval: null,

            startTimer(seconds) {
                this.lockoutSeconds = seconds;
                clearInterval(this.timerInterval);

                this.timerInterval = setInterval(() => {
                    if (this.lockoutSeconds > 0) {
                        this.lockoutSeconds--;
                    } else {
                        clearInterval(this.timerInterval);
                        $wire.clearErrors();
                    }
                }, 1000);
            },

            get formattedTime() {
                // Formate intelligemment en HH:MM:SS ou MM:SS
                if (this.lockoutSeconds >= 3600) {
                    const h = Math.floor(this.lockoutSeconds / 3600).toString().padStart(2, '0');
                    const m = Math.floor((this.lockoutSeconds % 3600) / 60).toString().padStart(2, '0');
                    const s = (this.lockoutSeconds % 60).toString().padStart(2, '0');
                    return `${h}:${m}:${s}`;
                }
                const m = Math.floor(this.lockoutSeconds / 60).toString().padStart(2, '0');
                const s = (this.lockoutSeconds % 60).toString().padStart(2, '0');
                return `${m}:${s}`;
            }
         }"
         @start-lockout-timer.window="startTimer($event.detail.seconds)"
         x-show="show"
         style="display: none;"
         class="fixed inset-0 z-[100] overflow-y-auto"
         aria-labelledby="modal-title"
         role="dialog"
         aria-modal="true">

        <div x-show="show"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity"
             @click="if(lockoutSeconds === 0) $wire.close()"></div> <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div x-show="show"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative transform transition-all w-full max-w-md mx-auto z-10">

                <?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['class' => 'w-full shadow-2xl border-none']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full shadow-2xl border-none']); ?>

                    <button @click="$wire.close()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="p-6 space-y-6 mt-2">
                        <div class="text-center space-y-2">
                            <?php if (isset($component)) { $__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.heading','data' => ['level' => '3','class' => 'text-xl font-bold text-slate-900 dark:text-slate-50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['level' => '3','class' => 'text-xl font-bold text-slate-900 dark:text-slate-50']); ?>
                                <?php echo e($title); ?>

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
                            <p class="text-sm text-slate-500 dark:text-slate-400">
                                <?php echo e($description); ?>

                            </p>
                        </div>

                        <form wire:submit="verify" class="space-y-6">

                            <div x-show="lockoutSeconds === 0" x-collapse>
                                <div class="flex justify-center" @otp-completed="$wire.verify()">
                                    <?php if (isset($component)) { $__componentOriginal3f8fa59ae0401a908b021823d13c75ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3f8fa59ae0401a908b021823d13c75ec = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.otp-input','data' => ['name' => 'passcode','length' => $passcodeLength,'wire:model' => 'passcode','error' => $errors->first('passcode')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::otp-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'passcode','length' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($passcodeLength),'wire:model' => 'passcode','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('passcode'))]); ?>
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
                            </div>

                            <div x-show="lockoutSeconds > 0" x-cloak x-collapse>
                                <div class="flex flex-col items-center justify-center py-5 px-6 space-y-4 bg-red-50 dark:bg-red-500/10 rounded-xl border border-red-200 dark:border-red-500/30 shadow-sm">

                                    <svg class="w-10 h-10 text-red-500 dark:text-red-400 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>

                                    <div class="text-center space-y-1">
                                        <h4 class="text-red-800 dark:text-red-200 font-bold text-sm uppercase tracking-wider">Trop de tentatives</h4>
                                        <p class="text-sm text-red-600 dark:text-red-300">Pour votre sécurité, veuillez patienter avant de réessayer.</p>
                                    </div>

                                    <div class="text-5xl font-mono font-black text-red-700 dark:text-red-400 tracking-widest tabular-nums">
                                        <span x-text="formattedTime"></span>
                                    </div>

                                </div>
                            </div>

                            <div class="pt-2 flex gap-3">
                                <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['type' => 'button','wire:click' => 'close','class' => 'w-full h-12 text-base font-semibold rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 transition-colors shadow-sm dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','wire:click' => 'close','class' => 'w-full h-12 text-base font-semibold rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 transition-colors shadow-sm dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['type' => 'submit','xBind:disabled' => 'lockoutSeconds > 0','class' => 'w-full h-12 text-base font-semibold rounded-xl bg-primary text-white hover:bg-primary/90 transition-colors shadow-sm disabled:opacity-50 disabled:cursor-not-allowed','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','x-bind:disabled' => 'lockoutSeconds > 0','class' => 'w-full h-12 text-base font-semibold rounded-xl bg-primary text-white hover:bg-primary/90 transition-colors shadow-sm disabled:opacity-50 disabled:cursor-not-allowed','wire:loading.attr' => 'disabled']); ?>
                                    <span wire:loading.remove><?php echo e($actionLabel); ?></span>
                                    <span wire:loading>Vérification...</span>
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
        </div>
    </div>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/Shared/resources/views/livewire/security/verify-passcode.blade.php ENDPATH**/ ?>