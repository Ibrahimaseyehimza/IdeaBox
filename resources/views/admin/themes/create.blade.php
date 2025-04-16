@extends('adminlte::page')

@section('content')
    <div class="container mt-4">
        <h3>Ajouter un projet</h3>
        <form action="route{{ ('themes.store') }}">
            @csrf
            <div class="form-group mb-2">
                <label for="name">Nom</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <button class="btn btn-success">Enregistrer</button>
            <a href="route{{ ('themes.index') }}" class="btn btn-secondary">Annuler</a>

        </form>
    </div>

@endsection
