<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">

    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.5.x/dist/typography.min.css" rel="stylesheet">

    <div class="max-w-4xl mx-auto">

        <header class="text-center mb-12 pb-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-4xl sm:text-5xl font-black bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-indigo-800 leading-tight">
                Centre d'Aide & FAQ
            </h2>
            <p class="mt-4 text-lg sm:text-xl text-gray-600 dark:text-gray-400 font-medium">
                Trouvez instantanément la réponse à vos questions.
            </p>
        </header>

        <div class="relative mb-10 group">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-indigo-700 rounded-full blur-lg opacity-10 group-hover:opacity-20 transition-opacity duration-300"></div>
            <div class="relative">
                <input
                    wire:model.live.debounce.300ms="search"
                    type="search"
                    placeholder="Rechercher une question ou un mot-clé..."
                    class="w-full p-5 pl-14 pr-6 text-lg font-medium text-gray-900 dark:text-white border-2 border-indigo-200 dark:border-indigo-900 rounded-full shadow-md bg-white/70 dark:bg-gray-800/80 backdrop-blur-sm focus:outline-none focus:ring-4 focus:ring-indigo-600 focus:border-indigo-600 transition-all duration-300 placeholder-gray-500 dark:placeholder-gray-400"
                    aria-label="Rechercher dans la FAQ"
                />
                <div class="absolute left-5 top-1/2 transform -translate-y-1/2 pointer-events-none">
                    <svg class="w-7 h-7 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                {{-- Bouton d'effacement conditionnel --}}
                @if($search)
                    <button
                        wire:click="$set('search', '')"
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-red-500 transition"
                        aria-label="Effacer la recherche"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                    {{-- Message de recherche --}}
                    <p class="mt-3 text-sm text-indigo-600 dark:text-indigo-400 font-medium pl-2 animate-pulse">
                        Résultats pour : <span class="font-bold">"{{ $search }}"</span>
                    </p>
                @endif
            </div>
        </div>

        <div class="space-y-4">
            @forelse($this->faqs as $faq)
                <div
                    wire:model="openFaq.{{ $faq->id }}"
                    x-data="{ open: $wire.entangle('openFaq.{{ $faq->id }}').live }"
                    wire:key="faq-{{ $faq->id }}"
                    class="group rounded-xl transition-all duration-500 overflow-hidden"
                    :class="{ 'ring-2 ring-indigo-600 ring-offset-2 ring-offset-gray-50 dark:ring-offset-gray-900': open }"
                >
                    <h2 class="border border-gray-200 dark:border-gray-700 rounded-xl bg-white dark:bg-gray-800 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <button
                            wire:click.prevent="toggleFaq({{ $faq->id }})"
                            type="button"
                            class="w-full p-5 text-left flex justify-between items-center focus:outline-none focus:ring-4 focus:ring-indigo-300 rounded-xl transition-all duration-300"
                            :aria-expanded="open"
                            :aria-controls="'faq-answer-{{ $faq->id }}'"
                        >
                            <span class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white pr-4 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition">
                                {{ $faq->question }}
                            </span>
                            <div class="flex-shrink-0 transform transition-transform duration-500" :class="{ 'rotate-180': open }">
                                <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                    </h2>

                    @if($openFaq[$faq->id] ?? false)
                        <div
                            wire:transition.slide.duration.500ms
                            id="faq-answer-{{ $faq->id }}"
                            class="px-5 pb-5 pt-0 text-base sm:text-lg text-gray-700 dark:text-gray-300 leading-relaxed border-t border-indigo-200 dark:border-indigo-900 mt-2"
                        >
                            <div class="prose prose-indigo dark:prose-invert max-w-none pt-4">
                                {!! Str::markdown($faq->answer) !!}
                            </div>
                        </div>
                    @endif
                </div>
            @empty
                <div class="text-center py-20 rounded-xl border-2 border-dashed border-indigo-300 dark:border-indigo-700 bg-white/70 dark:bg-gray-800/70 shadow-xl backdrop-blur-sm">
                    <div class="mx-auto w-20 h-20 mb-6 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center">
                        <svg class="w-10 h-10 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 1.261-2.256 1.997-3.228C12.22 4.227 14.827 3 17.5 3c2.673 0 5.28 1.227 7.273 3.772M12 15l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">
                        @if($search)
                            Aucun résultat trouvé
                        @else
                            Aucune question disponible
                        @endif
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto">
                        @if($search)
                            Essayez avec d'autres mots-clés ou explorez les catégories.
                        @else
                            Revenez plus tard, de nouvelles questions seront bientôt ajoutées.
                        @endif
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>
