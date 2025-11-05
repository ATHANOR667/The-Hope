@extends('admin.connected-base')

@section('title', 'Messages et Newsletter')

@section('content')

    <div x-data="{ currentTab: 'messages' }" class="p-4 md:p-8">
        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6">Centre de Messagerie</h1>

        <div class="mb-8 border-b border-gray-200 dark:border-gray-700">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button @click="currentTab = 'messages'"
                        :class="currentTab === 'messages' ? 'border-indigo-500 text-indigo-600 dark:border-indigo-400 dark:text-indigo-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-200 dark:hover:border-gray-600'"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm focus:outline-none transition-colors duration-300">
                    Messages
                </button>
                <button @click="currentTab = 'newsletter'"
                        :class="currentTab === 'newsletter' ? 'border-indigo-500 text-indigo-600 dark:border-indigo-400 dark:text-indigo-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-200 dark:hover:border-gray-600'"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm focus:outline-none transition-colors duration-300">
                    Newsletter
                </button>
                <button @click="currentTab = 'faq'"
                        :class="currentTab === 'faq' ? 'border-indigo-500 text-indigo-600 dark:border-indigo-400 dark:text-indigo-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-200 dark:hover:border-gray-600'"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm focus:outline-none transition-colors duration-300">
                    FAQ
                </button>
            </nav>
        </div>

        <div x-show="currentTab === 'messages'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">

            @livewire('contactetnewsletter::admin.messaging.inbox-layout')

        </div>

        <div x-show="currentTab === 'newsletter'"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100">

            @livewire('contactetnewsletter::admin.newsletter.newsletter-messages-history')
            @livewire('contactetnewsletter::admin.newsletter.newsletter-message-details')
            @livewire('contactetnewsletter::admin.newsletter.newsletter-message-create')
        </div>

        <div x-show="currentTab === 'faq'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
            <!-- Contenu de l'onglet Faq -->
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">Gestion des Questions Fréquentes (FAQ)</h2>

            @livewire('contactetnewsletter::admin.faq-manager.list-faqs')
            @livewire('contactetnewsletter::admin.faq-manager.create-faqs')
            @livewire('contactetnewsletter::admin.faq-manager.edit-faqs')

        </div>

    </div>

@endsection

@push('style')

@endpush
