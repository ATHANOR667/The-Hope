<div>
    <div class="space-y-12 sm:space-y-16 pb-16 dark:bg-gray-900 min-h-screen">

        {{-- 1. SECTION MEDIA PRINCIPAL (Le 'Hero' Immersif) --}}
        {{-- L'événement @click est retiré ici pour être placé sur l'overlay superposé --}}
        <section class="relative h-[60vh] md:h-[70vh] lg:h-[80vh] w-full overflow-hidden shadow-2xl rounded-b-xl md:rounded-b-3xl
                    transform transition-all duration-500 ease-in-out group">

            @isset($mainMedia)
                {{-- Conteneur du Média Principal (avec effet de zoom au survol) --}}
                <div class="absolute inset-0 transition-transform duration-500 ease-in-out group-hover:scale-105">
                    @if ($mainMedia->media_type === 'image' && $mainMedia->file_path)
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($mainMedia->file_path) }}" alt="{{ $mainMedia->title }}"
                             class="w-full h-full object-cover"
                             loading="lazy">
                    @elseif (in_array($mainMedia->media_type, ['video', 'youtube', 'vimeo']) && ($mainMedia->file_path || $mainMedia->video_url))
                        <div class="w-full h-full bg-black">
                            @if ($mainMedia->media_type === 'video' && $mainMedia->file_path)
                                {{-- Vidéo Locale: autoplay, mute, loop, pas de contrôles --}}
                                <video class="w-full h-full object-cover" autoplay muted loop controlslist="nodownload nofullscreen" disablepictureinpicture>
                                    <source src="{{ \Illuminate\Support\Facades\Storage::url($mainMedia->file_path) }}" type="video/mp4">
                                    Votre navigateur ne supporte pas la lecture de vidéos.
                                </video>
                            @elseif ($mainMedia->media_type === 'youtube' && $mainMedia->video_url)
                                @php
                                    // Extraction de l'ID YouTube pour la boucle
                                    $youtubeId = $mainMedia->video_url;
                                    if (preg_match('/(?:youtu\.be\/|v=|embed\/)([^&?]+)/', $mainMedia->video_url, $matches)) {
                                        $youtubeId = $matches[1];
                                    }
                                    // Paramètres YouTube pour Autoplay, Mute, Loop, contrôles cachés (Hero)
                                    $youtubeParams = 'autoplay=1&mute=1&loop=1&playlist=' . $youtubeId . '&controls=0&modestbranding=1&showinfo=0&rel=0&iv_load_policy=3';
                                    $youtubeEmbedUrl = 'https://www.youtube.com/embed/' . $youtubeId . '?' . $youtubeParams;
                                @endphp
                                {{-- YouTube: autoplay, mute, loop, pas de contrôles --}}
                                <iframe src="{{ $youtubeEmbedUrl }}"
                                        class="w-full h-full" frameborder="0"
                                        allow="autoplay; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
                            @elseif ($mainMedia->media_type === 'vimeo' && $mainMedia->video_url)
                                @php
                                    $vimeoEmbedUrl = $mainMedia->video_url;
                                    // Paramètres Vimeo pour Autoplay, Mute, Loop, Background (cache les contrôles)
                                    $vimeoParams = 'autoplay=1&muted=1&loop=1&background=1';
                                    $vimeoEmbedUrl .= (strpos($vimeoEmbedUrl, '?') === false ? '?' : '&') . $vimeoParams;
                                @endphp
                                {{-- Vimeo: autoplay, mute, loop, pas de contrôles --}}
                                <iframe src="{{ $vimeoEmbedUrl }}"
                                        class="w-full h-full" frameborder="0"
                                        allow="autoplay; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
                            @endif
                        </div>
                    @else
                        {{-- État Indisponible (Squelette/Fallback moderne) --}}
                        <div class="flex items-center justify-center w-full h-full bg-gray-800 animate-pulse">
                            <svg class="w-12 h-12 text-gray-600" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2zm0 14h16V6H4v12zm1-8l3.5 4.5 2.5-3 3.5 4.5H5zm14 0c-.83 0-1.5-.67-1.5-1.5S18.17 9 19 9s1.5.67 1.5 1.5S19.83 12 19 12z"/></svg>
                            <p class="ml-4 text-xl text-gray-500 hidden sm:block">Média Principal Indisponible</p>
                        </div>
                    @endif
                </div>

                {{-- NOUVEAU: Overlay de Clic pour intercepter le clic au-dessus de l'iframe --}}
                <div class="absolute inset-0 cursor-pointer z-10"
                     @click="$dispatch('open-media-modal', { mediaId: '{{ $mainMedia->id ?? 'null' }}' })">
                </div>

                {{-- Overlay de Titre et Description (Plaque d'information) --}}
                {{-- Ajout d'un z-index supérieur pour s'assurer que le contenu reste cliquable et visible --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent p-5 sm:p-8 lg:p-12 flex flex-col justify-end z-20">
                    <p class="text-sm font-semibold text-cyan-400 uppercase tracking-wider mb-1 drop-shadow-md">
                        {{ $mainMedia->media_type === 'image' ? 'Photo' : 'Vidéo' }} | Coup de Cœur
                    </p>
                    <h2 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white drop-shadow-xl mb-3 leading-tight">
                        {{ $mainMedia->title ?? 'Notre Coup de Cœur du Moment' }}
                    </h2>
                    <p class="text-gray-300 text-sm sm:text-base drop-shadow-md">
                        Publié le {{ $mainMedia->created_at->format('d/m/Y') }}
                    </p>
                    <button class="mt-4 w-fit px-6 py-2 bg-green-600 text-white font-bold rounded-full text-base shadow-lg hover:bg-green-700 transition duration-300 transform hover:scale-105 flex items-center"
                            @click="$dispatch('open-media-modal', { mediaId: '{{ $mainMedia->id }}' })">

                    <i class="fa-solid fa-circle-play mr-2"></i> Voir les détails
                    </button>
                </div>
            @else
                {{-- État Initial/Vide --}}
                <div class="flex flex-col items-center justify-center h-full bg-gray-800/90 rounded-b-xl md:rounded-b-3xl p-8">
                    <i class="fa-solid fa-satellite-dish text-6xl text-green-500 mb-4 animate-pulse"></i>
                    <h3 class="text-2xl font-semibold text-white mb-2">Bienvenue !</h3>
                    <p class="text-lg text-gray-400 text-center">Découvrez la Galerie de The Hope Charity. Contenu en préparation...</p>
                </div>
            @endisset
        </section>

        <hr class="border-gray-800" />

        {{-- 2. CATALOGUE IMMERSIF (Les "lignes" de contenu à la Netflix) --}}
        <section class="px-4 sm:px-6 lg:px-8">
            @forelse($posts as $post)
                <div class="mb-10 sm:mb-14">
                    {{-- Titre de la Ligne --}}
                    <h2 class="text-xl sm:text-3xl font-bold text-gray-800 dark:text-gray-100 mb-4">
                        {{ $post->title }}
                        <span class="text-base font-medium text-gray-500 dark:text-gray-400 ml-3 hidden sm:inline">
                        ({{ $post->medias->count() }} Éléments)
                    </span>
                    </h2>

                    {{-- Conteneur Scrollable (Horizontal) --}}
                    <div class="flex overflow-x-auto space-x-3 sm:space-x-5 pb-4 custom-scrollbar">
                        @foreach($post->medias as $media)
                            {{-- Carte Média: L'événement @click est retiré pour être déplacé dans l'overlay --}}
                            <article class="flex-shrink-0 w-44 h-32 sm:w-56 sm:h-36 md:w-64 md:h-40 rounded-xl overflow-hidden shadow-xl
                                        transform hover:scale-[1.05] hover:shadow-2xl transition-all duration-300 ease-in-out relative group/card
                                        bg-gray-800/80 ring-1 ring-gray-700/50">

                                <div class="w-full h-full">
                                    @if ($media->media_type === 'image' && $media->file_path)
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($media->file_path) }}" alt="{{ $post->title }}"
                                             class="w-full h-full object-cover transition duration-300 group-hover/card:opacity-60"
                                             loading="lazy">
                                    @elseif (in_array($media->media_type, ['video', 'youtube', 'vimeo']) && ($media->file_path || $media->video_url))
                                        {{-- Affichage de la preview vidéo --}}
                                        <div class="w-full h-full bg-black">
                                            @if ($media->media_type === 'video' && $media->file_path)
                                                {{-- Vidéo Locale: autoplay, mute, loop (Preview) --}}
                                                <video class="w-full h-full object-cover" autoplay muted loop poster="{{ \Illuminate\Support\Facades\Storage::url($media->thumbnail_path ?? '') ?? '' }}">
                                                    <source src="{{ \Illuminate\Support\Facades\Storage::url($media->file_path) }}" type="video/mp4">
                                                    Votre navigateur ne supporte pas la lecture de vidéos.
                                                </video>
                                            @elseif ($media->media_type === 'youtube' && $media->video_url)
                                                @php
                                                    // Extraction de l'ID YouTube pour la boucle
                                                    $youtubeId = $media->video_url;
                                                    if (preg_match('/(?:youtu\.be\/|v=|embed\/)([^&?]+)/', $media->video_url, $matches)) {
                                                        $youtubeId = $matches[1];
                                                    }
                                                    // Paramètres YouTube pour Autoplay, Mute, Loop, contrôles cachés (Preview)
                                                    $youtubeParams = 'autoplay=1&mute=1&loop=1&playlist=' . $youtubeId . '&controls=0&modestbranding=1&showinfo=0&rel=0&iv_load_policy=3';
                                                    $youtubeEmbedUrl = 'https://www.youtube.com/embed/' . $youtubeId . '?' . $youtubeParams;
                                                @endphp
                                                {{-- YouTube: autoplay, mute, loop (Preview) --}}
                                                <iframe src="{{ $youtubeEmbedUrl }}"
                                                        class="w-full h-full" frameborder="0"
                                                        allow="autoplay; encrypted-media;" allowfullscreen></iframe>
                                            @elseif ($media->media_type === 'vimeo' && $media->video_url)
                                                @php
                                                    $vimeoEmbedUrl = $media->video_url;
                                                    // Paramètres Vimeo pour Autoplay, Mute, Loop, Background (cache les contrôles)
                                                    $vimeoParams = 'autoplay=1&muted=1&loop=1&background=1';
                                                    $vimeoEmbedUrl .= (strpos($vimeoEmbedUrl, '?') === false ? '?' : '&') . $vimeoParams;
                                                @endphp
                                                {{-- Vimeo: autoplay, mute, loop (Preview) --}}
                                                <iframe src="{{ $vimeoEmbedUrl }}"
                                                        class="w-full h-full" frameborder="0"
                                                        allow="autoplay; encrypted-media;" allowfullscreen></iframe>
                                            @endif
                                        </div>

                                        {{-- Overlay d'indicateur de lecture (MAINTENANT AVEC L'ÉVÉNEMENT @click ET z-index) --}}
                                        <div class="absolute inset-0 bg-black/30 flex items-center justify-center cursor-pointer z-10"
                                             @click="$dispatch('open-media-modal', { mediaId: '{{ $media->id }}' })">
                                            <i class="fa-solid fa-circle-play text-white text-3xl opacity-80 group-hover/card:opacity-100 transition-opacity transform group-hover/card:scale-110 drop-shadow-lg"></i>
                                        </div>

                                    @else
                                        <div class="flex items-center justify-center w-full h-full text-center p-3">
                                            <p class="text-xs text-gray-400">Contenu Inaccessible</p>
                                        </div>
                                    @endif
                                </div>

                                {{-- Détails au Survol/Focus --}}
                                {{-- Ajout de 'pointer-events-none' pour s'assurer que le clic passe par l'overlay de lecture --}}
                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover/card:opacity-100 transition-opacity duration-300
                                        flex flex-col justify-end p-3 pointer-events-none">
                                    <p class="text-white text-sm font-medium truncate mb-1">
                                        {{ $media->title ?? $post->title }}
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <p class="text-xs text-cyan-400 font-semibold uppercase">
                                            {{ $media->media_type === 'image' ? 'Photo' : 'Vidéo' }}
                                        </p>
                                        <p class="text-xs text-gray-300">
                                            <i class="fa-solid fa-calendar-alt mr-1"></i>
                                            {{ $media->created_at->format('d/m/y') }}
                                        </p>
                                    </div>
                                </div>
                            </article>
                        @endforeach

                        {{-- Carte "Voir Tout" (Ajout d'une flèche) --}}
                        <a href="#" class="flex-shrink-0 w-24 sm:w-28 h-32 sm:h-36 md:h-40 flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-gray-600/50 dark:border-gray-700/50
                                      hover:border-green-500 transition-colors duration-300 group bg-gray-800/50 self-center">
                            <i class="fa-solid fa-arrow-circle-right text-gray-500 dark:text-gray-400 text-3xl group-hover:text-green-500 transform group-hover:scale-110 transition-transform"></i>
                            <p class="text-xs mt-2 text-gray-400 group-hover:text-green-400 font-medium"> Voir les détails</p>
                        </a>
                    </div>
                </div>
            @empty
                {{-- État Vide Global --}}
                <div class="p-8 sm:p-12 text-center border-4 border-dashed border-gray-700/50 dark:border-gray-700/50 rounded-2xl bg-gray-800/50 backdrop-blur-sm">
                    <i class="fa-solid fa-ghost text-5xl text-green-500 mb-4 animate-bounce"></i>
                    <h3 class="text-2xl font-semibold text-white mb-2">Galerie en Attente !</h3>
                    <p class="text-gray-400 text-lg">Revenez bientôt pour découvrir les dernières actions de l'association. Merci de votre patience.</p>
                </div>
            @endforelse
        </section>

        <hr class="border-gray-800" />


        {{-- MODAL (Assurez-vous qu'elle est bien définie dans votre architecture Livewire) --}}
        <livewire:galeriemodule::visitor.galerie.media-details />

    </div>

    <style>
        /* Masque la barre de défilement pour un look plus propre sur le catalogue horizontal */
        .custom-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .custom-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</div>
