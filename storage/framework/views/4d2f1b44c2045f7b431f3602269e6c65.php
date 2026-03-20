<?php $__env->startSection('title','Gestion des utilisateurs'); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-8">
        <?php if (isset($component)) { $__componentOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92efd1d22af8ea91d7eb61db17f5f1b3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.heading','data' => ['title' => 'Gestion des accès & Utilisateurs','class' => 'mb-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Gestion des accès & Utilisateurs','class' => 'mb-6']); ?>
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
            <h2 class="text-xl font-bold text-slate-800 dark:text-slate-100 mb-6 border-b pb-2">
                Gestion des Rôles et Permissions
            </h2>

            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('adminbase::gestion-roles.manage-roles-permissions', ['guardName' => 'admin']);

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3548438273-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

            <div class="mt-8 pt-6 border-t border-slate-200 dark:border-slate-700">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('adminbase::gestion-roles.permission-stats', ['guardName' => 'admin']);

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3548438273-1', $__key);

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
            <h2 class="text-2xl font-semibold text-slate-800 dark:text-slate-100 mb-4">
                Gestion des Administrateurs
            </h2>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('adminbase::super-admin.manage-admins.list-admins');

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3548438273-2', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
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

    
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('adminbase::super-admin.manage-admins.create-admin');

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3548438273-3', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('adminbase::super-admin.manage-admins.admin-profile-card');

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3548438273-4', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminbase::super-admin.connected-base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/AdminBase/resources/views/super-admin/pages/manage-admins.blade.php ENDPATH**/ ?>