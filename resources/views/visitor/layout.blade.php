<!DOCTYPE html>
<html lang="fr" class="h-full"
      x-data="{
          darkMode: localStorage.getItem('theme') === 'dark',
          sidebarOpen: false,
          toggleDarkMode() {
              this.darkMode = !this.darkMode;
              localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
          }
      }"
      :class="{'dark': darkMode}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $layoutContent->meta['description'] }}">
    <meta name="keywords" content="{{ $layoutContent->meta['keywords'] }}">
    <meta name="author" content="{{ $layoutContent->meta['author'] }}">

    <meta property="og:title" content="@yield('title', $layoutContent->meta['og:title'] )">
    <meta property="og:description" content="{{ $layoutContent->meta['og:description'] }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ $layoutContent->meta['og:image'] }}">
    <meta property="og:image:width" content="{{ $layoutContent->meta['og:image:width'] }}">
    <meta property="og:image:height" content="{{ $layoutContent->meta['og:image:height'] }}">

    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" type="image/x-icon" href="{{ $layoutContent->meta['og:image'] }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $layoutContent->meta['og:image'] }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ $layoutContent->meta['og:image'] }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title',  $layoutContent->meta['title'] )</title>
</head>
<body class="h-full bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300 ease-in-out
      flex flex-col min-h-screen font-sans antialiased"
>

{{-- Global Livewire Loading Spinner (inchangé) --}}
<div wire:loading class="fixed inset-0 z-[9999] flex items-center justify-center bg-gray-900/70
    backdrop-blur-sm transition-opacity duration-300 ease-in-out" x-cloak>
    <div class="flex flex-col items-center">
        <svg class="animate-spin h-10 w-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span class="mt-3 text-white text-base font-medium">Chargement...</span>
    </div>
</div>

<div x-show="sidebarOpen"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click="sidebarOpen = false"
     class="fixed inset-0 bg-black/50 z-40 md:hidden"
     aria-hidden="true" x-cloak>
</div>

<header class="bg-white/70 dark:bg-gray-900/70 backdrop-blur-2xl shadow-md sticky top-0 z-50 transition-colors duration-300 ease-in-out border-b border-gray-200/50 dark:border-gray-700/50">
    <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('visitor.accueil') }}" class="flex items-center space-x-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-md p-1 -m-1">
            <img src="{{  $layoutContent->meta['og:image']   }}" alt="The Hope Charity Logo" class="h-9 w-auto rounded-full">
            <span class="text-xl font-extrabold text-gray-800 dark:text-gray-100 hidden sm:inline">The Hope Charity</span>
        </a>

        <div class="md:hidden">
            <button @click="sidebarOpen = !sidebarOpen"
                    class="p-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-200"
                    aria-label="Toggle navigation menu"
                    aria-expanded="false" :aria-expanded="sidebarOpen.toString()">
                <svg x-show="!sidebarOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="sidebarOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="hidden md:flex items-center space-x-6">
            <a href="{{ route('visitor.accueil') }}"
               class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium transition-all duration-200 pb-1 {{ request()->routeIs('visitor.accueil') ? 'text-indigo-600 dark:text-indigo-400 border-b-2 border-indigo-500 font-bold' : '' }}">Accueil</a>

            <a href="{{ route('visitor.galerie') }}"
               class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium transition-all duration-200 pb-1 {{ request()->routeIs('visitor.login') ? 'text-indigo-600 dark:text-indigo-400 border-b-2 border-indigo-500 font-bold' : '' }}">Galerie</a>

            <a href="{{ route('visitor.contact-us') }}"
               class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium transition-all duration-200 pb-1 {{ request()->routeIs('visitor.about-us') ? 'text-indigo-600 dark:text-indigo-400 border-b-2 border-indigo-500 font-bold' : '' }}">Nous Contacter</a>

            {{--  <a href="{{ route('visitor.login') }}"
               class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium transition-all duration-200 pb-1 {{ request()->routeIs('visitor.login') ? 'text-indigo-600 dark:text-indigo-400 border-b-2 border-indigo-500 font-bold' : '' }}">Connexion</a>
--}}
            <a href="{{route('visitor.donate')}}"
               class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-bold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-300 shadow-lg hover:shadow-xl">
                Faire un Don
            </a>

            <button @click="toggleDarkMode()"
                    class="p-2 rounded-full bg-gray-200/70 dark:bg-gray-700/70 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-transparent focus:ring-indigo-500 transition-colors duration-300 ease-in-out"
                    aria-label="Toggle dark mode">
                <svg x-show="!darkMode" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h1M4 12H3m15.325-7.757l-.707.707M6.343 17.657l-.707.707M16.95 7.05l.707-.707M7.05 16.95l-.707.707M12 15a3 3 0 100-6 3 3 0 000 6z" />
                </svg>
                <svg x-show="darkMode" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>
        </div>
    </nav>

    <div x-show="sidebarOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-y-95 origin-top"
         x-transition:enter-end="opacity-100 scale-y-100 origin-top"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-y-100 origin-top"
         x-transition:leave-end="opacity-0 scale-y-95 origin-top"
         class="md:hidden px-4 py-3 space-y-2 bg-white/70 dark:bg-gray-900/70 backdrop-blur-xl border-t border-gray-200 dark:border-gray-700 absolute w-full shadow-lg"
         x-cloak>
        <a href="{{ route('visitor.accueil') }}"
           class="block text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium transition-colors duration-200 py-2 px-3 rounded-lg {{ request()->routeIs('visitor.accueil') ? 'bg-indigo-100 dark:bg-indigo-900/40 text-indigo-600 dark:text-indigo-400 font-bold' : 'hover:bg-gray-50 dark:hover:bg-gray-800' }}">Accueil</a>

        <a href="{{ route('visitor.galerie') }}"
           class="block text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium transition-colors duration-200 py-2 px-3 rounded-lg {{ request()->routeIs('visitor.about-us') ? 'bg-indigo-100 dark:bg-indigo-900/40 text-indigo-600 dark:text-indigo-400 font-bold' : 'hover:bg-gray-50 dark:hover:bg-gray-800' }}">Galerie</a>

        <a href="{{ route('visitor.contact-us') }}"
           class="block text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium transition-colors duration-200 py-2 px-3 rounded-lg {{ request()->routeIs('visitor.about-us') ? 'bg-indigo-100 dark:bg-indigo-900/40 text-indigo-600 dark:text-indigo-400 font-bold' : 'hover:bg-gray-50 dark:hover:bg-gray-800' }}">Nous contacter</a>

        {{-- <a href="{{ route('visitor.login') }}"
           class="block text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium transition-colors duration-200 py-2 px-3 rounded-lg {{ request()->routeIs('visitor.login') ? 'bg-indigo-100 dark:bg-indigo-900/40 text-indigo-600 dark:text-indigo-400 font-bold' : 'hover:bg-gray-50 dark:hover:bg-gray-800' }}">Connexion</a>
--}}
        <a href="{{route('visitor.donate')}}"
           class="w-full flex items-center justify-center p-3 rounded-lg bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition-colors duration-300 mt-4 shadow-lg">
            Faire un Don
        </a>

        <div class="pt-3 border-t border-gray-200 dark:border-gray-700 mt-2">
            <button @click="toggleDarkMode()"
                    class="w-full flex items-center justify-center p-2 rounded-lg bg-gray-200/70 dark:bg-gray-700/70 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-transparent focus:ring-indigo-500 transition-colors duration-300 ease-in-out">
                <svg x-show="!darkMode" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h1M4 12H3m15.325-7.757l-.707.707M6.343 17.657l-.707.707M16.95 7.05l.707-.707M7.05 16.95l-.707.707M12 15a3 3 0 100-6 3 3 0 000 6z" />
                </svg>
                <svg x-show="darkMode" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
                <span x-text="darkMode ? 'Mode Clair' : 'Mode Sombre'"></span>
            </button>
        </div>
    </div>
</header>

<main class="flex-grow container mx-auto px-4 py-8">
    @livewire('flash-notification')
    @yield('content')
</main>

<footer class="bg-white/70 dark:bg-gray-900/70 backdrop-blur-2xl text-gray-600 dark:text-gray-300 p-8 mt-auto transition-colors duration-300 ease-in-out border-t border-gray-200/50 dark:border-gray-700/50">
    <div class="container mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8 pb-8 border-b border-gray-200/50 dark:border-gray-700/50">
            <div class="col-span-1">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Navigation</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('visitor.accueil') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-200">Accueil</a></li>
                    {{-- <li><a href="{{ route('visitor.login') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-200">Mon espace</a></li> --}}
                </ul>
            </div>

            <div class="col-span-1">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Informations</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{route('visitor.donate')}}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-200">Faire un don</a></li>
                    <li><a href="{{route('visitor.contact-us')}}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-200">Contact et FAQ</a></li>
                    <li><a href="{{route('visitor.galerie')}}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-200">Galerie</a></li>
                </ul>
            </div>

            <div class="col-span-2 lg:col-span-3">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Restez Informé(e)</h4>
                <p class="text-sm mb-4">Abonnez-vous à notre newsletter pour recevoir les dernières nouvelles sur nos actions et nos impacts.</p>
                @livewire('contactetnewsletter::visitor.newsletter.newsletter-subscribe-form')
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-center gap-4 pt-6">
            <p class="text-sm md:text-base order-2 md:order-1 font-medium">&copy; {{ date('Y') }} The Hope Charity. Tous droits réservés.</p>

            <div class="flex space-x-4 order-1 md:order-2">
                @if(!empty($layoutContent->social_links['facebook']))
                    <a href="{{ $layoutContent->social_links['facebook'] }}" target="_blank" rel="noopener noreferrer"
                       aria-label="Lien sur facebook"
                       class="text-gray-500 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-300 transform hover:scale-125 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-full">
                        <i class="fab fa-facebook text-2xl"></i>
                    </a>
                @endif

                @if(!empty($layoutContent->social_links['twitter']))
                    <a href="{{ $layoutContent->social_links['twitter'] }}" target="_blank" rel="noopener noreferrer"
                       aria-label="Lien sur twitter"
                       class="text-gray-500 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-300 transform hover:scale-125 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-full">
                        <i class="fab fa-x-twitter text-2xl"></i>
                    </a>
                @endif

                @if(!empty($layoutContent->social_links['instagram']))
                    <a href="{{ $layoutContent->social_links['instagram'] }}" target="_blank" rel="noopener noreferrer"
                       aria-label="Lien sur instagram"
                       class="text-gray-500 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-300 transform hover:scale-125 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-full">
                        <i class="fab fa-instagram text-2xl"></i>
                    </a>
                @endif

                @if(!empty($layoutContent->social_links['linkedin']))
                    <a href="{{ $layoutContent->social_links['linkedin'] }}" target="_blank" rel="noopener noreferrer"
                       aria-label="Lien sur linkedin"
                       class="text-gray-500 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-300 transform hover:scale-125 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-full">
                        <i class="fab fa-linkedin text-2xl"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</footer>

@livewireScripts
@stack('scripts')
@stack('style')
</body>
</html>
