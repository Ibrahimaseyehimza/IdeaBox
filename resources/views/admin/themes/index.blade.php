<!-- resources/views/admin/projects/index.blade.php -->
@extends('adminlte::page')

@section('title', 'Liste des Themes')

@section('content_header')
    <h1>Themes</h1>
@endsection

@section('content')
    <p>Bienvenue sur la page des Themes !</p>
    <div class="container mt-4">
        <h2 class="mb-4">🎯 Liste des Thèmes</h2>

        @if ($themes->isEmpty())
            <div class="alert alert-warning">
                Aucun thème trouvé.
            </div>
        @else
            <ul class="list-group">
                @foreach ($themes as $theme)
                    <li class="list-group-item">
                        {{ $theme->name }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
