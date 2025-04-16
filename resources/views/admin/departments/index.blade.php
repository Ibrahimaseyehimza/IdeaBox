<!-- resources/views/admin/projects/index.blade.php -->
@extends('adminlte::page')

@section('title', 'Liste des Departments')

@section('content_header')
    <h1>Depatement</h1>
@endsection

@section('content')
    <p>Bienvenue sur la page des Departement !</p>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-4">📚 Liste des Départements</h2>
            <a href="{{ route('admin.departments.create') }}" class="btn btn-primary">➕ Ajouter un projet</a>
        </div>

        @if ($departments->isEmpty())
            <div class="alert alert-info">
                Aucun département trouvé.
            </div>
        @else
            <ul class="list-group">
                @foreach ($departments as $department)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $department->name }}</strong><br>
                        <small>{{ $department->description }}</small>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('admin.departments.edit', $department) }}" class="btn btn-sm btn-warning mr-4">✏️ Modifier</a>
                        <form action="{{ route('admin.departments.destroy', $department) }}" method="POST" onsubmit="return confirm('Supprimer ce department ?')">
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
