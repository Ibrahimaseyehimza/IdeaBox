<!-- resources/views/admin/projects/index.blade.php -->
@extends('adminlte::page')

@section('title', 'Liste des projets')

@section('content_header')
    <h1>Projets</h1>
@endsection

@section('content')
    <p>Bienvenue sur la page des projets !</p>
    <div class="container mt-4">
        <h2 class="mb-4">📁 Liste des Projets</h2>

        @if ($projects->isEmpty())
            <div class="alert alert-warning">
                Aucun projet disponible pour le moment.
            </div>
        @else
            <ul class="list-group">
                @foreach ($projects as $project)
                    <li class="list-group-item">
                        <strong>{{ $project->title }}</strong><br>
                        <small>{{ $project->description }}</small>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
