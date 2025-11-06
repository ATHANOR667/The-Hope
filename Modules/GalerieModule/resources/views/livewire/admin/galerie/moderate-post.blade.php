<div class="bg-gray-50 dark:bg-gray-900 min-h-screen antialiased transition-colors duration-300 py-4 px-2 sm:p-6 lg:p-8 font-sans">

    @if (!$showModerateComments && !$showReplyComments)

        <header class="px-2 sm:px-0 mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-gray-200 dark:border-gray-700 pb-4 sm:pb-6 max-w-7xl mx-auto">
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100 mb-3 sm:mb-0">
                Détails de Modération
            </h1>
            <button wire:click="cancel" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition ease-in-out duration-150 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path></svg>
                <span>Retour à la Liste</span>
            </button>
        </header>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden lg:grid lg:grid-cols-3 lg:divide-x lg:divide-gray-200 dark:lg:divide-gray-700 max-w-7xl mx-auto">

            <div class="lg:col-span-2 p-4 sm:p-8 space-y-8">

                <section>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">Informations sur le Contenu</h2>
                    <dl class="space-y-4 text-sm sm:text-base">
                        <div class="bg-gray-50 dark:bg-gray-700/30 p-4 rounded-lg">
                            <dt class="font-medium text-gray-500 dark:text-gray-400">Titre de l'article</dt>
                            <dd class="text-lg sm:text-xl font-extrabold text-gray-900 dark:text-gray-100 mt-1">{{ $post->title }}</dd>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/30 p-4 rounded-lg">
                            <dt class="font-medium text-gray-500 dark:text-gray-400">Statut Actuel</dt>
                            <dd class="mt-1">
                                @php
                                    $statusColor = [
                                        'approved' => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-700/30 dark:text-emerald-400',
                                        'pending' => 'bg-amber-100 text-amber-800 dark:bg-amber-700/30 dark:text-amber-400',
                                        'rejected' => 'bg-rose-100 text-rose-800 dark:bg-rose-700/30 dark:text-rose-400',
                                    ][$post->moderation_status] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-700/30 dark:text-gray-300';
                                @endphp
                                <span class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full {{ $statusColor }}">
                                    {{ ucfirst($post->moderation_status) }}
                                </span>
                            </dd>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/30 p-4 rounded-lg">
                            <dt class="font-medium text-gray-500 dark:text-gray-400">Description Détaillée</dt>
                            <dd class="text-gray-800 dark:text-gray-200 mt-1 whitespace-pre-wrap break-words">{{ $post->description ?: 'Aucune description fournie.' }}</dd>
                        </div>
                    </dl>
                </section>

                <section>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">Médias Rattachés</h2>
                    @if ($post->medias->isNotEmpty())
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4" x-data="{ open: false, currentMedia: null }">
                            @foreach ($post->medias as $media)
                                <div class="relative overflow-hidden rounded-lg shadow-md aspect-w-16 aspect-h-9 group cursor-pointer"
                                     @click="open = true; currentMedia = { type: '{{ $media->media_type }}', src: '{{ $media->media_type === 'image' && $media->file_path ? \Illuminate\Support\Facades\Storage::url($media->file_path) : ($media->file_path ? \Illuminate\Support\Facades\Storage::url($media->file_path) : $media->video_url) }}', title: '{{ $post->title }}' }">
                                    @if ($media->media_type === 'image' && $media->file_path)
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($media->file_path) }}" alt="{{ $post->title }}" loading="lazy"
                                             class="w-full h-full object-cover transition transform duration-300 group-hover:scale-105">
                                        <div class="absolute inset-0 bg-black bg-opacity-25 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                        </div>
                                    @elseif (in_array($media->media_type, ['video', 'youtube', 'vimeo']) && ($media->file_path || $media->video_url))
                                        <div class="w-full h-full bg-black flex items-center justify-center">
                                            @if ($media->media_type === 'video' && $media->file_path)
                                                <video class="w-full h-full object-cover">
                                                    <source src="{{ \Illuminate\Support\Facades\Storage::url($media->file_path) }}" type="video/mp4">
                                                    Votre navigateur ne supporte pas la lecture de vidéos.
                                                </video>
                                            @elseif (($media->media_type === 'youtube' || $media->media_type === 'vimeo') && $media->video_url)
                                                <div class="relative w-full h-full">
                                                    <div class="w-full h-full bg-gray-900 flex items-center justify-center">
                                                        <svg class="w-12 h-12 text-white opacity-75" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        </div>
                                    @elseif ($media->media_type === 'link' && $media->video_url)
                                        <a href="{{ $media->video_url }}" target="_blank" class="w-full h-full flex flex-col items-center justify-center bg-green-50 dark:bg-gray-700 hover:bg-green-100 dark:hover:bg-gray-600 border-2 border-dashed border-green-200 dark:border-green-600 p-2 text-center transition duration-200">
                                            <svg class="w-6 h-6 text-green-600 dark:text-green-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                            <span class="text-xs text-green-700 dark:text-green-300 font-medium break-all">Lien externe</span>
                                        </a>
                                    @else
                                        <div class="w-full h-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center border border-dashed border-gray-300 dark:border-gray-600 text-center">
                                            <span class="text-gray-400 dark:text-gray-500 text-xs">Média non supporté</span>
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                            <template x-if="open">
                                <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-80" @click.self="open = false" @keydown.escape.window="open = false">
                                    <div class="relative w-full max-w-5xl h-full max-h-[90vh] bg-gray-900 rounded-lg overflow-hidden flex items-center justify-center">
                                        <button class="absolute top-4 right-4 text-white hover:text-gray-300 transition duration-200 z-10" @click="open = false">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                        </button>
                                        <div class="w-full h-full flex items-center justify-center p-6">
                                            <template x-if="currentMedia && currentMedia.type === 'image'">
                                                <img :src="currentMedia.src" :alt="currentMedia.title" class="max-w-full max-h-full object-contain rounded-lg shadow-lg">
                                            </template>
                                            <template x-if="currentMedia && currentMedia.type === 'video'">
                                                <video controls :src="currentMedia.src" class="max-w-full max-h-full object-contain rounded-lg shadow-lg"></video>
                                            </template>
                                            <template x-if="currentMedia && (currentMedia.type === 'youtube' || currentMedia.type === 'vimeo')">
                                                <iframe class="w-full h-full" :src="currentMedia.src" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen" allowfullscreen></iframe>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    @else
                        <div class="w-full h-40 bg-gray-100 dark:bg-gray-700/50 rounded-lg flex flex-col items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 text-center text-sm font-medium text-gray-400 dark:text-gray-500">
                            <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>Aucun média rattaché pour le moment.</span>
                        </div>
                    @endif
                </section>
            </div>

            <div class="lg:col-span-1 p-4 sm:p-8 border-t lg:border-t-0 border-gray-200 dark:border-gray-700 lg:sticky lg:top-0 lg:self-start lg:h-full lg:overflow-y-auto">

                <section class="mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">Décision de Modération</h2>
                    <div class="bg-green-50 dark:bg-gray-700/30 rounded-lg p-5 border border-green-200 dark:border-gray-700 shadow-sm">

                        <div class="space-y-4">
                            <div>
                                <label for="moderation_status" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nouveau Statut</label>
                                <select wire:model="moderation_status" id="moderation_status"
                                        class="block w-full px-4 py-2.5 text-base text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 transition ease-in-out duration-150">
                                    <option value="approved">Approuvé</option>
                                    <option value="pending">En Attente</option>
                                    <option value="rejected">Rejeté</option>
                                </select>
                                @error('moderation_status') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="moderation_notes" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Notes Internes (Optionnel)</label>
                                <textarea wire:model="moderation_notes" id="moderation_notes" rows="4"
                                          class="block w-full px-4 py-2.5 text-base text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 transition ease-in-out duration-150"
                                          placeholder="Ex : Rejeté pour contenu non conforme aux directives."></textarea>
                                @error('moderation_notes') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex flex-col space-y-3 mt-6">
                            <button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                                    class="w-full px-4 py-2.5 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 disabled:bg-green-400/80 disabled:cursor-not-allowed">
                                <span wire:loading.remove wire:target="save">Enregistrer la Décision</span>
                                <span wire:loading wire:target="save">Enregistrement...</span>
                            </button>
                            <button wire:click="cancel"
                                    class="w-full px-4 py-2.5 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-lg shadow-sm hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Réinitialiser
                            </button>
                        </div>
                    </div>
                </section>

                <section>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">Statistiques & Outils</h2>
                    <div class="bg-gray-100 dark:bg-gray-700/30 rounded-lg p-5 border border-gray-200 dark:border-gray-700 shadow-sm">

                        <div class="flex flex-col sm:flex-row gap-4 sm:gap-x-6 sm:gap-y-3 mb-6">
                            <div class="flex items-center space-x-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <span class="text-base">{{ $post->comments_count }} Commentaires</span>
                            </div>
                            <div class="flex items-center space-x-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                <span class="text-base">0 Vues</span>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <button wire:click="openModerateComments"
                                    class="w-full px-4 py-2.5 bg-orange-600 text-white font-semibold rounded-lg shadow-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Modérer les Commentaires ({{ $post->comments_count }})
                            </button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endif

    @if ($showModerateComments)
        @livewire('galeriemodule::admin.galerie.moderate-comments', ['postId' => $postId], key('moderate-comments-' . $postId))
    @endif
    @if ($showReplyComments && $replyToCommentId)
        @livewire('galeriemodule::admin.galerie.reply-comments', ['postId' => $postId, 'commentId' => $replyToCommentId], key('reply-comments-' . $postId . '-' . $replyToCommentId))
    @endif
</div>
