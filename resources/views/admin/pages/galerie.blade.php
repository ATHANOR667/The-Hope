@extends('admin.connected-base')

@section('title', 'Galerie | Gestion Média')

@section('content')
    <div class="p-4 sm:p-6 space-y-6">
        @livewire('galeriemodule::admin.galerie.create-post')
        @livewire('galeriemodule::admin.galerie.list-posts')
    </div>
@endsection

@push('style')
    <style>
        [x-cloak] { display: none; }
    </style>
@endpush
