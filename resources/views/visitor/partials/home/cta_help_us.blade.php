@push('styles')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* === FOND ÉLÉGANT & PROFESSIONNEL === */
        .help-bg {
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 50%, #d1fae5 100%);
            position: relative;
            overflow: hidden;
        }
        .dark .help-bg {
            background: linear-gradient(135deg, #065f46 0%, #0f766e 100%);
        }

        /* Texture légère */
        .help-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><filter id="noise"><feTurbulence type="fractalNoise" baseFrequency="0.9" numOctaves="4" stitchTiles="stitch"/></filter><rect width="100" height="100" filter="url(%23noise)" opacity="0.03"/></svg>');
            pointer-events: none;
            z-index: 0;
        }

        /* Bulles flottantes */
        .floating-orb {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(16, 185, 129, 0.15), transparent 70%);
            filter: blur(30px);
            animation: float 10s ease-in-out infinite;
            z-index: 1;
        }
        .dark .floating-orb {
            background: radial-gradient(circle at 30% 30%, rgba(52, 211, 153, 0.2), transparent 70%);
        }
        .floating-orb:nth-child(1) { width: 280px; height: 280px; top: 15%; left: 8%; animation-delay: 0s; }
        .floating-orb:nth-child(2) { width: 360px; height: 360px; bottom: 10%; right: 12%; animation-delay: -5s; }
        .floating-orb:nth-child(3) { width: 220px; height: 220px; top: 45%; left: 50%; animation-delay: -2.5s; }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); opacity: 0.4; }
            50% { transform: translateY(-25px) scale(1.08); opacity: 0.6; }
        }

        /* === TYPING ANIMATION (Texte progressif) === */
        .typing {
            overflow: hidden;
            white-space: nowrap;
            border-right: 3px solid #10b981;
            animation: typing 3s steps(40, end), blink 0.75s step-end infinite;
            display: inline-block;
        }
        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }
        @keyframes blink {
            from, to { border-color: transparent; }
            50% { border-color: #10b981; }
        }

        /* === CTA PREMIUM === */
        .cta-donate, .cta-volunteer {
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateZ(0);
            backface-visibility: hidden;
        }

        /* CTA DON - Glow + Pulse continu */
        .cta-donate {
            background: linear-gradient(135deg, #ffffff, #f0fdfa);
            color: #065f46;
            border: 1px solid rgba(16, 185, 129, 0.3);
            box-shadow: 0 8px 20px -5px rgba(16, 185, 129, 0.25);
            font-weight: 700;
            animation: breathe 3s ease-in-out infinite;
        }
        .cta-donate:hover {
            transform: translateY(-6px) scale(1.05);
            box-shadow: 0 25px 50px -12px rgba(16, 185, 129, 0.4), 0 0 0 10px rgba(16, 185, 129, 0.2);
            border-color: #10b981;
        }
        .cta-donate::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
            transition: left 0.7s;
        }
        .cta-donate:hover::before { left: 100%; }

        /* CTA BÉNÉVOLE - Effet verre + pop */
        .cta-volunteer {
            background: rgba(255, 255, 255, 0.15);
            color: #065f46;
            border: 2px solid rgba(16, 185, 129, 0.4);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            font-weight: 700;
        }
        .cta-volunteer:hover {
            background: rgba(255, 255, 255, 0.95);
            color: #0d9488;
            border-color: #10b981;
            transform: translateY(-6px) scale(1.05);
            box-shadow: 0 25px 50px -12px rgba(16, 185, 129, 0.3), 0 0 0 10px rgba(16, 185, 129, 0.25);
        }

        /* Icônes animées */
        .cta-icon {
            transition: all 0.3s ease;
            opacity: 0;
            animation: fadeInIcon 0.8s ease-out forwards;
            animation-delay: 0.5s;
        }
        .cta-donate:hover .cta-icon { animation: pulse 1.5s infinite; }
        .cta-volunteer:hover .cta-icon { animation: bounce 0.6s ease-in-out; }

        @keyframes fadeInIcon {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.25); } }
        @keyframes bounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }
        @keyframes breathe {
            0%, 100% { box-shadow: 0 8px 20px -5px rgba(16, 185, 129, 0.25); }
            50% { box-shadow: 0 12px 30px -5px rgba(16, 185, 129, 0.35); }
        }

        /* Dark mode */
        .dark .cta-donate {
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            color: #064e3b;
            border-color: rgba(52, 211, 153, 0.4);
            animation: breatheDark 3s ease-in-out infinite;
        }
        .dark .cta-donate:hover { box-shadow: 0 25px 50px -12px rgba(52, 211, 153, 0.4), 0 0 0 10px rgba(52, 211, 153, 0.2); }
        .dark .cta-volunteer {
            background: rgba(236, 253, 245, 0.2);
            color: #ecfdf5;
            border-color: rgba(52, 211, 153, 0.5);
        }
        .dark .cta-volunteer:hover {
            background: #ecfdf5;
            color: #0f766e;
        }
        @keyframes breatheDark {
            0%, 100% { box-shadow: 0 8px 20px -5px rgba(52, 211, 153, 0.3); }
            50% { box-shadow: 0 12px 30px -5px rgba(52, 211, 153, 0.4); }
        }
    </style>
@endpush

<section
    id="help-us-section"
    class="py-20 md:py-32 lg:py-40 relative help-bg"
    x-data="{ show: false }"
    x-init="setTimeout(() => show = true, 300)"
>
    {{-- Bulles flottantes --}}
    <div class="floating-orb"></div>
    <div class="floating-orb"></div>
    <div class="floating-orb"></div>

    <div class="container mx-auto px-6 lg:px-8 text-center max-w-4xl relative z-10">
        {{-- Titre avec animation progressive --}}
        <h2
            class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black text-emerald-900 dark:text-emerald-50 tracking-tight leading-tight drop-shadow-xl"
            x-show="show"
            x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 transform translate-y-8"
            x-transition:enter-end="opacity-100 transform translate-y-0"
        >
            <span class="typing inline-block">Ensemble,</span><br>
            <span class="typing inline-block" style="animation-delay: 3.2s;">Construisons l'Espoir</span>
        </h2>

        {{-- Paragraphe avec fade-in progressif --}}
        <p
            class="mt-6 text-lg sm:text-xl lg:text-2xl text-emerald-800 dark:text-emerald-100 font-light leading-relaxed max-w-3xl mx-auto opacity-95"
            x-show="show"
            x-transition:enter="transition ease-out duration-1200 delay-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
        >
            Votre générosité, qu'elle soit financière ou en temps, est le moteur essentiel qui transforme nos actions en réalité.
            <strong class="text-emerald-700 dark:text-emerald-300">Rejoignez notre mouvement.</strong>
        </p>

        {{-- CTA avec animations progressives --}}
        <div
            class="mt-14 flex flex-col items-center space-y-6 sm:space-y-0 sm:flex-row sm:justify-center sm:space-x-8"
            x-show="show"
            x-transition:enter="transition ease-out duration-1000 delay-600"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
        >
            {{-- DON --}}
            <a
                href="{{ route('visitor.donate') }}"
                class="group w-full sm:w-auto inline-flex items-center justify-center px-12 py-5 text-xl font-bold rounded-2xl cta-donate"
                aria-label="Faire un don"
            >
                <svg class="w-8 h-8 mr-3 cta-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                Faire un Don
            </a>

            {{-- BÉNÉVOLE --}}
            <a
                href="{{ route('visitor.contact-us') }}"
                class="group w-full sm:w-auto inline-flex items-center justify-center px-12 py-5 text-xl font-bold rounded-2xl cta-volunteer"
                aria-label="Devenir bénévole"
            >
                <svg class="w-8 h-8 mr-3 cta-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                Devenir Bénévole
            </a>
        </div>
    </div>
</section>

@push('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 1200, easing: 'ease-out-cubic' });

        // Typing cursor blink
        document.addEventListener('DOMContentLoaded', () => {
            const typingElements = document.querySelectorAll('.typing');
            typingElements.forEach(el => {
                el.style.width = '0';
                setTimeout(() => {
                    el.style.width = '100%';
                }, 100);
            });
        });
    </script>
@endpush
