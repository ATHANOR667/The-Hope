@extends('Admin.base')
@section('title','accueuil')
@section('content')

    <div class="row">
        <livewire:cause-create :admin="$a"/>
        <livewire:comming-cause :admin="$a" />
    </div>
    <livewire:cause-data-table :admin="$a" />

@endsection
