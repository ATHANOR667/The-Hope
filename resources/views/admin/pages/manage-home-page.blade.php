@extends('admin.connected-base')

@section('title', 'Manage Home Page')

@section('content')
   @livewire('manage-home-page')
@endsection

@push('style')
    <style>
        [x-cloak] { display: none; }
    </style>
@endpush
