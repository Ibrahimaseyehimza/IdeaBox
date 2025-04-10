{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout> --}}


@extends('adminlte::page')

@section('title', 'Tableau de bord')

@section('content_header')
    <h1>Bienvenue sur le tableau de bord</h1>
@endsection

@section('content')
    <p>Voici le tableau de bord où tu peux ajouter et gérer des idées.</p>
@endsection


{{-- @extends('layouts.guest')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Dashboard</h1>

    <div class="row">
        <div class="col-md-6">
            <h3>Idées proposées</h3>
            <p>Vous avez proposé <strong>{{ $ideas->count() }}</strong> idée(s).</p>

            @foreach ($ideas as $idea)
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ $idea->title }}</h5>
                        <p class="card-text">{{ $idea->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection --}}

