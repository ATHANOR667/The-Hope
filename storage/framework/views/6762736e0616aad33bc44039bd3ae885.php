<?php
    $links = [
        ['id' => 'hero-section', 'title' => 'Intro', 'long_title' => 'Introduction', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
        ['id' => 'about-founders', 'title' => 'Team', 'long_title' => 'Fondateurs', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 011-7.356'],
        ['id' => 'help-us-section', 'title' => 'Aide', 'long_title' => 'Aidez-nous', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
        ['id' => 'contact-feedback-section', 'title' => 'Contact', 'long_title' => 'Contact', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
    ];
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="#<?php echo e($link['id']); ?>"
       class="flex items-center w-full transition-all duration-300 ease-in-out relative
              
              text-gray-500 dark:text-gray-400 hover:text-green-600 dark:hover:text-green-400 focus:outline-none focus:ring-2 focus:ring-green-500/50

              <?php if(isset($mobile)): ?>
                
                flex-col justify-center h-full text-center py-1 sm:py-2 px-1
                border-t-2 border-transparent hover:border-green-400/50
              <?php else: ?>
                
                space-x-2 rounded-xl p-2.5
                group-hover:rounded-xl group-hover:pl-3 group-hover:py-2.5
                hover:bg-gray-100/70 dark:hover:bg-gray-800/70
              <?php endif; ?>
             "
       :class="{
           // 🌟 ÉTAT ACTIF : COULEUR ET FOND ACCENTUÉS 🌟
           // Texte plus sombre/vif
           'text-green-700 dark:text-green-300 font-semibold': activeSection === '<?php echo e($link['id']); ?>',

           <?php if(isset($mobile)): ?>
               // Mobile : Barre de surlignage ÉPAISSE pour l'occupation
               '!border-t-4 border-green-600 dark:border-green-500': activeSection === '<?php echo e($link['id']); ?>',
           <?php else: ?>
               // Desktop : Fond RECTANGULAIRE DOUX et ombre subtile
               'bg-green-50 dark:bg-green-900/30 shadow-lg shadow-green-300/30 dark:shadow-green-900/50 border border-green-200 dark:border-green-800': activeSection === '<?php echo e($link['id']); ?>',
           <?php endif; ?>
       }"
       aria-label="Aller à la section <?php echo e($link['long_title']); ?>"
       title="<?php echo e($link['long_title']); ?>">

        
        <svg class="
             <?php if(isset($mobile)): ?> w-6 h-6 <?php else: ?> w-5 h-5 <?php endif; ?>
             flex-shrink-0 transition-transform duration-300 transform
             group-hover:scale-[1.05]"
             fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($link['icon']); ?>" />
        </svg>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($mobile)): ?>
            
            <span class="text-xs font-medium mt-0.5 sm:mt-1"><?php echo e($link['title']); ?></span>
        <?php else: ?>
            
            <span class="text-sm font-medium whitespace-nowrap hidden group-hover:inline transition-all duration-300 ease-in-out">
                <?php echo e($link['long_title']); ?>

            </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/resources/views/visitor/partials/scrollspy_links.blade.php ENDPATH**/ ?>