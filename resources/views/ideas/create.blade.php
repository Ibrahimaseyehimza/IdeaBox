@extends('adminlte::page')

@section('title', 'Créer une idée')

@section('content_header')
    <h1>Créer une nouvelle idée</h1>
@endsection

@section('content')
    <form action="{{ route('ideas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>


        <div class="form-group">
            <label for="theme_id">Theme</label>
            <select name="theme_id" id="theme_id" class="form-control" required>
                <option value="">-- Sélectionner --</option>
                @foreach ($themes as $theme)
                    <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="department_id">Département</label>
            <select name="department_id" id="department_id" class="form-control">
                <option value="">-- Facultatif --</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="project_id">Projet</label>
            <select name="project_id" id="project_id" class="form-control">
                <option value="">-- Facultatif --</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="attachment">Joindre un fichier (photo, document, etc.)</label>
            <input type="file" class="form-control" name="attachment" id="attachment">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter l'idée</button>
    </form>
@endsection
