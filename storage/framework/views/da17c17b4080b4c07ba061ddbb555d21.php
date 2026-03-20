<div>
    <?php if (isset($component)) { $__componentOriginalb1bb066c727747b1a857cded569d24b7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb1bb066c727747b1a857cded569d24b7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.modal','data' => ['wire:model' => 'showDetails','title' => ''.e($message->title ?? 'Détails de la Newsletter').'','maxWidth' => '6xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'showDetails','title' => ''.e($message->title ?? 'Détails de la Newsletter').'','maxWidth' => '6xl']); ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($message): ?>
            <div class="space-y-8">
                
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-4 border-b border-slate-100 dark:border-slate-800">
                    <div class="flex items-center gap-3">
                        <span class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Statut:</span>
                        <?php if (isset($component)) { $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.badge','data' => ['variant' => ''.e($message->sent_at ? 'success' : 'warning').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => ''.e($message->sent_at ? 'success' : 'warning').'']); ?>
                            <?php echo e($message->sent_at ? 'Envoyée' : 'Brouillon'); ?>

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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($message->sent_at): ?>
                        <div class="text-sm text-slate-500">
                            Le <span class="font-bold text-slate-900 dark:text-white"><?php echo e($message->sent_at->format('d/m/Y')); ?></span> à <span class="font-bold text-slate-900 dark:text-white"><?php echo e($message->sent_at->format('H:i')); ?></span>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [
                        'mail' => ['Email', 'M3 8L7 12L3 16 M21 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75'],
                        'sms' => ['SMS', 'M8 10C8 10.5523 8.44772 11 9 11C9.55228 11 10 10.5523 10 10C10 9.44772 9.55228 9 9 9C8.44772 9 8 9.44772 8 10Z M12 10C12 10.5523 12.4477 11 13 11C13.5523 11 14 10.5523 14 10C14 9.44772 13.5523 9 13 9C12.4477 9 12 9.44772 12 10Z M16 10C16 10.5523 16.4477 11 17 11C17.5523 11 18 10.5523 18 10C18 9.44772 17.5523 9 17 9C16.4477 9 16 9.44772 16 10Z M21 20H4C2.89543 20 2 19.1046 2 18V6C2 4.89543 2.89543 4 4 4H21C22.1046 4 23 4.89543 23 6V18C23 19.1046 22.1046 20 21 20Z M21 6H4V18H21V6Z'],
                        'whatsapp' => ['WhatsApp', 'M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2Z M16.7126 15.2285C16.5926 15.0185 15.2026 14.3485 14.9626 14.2585C14.7226 14.1685 14.5426 14.0785 14.3626 14.3185C14.1826 14.5585 13.6726 15.1585 13.5126 15.3485C13.3526 15.5385 13.2026 15.5585 12.9326 15.4285C12.2926 15.1185 10.7426 14.5285 9.8726 13.1085C9.6226 12.6985 9.7726 12.5285 9.9126 12.3985C10.0326 12.2785 10.1826 12.0785 10.3226 11.9185C10.4626 11.7585 10.5126 11.6485 10.6026 11.4785C10.7026 11.2785 10.6526 11.1085 10.5726 10.9585C10.5026 10.8285 9.9926 9.6185 9.7926 9.1085C9.5926 8.5985 9.3826 8.6885 9.2226 8.6885C9.0926 8.6885 8.9026 8.6885 8.7126 8.6885C8.5226 8.6885 8.2126 8.7585 7.9726 9.0385C7.7326 9.3185 7.1526 9.8585 7.1526 10.9485C7.1526 12.0385 7.9526 13.0685 8.0626 13.2085C8.1726 13.3485 9.6726 15.5985 11.8326 16.5185C13.9926 17.4385 14.4426 17.2985 14.8526 17.2585C15.2626 17.2185 16.2026 16.6185 16.3926 16.0585C16.5826 15.4985 16.8226 15.0585 16.7126 15.2285Z']
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => [$label, $svgPath]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($stats[$key]) && $stats[$key]['try'] > 0): ?>
                            <?php
                                $stat = $stats[$key];
                                $sentRate = $stat['sent_rate'];
                                $readRate = $stat['read_rate'];
                            ?>
                            <div class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm">
                                <div class="flex items-center gap-3 mb-6">
                                    <div class="p-2 rounded-lg bg-primary/10 text-primary">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($svgPath); ?>"></path></svg>
                                    </div>
                                    <h4 class="font-bold text-slate-900 dark:text-white"><?php echo e($label); ?></h4>
                                </div>

                                <div class="space-y-4">
                                    <div>
                                        <div class="flex justify-between text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                                            <span>Envoi</span>
                                            <span><?php echo e($sentRate); ?>%</span>
                                        </div>
                                        <div class="h-2 w-full bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                            <div class="h-full bg-primary" style="width: <?php echo e($sentRate); ?>%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                                            <span>Lecture</span>
                                            <span><?php echo e($readRate); ?>%</span>
                                        </div>
                                        <div class="h-2 w-full bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                            <div class="h-full bg-success" style="width: <?php echo e($readRate); ?>%"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 pt-4 border-t border-slate-50 dark:border-slate-800 flex justify-between">
                                    <div class="text-center flex-1">
                                        <p class="text-[10px] font-bold text-slate-400 uppercase">Tenta.</p>
                                        <p class="text-sm font-black text-slate-900 dark:text-white"><?php echo e($stat['try']); ?></p>
                                    </div>
                                    <div class="text-center flex-1 border-x border-slate-50 dark:border-slate-800">
                                        <p class="text-[10px] font-bold text-slate-400 uppercase">Env.</p>
                                        <p class="text-sm font-black text-slate-900 dark:text-white"><?php echo e($stat['sent']); ?></p>
                                    </div>
                                    <div class="text-center flex-1">
                                        <p class="text-[10px] font-bold text-slate-400 uppercase">Lus</p>
                                        <p class="text-sm font-black text-slate-900 dark:text-white"><?php echo e($stat['read']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($stats['errors'] ?? 0) > 0): ?>
                    <div class="p-4 rounded-2xl bg-danger/5 border border-danger/20">
                        <div class="flex items-center gap-2 text-danger mb-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.332 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            <h4 class="font-bold"><?php echo e($stats['errors']); ?> Échecs d'envoi</h4>
                        </div>
                        <div class="max-h-32 overflow-y-auto space-y-2 pr-2 custom-scrollbar">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $message->deliveries->where('status', 'failed'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="text-xs flex flex-col sm:flex-row sm:items-center justify-between p-2 rounded-lg bg-danger/5 border border-danger/10">
                                    <span class="font-bold text-slate-700 dark:text-slate-300"><?php echo e($d->subscriber->email ?? $d->subscriber->phone); ?></span>
                                    <span class="italic text-danger opacity-80"><?php echo e(Str::limit($d->error_message, 60)); ?></span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <div class="space-y-6 pt-6 border-t border-slate-100 dark:border-slate-800">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                        <h4 class="text-xl font-bold text-slate-900 dark:text-white">Liste des abonnés <span class="text-slate-400 font-normal">(<?php echo e($concernedUsers->count()); ?>)</span></h4>

                        <div class="flex flex-col sm:flex-row gap-3">
                            <?php if (isset($component)) { $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.input','data' => ['wire:model.live.debounce.300ms' => 'search','placeholder' => 'Rechercher...','size' => 'sm','class' => 'sm:w-48']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live.debounce.300ms' => 'search','placeholder' => 'Rechercher...','size' => 'sm','class' => 'sm:w-48']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f)): ?>
<?php $attributes = $__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f; ?>
<?php unset($__attributesOriginald403b78e8b12be0ca768bd08f9c25b1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald403b78e8b12be0ca768bd08f9c25b1f)): ?>
<?php $component = $__componentOriginald403b78e8b12be0ca768bd08f9c25b1f; ?>
<?php unset($__componentOriginald403b78e8b12be0ca768bd08f9c25b1f); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal0cb753607d745ad31de5c017a5eb9d5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.select','data' => ['wire:model.live' => 'filterChannel','size' => 'sm','class' => 'sm:w-32']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'filterChannel','size' => 'sm','class' => 'sm:w-32']); ?>
                                <option value="">Tous canaux</option>
                                <option value="mail">Email</option>
                                <option value="sms">SMS</option>
                                <option value="whatsapp">WhatsApp</option>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b)): ?>
<?php $attributes = $__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b; ?>
<?php unset($__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0cb753607d745ad31de5c017a5eb9d5b)): ?>
<?php $component = $__componentOriginal0cb753607d745ad31de5c017a5eb9d5b; ?>
<?php unset($__componentOriginal0cb753607d745ad31de5c017a5eb9d5b); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal0cb753607d745ad31de5c017a5eb9d5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.select','data' => ['wire:model.live' => 'filterStatus','size' => 'sm','class' => 'sm:w-32']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'filterStatus','size' => 'sm','class' => 'sm:w-32']); ?>
                                <option value="">Tous statuts</option>
                                <option value="success">Envoyé</option>
                                <option value="failed">Échec</option>
                                <option value="pending">En attente</option>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b)): ?>
<?php $attributes = $__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b; ?>
<?php unset($__attributesOriginal0cb753607d745ad31de5c017a5eb9d5b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0cb753607d745ad31de5c017a5eb9d5b)): ?>
<?php $component = $__componentOriginal0cb753607d745ad31de5c017a5eb9d5b; ?>
<?php unset($__componentOriginal0cb753607d745ad31de5c017a5eb9d5b); ?>
<?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="border border-slate-100 dark:border-slate-800 rounded-2xl overflow-hidden">
                        <?php if (isset($component)) { $__componentOriginaleef4679219997819b2b191f11d675e58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleef4679219997819b2b191f11d675e58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <thead>
                                <?php if (isset($component)) { $__componentOriginal4d5960b9e7069b75153ebf06871577b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d5960b9e7069b75153ebf06871577b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.row','data' => ['class' => 'bg-slate-50/50 dark:bg-slate-900/50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-slate-50/50 dark:bg-slate-900/50']); ?>
                                    <?php if (isset($component)) { $__componentOriginal009eba386f1e174b9aa8efee17341773 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal009eba386f1e174b9aa8efee17341773 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Contact <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $attributes = $__attributesOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__attributesOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $component = $__componentOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__componentOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal009eba386f1e174b9aa8efee17341773 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal009eba386f1e174b9aa8efee17341773 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Canal <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $attributes = $__attributesOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__attributesOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $component = $__componentOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__componentOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal009eba386f1e174b9aa8efee17341773 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal009eba386f1e174b9aa8efee17341773 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Statut <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $attributes = $__attributesOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__attributesOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $component = $__componentOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__componentOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal009eba386f1e174b9aa8efee17341773 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal009eba386f1e174b9aa8efee17341773 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => ['align' => 'center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'center']); ?>Lu <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $attributes = $__attributesOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__attributesOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $component = $__componentOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__componentOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal009eba386f1e174b9aa8efee17341773 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal009eba386f1e174b9aa8efee17341773 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.th','data' => ['align' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right']); ?>Action <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $attributes = $__attributesOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__attributesOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal009eba386f1e174b9aa8efee17341773)): ?>
<?php $component = $__componentOriginal009eba386f1e174b9aa8efee17341773; ?>
<?php unset($__componentOriginal009eba386f1e174b9aa8efee17341773); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d5960b9e7069b75153ebf06871577b9)): ?>
<?php $attributes = $__attributesOriginal4d5960b9e7069b75153ebf06871577b9; ?>
<?php unset($__attributesOriginal4d5960b9e7069b75153ebf06871577b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d5960b9e7069b75153ebf06871577b9)): ?>
<?php $component = $__componentOriginal4d5960b9e7069b75153ebf06871577b9; ?>
<?php unset($__componentOriginal4d5960b9e7069b75153ebf06871577b9); ?>
<?php endif; ?>
                            </thead>
                            <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $concernedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if (isset($component)) { $__componentOriginal4d5960b9e7069b75153ebf06871577b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d5960b9e7069b75153ebf06871577b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.row','data' => ['class' => 'hover:bg-slate-50/30 dark:hover:bg-slate-900/30']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hover:bg-slate-50/30 dark:hover:bg-slate-900/30']); ?>
                                        <?php if (isset($component)) { $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.td','data' => ['class' => 'font-mono text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-mono text-xs']); ?><?php echo e($user['contact_used']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $attributes = $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $component = $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.td','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.badge','data' => ['size' => 'xs','variant' => 'primary','outline' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','variant' => 'primary','outline' => true]); ?><?php echo e(strtoupper($user['channel'])); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb)): ?>
<?php $attributes = $__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb; ?>
<?php unset($__attributesOriginalafe60356fc24a1df475a40bac4ca6eeb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalafe60356fc24a1df475a40bac4ca6eeb)): ?>
<?php $component = $__componentOriginalafe60356fc24a1df475a40bac4ca6eeb; ?>
<?php unset($__componentOriginalafe60356fc24a1df475a40bac4ca6eeb); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $attributes = $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $component = $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.td','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user['status'] === 'failed'): ?>
                                                <span class="text-danger font-bold text-xs">Échec</span>
                                            <?php elseif($user['status'] === 'pending'): ?>
                                                <span class="text-warning font-bold text-xs">En attente</span>
                                            <?php else: ?>
                                                <span class="text-success font-bold text-xs">Envoyé</span>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $attributes = $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $component = $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.td','data' => ['align' => 'center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'center']); ?>
                                            <div class="w-2 h-2 rounded-full mx-auto <?php echo e($user['is_read'] ? 'bg-success' : 'bg-slate-300'); ?>"></div>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $attributes = $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $component = $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.td','data' => ['align' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right']); ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user['status'] != 'success'): ?>
                                                <?php if (isset($component)) { $__componentOriginal580e1af29f3b65fbd4f30017fc1d1333 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal580e1af29f3b65fbd4f30017fc1d1333 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.button','data' => ['size' => 'xs','wire:click' => 'retry(\''.e($user['delivery_id']).'\')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs','wire:click' => 'retry(\''.e($user['delivery_id']).'\')','wire:loading.attr' => 'disabled']); ?>
                                                    Réessayer
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
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $attributes = $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $component = $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d5960b9e7069b75153ebf06871577b9)): ?>
<?php $attributes = $__attributesOriginal4d5960b9e7069b75153ebf06871577b9; ?>
<?php unset($__attributesOriginal4d5960b9e7069b75153ebf06871577b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d5960b9e7069b75153ebf06871577b9)): ?>
<?php $component = $__componentOriginal4d5960b9e7069b75153ebf06871577b9; ?>
<?php unset($__componentOriginal4d5960b9e7069b75153ebf06871577b9); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php if (isset($component)) { $__componentOriginal4d5960b9e7069b75153ebf06871577b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d5960b9e7069b75153ebf06871577b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.row','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php if (isset($component)) { $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.table.td','data' => ['colspan' => '5','align' => 'center','class' => 'py-10 text-slate-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['colspan' => '5','align' => 'center','class' => 'py-10 text-slate-400']); ?>Aucun abonné trouvé. <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $attributes = $__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__attributesOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623)): ?>
<?php $component = $__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623; ?>
<?php unset($__componentOriginalfcbf9e38b0b8a838ee89c073a32fc623); ?>
<?php endif; ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d5960b9e7069b75153ebf06871577b9)): ?>
<?php $attributes = $__attributesOriginal4d5960b9e7069b75153ebf06871577b9; ?>
<?php unset($__attributesOriginal4d5960b9e7069b75153ebf06871577b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d5960b9e7069b75153ebf06871577b9)): ?>
<?php $component = $__componentOriginal4d5960b9e7069b75153ebf06871577b9; ?>
<?php unset($__componentOriginal4d5960b9e7069b75153ebf06871577b9); ?>
<?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </tbody>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleef4679219997819b2b191f11d675e58)): ?>
<?php $attributes = $__attributesOriginaleef4679219997819b2b191f11d675e58; ?>
<?php unset($__attributesOriginaleef4679219997819b2b191f11d675e58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleef4679219997819b2b191f11d675e58)): ?>
<?php $component = $__componentOriginaleef4679219997819b2b191f11d675e58; ?>
<?php unset($__componentOriginaleef4679219997819b2b191f11d675e58); ?>
<?php endif; ?>
                    </div>
                </div>

                
                <div class="space-y-4 pt-6 border-t border-slate-100 dark:border-slate-800">
                    <h4 class="text-xl font-bold text-slate-900 dark:text-white">Contenu du Message</h4>
                    <div class="p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 prose prose-slate dark:prose-invert max-w-none shadow-inner">
                        <?php echo $message->content; ?>

                    </div>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb1bb066c727747b1a857cded569d24b7)): ?>
<?php $attributes = $__attributesOriginalb1bb066c727747b1a857cded569d24b7; ?>
<?php unset($__attributesOriginalb1bb066c727747b1a857cded569d24b7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb1bb066c727747b1a857cded569d24b7)): ?>
<?php $component = $__componentOriginalb1bb066c727747b1a857cded569d24b7; ?>
<?php unset($__componentOriginalb1bb066c727747b1a857cded569d24b7); ?>
<?php endif; ?>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/ContactEtNewsletter/resources/views/livewire/admin/newsletter/newsletter-message-details.blade.php ENDPATH**/ ?>