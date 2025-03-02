@extends('Admin.base')
@section('title','voir cause')
@section('content')

    <div class="row">
        <livewire:cause-show :cause="$a" />
        <livewire:cause-realisation :cause="$a" />
    </div>

    <livewire:donnation-list :cause="$a" />

@endsection
