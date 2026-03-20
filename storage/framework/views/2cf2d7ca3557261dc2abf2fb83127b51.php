<div wire:click="select('<?php echo e($conversation->id); ?>')"
     wire:key="item-<?php echo e($conversation->id); ?>"
     class="p-4 cursor-pointer transition-all duration-300 relative border-l-4
        <?php echo e($isSelected ? 'bg-primary/5 border-primary shadow-[inset_0_0_20px_rgba(var(--color-primary),0.02)]' : 'border-transparent hover:bg-slate-50 dark:hover:bg-slate-800/50'); ?>

        <?php echo e(($conversation->is_unread ?? false) ? 'bg-primary/5' : ''); ?>">

    <div class="flex items-center gap-4">
        
        <div class="relative flex-shrink-0">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-white font-bold text-lg shadow-sm
                <?php echo e($isSelected ? 'bg-primary' : 'bg-slate-200 dark:bg-slate-700 text-slate-500 dark:text-slate-400'); ?>">
                <?php echo e(strtoupper(substr($conversation->contact->name ?? 'A', 0, 1))); ?>

            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($conversation->is_unread ?? false): ?>
                <span class="absolute -top-1 -right-1 w-3 h-3 bg-primary border-2 border-white dark:border-slate-900 rounded-full"></span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="flex-1 min-w-0">
            <div class="flex justify-between items-start mb-1">
                <h4 class="text-sm font-bold truncate <?php echo e(($conversation->is_unread ?? false) ? 'text-slate-900 dark:text-white' : 'text-slate-700 dark:text-slate-300'); ?>">
                    <?php echo e($conversation->contact->name ?? $conversation->contact->email); ?>

                </h4>
                <span class="text-[10px] font-medium text-slate-400 whitespace-nowrap ml-2">
                    <?php echo e($conversation->updated_at->shortRelativeDiffForHumans()); ?>

                </span>
            </div>

            <div class="flex items-center justify-between gap-2">
                <p class="text-xs truncate <?php echo e(($conversation->is_unread ?? false) ? 'text-slate-600 dark:text-slate-400 font-semibold' : 'text-slate-500'); ?>">
                    <?php echo e($conversation->messages->first()?->content ?? 'Aucun message'); ?>

                </p>

                <?php
                    $icon = match($conversation->channel_type) {
                        'whatsapp' => '<svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2C6.54 2 2.08 6.46 2.08 12s4.46 10 9.96 10c1.78 0 3.51-.49 5.01-1.42l3.43 1.15-1.17-3.32c.98-1.74 1.54-3.69 1.54-5.61C22 6.46 17.54 2 12.04 2z"/></svg>',
                        'sms' => '<svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>',
                        default => '<svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/></svg>',
                    };
                ?>
                <span class="p-1 rounded bg-slate-100 dark:bg-slate-800 text-slate-400">
                    <?php echo $icon; ?>

                </span>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/ContactEtNewsletter/resources/views/livewire/admin/messaging/conversation-list-item.blade.php ENDPATH**/ ?>