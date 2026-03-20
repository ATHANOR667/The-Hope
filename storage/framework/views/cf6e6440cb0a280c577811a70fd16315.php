<?php $__env->startSection('title', 'Accueil'); ?>

<?php $__env->startSection('content'); ?>

    
    <div x-data="{ activeSection: 'hero-section' }"
         x-init="
         const sections = document.querySelectorAll('section');
         const observer = new IntersectionObserver(entries => {
             entries.forEach(entry => {
                 // S'assurer que l'on ne bascule pas immédiatement sur la section suivante
                 // si la section actuelle est toujours partiellement visible.
                 if (entry.isIntersecting) {
                     activeSection = entry.target.id;
                 }
             });
         }, {
             // Détection dans le tiers supérieur de la fenêtre (66%)
             threshold: 0.1,
             rootMargin: '0px 0px -66% 0px'
         });

         sections.forEach(section => {
             if (section.id) observer.observe(section);
         });
     ">
        
        <div class="hidden lg:flex fixed right-4 top-1/2 transform -translate-y-1/2 z-30 flex-col space-y-3 p-1.5 rounded-full shadow-2xl bg-white/50 dark:bg-gray-900/50 backdrop-blur-md border border-gray-200/20 dark:border-gray-700/20 transition-all duration-500 ease-in-out w-10 hover:w-44 group">
            
            <?php echo $__env->make('visitor.partials.scrollspy_links', ['desktop' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        
        <div class="lg:hidden fixed bottom-0 left-0 right-0 z-40 h-16 shadow-2xl bg-white/80 dark:bg-gray-900/80 backdrop-blur-lg border-t border-gray-200/50 dark:border-gray-700/50 flex justify-around items-center px-2">
            <?php echo $__env->make('visitor.partials.scrollspy_links', ['mobile' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        
        
        <?php echo $__env->make('visitor.partials.home.hero_video_bg', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('visitor.partials.home.about_founders', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('visitor.partials.home.cta_help_us', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('visitor.partials.home.contact_feedback', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* 2. Compensation de la barre de navigation fixe (Header) pour les ancres */
        /* Ceci est essentiel pour que le titre de la section ne soit pas caché sous le header. */
        section[id] {
            /* Nous utilisons un padding-top négatif pour remonter le contenu */
            padding-top: 80px; /* Doit correspondre à la 'fixedHeaderHeight' en JS */
            margin-top: -80px; /* Décalage compensatoire pour ramener la zone cliquable visible */
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    // La magie est désormais gérée par le CSS (`scroll-margin-top` ou l'astuce `padding-top/margin-top`).
                    // Le `window.scrollTo` devient redondant si l'astuce CSS est implémentée
                    // et que `scroll-behavior: smooth` est défini.

                    // Cependant, comme vous avez déjà une implémentation `window.scrollTo` avec offset,
                    // conservons-la pour une compatibilité maximale, MAIS AJUSTONS L'OFFSET.

                    // 1. Définir le décalage (offset)
                    const fixedHeaderHeight = 80;

                    // 2. Calculer la position de défilement souhaitée
                    // ON RETIRE L'OFFSET ! Car le CSS gère déjà la compensation
                    // Si le CSS ci-dessus est utilisé, il suffit de se scroll à la position exacte
                    const topPosition = targetElement.getBoundingClientRect().top + window.scrollY - fixedHeaderHeight;


                    // 3. Effectuer le défilement fluide
                    window.scrollTo({
                        top: topPosition,
                        behavior: 'smooth'
                    });

                    // Mise à jour de l'URL sans rechargement
                    history.pushState(null, null, this.getAttribute('href'));
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('visitor.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/resources/views/visitor/pages/accueil.blade.php ENDPATH**/ ?>