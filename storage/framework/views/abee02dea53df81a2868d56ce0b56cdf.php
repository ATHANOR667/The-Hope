<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isOpen && $media): ?>
        
        <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4"
             x-data="{ open: true }"
             x-show="open"
             @click.self="open = false; $wire.closeModal()">
            <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-3xl max-h-[90vh] overflow-y-auto p-6 relative">

                
                <button class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                        @click="$wire.closeModal()">
                    <i class="fa-solid fa-times text-2xl"></i>
                </button>

                <div class="mb-6">
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($media->media_type === 'image' && $media->file_path): ?>
                        <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($media->file_path)); ?>"
                             alt="<?php echo e($media->title); ?>"
                             class="w-full h-auto rounded-lg"
                             loading="lazy">
                    <?php elseif(in_array($media->media_type, ['video', 'youtube', 'vimeo']) && ($media->file_path || $media->video_url)): ?>
                        <div class="w-full aspect-video">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($media->media_type === 'video' && $media->file_path): ?>
                                <video class="w-full h-full rounded-lg" controls>
                                    <source src="<?php echo e(\Illuminate\Support\Facades\Storage::url($media->file_path)); ?>" type="video/mp4">
                                    Votre navigateur ne supporte pas la lecture de vidéos.
                                </video>
                            <?php elseif(($media->media_type === 'youtube' || $media->media_type === 'vimeo') && $media->video_url): ?>
                                <iframe src="<?php echo e($media->video_url); ?>"
                                        class="w-full h-full rounded-lg"
                                        frameborder="0"
                                        allow="autoplay; encrypted-media; gyroscope; picture-in-picture;"
                                        allowfullscreen
                                >
                                </iframe>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center justify-center w-full h-64 bg-gray-200 dark:bg-gray-700 rounded-lg">
                            <p class="text-gray-500 dark:text-gray-400">Média Indisponible</p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2"><?php echo e($media->title); ?></h3>
                <p class="text-sm text-green-400 mb-4">
                    <?php echo e(ucfirst($media->media_type)); ?> | Publié le <?php echo e($media->created_at->format('d/m/Y')); ?>

                </p>


                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post): ?>
                    <div class="max-w-full mb-4 border-b pb-4 border-gray-200 dark:border-gray-700">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Description du Post</h4>
                        <p class="text-gray-600 dark:text-gray-400 break-words">
                            <?php echo e($post->description ?? 'Aucune description disponible.'); ?>

                        </p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <div class="mt-6">
                    <h4 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">
                        Commentaires (<?php echo e($comments->count()); ?>)
                    </h4>

                    
                    <?php echo $__env->make('galeriemodule::livewire.visitor.galerie.partials.comment-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <div class="space-y-6 mt-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            
                            <?php echo $__env->make('galeriemodule::livewire.visitor.galerie.partials.comment-item', ['comment' => $comment], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-gray-500 dark:text-gray-400 text-center py-6">
                                Soyez le premier à commenter ce post !
                            </p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/GalerieModule/resources/views/livewire/visitor/galerie/media-details.blade.php ENDPATH**/ ?>