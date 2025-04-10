

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bienvenue sur votre tableau de bord</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                Soumettre une nouvelle idée
            </div>
            <div class="card-body">
                <form action="{{ route('user.idea.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titre de l'idée</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="theme_id">Thème</label>
                        <select id="theme_id" name="theme_id" class="form-control" required>
                            @foreach($themes as $theme)
                                <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            </div>
        </div>
    </div>
@endsection
