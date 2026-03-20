<?php if (isset($component)) { $__componentOriginald1bf62fbd4f4b9943b7b3bc840b9a724 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald1bf62fbd4f4b9943b7b3bc840b9a724 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.layouts.admin-disconnected','data' => ['heading' => 'Connexion Administration']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::layouts.admin-disconnected'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['heading' => 'Connexion Administration']); ?>
    <?php echo $__env->yieldContent('content'); ?>
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
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/AdminBase/resources/views/super-admin/disconnected-base.blade.php ENDPATH**/ ?>