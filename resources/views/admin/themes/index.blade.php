<!-- resources/views/admin/projects/index.blade.php -->
@extends('adminlte::page')

@section('title', 'Liste des Themes')

@section('content_header')
    <h1>Themes</h1>
@endsection

@section('content')
    <p>Bienvenue sur la page des Themes !</p>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-4">🎯 Liste des Thèmes</h2>
            <a href="{{ route('themes.create') }}" class="btn btn-primary">➕ Ajouter un themes</a>
        </div>

        @if ($themes->isEmpty())
            <div class="alert alert-warning">
                Aucun thème trouvé.
            </div>
        @else
            {{-- <ul class="list-group">
                @foreach ($themes as $theme)
                    <li class="list-group-item">
                        {{ $theme->name }}
                    </li>
                @endforeach
            </ul> --}}
            <ul class="list-group">
                @foreach ($themes as $theme)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $theme->name }}</strong><br>
                            <small>{{ $theme->description }}</small>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('themes.edit', $theme) }}" class="btn btn-sm btn-warning mr-4">✏️ Modifier</a>
                            <form action="{{ route('themes.destroy', $theme) }}" method="POST" onsubmit="return confirm('Supprimer ce theme ?')">
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
