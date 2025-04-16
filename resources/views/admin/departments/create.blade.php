@extends('adminlte::page')

@section('content')
    <div class="container mt-4">
        <h3>Ajouter un Departement</h3>
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <button class="btn btn-success">Enregistrer</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
