<div class="p-4 sm:p-6 lg:p-8 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">

    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-10">
        <div>
            <h1 class="text-3xl sm:text-4xl font-extrabold dark:text-white bg-clip-text text-transparent bg-indigo-600 leading-tight">
                FAQ Manager
            </h1>
            <p class="text-base text-gray-600 dark:text-gray-400 mt-2">Organisez et gérez vos réponses pour un support client optimal.</p>
        </div>
        <button
            wire:click="$dispatch('open-create-faq')"
            class="group flex items-center gap-2 bg-indigo-600 text-white font-bold px-6 py-3 rounded-xl shadow-lg hover:shadow-2xl hover:bg-indigo-600 transform hover:scale-[1.03] transition-all duration-300 focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-50"
        >
            <svg class="w-5 h-5 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
            </svg>
            Ajouter une FAQ
        </button>
    </div>

    <div class="space-y-4 sm:hidden max-w-7xl mx-auto">
        @foreach ($faqs as $faq)
            <div
                x-data="{ open: false }"
                class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden transform transition-all duration-300 hover:scale-[1.01] hover:shadow-xl"
            >
                <div class="p-4 cursor-pointer" @click="open = !open">
                    <div class="flex justify-between items-start">
                        <div class="flex-1 pr-3">
                            <h3 class="font-bold text-gray-900 dark:text-white text-base">{{ Str::limit($faq->question, 60) }}</h3>
                        </div>
                        <div class="flex flex-col items-end gap-1 flex-shrink-0">
                            {{-- Statut plus visible --}}
                            <span class="px-3 py-0.5 rounded-full text-xs font-bold transition-all shadow-sm {{ $faq->is_published ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900 dark:text-emerald-300' : 'bg-rose-100 text-rose-700 dark:bg-rose-900 dark:text-rose-300' }}">
                                {{ $faq->is_published ? 'Publié' : 'Brouillon' }}
                            </span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                Ordre: <span class="font-mono font-extrabold">{{ $faq->order }}</span>
                            </span>
                            {{-- Icône de flèche --}}
                            <svg :class="open ? 'rotate-180' : ''" class="w-5 h-5 text-indigo-500 transition-transform mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div x-show="open" x-transition x-cloak class="px-4 pb-4 border-t border-gray-100 dark:border-gray-700">
                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-3 prose prose-sm dark:prose-invert max-w-none" v-html="{{ json_encode($faq->answer) }}"></p>
                    <div class="flex gap-4 mt-4 pt-3 border-t border-dashed border-gray-200 dark:border-gray-700">
                        <button wire:click="$dispatch('open-edit-faq', { faqId: {{ $faq->id }} })" class="text-indigo-600 dark:text-indigo-400 font-bold text-sm hover:underline transition">Éditer</button>
                        <button wire:click="delete({{ $faq->id }})" onclick="confirm('Supprimer ?') || event.stopImmediatePropagation()" class="text-rose-600 dark:text-rose-400 font-bold text-sm hover:underline transition">Supprimer</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="hidden sm:block max-w-7xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-2xl overflow-hidden border border-gray-100 dark:border-gray-700">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-indigo-600 text-white shadow-md sticky top-0">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-extrabold uppercase tracking-wider">Question</th>
                    <th class="px-6 py-4 text-center text-xs font-extrabold uppercase tracking-wider hidden lg:table-cell">Ordre</th>
                    <th class="px-6 py-4 text-center text-xs font-extrabold uppercase tracking-wider">Statut</th>
                    <th class="px-6 py-4 text-center text-xs font-extrabold uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse ($faqs as $faq)
                    <tr class="hover:bg-indigo-50/50 dark:hover:bg-gray-700/50 transition-all duration-300 cursor-pointer">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white max-w-xs truncate">
                            {{ Str::limit($faq->question, 90) }}
                        </td>
                        <td class="px-6 py-4 text-center text-xs hidden lg:table-cell">
                                <span class="inline-flex items-center px-3 py-1 rounded-full font-mono text-xs font-extrabold bg-indigo-100 text-indigo-600 dark:bg-indigo-900 dark:text-indigo-300">
                                    {{ $faq->order }}
                                </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button
                                wire:click.stop="togglePublished({{ $faq->id }})"
                                class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold transition-all shadow-md min-w-[75px] justify-center {{ $faq->is_published ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200 dark:bg-emerald-900 dark:text-emerald-300 dark:hover:bg-emerald-800' : 'bg-rose-100 text-rose-700 hover:bg-rose-200 dark:bg-rose-900 dark:text-rose-300 dark:hover:bg-rose-800' }}"
                            >
                                {{ $faq->is_published ? 'Publié' : 'Brouillon' }}
                            </button>
                        </td>
                        <td class="px-6 py-4 text-center space-x-4">
                            <button wire:click.stop="$dispatch('open-edit-faq', { faqId: {{ $faq->id }} })" class="text-indigo-600 dark:text-indigo-400 font-bold hover:underline transition">Éditer</button>
                            <button wire:click.stop="delete({{ $faq->id }})" onclick="confirm('Supprimer cette FAQ ?') || event.stopImmediatePropagation()" class="text-rose-600 dark:text-rose-400 font-bold hover:underline transition">Supprimer</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-20 text-center">
                            <div class="text-gray-400 dark:text-gray-600">
                                <svg class="w-16 h-16 mx-auto mb-4 text-indigo-400 dark:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-xl font-bold text-gray-700 dark:text-gray-300">Aucune FAQ trouvée</p>
                                <p class="text-sm mt-2">Cliquez sur **Ajouter une FAQ** pour commencer l'organisation.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-10 flex justify-center max-w-7xl mx-auto">
        {{ $faqs->links() }}
    </div>
</div>
