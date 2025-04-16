@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>✏️ Modifier le theme</h1>

    <form method="POST" action="{{ route('themes.update', $theme) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom du theme</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $theme->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $theme->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning">Mettre à jour</button>
        <a href="{{ route('themes.index') }}" class="btn btn-secondary">Retour</a>
    </form>

</div>

@endsection
