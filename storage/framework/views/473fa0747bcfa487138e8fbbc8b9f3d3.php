<div>
    <?php
        $isAdmin = $message->sender_type === 'Admin' || \Illuminate\Support\Str::contains($message->sender_type, 'Admin');

        $channelIcon = match($message->conversation->channel_type) {
            'whatsapp' => '<svg class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2C6.54 2 2.08 6.46 2.08 12s4.46 10 9.96 10c1.52 0 3.01-.35 4.35-1l.31-.18 3.23.85-.86-3.15.2-.32c.71-1.13 1.08-2.44 1.08-3.79 0-5.54-4.46-10-9.96-10z"/></svg>',
            'sms' => '<svg class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>',
            default => '<svg class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4V6z"/></svg>',
        };
    ?>

    <div class="flex <?php echo e($isAdmin ? 'justify-end' : 'justify-start'); ?> w-full group">
        <div class="max-w-[85%] sm:max-w-[70%] flex flex-col <?php echo e($isAdmin ? 'items-end' : 'items-start'); ?>">

            
            <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1 px-1">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isAdmin): ?>
                    Vous
                <?php else: ?>
                    <?php echo e($message->sender->nom ?? $message->conversation->contact->name ?? 'Visiteur'); ?>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </span>

            
            <div class="relative px-4 py-3 rounded-2xl shadow-sm transition-all duration-300
                <?php echo e($isAdmin
                    ? 'bg-primary text-white rounded-tr-none border border-primary/10'
                    : 'bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-200 rounded-tl-none border border-slate-100 dark:border-slate-800'); ?> group-hover:shadow-md"
            >
                <div class="text-sm leading-relaxed whitespace-pre-wrap break-words [overflow-wrap:anywhere]">
                    <?php echo e($message->content); ?>

                </div>

                
                <div class="flex items-center justify-end mt-2 gap-1.5 opacity-60 text-[9px] font-bold uppercase tracking-tighter">
                    <span><?php echo e($message->sent_at->format('H:i')); ?></span>
                    <span>•</span>
                    <span class="flex items-center">
                        <?php echo $channelIcon; ?>

                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/ContactEtNewsletter/resources/views/livewire/admin/messaging/message-component.blade.php ENDPATH**/ ?>