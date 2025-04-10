@extends('adminlte::page')

@section('title', 'Modifier l\'idée')

@section('content_header')
    <h1>Modifier une idée</h1>
    @if ($idea)
    <form action="{{ route('ideas.update', $idea) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $idea->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $idea->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="theme_id">Thème</label>
            <select name="theme_id" id="theme_id" class="form-control">
                @foreach ($themes as $theme)
                    <option value="{{ $theme->id }}" {{ $idea->theme_id == $theme->id ? 'selected' : '' }}>{{ $theme->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="project_id">Projet</label>
            <select name="project_id" id="project_id" class="form-control">
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ $idea->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="department_id">Département</label>
            <select name="department_id" id="department_id" class="form-control">
                <option value="">Aucun</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ $idea->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Statut</label>
            <select name="status" id="status" class="form-control" required>
                <option value="en_attente" {{ $idea->status === 'en_attente' ? 'selected' : '' }}>En attente</option>
                <option value="en_etude" {{ $idea->status === 'en_etude' ? 'selected' : '' }}>En étude</option>
                <option value="validee" {{ $idea->status === 'validee' ? 'selected' : '' }}>Validée</option>
                <option value="rejetee" {{ $idea->status === 'rejetee' ? 'selected' : '' }}>Rejetée</option>
                <option value="en_cours" {{ $idea->status === 'en_cours' ? 'selected' : '' }}>En cours</option>
                <option value="implémentée" {{ $idea->status === 'implémentée' ? 'selected' : '' }}>Implémentée</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('ideas.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
@else
    <p>Idée introuvable.</p>
@endif
@endsection
{{--
@section('content')


@endsection --}}
