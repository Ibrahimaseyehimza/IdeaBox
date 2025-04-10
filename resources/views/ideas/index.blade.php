@extends('adminlte::page')

@section('title', 'Liste des idées')

@section('content_header')
    <h1>Liste des idées</h1>
@endsection

@section('content')
      <!-- Affichage des messages flash -->
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <a href="{{ route('ideas.create') }}" class="btn btn-primary mb-3">Créer une nouvelle idée</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($ideas->isEmpty())
        <p>Aucune idée trouvée.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Theme</th>
                    <th>Département</th>
                    <th>Projet</th>
                    <th>Status</th>
                    <th>Attachement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ideas as $idea)
                    <tr>
                        <td>{{ $idea->id }}</td>
                        <td>{{ $idea->title }}</td>
                        <td>{{ \Str::limit($idea->description, 50) }}</td>
                        <td>{{ $idea->theme->name ?? 'Non défini' }}</td>
                        <td>{{ $idea->department->name ?? 'Non défini' }}</td>
                        <td>{{ $idea->project->name ?? 'Non défini' }}</td>
                        <td>{{ $idea->status ?? 'Non défini' }}</td>

                         <!-- Affichage du lien vers l'attachement -->
                        <td>
                            @if($idea->attachment)
                                <a href="{{ asset('storage/' . $idea->attachment) }}" class="btn btn-info btn-sm" target="_blank">
                                    Voir l'attachement
                                </a>
                            @else
                                <span>Aucun fichier</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('ideas.edit', $idea) }}" class="btn btn-warning btn-sm">Modifier</a>

                            <!-- Formulaire pour supprimer l'idée -->
                            <form action="{{ route('ideas.destroy', $idea) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette idée ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
