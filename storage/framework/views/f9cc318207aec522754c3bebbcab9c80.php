<div class="h-full flex flex-col bg-slate-50 dark:bg-slate-950 transition-colors duration-300">

    <div class="p-4 border-b border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900 sticky top-0 z-10 shadow-sm transition-colors duration-300">
        <div class="flex items-center justify-between">
            <h2 class="text-base font-bold text-slate-900 dark:text-white truncate">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($conversation): ?>
                    <?php echo e($conversation->contact->name ?? $conversation->contact->email); ?>

                <?php else: ?>
                    <span class="text-slate-400">Sélectionnez une conversation</span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </h2>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($conversation): ?>
                <div class="flex items-center gap-2">
                    <?php if (isset($component)) { $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.badge','data' => ['size' => 'xs','variant' => ''.e($conversation->status === 'open' ? 'success' : 'danger').'','outline' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','variant' => ''.e($conversation->status === 'open' ? 'success' : 'danger').'','outline' => true]); ?>
                        <?php echo e($conversation->status === 'open' ? 'Ouverte' : 'Fermée'); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb)): ?>
<?php $attributes = $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb; ?>
<?php unset($__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalafe60356fc24a1df475a40bac4ca6eeb)): ?>
<?php $component = $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb; ?>
<?php unset($__componentOriginalafe60356fc24a1df475a40bac4ca6eeb); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.badge','data' => ['size' => 'xs','variant' => 'primary','class' => 'font-bold uppercase tracking-tighter']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','variant' => 'primary','class' => 'font-bold uppercase tracking-tighter']); ?>
                        <?php echo e($conversation->channel_type ?? 'Email'); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb)): ?>
<?php $attributes = $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb; ?>
<?php unset($__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalafe60356fc24a1df475a40bac4ca6eeb)): ?>
<?php $component = $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb; ?>
<?php unset($__componentOriginalafe60356fc24a1df475a40bac4ca6eeb); ?>
<?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($conversation): ?>
            <p class="text-[10px] text-slate-400 mt-1 truncate">
                <?php echo e($conversation->contact->email ?? $conversation->contact->phone); ?>

            </p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <div
        class="flex-1 overflow-y-auto p-4 sm:p-6 space-y-6 custom-scrollbar"
        x-data="{
            scrollToBottom() {
                this.$el.scrollTop = this.$el.scrollHeight;
            }
        }"
        x-init="scrollToBottom()"
        @scroll-to-bottom.window="setTimeout(() => scrollToBottom(), 50)"
    >

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($conversationId): ?>
            <div class="space-y-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex <?php echo e($message->sender_type === 'Admin' ? 'justify-end' : 'justify-start'); ?>">
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contactetnewsletter::admin.messaging.message-component', ['message' => $message]);

$__key = $message->id;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2452541476-0', $__key);

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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="flex flex-col items-center justify-center h-full min-h-[40vh] text-center">
                        <div class="w-16 h-16 bg-slate-100 dark:bg-slate-800 rounded-full flex items-center justify-center mb-4 text-slate-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        </div>
                        <p class="font-bold text-slate-900 dark:text-white">Aucun message</p>
                        <p class="text-xs text-slate-500 mt-1">Commencez la discussion en envoyant un message.</p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div id="end-of-messages" class="h-px"></div>
    </div>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/ContactEtNewsletter/resources/views/livewire/admin/messaging/conversation-detail.blade.php ENDPATH**/ ?>