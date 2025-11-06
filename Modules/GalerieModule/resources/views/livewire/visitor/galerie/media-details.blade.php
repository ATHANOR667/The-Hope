<div>
    @if($isOpen && $media)
        {{-- Le reste de votre modale est ici, inchangé --}}
        <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4"
             x-data="{ open: true }"
             x-show="open"
             @click.self="open = false; $wire.closeModal()">
            <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-3xl max-h-[90vh] overflow-y-auto p-6 relative">

                {{-- ... (Contenu du média et du post parent) ... --}}
                <button class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                        @click="$wire.closeModal()">
                    <i class="fa-solid fa-times text-2xl"></i>
                </button>

                <div class="mb-6">
                    {{-- ... (Affichage du Média) ... --}}
                    @if ($media->media_type === 'image' && $media->file_path)
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($media->file_path) }}"
                             alt="{{ $media->title }}"
                             class="w-full h-auto rounded-lg"
                             loading="lazy">
                    @elseif (in_array($media->media_type, ['video', 'youtube', 'vimeo']) && ($media->file_path || $media->video_url))
                        <div class="w-full aspect-video">
                            @if ($media->media_type === 'video' && $media->file_path)
                                <video class="w-full h-full rounded-lg" controls>
                                    <source src="{{ \Illuminate\Support\Facades\Storage::url($media->file_path) }}" type="video/mp4">
                                    Votre navigateur ne supporte pas la lecture de vidéos.
                                </video>
                            @elseif (($media->media_type === 'youtube' || $media->media_type === 'vimeo') && $media->video_url)
                                <iframe src="{{ $media->video_url }}"
                                        class="w-full h-full rounded-lg"
                                        frameborder="0"
                                        allow="autoplay; encrypted-media; gyroscope; picture-in-picture;"
                                        allowfullscreen
                                >
                                </iframe>
                            @endif
                        </div>
                    @else
                        <div class="flex items-center justify-center w-full h-64 bg-gray-200 dark:bg-gray-700 rounded-lg">
                            <p class="text-gray-500 dark:text-gray-400">Média Indisponible</p>
                        </div>
                    @endif
                </div>

                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2">{{ $media->title }}</h3>
                <p class="text-sm text-green-400 mb-4">
                    {{ ucfirst($media->media_type) }} | Publié le {{ $media->created_at->format('d/m/Y')  }}
                </p>


                @if($post)
                    <div class="max-w-full mb-4 border-b pb-4 border-gray-200 dark:border-gray-700">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Description du Post</h4>
                        <p class="text-gray-600 dark:text-gray-400 break-words">
                            {{ $post->description ?? 'Aucune description disponible.' }}
                        </p>
                    </div>
                @endif

                {{-- SECTION DES COMMENTAIRES --}}
                <div class="mt-6">
                    <h4 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">
                        Commentaires ({{ $comments->count() }})
                    </h4>

                    {{-- Formulaire de Création de Commentaire --}}
                    @include('galeriemodule::livewire.visitor.galerie.partials.comment-form')

                    <div class="space-y-6 mt-6">
                        @forelse($comments as $comment)
                            {{-- Affichage du Commentaire (Utilisation de la récursion) --}}
                            @include('galeriemodule::livewire.visitor.galerie.partials.comment-item', ['comment' => $comment])
                        @empty
                            <p class="text-gray-500 dark:text-gray-400 text-center py-6">
                                Soyez le premier à commenter ce post !
                            </p>
                        @endforelse
                    </div>
                </div>
                {{-- FIN SECTION DES COMMENTAIRES --}}
            </div>
        </div>
    @endif
</div>
