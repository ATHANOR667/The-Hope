@php
    $links = [
        ['id' => 'hero-section', 'title' => 'Intro', 'long_title' => 'Introduction', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
        ['id' => 'about-founders', 'title' => 'Team', 'long_title' => 'Fondateurs', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 011-7.356'],
        ['id' => 'help-us-section', 'title' => 'Aide', 'long_title' => 'Aidez-nous', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
        ['id' => 'contact-feedback-section', 'title' => 'Contact', 'long_title' => 'Contact', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
    ];
@endphp

@foreach ($links as $link)
    <a href="#{{ $link['id'] }}"
       class="flex items-center w-full transition-all duration-300 ease-in-out relative
              {{-- Styles de base pour le clic et l'état inactif --}}
              text-gray-500 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/50

              @if(isset($mobile))
                {{-- MOBILE-FIRST : maximise l'espace horizontal/vertical --}}
                flex-col justify-center h-full text-center py-1 sm:py-2 px-1
                border-t-2 border-transparent hover:border-indigo-400/50
              @else
                {{-- DESKTOP (PC) : Style moderne SOFT et RECTANGULAIRE doux --}}
                space-x-2 rounded-xl p-2.5
                group-hover:rounded-xl group-hover:pl-3 group-hover:py-2.5
                hover:bg-gray-100/70 dark:hover:bg-gray-800/70
              @endif
             "
       :class="{
           // 🌟 ÉTAT ACTIF : COULEUR ET FOND ACCENTUÉS 🌟
           // Texte plus sombre/vif
           'text-indigo-700 dark:text-indigo-300 font-semibold': activeSection === '{{ $link['id'] }}',

           @if(isset($mobile))
               // Mobile : Barre de surlignage ÉPAISSE pour l'occupation
               '!border-t-4 border-indigo-600 dark:border-indigo-500': activeSection === '{{ $link['id'] }}',
           @else
               // Desktop : Fond RECTANGULAIRE DOUX et ombre subtile
               'bg-indigo-50 dark:bg-indigo-900/30 shadow-lg shadow-indigo-300/30 dark:shadow-indigo-900/50 border border-indigo-200 dark:border-indigo-800': activeSection === '{{ $link['id'] }}',
           @endif
       }"
       aria-label="Aller à la section {{ $link['long_title'] }}"
       title="{{ $link['long_title'] }}">

        {{-- Icône --}}
        <svg class="
             @if(isset($mobile)) w-6 h-6 @else w-5 h-5 @endif
             flex-shrink-0 transition-transform duration-300 transform
             group-hover:scale-[1.05]"
             fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $link['icon'] }}" />
        </svg>

        {{-- Texte --}}
        @if(isset($mobile))
            {{-- Mobile : Texte toujours visible et court --}}
            <span class="text-xs font-medium mt-0.5 sm:mt-1">{{ $link['title'] }}</span>
        @else
            {{-- Desktop : Texte n'apparaît qu'au survol du groupe --}}
            <span class="text-sm font-medium whitespace-nowrap hidden group-hover:inline transition-all duration-300 ease-in-out">
                {{ $link['long_title'] }}
            </span>
        @endif
    </a>
@endforeach
