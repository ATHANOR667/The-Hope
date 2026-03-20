<?php if (isset($component)) { $__componentOriginald1bf62fbd4f4b9943b7b3bc840b9a724 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald1bf62fbd4f4b9943b7b3bc840b9a724 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.layouts.admin-disconnected','data' => ['heading' => 'Message']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::layouts.admin-disconnected'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['heading' => 'Message']); ?>
    <div class="flex items-center justify-center w-full">
        <div class="w-full max-w-md">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                <?php if (isset($component)) { $__componentOriginal75091716ca600b9389447f9cdeedbdbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75091716ca600b9389447f9cdeedbdbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.alert','data' => ['variant' => 'success']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'success']); ?>
                    <?php echo e(session('success')); ?>

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

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
                <?php if (isset($component)) { $__componentOriginal75091716ca600b9389447f9cdeedbdbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75091716ca600b9389447f9cdeedbdbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.alert','data' => ['variant' => 'danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'danger']); ?>
                    <?php echo e(session('error')); ?>

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
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald1bf62fbd4f4b9943b7b3bc840b9a724)): ?>
<?php $attributes = $__attributesOriginald1bf62fbd4f4b9943b7b3bc840b9a724; ?>
<?php unset($__attributesOriginald1bf62fbd4f4b9943b7b3bc840b9a724); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald1bf62fbd4f4b9943b7b3bc840b9a724)): ?>
<?php $component = $__componentOriginald1bf62fbd4f4b9943b7b3bc840b9a724; ?>
<?php unset($__componentOriginald1bf62fbd4f4b9943b7b3bc840b9a724); ?>
<?php endif; ?>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/AdminBase/resources/views/admin/message.blade.php ENDPATH**/ ?>