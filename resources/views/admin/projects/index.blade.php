<!-- resources/views/admin/projects/index.blade.php -->
@extends('adminlte::page')

@section('title', 'Liste des projets')

@section('content_header')
    <h1>Projets</h1>
@endsection

{{-- @section('content')
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
@endsection --}}

{{-- @section('content_header')
    <h1>📁 Projets</h1>
@endsection --}}

@section('content')
    <p>Bienvenue sur la page des projets !</p>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">📁 Liste des Projets</h2>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">➕ Ajouter un projet</a>
        </div>

        @if ($projects->isEmpty())
            <div class="alert alert-warning">
                Aucun projet disponible pour le moment.
            </div>
        @else
            <ul class="list-group">
                @foreach ($projects as $project)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $project->name }}</strong><br>
                            <small>{{ $project->description }}</small>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning mr-4">✏️ Modifier</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Supprimer ce projet ?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑️ Supprimer</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
