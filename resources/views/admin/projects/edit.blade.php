@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>✏️ Modifier le projet</h1>

    <form method="POST" action="{{ route('admin.projects.update', $project) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom du projet</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $project->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning">Mettre à jour</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
