<div class="flex space-x-3 <?php echo e($comment->parent_id ? 'pl-4 sm:pl-8 border-l border-dashed border-gray-300 dark:border-gray-700' : ''); ?>">
    <div class="flex-shrink-0">
        
        <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center text-white text-sm font-bold">
            <?php echo e($comment->commenterName() ? substr($comment->commenterName(), 0, 1) : '?'); ?>

        </div>
    </div>
    <div class="flex-1 min-w-0">
        
        <div class="flex items-center space-x-2">
            <p class="font-bold text-gray-800 dark:text-gray-100">
                <?php echo e($comment->guest_name ?? ($comment->commenterName() )); ?>

            </p>
            <span class="text-xs text-gray-500 dark:text-gray-400">
                il y a <?php echo e($comment->created_at->diffForHumans()); ?>

            </span>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($comment->moderation_status !== 'approved'): ?>
                <span class="text-xs text-red-500 bg-red-100 dark:bg-red-800 px-2 py-0.5 rounded-full">
                    En attente
                </span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <p class="mt-1 text-gray-700 dark:text-gray-300 break-words">
            <?php echo e($comment->content); ?>

        </p>

        
        <button wire:click="$dispatch('setReplyTo', { commentId: '<?php echo e($comment->id); ?>' })"
                class="mt-2 text-xs font-semibold text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-300 transition duration-150">
            <i class="fa-solid fa-reply mr-1"></i> Répondre
        </button>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($comment->replies->count() > 0): ?>
            <div class="mt-4 space-y-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('galeriemodule::livewire.visitor.galerie.partials.comment-item', ['comment' => $reply], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/GalerieModule/resources/views/livewire/visitor/galerie/partials/comment-item.blade.php ENDPATH**/ ?>