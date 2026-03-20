<?php $__env->startSection('title', 'Contact & FAQ'); ?>
<?php $__env->startSection('content'); ?>
    <div x-data="{ activeTab: 1 }">

        
        <div class=" py-4 container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button
                    @click="activeTab = 1"
                    :class="activeTab === 1 ? 'border-green-500 text-green-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                    class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-lg" 
                >
                    FAQ
                </button>

                <button
                    @click="activeTab = 2"
                    :class="activeTab === 2 ? 'border-green-500 text-green-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                    class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-lg" 
                >
                    Nous Contacter
                </button>
            </nav>
        </div>

        
        <div class="mt-8 container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div x-show="activeTab === 1" role="tabpanel" id="tab-faq">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contactetnewsletter::visitor.faq-index');

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1291851403-0', $__key);

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

            <div x-show="activeTab === 2" role="tabpanel" id="tab-contact">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contactetnewsletter::visitor.messaging.contact-us-form');

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1291851403-1', $__key);

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
        </div>

        <div class="mt-8 pt-4 border-t border-gray-200 flex justify-end space-x-4 container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <button
                @click="activeTab = (activeTab === 1 ? 2 : 1)"
                class="px-4 py-2 text-sm font-medium text-green-600 border border-green-600 rounded-md hover:bg-green-50 transition duration-150 ease-in-out"
            >
                <span x-text="activeTab === 1 ? 'Aller à Contact' : 'Aller à FAQ'"></span>
            </button>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('visitor.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/resources/views/visitor/pages/contact.blade.php ENDPATH**/ ?>