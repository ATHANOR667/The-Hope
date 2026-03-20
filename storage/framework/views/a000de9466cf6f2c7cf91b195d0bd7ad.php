<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title' => 'Super Admin Panel']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title' => 'Super Admin Panel']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if (isset($component)) { $__componentOriginal33e1688d81c11ffe3079e4db45d9f397 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33e1688d81c11ffe3079e4db45d9f397 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.layouts.admin-connected','data' => ['title' => $title,'brand' => 'Owner','homeUrl' => route('super-admin.manageAdminsView')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::layouts.admin-connected'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title),'brand' => 'Owner','home-url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('super-admin.manageAdminsView'))]); ?>
    
     <?php $__env->slot('notifications', null, []); ?> 
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('shared::flash-notification');

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3305554427-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
     <?php $__env->endSlot(); ?>

    
     <?php $__env->slot('desktop_menu', null, []); ?> 
        <?php if (isset($component)) { $__componentOriginal31664066194ef7a9e69bf9f35d9f1415 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal31664066194ef7a9e69bf9f35d9f1415 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.nav-link-desktop','data' => ['href' => route('super-admin.manageAdminsView'),'active' => request()->routeIs('super-admin.manageAdminsView')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::nav-link-desktop'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('super-admin.manageAdminsView')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('super-admin.manageAdminsView'))]); ?>
            Admins
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal31664066194ef7a9e69bf9f35d9f1415)): ?>
<?php $attributes = $__attributesOriginal31664066194ef7a9e69bf9f35d9f1415; ?>
<?php unset($__attributesOriginal31664066194ef7a9e69bf9f35d9f1415); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal31664066194ef7a9e69bf9f35d9f1415)): ?>
<?php $component = $__componentOriginal31664066194ef7a9e69bf9f35d9f1415; ?>
<?php unset($__componentOriginal31664066194ef7a9e69bf9f35d9f1415); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal31664066194ef7a9e69bf9f35d9f1415 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal31664066194ef7a9e69bf9f35d9f1415 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.nav-link-desktop','data' => ['href' => route('super-admin.profileView'),'active' => request()->routeIs('super-admin.profileView')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::nav-link-desktop'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('super-admin.profileView')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('super-admin.profileView'))]); ?>
            Profil
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal31664066194ef7a9e69bf9f35d9f1415)): ?>
<?php $attributes = $__attributesOriginal31664066194ef7a9e69bf9f35d9f1415; ?>
<?php unset($__attributesOriginal31664066194ef7a9e69bf9f35d9f1415); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal31664066194ef7a9e69bf9f35d9f1415)): ?>
<?php $component = $__componentOriginal31664066194ef7a9e69bf9f35d9f1415; ?>
<?php unset($__componentOriginal31664066194ef7a9e69bf9f35d9f1415); ?>
<?php endif; ?>
     <?php $__env->endSlot(); ?>

    
     <?php $__env->slot('menu', null, []); ?> 
        <?php if (isset($component)) { $__componentOriginal924d037d153cceaf98c6d8ffe98564b6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal924d037d153cceaf98c6d8ffe98564b6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.nav-link','data' => ['href' => route('super-admin.manageAdminsView'),'active' => request()->routeIs('super-admin.manageAdminsView')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('super-admin.manageAdminsView')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('super-admin.manageAdminsView'))]); ?>
            Admins
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal924d037d153cceaf98c6d8ffe98564b6)): ?>
<?php $attributes = $__attributesOriginal924d037d153cceaf98c6d8ffe98564b6; ?>
<?php unset($__attributesOriginal924d037d153cceaf98c6d8ffe98564b6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal924d037d153cceaf98c6d8ffe98564b6)): ?>
<?php $component = $__componentOriginal924d037d153cceaf98c6d8ffe98564b6; ?>
<?php unset($__componentOriginal924d037d153cceaf98c6d8ffe98564b6); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal924d037d153cceaf98c6d8ffe98564b6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal924d037d153cceaf98c6d8ffe98564b6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.nav-link','data' => ['href' => route('super-admin.profileView'),'active' => request()->routeIs('super-admin.profileView')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('super-admin.profileView')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('super-admin.profileView'))]); ?>
            Profil
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal924d037d153cceaf98c6d8ffe98564b6)): ?>
<?php $attributes = $__attributesOriginal924d037d153cceaf98c6d8ffe98564b6; ?>
<?php unset($__attributesOriginal924d037d153cceaf98c6d8ffe98564b6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal924d037d153cceaf98c6d8ffe98564b6)): ?>
<?php $component = $__componentOriginal924d037d153cceaf98c6d8ffe98564b6; ?>
<?php unset($__componentOriginal924d037d153cceaf98c6d8ffe98564b6); ?>
<?php endif; ?>
     <?php $__env->endSlot(); ?>

    
     <?php $__env->slot('actions', null, []); ?> 
        <form action="<?php echo e(route('super-admin.auth.connected.logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['type' => 'submit','variant' => 'danger','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','variant' => 'danger','size' => 'sm']); ?>
                Déconnexion
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
        </form>
     <?php $__env->endSlot(); ?>

    
     <?php $__env->slot('mobile_actions', null, []); ?> 
        <form action="<?php echo e(route('super-admin.auth.connected.logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['type' => 'submit','variant' => 'danger','size' => 'sm','class' => 'w-full justify-start']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','variant' => 'danger','size' => 'sm','class' => 'w-full justify-start']); ?>
                Déconnexion
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
        </form>
     <?php $__env->endSlot(); ?>


    <?php echo $__env->yieldContent('content'); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal33e1688d81c11ffe3079e4db45d9f397)): ?>
<?php $attributes = $__attributesOriginal33e1688d81c11ffe3079e4db45d9f397; ?>
<?php unset($__attributesOriginal33e1688d81c11ffe3079e4db45d9f397); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33e1688d81c11ffe3079e4db45d9f397)): ?>
<?php $component = $__componentOriginal33e1688d81c11ffe3079e4db45d9f397; ?>
<?php unset($__componentOriginal33e1688d81c11ffe3079e4db45d9f397); ?>
<?php endif; ?>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/AdminBase/resources/views/super-admin/connected-base.blade.php ENDPATH**/ ?>