@extends('visitor.layout')

@section('title', 'Contact & FAQ')
@section('content')
    <div x-data="{ activeTab: 1 }">

        {{-- Conteneur de navigation avec un peu de padding et centré --}}
        <div class=" py-4 container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button
                    @click="activeTab = 1"
                    :class="activeTab === 1 ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                    class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-lg" {{-- J'ai mis 'text-lg' pour les boutons des onglets --}}
                >
                    FAQ
                </button>

                <button
                    @click="activeTab = 2"
                    :class="activeTab === 2 ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                    class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-lg" {{-- J'ai mis 'text-lg' pour les boutons des onglets --}}
                >
                    Nous Contacter
                </button>
            </nav>
        </div>

        {{-- Contenu des onglets avec une marge supérieure standard --}}
        <div class="mt-8 container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div x-show="activeTab === 1" role="tabpanel" id="tab-faq">
                @livewire('contactetnewsletter::visitor.faq-index')
            </div>

            <div x-show="activeTab === 2" role="tabpanel" id="tab-contact">
                @livewire('contactetnewsletter::visitor.messaging.contact-us-form')
            </div>
        </div>

        <div class="mt-8 pt-4 border-t border-gray-200 flex justify-end space-x-4 container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <button
                @click="activeTab = (activeTab === 1 ? 2 : 1)"
                class="px-4 py-2 text-sm font-medium text-indigo-600 border border-indigo-600 rounded-md hover:bg-indigo-50 transition duration-150 ease-in-out"
            >
                <span x-text="activeTab === 1 ? 'Aller à Contact' : 'Aller à FAQ'"></span>
            </button>
        </div>

    </div>
@endsection
