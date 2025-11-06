@props([
    'name',
    'role',
    'quote',
    'bio',
    'expertise',
    'zone',
    'realisation',
    'mediaType',
    'mediaSrc',
    'socials' => []
])

<div class="flex-shrink-0 w-full sm:w-[380px] lg:w-[420px] p-4 snap-center">
    <div
        class="bg-white dark:bg-gray-800 shadow-xl rounded-4xl overflow-hidden transform hover:scale-[1.02] hover:shadow-green-500/30 transition duration-500 ease-in-out border border-gray-100 dark:border-gray-700 h-full flex flex-col"
        x-data="{
            isVideoPlaying: false,
            showDetail: false,
        }"
    >

        {{-- Conteneur Média --}}
        <div class="relative h-64 w-full bg-gray-200 dark:bg-gray-900 shadow-inner group overflow-hidden">
            @if ($mediaType === 'image')
                <img src="{{ $mediaSrc }}" alt="Portrait de {{ $name }}" class="object-cover w-full h-full transition-transform duration-700 ease-in-out group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/10 to-transparent"></div>
            @elseif ($mediaType === 'iframe')
                <iframe
                    :src="isVideoPlaying ? '{{ $mediaSrc }}?controls=0&rel=0&loop=1&playlist={{ basename($mediaSrc) }}&autoplay=1&mute=0' : '{{ $mediaSrc }}?controls=0&rel=0&loop=1&playlist={{ basename($mediaSrc) }}&autoplay=0&mute=1'"
                    title="Vidéo de présentation de {{ $name }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    class="w-full h-full transition-opacity duration-500"
                    :class="{ 'opacity-100': isVideoPlaying, 'opacity-80': !isVideoPlaying }"
                ></iframe>

                <div x-show="!isVideoPlaying"
                     @click="isVideoPlaying = true"
                     class="absolute inset-0 flex flex-col items-center justify-center bg-green-900/60 backdrop-blur-sm transition-opacity duration-500 group-hover:bg-green-900/40 cursor-pointer"
                     x-cloak>
                    <button aria-label="Lancer la vidéo"
                            class="p-5 rounded-full bg-white/95 text-green-600 shadow-xl ring-4 ring-green-500/60 transition-all duration-300 transform hover:scale-110 hover:bg-white">
                        <i class="fas fa-play text-xl"></i>
                    </button>
                    <span class="mt-3 text-sm font-semibold text-white/90 flex items-center">
                        <i class="fas fa-volume-up mr-2 text-base"></i> Activer la lecture et le son
                    </span>
                </div>
            @endif
        </div>

        {{-- Contenu du Membre --}}
        <div class="p-6 md:p-7 text-center flex-grow flex flex-col">

            <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-1">
                {{ $name }}
            </h3>

            <p class="text-xl text-green-700 dark:text-green-400 font-bold mb-4">
                {{ $role }}
            </p>

            {{-- Citation --}}
            <div class="relative mb-6 p-4 bg-gray-50 dark:bg-gray-700/30 rounded-xl border-l-4 border-green-500">
                <blockquote class="italic text-gray-700 dark:text-gray-300 text-lg break-words">
                    "{{ $quote }}"
                </blockquote>
            </div>

            {{-- Biographie/Détails --}}
            <div class="text-base text-gray-700 dark:text-gray-300 leading-relaxed mb-4 flex-grow transition-all duration-500 ease-in-out overflow-hidden"
                 :style="showDetail ? 'max-height: 800px;' : 'max-height: 72px;'">
                <p x-show="!showDetail" class="line-clamp-3 break-words">
                    {{ $bio }}
                </p>

                <div x-show="showDetail" class="text-left mt-0 space-y-3" x-cloak>
                    <p class="text-base text-gray-700 dark:text-gray-300 leading-relaxed mb-4">{{ $bio }}</p>

                    <div class="p-4 bg-green-50/50 dark:bg-green-900/20 rounded-lg">
                        <p class="font-bold text-green-600 dark:text-green-400 mb-3 text-lg">Faits Clés :</p>
                        <ul class="list-disc list-inside space-y-2 text-sm text-gray-700 dark:text-gray-300 pl-2">
                            <li class="pl-2">
                                <span class="font-semibold text-gray-800 dark:text-gray-200 break-words">Expertise</span> : {{ $expertise }}
                            </li>
                            <li class="pl-2">
                                <span class="font-semibold text-gray-800 dark:text-gray-200 break-words">Zones clés d'intervention</span> : {{ $zone }}
                            </li>
                            <li class="pl-2">
                                <span class="font-semibold text-gray-800 dark:text-gray-200 break-words">Réalisation</span> : {{ $realisation }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Bouton CTA --}}
            <button
                @click="showDetail = !showDetail"
                class="w-full py-3 mt-2 font-semibold rounded-xl transition duration-300 shadow-md focus:outline-none focus:ring-4 focus:ring-green-500/50 transform hover:scale-[1.01]"
                :class="showDetail ? 'bg-gray-700 hover:bg-gray-800 text-white dark:bg-gray-600 dark:hover:bg-gray-500' : 'bg-green-600 hover:bg-green-700 text-white'"
            >
                <i class="fas mr-2" :class="showDetail ? 'fa-arrow-up' : 'fa-info-circle'"></i>
                <span x-text="showDetail ? 'Masquer les détails' : 'En savoir plus sur {{ $name }}'"></span>
            </button>

            {{-- RÉSEAUX SOCIAUX --}}
            @if (!empty($socials))
                <div class="flex justify-center space-x-6 mt-6 border-t border-gray-200 dark:border-gray-700 pt-5">
                    @foreach ($socials as $social)
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                           aria-label="Lien {{ $name }} sur {{ ucfirst(explode('-', $social['icon'])[1] ?? 'Social') }}"
                           class="text-gray-500 dark:text-gray-400 hover:text-green-600 dark:hover:text-green-400 transition duration-300 transform hover:scale-125 focus:outline-none focus:ring-2 focus:ring-green-500 rounded-full">
                            <i class="{{ $social['icon'] }} text-2xl"></i>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
