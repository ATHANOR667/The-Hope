<div x-data="{ isVerifying: false }"
     x-on:request-passcode-verification.window="if ($event.detail.component === '{{ $this->getName() }}') isVerifying = true"
     x-on:execute-save-meta.window="isVerifying = false"
     x-on:execute-save-hero.window="isVerifying = false"
     x-on:execute-save-founder.window="isVerifying = false"
     x-on:execute-save-social-links.window="isVerifying = false">

    <div class="p-4 md:p-8 bg-slate-50 min-h-screen dark:bg-slate-950 dark:text-slate-100 transition-colors duration-300">
        <div class="max-w-7xl mx-auto space-y-8">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">Gestion de l'Accueil</h1>
                    <p class="text-slate-500 dark:text-slate-400 mt-1">Configurez le contenu SEO, la vidéo de présentation, les fondateurs et les réseaux sociaux.</p>
                </div>
            </div>

            <x-coreui::tabs :tabs="[
                ['id' => 'seo', 'label' => 'SEO & Meta'],
                ['id' => 'hero', 'label' => 'Vidéo Hero'],
                ['id' => 'founders', 'label' => 'Fondateurs'],
                ['id' => 'socials', 'label' => 'Réseaux Sociaux']
            ]">
                {{-- TAB 1: SEO & META --}}
                <x-slot:content_seo>
                    <x-coreui::card>
                        <x-slot name="header">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-primary/10 rounded-lg text-primary">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                                </div>
                                <h2 class="text-lg font-bold text-slate-900 dark:text-white">Méta-informations (SEO & OG)</h2>
                            </div>
                        </x-slot>

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <div class="md:col-span-3">
                                    <x-coreui::field label="Meta Description (150-160 caractères)">
                                        <textarea wire:model.blur="meta.description"
                                                  class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-200 resize-none"
                                                  rows="3" placeholder="Description pour les moteurs de recherche..."></textarea>
                                        @error('meta.description') <p class="text-xs text-danger mt-1">{{ $message }}</p> @enderror
                                    </x-coreui::field>
                                </div>

                                <x-coreui::input wire:model.blur="meta.keywords" label="Mots-clés" placeholder="mot1, mot2, mot3" />
                                <x-coreui::input wire:model.blur="meta.author" label="Auteur" />
                                <x-coreui::input wire:model.blur="meta.title" label="Titre de la page" />

                                <div class="md:col-span-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                                    <h3 class="text-md font-bold text-primary dark:text-primary-light">Open Graph (Partage Social)</h3>
                                </div>

                                <div class="md:col-span-2 space-y-4">
                                    <x-coreui::input wire:model.blur="meta.og:image" label="URL de l'image OG" placeholder="URL si non uploadé" />

                                    <x-coreui::field label="Téléverser l'image OG">
                                        <input wire:model="meta_og_image_file" type="file" accept="image/*"
                                               class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                                        @error('meta_og_image_file') <p class="text-xs text-danger mt-1">{{ $message }}</p> @enderror
                                    </x-coreui::field>

                                    @if($meta['og:image'] || $meta_og_image_preview)
                                        <div class="p-4 border border-slate-100 dark:border-slate-800 rounded-xl bg-slate-50/50 dark:bg-slate-900/50">
                                            <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Aperçu (Ratio 1.91:1)</p>
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                @if($meta['og:image'])
                                                    <div class="space-y-1">
                                                        <p class="text-[10px] font-medium text-slate-400">Actuelle</p>
                                                        <img src="{{ $meta['og:image'] }}" class="w-full aspect-[1.91/1] object-cover rounded-lg border border-slate-200 dark:border-slate-700 shadow-sm">
                                                    </div>
                                                @endif
                                                @if($meta_og_image_preview)
                                                    <div class="space-y-1">
                                                        <p class="text-[10px] font-medium text-slate-400">Nouvelle</p>
                                                        <img src="{{ $meta_og_image_preview }}" class="w-full aspect-[1.91/1] object-cover rounded-lg border border-primary/30 shadow-sm">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <x-coreui::input wire:model.blur="meta.og:image:width" type="number" label="Largeur" placeholder="1200" />
                                    <x-coreui::input wire:model.blur="meta.og:image:height" type="number" label="Hauteur" placeholder="630" />
                                    <div class="col-span-2">
                                        <x-coreui::input wire:model.blur="meta.og:title" label="Titre OG" />
                                    </div>
                                </div>

                                <div class="md:col-span-3">
                                    <x-coreui::field label="Description OG">
                                        <textarea wire:model.blur="meta.og:description"
                                                  class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-200 resize-none"
                                                  rows="3"></textarea>
                                        @error('meta.og:description') <p class="text-xs text-danger mt-1">{{ $message }}</p> @enderror
                                    </x-coreui::field>
                                </div>
                            </div>

                            <div class="flex justify-end pt-4 border-t border-slate-100 dark:border-slate-800">
                                <x-coreui::button type="button"
                                        wire:click="$dispatch('request-passcode-verification', {
                                            component: '{{ $this->getName() }}',
                                            action: 'execute-save-meta',
                                            guard: 'admin'
                                        })">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Enregistrer Meta
                                </x-coreui::button>
                            </div>
                        </div>
                    </x-coreui::card>
                </x-slot:content_seo>

                {{-- TAB 2: HERO VIDEO --}}
                <x-slot:content_hero>
                    <x-coreui::card>
                        <x-slot name="header">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-primary/10 rounded-lg text-primary">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                </div>
                                <h2 class="text-lg font-bold text-slate-900 dark:text-white">Section Hero (Vidéo)</h2>
                            </div>
                        </x-slot>

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <x-coreui::input wire:model.blur="hero.video_title" label="Titre de la vidéo" placeholder="Ex: Bienvenue chez Nous" />
                                <x-coreui::input wire:model.blur="hero.video_url" label="URL YouTube (embed)" placeholder="https://www.youtube.com/embed/..." />
                            </div>

                            @if(!empty($hero['video_url']))
                                <div class="mt-4">
                                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Aperçu :</p>
                                    <div class="max-w-3xl aspect-video rounded-2xl overflow-hidden border-4 border-slate-100 dark:border-slate-800 shadow-lg">
                                        <iframe src="{{ $hero['video_url'] }}" class="w-full h-full" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            @endif

                            <div class="flex justify-end pt-4 border-t border-slate-100 dark:border-slate-800">
                                <x-coreui::button type="button"
                                        wire:click="$dispatch('request-passcode-verification', {
                                            component: '{{ $this->getName() }}',
                                            action: 'execute-save-hero',
                                            guard: 'admin'
                                        })">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Enregistrer Hero
                                </x-coreui::button>
                            </div>
                        </div>
                    </x-coreui::card>
                </x-slot:content_hero>

                {{-- TAB 3: FOUNDERS --}}
                <x-slot:content_founders>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between px-2">
                            <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-3">
                                <div class="p-2 bg-primary/10 rounded-lg text-primary">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20v-2c0-.656-.126-1.283-.356-1.857M9 20H4v-2a3 3 0 015-2.236M9 20v-2c0-.285.025-.565.072-.835M7.873 14H10.5m0-4a2.5 2.5 0 115 0a2.5 2.5 0 01-5 0z"></path></svg>
                                </div>
                                Profils des Fondateurs
                            </h2>
                            <x-coreui::button size="sm" wire:click="addFounder">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                Ajouter
                            </x-coreui::button>
                        </div>

                        <div class="grid grid-cols-1 gap-6">
                            @foreach($founders as $index => $founder)
                                <x-coreui::card wire:key="founder-{{ $index }}" x-data="{ open: false }">
                                    <div @click="open = !open" class="flex items-center justify-between cursor-pointer">
                                        <div class="flex items-center gap-4">
                                            <div class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center font-bold text-slate-500">
                                                {{ $index + 1 }}
                                            </div>
                                            <div>
                                                <h3 class="font-bold text-slate-900 dark:text-white">{{ $founder['name'] ?: 'Nouveau Profil' }}</h3>
                                                <p class="text-xs text-slate-500">{{ $founder['role'] ?: 'Rôle non défini' }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <x-coreui::button size="xs" variant="ghost" class="text-danger"
                                                              @click.stop="if(confirm('Supprimer ce profil ?')) $wire.removeFounder({{ $index }})">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </x-coreui::button>
                                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-slate-400 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    </div>

                                    <div x-show="open" x-collapse class="pt-6 mt-6 border-t border-slate-100 dark:border-slate-800">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                            <x-coreui::input wire:model.blur="founders.{{ $index }}.name" label="Nom Complet" placeholder="Jean Dupont" />
                                            <x-coreui::input wire:model.blur="founders.{{ $index }}.role" label="Rôle" placeholder="CEO & Fondateur" />

                                            <div class="md:col-span-2">
                                                <x-coreui::field label="Citation">
                                                    <textarea wire:model.blur="founders.{{ $index }}.quote"
                                                              class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-200 resize-none"
                                                              rows="2" placeholder="Une citation inspirante..."></textarea>
                                                    @error("founders.{$index}.quote") <p class="text-xs text-danger mt-1">{{ $message }}</p> @enderror
                                                </x-coreui::field>
                                            </div>

                                            <x-coreui::select wire:model.live="founders.{{ $index }}.media_type" label="Type de Média">
                                                <option value="image">Image</option>
                                                <option value="iframe">Vidéo YouTube (iframe)</option>
                                            </x-coreui::select>

                                            <div class="space-y-4">
                                                <x-coreui::input wire:model.blur="founders.{{ $index }}.media_src" label="Source Média (URL)" placeholder="URL" />
                                                @if($founder['media_type'] === 'image')
                                                    <x-coreui::field label="Téléverser une Image">
                                                        <input wire:model="founderMediaFiles.{{ $index }}" type="file" accept="image/*"
                                                               class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                                                        @error("founderMediaFiles.{$index}") <p class="text-xs text-danger mt-1">{{ $message }}</p> @enderror
                                                    </x-coreui::field>
                                                @endif
                                            </div>

                                            @php $mediaUrl = $founderMediaFilesPreview[$index] ?? $founder['media_src'] ?? null; @endphp
                                            @if($mediaUrl)
                                                <div class="md:col-span-2 p-4 border border-slate-100 dark:border-slate-800 rounded-xl bg-slate-50/50 dark:bg-slate-900/50">
                                                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-3">Aperçu du média :</p>
                                                    @if($founder['media_type'] === 'image')
                                                        <img src="{{ $mediaUrl }}" class="w-full h-auto max-h-64 object-cover rounded-lg border border-slate-200 dark:border-slate-700 shadow-sm">
                                                    @elseif($founder['media_type'] === 'iframe')
                                                        <div class="aspect-video w-full rounded-lg overflow-hidden border border-slate-200 dark:border-slate-700">
                                                            <iframe src="{{ $mediaUrl }}" class="w-full h-full" frameborder="0"></iframe>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif

                                            <div class="md:col-span-2">
                                                <x-coreui::field label="Biographie">
                                                    <textarea wire:model.blur="founders.{{ $index }}.bio"
                                                              class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-200"
                                                              rows="4"></textarea>
                                                    @error("founders.{$index}.bio") <p class="text-xs text-danger mt-1">{{ $message }}</p> @enderror
                                                </x-coreui::field>
                                            </div>

                                            <div class="md:col-span-2"><x-coreui::input wire:model.blur="founders.{{ $index }}.expertise" label="Expertise" /></div>
                                            <div class="md:col-span-2"><x-coreui::input wire:model.blur="founders.{{ $index }}.zone_d_intervention" label="Zone d'intervention" /></div>
                                            <div class="md:col-span-2"><x-coreui::input wire:model.blur="founders.{{ $index }}.realisation" label="Réalisation" /></div>
                                        </div>

                                        {{-- Liens Sociaux Fondateur --}}
                                        <div class="p-6 rounded-2xl bg-slate-50 dark:bg-slate-900/50 border border-slate-100 dark:border-slate-800">
                                            <div class="flex items-center justify-between mb-4">
                                                <h4 class="text-sm font-bold text-slate-700 dark:text-slate-300">Réseaux Sociaux du Fondateur</h4>
                                                <x-coreui::button size="xs" variant="secondary" outline
                                                                  wire:click="$set('founders.{{ $index }}.socials', [...$wire.get('founders.{{ $index }}.socials'), { icon: '', url: '' }])">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                                    Ajouter
                                                </x-coreui::button>
                                            </div>

                                            <div class="space-y-3">
                                                @foreach($founder['socials'] ?? [] as $sIndex => $social)
                                                    <div wire:key="founder-{{ $index }}-social-{{ $sIndex }}" class="flex flex-col sm:flex-row gap-3 items-end p-3 bg-white dark:bg-slate-950 rounded-xl border border-slate-100 dark:border-slate-800 shadow-sm">
                                                        <div class="w-full sm:flex-1">
                                                            <x-coreui::select wire:model.blur="founders.{{ $index }}.socials.{{ $sIndex }}.icon" label="Réseau" size="sm">
                                                                <option value="">Choisir...</option>
                                                                @foreach($availableIcons as $icon => $label)
                                                                    <option value="{{ $icon }}">{{ $label }}</option>
                                                                @endforeach
                                                            </x-coreui::select>
                                                        </div>
                                                        <div class="w-full sm:flex-1">
                                                            <x-coreui::input wire:model.blur="founders.{{ $index }}.socials.{{ $sIndex }}.url" type="url" label="URL" placeholder="https://..." size="sm" />
                                                        </div>
                                                        <x-coreui::button size="xs" variant="ghost" class="text-danger"
                                                                          @click="if(confirm('Supprimer ce lien ?')) $wire.removeFounderSocial({{ $index }}, {{ $sIndex }})">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                        </x-coreui::button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="flex justify-end pt-6">
                                            <x-coreui::button type="button"
                                                    wire:click="$dispatch('request-passcode-verification', {
                                                        component: '{{ $this->getName() }}',
                                                        action: 'execute-save-founder',
                                                        params: { index: {{ $index }} },
                                                        guard: 'admin'
                                                    })">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                                Enregistrer ce Profil
                                            </x-coreui::button>
                                        </div>
                                    </div>
                                </x-coreui::card>
                            @endforeach
                        </div>
                    </div>
                </x-slot:content_founders>

                {{-- TAB 4: GLOBAL SOCIALS --}}
                <x-slot:content_socials>
                    <x-coreui::card>
                        <x-slot name="header">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-primary/10 rounded-lg text-primary">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path></svg>
                                </div>
                                <h2 class="text-lg font-bold text-slate-900 dark:text-white">Réseaux Sociaux de l'Organisation</h2>
                            </div>
                        </x-slot>

                        <div class="space-y-6">
                            <div class="space-y-4">
                                @foreach($social_links as $index => $link)
                                    <div wire:key="global-link-{{ $index }}" class="flex flex-col sm:flex-row gap-4 p-4 bg-slate-50/50 dark:bg-slate-900/50 rounded-2xl border border-slate-100 dark:border-slate-800 items-end">
                                        <div class="flex-1 w-full">
                                            <x-coreui::select wire:model.blur="social_links.{{ $index }}.icon" label="Réseau">
                                                <option value="">Choisir...</option>
                                                @foreach($availableIcons as $icon => $label)
                                                    <option value="{{ $icon }}">{{ $label }}</option>
                                                @endforeach
                                            </x-coreui::select>
                                        </div>
                                        <div class="flex-1 w-full">
                                            <x-coreui::input wire:model.blur="social_links.{{ $index }}.url" type="url" label="URL" placeholder="https://..." />
                                        </div>
                                        <x-coreui::button size="sm" variant="ghost" class="text-danger" wire:click="removeSocialLink({{ $index }})">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                        </x-coreui::button>
                                    </div>
                                @endforeach
                            </div>

                            <div class="flex flex-col sm:flex-row gap-4 pt-4 border-t border-slate-100 dark:border-slate-800">
                                <x-coreui::button variant="secondary" outline class="flex-1" wire:click="addSocialLink">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    Ajouter un réseau
                                </x-coreui::button>

                                <x-coreui::button class="flex-1"
                                        wire:click="$dispatch('request-passcode-verification', {
                                            component: '{{ $this->getName() }}',
                                            action: 'execute-save-social-links',
                                            guard: 'admin'
                                        })">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                    Enregistrer l'organisation
                                </x-coreui::button>
                            </div>
                        </div>
                    </x-coreui::card>
                </x-slot:content_socials>
            </x-coreui::tabs>
        </div>
    </div>
</div>
