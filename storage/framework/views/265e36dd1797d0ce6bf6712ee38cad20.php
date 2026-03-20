<div class="flex h-screen overflow-hidden md:min-h-[85vh] md:p-6 bg-slate-50 dark:bg-slate-950 transition-colors duration-300"
     x-data="{ selectedId: <?php if ((object) ('selectedConversationId') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selectedConversationId'->value()); ?>')<?php echo e('selectedConversationId'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selectedConversationId'); ?>')<?php endif; ?> }">

    
    <div
        class="
            w-full h-full md:w-80 lg:w-96 flex-shrink-0
            rounded-none md:rounded-2xl
            bg-white dark:bg-slate-900 md:shadow-xl
            border-r md:border-none border-slate-200 dark:border-slate-800
            overflow-y-auto transition-all duration-300 ease-in-out
            z-10

            <?php echo e($selectedConversationId ? 'hidden md:block' : 'block'); ?>

        "
    >
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contactetnewsletter::admin.messaging.conversation-list', []);

$__key = 'list-'.$selectedConversationId;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3063549259-0', $__key);

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

    
    <div
        class="
            flex-1 h-full
            flex flex-col
            bg-white dark:bg-slate-900
            rounded-none md:rounded-2xl md:shadow-xl
            overflow-hidden transition-all duration-300 ease-in-out

            md:ml-4

            <?php echo e($selectedConversationId ? 'block' : 'hidden md:block'); ?>

        "
    >
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedConversationId): ?>
            <div class="p-4 border-b border-slate-100 dark:border-slate-800 md:hidden bg-white dark:bg-slate-900 sticky top-0 z-20 shadow-sm">
                <button
                    type="button"
                    wire:click="$set('selectedConversationId', null)"
                    class="text-primary dark:text-primary-light font-bold flex items-center text-sm transition-all active:scale-95"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Retour
                </button>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="flex-1 flex flex-col overflow-hidden relative">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedConversationId): ?>
                <div class="flex-1 overflow-y-auto custom-scrollbar" id="messages-container">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contactetnewsletter::admin.messaging.conversation-detail', ['conversationId' => $selectedConversationId]);

$__key = 'conv-'.$selectedConversationId;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3063549259-1', $__key);

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
            <?php else: ?>
                <div class="flex items-center justify-center h-full bg-slate-50/50 dark:bg-slate-950/50">
                    <div class="text-center p-8">
                        <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white">Messagerie Directe</h3>
                        <p class="mt-2 text-slate-500 dark:text-slate-400 max-w-xs mx-auto">Sélectionnez une conversation pour visualiser les messages et répondre.</p>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedConversationId): ?>
            <div class="border-t border-slate-100 dark:border-slate-800 p-4 bg-slate-50/50 dark:bg-slate-900/50 flex-shrink-0 hidden md:block">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contactetnewsletter::admin.messaging.reply-form', ['conversationId' => $selectedConversationId]);

$__key = 'reply-desktop-'.$selectedConversationId;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3063549259-2', $__key);

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

            
            <button
                x-data
                @click="$dispatch('open-reply-modal')"
                class="fixed bottom-6 right-6 md:hidden z-30 w-14 h-14 rounded-full bg-primary text-white shadow-xl flex items-center justify-center hover:bg-primary-hover transition-transform active:scale-95"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
            </button>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div x-data="{ open: false }"
             @open-reply-modal.window="open = true"
             @message-sent.window="open = false"
             x-show="open"
             class="md:hidden fixed inset-0 z-50"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-full"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-full"
             style="display: none;"
        >
            <div @click="open = false" class="absolute inset-0 bg-slate-950/60 backdrop-blur-sm"></div>

            <div class="absolute bottom-0 w-full bg-white dark:bg-slate-900 rounded-t-3xl shadow-2xl p-6 border-t border-slate-200 dark:border-slate-800">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white">Répondre</h3>
                    <button @click="open = false" class="p-2 bg-slate-100 dark:bg-slate-800 rounded-full text-slate-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedConversationId): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contactetnewsletter::admin.messaging.reply-form', ['conversationId' => $selectedConversationId]);

$__key = 'reply-mobile-'.$selectedConversationId;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3063549259-3', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>

    
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('scroll-to-bottom', () => {
                const container = document.getElementById('messages-container');
                if (container) {
                    container.scrollTop = container.scrollHeight;
                }
            });
        });
    </script>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/ContactEtNewsletter/resources/views/livewire/admin/messaging/inbox-layout.blade.php ENDPATH**/ ?>