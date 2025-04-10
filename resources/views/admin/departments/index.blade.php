<!-- resources/views/admin/projects/index.blade.php -->
@extends('adminlte::page')

@section('title', 'Liste des Departments')

@section('content_header')
    <h1>Depatement</h1>
@endsection

@section('content')
    <p>Bienvenue sur la page des Departement !</p>
    <div class="container mt-4">
        <h2 class="mb-4">📚 Liste des Départements</h2>

        @if ($departments->isEmpty())
            <div class="alert alert-info">
                Aucun département trouvé.
            </div>
        @else
            <ul class="list-group">
                @foreach ($departments as $department)
                    <li class="list-group-item">
                        {{ $department->name }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
