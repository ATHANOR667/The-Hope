<div>
    <div class="min-h-screen bg-gray-50 text-gray-900 p-4 sm:p-6 lg:p-10 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-300">
        <div class="max-w-7xl mx-auto">

            @php
                $input = 'w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow-sm transition duration-150 ease-in-out focus:ring-2 focus:ring-indigo-500/50 p-3 text-sm';
                $label = 'block text-xs font-semibold mb-2 text-gray-500 dark:text-gray-400 uppercase tracking-widest';
                $section = 'mb-8 rounded-3xl bg-white dark:bg-gray-800 shadow-2xl border border-gray-100 dark:border-gray-700/50 overflow-hidden transition-shadow duration-300';
                $btnPrimary = 'w-full md:w-auto px-8 py-3 bg-indigo-600 text-white font-bold rounded-full hover:bg-indigo-700 transition duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-indigo-500/50 uppercase tracking-widest flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl';
                $btnSecondary = 'px-5 py-2 text-sm font-medium rounded-full transition duration-300 ease-in-out flex items-center space-x-2';
                $btnSuccess = 'bg-green-600 hover:bg-green-700';
                $btnDanger = 'bg-red-600 hover:bg-red-700';
            @endphp

            <h1 class="text-4xl font-extrabold text-gray-800 dark:text-gray-100 mb-10 border-b border-gray-200 dark:border-gray-700 pb-4">
                Gestion du Contenu de la Page d'Accueil
            </h1>

            {{-- SECTION 1: META --}}
            <section class="{{ $section }}" x-data="{ open: true }">
                <div @click="open = !open" class="p-6 lg:p-8 cursor-pointer flex justify-between items-center border-l-8 border-indigo-500 bg-white dark:bg-gray-800">
                    <h2 class="text-2xl font-bold text-indigo-700 dark:text-indigo-400 flex items-center space-x-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                        <span>Meta Information (SEO & OG)</span>
                    </h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-indigo-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>

                <div x-show="open" x-collapse.duration.500ms class="p-6 lg:p-8 pt-6 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-100 dark:border-gray-700">
                    <form wire:submit.prevent="saveMeta" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                            <div class="md:col-span-3">
                                <label class="{{ $label }}">Meta Description (150-160 caractères)</label>
                                <textarea wire:model.blur="meta.description" class="{{ $input }} resize-none" rows="3" placeholder="Description pour les moteurs de recherche..."></textarea>
                                @error('meta.description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div><label class="{{ $label }}">Keywords</label><input wire:model.blur="meta.keywords" type="text" class="{{ $input }}" placeholder="mot1, mot2, mot3"></div>
                            <div><label class="{{ $label }}">Author</label><input wire:model.blur="meta.author" type="text" class="{{ $input }}"></div>
                            <div><label class="{{ $label }}">Page Title</label><input wire:model.blur="meta.title" type="text" class="{{ $input }}"></div>

                            <div class="md:col-span-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                                <h3 class="text-xl font-bold mb-4 text-indigo-600 dark:text-indigo-400">Open Graph (Partage Social)</h3>
                            </div>

                            {{-- OG Image Upload --}}
                            <div class="md:col-span-2">
                                <label class="{{ $label }}">OG Image</label>
                                <input wire:model.blur="meta.og:image" type="text" class="{{ $input }} mb-3" placeholder="URL si non uploadé">
                                <input wire:model="meta_og_image_file" type="file" accept="image/*" class="block w-full text-sm text-gray-600 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 cursor-pointer">
                                @error('meta_og_image_file') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                @error('meta.og:image') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror


                                @if($meta['og:image'] || $meta_og_image_preview)
                                    <div class="mt-4 p-4 border border-indigo-200 dark:border-indigo-700 rounded-xl bg-indigo-50 dark:bg-gray-800/50">
                                        <p class="text-sm font-semibold mb-3 text-indigo-600 dark:text-indigo-400">Aperçu OG Image (Ratio 1.91:1)</p>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                            @if($meta['og:image'])<div><p class="text-xs text-gray-500 mb-1">Actuelle :</p><img src="{{ $meta['og:image'] }}" class="w-full h-auto aspect-[1.91/1] object-cover rounded-lg border-2 border-indigo-500"></div>@endif
                                            @if($meta_og_image_preview)<div><p class="text-xs text-gray-500 mb-1">Upload :</p><img src="{{ $meta_og_image_preview }}" class="w-full h-auto aspect-[1.91/1] object-cover rounded-lg border-2 border-yellow-500"></div>@endif
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div><label class="{{ $label }}">Largeur</label><input wire:model.blur="meta.og:image:width" type="number" class="{{ $input }}" placeholder="1200"></div>
                                <div><label class="{{ $label }}">Hauteur</label><input wire:model.blur="meta.og:image:height" type="number" class="{{ $input }}" placeholder="630"></div>
                                <div class="col-span-2"><label class="{{ $label }}">OG Title</label><input wire:model.blur="meta.og:title" type="text" class="{{ $input }}"></div>
                            </div>

                            <div class="md:col-span-3">
                                <label class="{{ $label }}">OG Description</label>
                                <textarea wire:model.blur="meta.og:description" class="{{ $input }} resize-none" rows="3"></textarea>
                                @error('meta.og:description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            {{-- Favicons et Image Générale --}}

                            {{--<div class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                                @foreach([
                                    'image/x-icon' => ['label' => 'Favicon (.ico)', 'prop' => 'meta_image_x_icon_file', 'accept' => '.ico'],
                                    'image/png' => ['label' => 'Favicon (.png)', 'prop' => 'meta_image_png_file', 'accept' => '.png'],
                                    'apple-touch-icon' => ['label' => 'Apple Touch', 'prop' => 'meta_apple_touch_icon_file', 'accept' => 'image/*'],
                                    'image' => ['label' => 'Image Générale', 'prop' => 'meta_image_file', 'accept' => 'image/*']
                                ] as $metaKey => $config)
                                    <div>
                                        <label class="{{ $label }}">{{ $config['label'] }}</label>
                                        <input wire:model.blur="meta.{{ $metaKey }}" type="text" class="{{ $input }} mb-2" placeholder="URL si non uploadé">
                                        <input wire:model="{{ $config['prop'] }}" type="file" accept="{{ $config['accept'] }}" class="block w-full text-xs text-gray-600 dark:text-gray-400 file:mr-2 file:py-1 file:px-3 file:rounded-full file:bg-indigo-600 file:text-white hover:file:bg-indigo-700">
                                        @error($config['prop']) <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                    </div>
                                @endforeach
                            </div>
                            --}}
                        </div>

                        <button type="submit" class="mt-10 {{ $btnPrimary }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Sauvegarder Meta
                        </button>
                    </form>
                </div>
            </section>

            {{-- SECTION 2: HERO --}}
            <section class="{{ $section }}" x-data="{ open: false }">
                <div @click="open = !open" class="p-6 lg:p-8 cursor-pointer flex justify-between items-center border-l-8 border-teal-500 bg-white dark:bg-gray-800">
                    <h2 class="text-2xl font-bold text-teal-700 dark:text-teal-400 flex items-center space-x-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        <span>Hero Section (Vidéo)</span>
                    </h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-teal-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>

                <div x-show="open" x-collapse.duration.500ms class="p-6 lg:p-8 pt-6 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-100 dark:border-gray-700">
                    <form wire:submit.prevent="saveHero">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="{{ $label }}">Titre Vidéo</label>
                                <input wire:model.blur="hero.video_title" type="text" class="{{ $input }}" placeholder="Ex: Bienvenue chez Nous">
                                @error('hero.video_title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="{{ $label }}">URL YouTube (embed)</label>
                                <input wire:model.blur="hero.video_url" type="text" class="{{ $input }}" placeholder="https://www.youtube.com/embed/...">
                                @error('hero.video_url') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        @if(!empty($hero['video_url']))
                            <div class="mt-6">
                                <p class="text-sm font-semibold mb-3 text-teal-600 dark:text-teal-400">Aperçu :</p>
                                <div class="w-full aspect-video rounded-xl overflow-hidden border-4 border-teal-400 dark:border-teal-600 shadow-xl">
                                    <iframe src="{{ $hero['video_url'] }}" class="w-full h-full" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                        @endif

                        <button type="submit" class="mt-10 {{ $btnPrimary }} bg-teal-600 hover:bg-teal-700 focus:ring-teal-500/50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Sauvegarder Hero
                        </button>
                    </form>
                </div>
            </section>

            {{-- SECTION 3: FONDATEURS (CORRECTION AJOUT/SUPPRESSION/LINKS SOCIAUX) --}}
            <section class="{{ $section }}" x-data="{ open: false }">
                <div @click="open = !open" class="p-6 lg:p-8 cursor-pointer flex justify-between items-center border-l-8 border-amber-500 bg-white dark:bg-gray-800">
                    <h2 class="text-2xl font-bold text-amber-700 dark:text-amber-400 flex items-center space-x-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20v-2c0-.656-.126-1.283-.356-1.857M9 20H4v-2a3 3 0 015-2.236M9 20v-2c0-.285.025-.565.072-.835M7.873 14H10.5m0-4a2.5 2.5 0 115 0a2.5 2.5 0 01-5 0z"></path></svg>
                        <span>Profiles des Fondateurs</span>
                    </h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-amber-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>

                <div x-show="open" x-collapse.duration.500ms class="p-6 lg:p-8 pt-6 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-100 dark:border-gray-700">
                    @foreach($founders as $index => $founder)
                        <div x-data="{ open: false }" wire:key="founder-{{ $index }}" class="p-6 mb-8 rounded-2xl border border-amber-300 dark:border-amber-700/70 bg-white dark:bg-gray-800 shadow-lg transition-shadow duration-300 hover:shadow-xl">
                            <div @click="open = !open" class="flex flex-col sm:flex-row justify-between items-start sm:items-center pb-4 border-b border-amber-300/50 dark:border-amber-700/50 cursor-pointer">
                                <h3 class="text-xl font-bold text-amber-700 dark:text-amber-400 mb-2 sm:mb-0">
                                    <span class="text-lg font-normal text-gray-600 dark:text-gray-400 mr-2">{{ $index + 1 }}.</span>
                                    {{ $founder['name'] ?: 'Nouveau Profil' }}
                                </h3>
                                <div class="flex items-center space-x-3">
                                    <button wire:click.prevent="removeFounder({{ $index }})" type="button" class="{{ $btnSecondary }} bg-red-100 text-red-700 hover:bg-red-200 dark:bg-red-900/50 dark:text-red-300 dark:hover:bg-red-900" onclick="confirm('Êtes-vous sûr de vouloir supprimer ce profil ?') || event.stopImmediatePropagation()">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2.2 2.2 0 0116.138 21H7.862a2.2 2.2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        Supprimer
                                    </button>
                                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-amber-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>

                            <div x-show="open" x-collapse.duration.500ms class="mt-6">
                                <form wire:submit.prevent="saveFounder({{ $index }})" enctype="multipart/form-data">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                        <div>
                                            <label class="{{ $label }}">Nom Complet</label>
                                            <input wire:model.blur="founders.{{ $index }}.name" type="text" class="{{ $input }}" placeholder="Jean Dupont">
                                            @error("founders.{$index}.name") <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                        </div>
                                        <div>
                                            <label class="{{ $label }}">Rôle</label>
                                            <input wire:model.blur="founders.{{ $index }}.role" type="text" class="{{ $input }}" placeholder="CEO & Fondateur">
                                            @error("founders.{$index}.role") <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="md:col-span-2">
                                            <label class="{{ $label }}">Citation</label>
                                            <textarea wire:model.blur="founders.{{ $index }}.quote" class="{{ $input }} resize-none" rows="2" placeholder="Une citation inspirante..."></textarea>
                                            @error("founders.{$index}.quote") <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        {{-- Gestion du Média du Fondateur --}}
                                        <div>
                                            <label class="{{ $label }}">Type de Média</label>
                                            <select wire:model.live="founders.{{ $index }}.media_type" class="{{ $input }}">
                                                <option value="image">Image</option>
                                                <option value="iframe">Vidéo YouTube (iframe)</option>
                                            </select>
                                            @error("founders.{$index}.media_type") <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                        </div>
                                        <div>
                                            <label class="{{ $label }}">Source Média</label>
                                            <input wire:model.blur="founders.{{ $index }}.media_src" type="text" class="{{ $input }}" placeholder="URL (si image/vidéo non uploadée)">
                                            @error("founders.{$index}.media_src") <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror

                                            @if($founder['media_type'] === 'image')
                                                <input wire:model="founderMediaFiles.{{ $index }}" type="file" accept="image/*" class="mt-3 block w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:bg-amber-600 file:text-white hover:file:bg-amber-700">
                                                @error("founderMediaFiles.{$index}") <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                            @endif
                                        </div>

                                        {{-- Aperçu Média --}}
                                        @php
                                            $mediaUrl = $founderMediaFilesPreview[$index] ?? $founder['media_src'] ?? null;
                                        @endphp

                                        @if($mediaUrl)
                                            <div class="md:col-span-2 p-4 border border-amber-300 dark:border-amber-700 rounded-xl bg-amber-50/50 dark:bg-gray-800/50">
                                                <p class="text-sm font-semibold mb-3 text-amber-700 dark:text-amber-300">Aperçu :</p>
                                                @if($founder['media_type'] === 'image')
                                                    <img src="{{ $mediaUrl }}" class="w-full h-auto max-h-64 object-cover rounded-lg border-2 border-amber-500 shadow-md">
                                                @elseif($founder['media_type'] === 'iframe')
                                                    <iframe src="{{ $mediaUrl }}" class="w-full aspect-video rounded-lg border-2 border-amber-500 shadow-md"></iframe>
                                                @endif
                                            </div>
                                        @endif

                                        <div class="md:col-span-2"><label class="{{ $label }}">Biographie</label><textarea wire:model.blur="founders.{{ $index }}.bio" class="{{ $input }} resize-none" rows="4"></textarea>@error("founders.{$index}.bio") <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror</div>
                                        <div class="md:col-span-2"><label class="{{ $label }}">Expertise</label><textarea wire:model.blur="founders.{{ $index }}.expertise" class="{{ $input }} resize-none" rows="2"></textarea>@error("founders.{$index}.expertise") <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror</div>
                                        <div class="md:col-span-2"><label class="{{ $label }}">Zone d'intervention</label><textarea wire:model.blur="founders.{{ $index }}.zone_d_intervention" class="{{ $input }} resize-none" rows="2"></textarea>@error("founders.{$index}.zone_d_intervention") <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror</div>
                                        <div class="md:col-span-2"><label class="{{ $label }}">Réalisation</label><textarea wire:model.blur="founders.{{ $index }}.realisation" class="{{ $input }} resize-none" rows="2"></textarea>@error("founders.{$index}.realisation") <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror</div>
                                    </div>

                                    {{-- Sous-Section Liens Sociaux --}}
                                    <div class="mt-8 p-6 border border-amber-300/50 rounded-xl dark:border-amber-700/50 bg-amber-50/30 dark:bg-gray-800/50">
                                        <div class="flex justify-between items-center mb-4 pb-2 border-b border-amber-200 dark:border-amber-700">
                                            <h4 class="text-lg font-bold text-amber-700 dark:text-amber-300">Liens Sociaux Spécifiques au Fondateur</h4>
                                            {{-- CORRECTION 1: Ajout de Lien Social dans un tableau imbriqué --}}
                                            <button type="button" wire:click="$set('founders.{{ $index }}.socials', [...$wire.get('founders.{{ $index }}.socials'), { icon: '', url: '' }])" class="{{ $btnSecondary }} bg-green-100 text-green-700 hover:bg-green-200 dark:bg-green-900/50 dark:text-green-300 dark:hover:bg-green-900">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                Ajouter
                                            </button>
                                        </div>

                                        {{-- Boucle sur les liens sociaux du fondateur --}}
                                        @foreach($founder['socials'] ?? [] as $sIndex => $social)
                                            <div wire:key="founder-{{ $index }}-social-{{ $sIndex }}" class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4 items-center p-3 bg-white dark:bg-gray-700 rounded-lg shadow-sm mb-2">
                                                <div class="w-full sm:w-1/3">
                                                    <select wire:model.blur="founders.{{ $index }}.socials.{{ $sIndex }}.icon" class="{{ $input }} p-3">
                                                        <option value="">Choisir un réseau...</option>
                                                        @foreach($availableIcons as $icon => $label)
                                                            <option value="{{ $icon }}">{{ $label }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error("founders.{$index}.socials.{$sIndex}.icon") <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="w-full sm:w-2/3">
                                                    <input wire:model.blur="founders.{{ $index }}.socials.{{ $sIndex }}.url" type="url" class="{{ $input }}" placeholder="https://...">
                                                    @error("founders.{$index}.socials.{$sIndex}.url") <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                                </div>
                                                {{-- NOUVEAU CODE (CORRIGÉ) --}}
                                            <button
                                                type="button"
                                                wire:click.prevent="removeFounderSocial({{ $index }}, {{ $sIndex }})"
                                                class="flex-shrink-0 text-red-500 hover:text-red-700 p-2 rounded-full hover:bg-red-100 dark:hover:bg-red-900/50"
                                                onclick="confirm('Êtes-vous sûr de vouloir supprimer ce lien social ?') || event.stopImmediatePropagation()"
                                            >
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            </button>
                                            </div>
                                        @endforeach
                                    </div>

                                    <button type="submit" class="mt-10 {{ $btnPrimary }} w-full bg-amber-600 hover:bg-amber-700 focus:ring-amber-500/50">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                        Sauvegarder ce Profil
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    <div class="flex gap-4 mt-8">
                        {{-- CORRECTION 3: Ajout de Fondateur --}}
                        <button wire:click="addFounder" class="flex-1 {{ $btnPrimary }} {{ $btnSuccess }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                            Ajouter Nouveau Profil
                        </button>
                    </div>
                </div>
            </section>

            {{-- SECTION 4: LIENS GLOBAUX (CORRECTION AJOUT) --}}
            <section class="{{ $section }}" x-data="{ open: false }">
                <div @click="open = !open" class="p-6 lg:p-8 cursor-pointer flex justify-between items-center border-l-8 border-purple-500 bg-white dark:bg-gray-800">
                    <h2 class="text-2xl font-bold text-purple-700 dark:text-purple-400 flex items-center space-x-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path></svg>
                        <span>Liens Sociaux Globaux de l'Organisation</span>
                    </h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-purple-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>

                <div x-show="open" x-collapse.duration.500ms class="p-6 lg:p-8 pt-6 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-100 dark:border-gray-700">
                    <form wire:submit.prevent="saveSocialLinks">
                        {{-- Boucle sur les liens globaux --}}
                        @foreach($social_links as $index => $link)
                            <div wire:key="global-link-{{ $index }}" class="flex flex-col sm:flex-row gap-4 p-4 bg-purple-50 dark:bg-gray-800 rounded-xl mb-4 shadow-sm">
                                <div class="flex-1">
                                    <label class="{{ $label }}">Réseau</label>
                                    <select wire:model.blur="social_links.{{ $index }}.icon" class="{{ $input }}">
                                        <option value="">Choisir...</option>
                                        @foreach($availableIcons as $icon => $label)
                                            <option value="{{ $icon }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error("social_links.{$index}.icon") <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex-1">
                                    <label class="{{ $label }}">URL</label>
                                    <input wire:model.blur="social_links.{{ $index }}.url" type="url" class="{{ $input }}" placeholder="https://...">
                                    @error("social_links.{$index}.url") <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex items-end">
                                    {{-- CORRECTION 4: Suppression de Lien Social Global --}}
                                    <button type="button" wire:click.prevent="removeSocialLink({{ $index }})" class="p-3 text-red-600 hover:bg-red-100 rounded-full dark:hover:bg-red-900/50 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach

                        {{-- CORRECTION 5: Ajout de Lien Social Global --}}
                        <button type="button" wire:click="addSocialLink" class="w-full {{ $btnPrimary }} {{ $btnSuccess }} mb-6">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Ajouter un Lien
                        </button>

                        <button type="submit" class="w-full {{ $btnPrimary }} bg-purple-600 hover:bg-purple-700 focus:ring-purple-500/50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                            Sauvegarder Tous les Liens
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
