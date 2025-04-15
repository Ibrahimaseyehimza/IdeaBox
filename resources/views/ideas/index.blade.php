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
                    <th>Attachement</th>
                    <th>Status</th>
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


                        {{-- <td>{{ $idea->status ?? 'Non défini' }}</td> --}}



                        {{-- <td>
                            <a href="{{ route('ideas.edit', $idea) }}" class="btn btn-warning btn-sm">Modifier</a>

                            <!-- Formulaire pour supprimer l'idée -->
                            <form action="{{ route('ideas.destroy', $idea) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette idée ?')">Supprimer</button>
                            </form>
                        </td> --}}
                        <td>
                            {{-- Formulaire de mise à jour du statut --}}
                            <form action="{{ route('admin.ideas.updateStatus', $idea->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-control" onchange="this.form.submit()">
                                    <option value="en_etude" {{ $idea->status == 'en_etude' ? 'selected' : '' }}>En étude</option>
                                    <option value="validee" {{ $idea->status == 'validee' ? 'selected' : '' }}>Validée</option>
                                    <option value="mise_en_oeuvre" {{ $idea->status == 'mise_en_oeuvre' ? 'selected' : '' }}>Mise en œuvre</option>
                                    <option value="rejete" {{ $idea->status == 'rejete' ? 'selected' : '' }}>Rejetée</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            @php
                                $colors = [
                                    'en_etude' => 'secondary',
                                    'validee' => 'success',
                                    'mise_en_oeuvre' => 'info',
                                    'rejete' => 'danger',
                                ];
                            @endphp

                            <span class="badge bg-{{ $colors[$idea->status] ?? 'dark' }}">
                                {{ ucfirst(str_replace('_', ' ', $idea->status)) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
