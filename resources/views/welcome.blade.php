@extends('layouts.guest')

@section('title', 'Toutes les idées')

@section('content')

{{-- <div class="mb-5">
    <h2 class="text-center mb-3">🔥 Idées les plus populaires</h2>

    @forelse ($popularIdeas as $idea)
        <div class="card mb-3 shadow-sm">
            <div class="card-header d-flex justify-content-between">
                <strong>{{ $idea->is_anonymous ? 'Anonyme' : $idea->user->name }}</strong>
                <small>{{ $idea->created_at->diffForHumans() }}</small>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $idea->title }}</h5>
                <p class="card-text">{{ Str::limit($idea->description, 120) }}</p>

                <div class="d-flex">
                    <span class="badge bg-success mr-2">👍 {{ $idea->voters_count }} votes</span>
                    <span class="badge bg-info">💬 {{ $idea->comments_count }} commentaires</span>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">Aucune idée populaire pour le moment.</p>
    @endforelse
</div> --}}



<div class="container mt-4">
    <h1 class="mb-4 text-center">🌟 Fil des idées de la communauté</h1>

    @forelse ($popularIdeas as $idea)

        @php
            $hasLiked = $idea->voters->contains(auth()->user());
        @endphp

        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex align-items-center">
                <img src="{{ $idea->user->avatar_url ?? 'https://via.placeholder.com/40' }}"
                     alt="Avatar"
                     class="rounded-circle mr-2"
                     width="40" height="40">
                <div class="ml-2">
                    {{-- <strong>{{ $idea->user->name }}</strong><br>
                    <small class="text-muted">{{ $idea->created_at->diffForHumans() }}</small> --}}

                    <strong>{{ $idea->is_anonymous ? 'Anonyme' : $idea->user->name }}</strong><br>
                    <small class="text-muted">{{ $idea->created_at->diffForHumans() }}</small>
                </div>
            </div>

            <div class="card-body">
                <h5 class="card-title">{{ $idea->title }}</h5>
                <p class="card-text">{{ $idea->description }}</p>

                @if ($idea->attachment && \Illuminate\Support\Str::startsWith($idea->attachment, 'attachments/'))
                    <img src="{{ asset('storage/' . $idea->attachment) }}" class="card-img-top" alt="Image de l'idée">
                @endif

                @if ($idea->attachment_url)
                    <a href="{{ asset('storage/' . $idea->attachment_url) }}" class="btn btn-sm btn-outline-info" target="_blank">
                        📎 Voir la pièce jointe
                    </a>
                @endif

                <div class="mt-3 d-flex justify-content-between">
                    <form action="{{ route('ideas.like', $idea->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm {{ $hasLiked ? 'btn-secondary' : 'btn-primary' }}" {{ $hasLiked ? 'disabled' : '' }}>
                            👍 {{ $idea->voters->count() }}
                        </button>
                    </form>

                    {{-- Commenter --}}
                    <button
                        id="commentBtn-{{ $idea->id }}"
                        class="btn btn-sm btn-outline-primary mt-2"
                        onclick="showCommentForm({{ $idea->id }})"
                    >
                        💬 Commenter
                    </button>


                    <!-- Formulaire de commentaire caché par défaut -->
                    {{-- <div id="commentForm-{{ $idea->id }}" class="mt-2 d-none">
                        <form action="{{ route('comments.store', ['idea' => $idea->id]) }}" method="POST" onsubmit="return handleCommentSubmit({{ $idea->id }})">
                            @csrf
                            <input type="hidden" name="idea_id" value="{{ $idea->id }}">
                            <div class="form-group">
                                <textarea name="body" class="form-control form-control-sm" rows="2" placeholder="Votre commentaire..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success">Envoyer</button>
                        </form>
                    </div> --}}

                    <div id="commentForm-{{ $idea->id }}" class="mt-2 d-none">
                        <form action="{{ route('comments.store', ['idea' => $idea->id]) }}" method="POST" onsubmit="return handleCommentSubmit({{ $idea->id }})">
                            @csrf
                            <input type="hidden" name="idea_id" value="{{ $idea->id }}">
                            <div class="form-group">
                                <textarea name="body" class="form-control form-control-sm" rows="2" placeholder="Votre commentaire..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success">Envoyer</button>
                        </form>
                    </div>

                    <!-- Bouton pour afficher/masquer les commentaires -->
                    <button
                        class="btn btn-sm btn-outline-secondary mt-2"
                        id="viewCommentsBtn-{{ $idea->id }}"
                        onclick="toggleComments({{ $idea->id }})"
                    >
                        👁️ Voir les commentaires
                    </button>

                    <!-- Liste des commentaires cachée par défaut -->
                    <div id="comments-{{ $idea->id }}" class="mt-2 d-none">
                        @if ($idea->comments->isEmpty())
                            <p>Aucun commentaire pour cette idée.</p>
                        @else
                            @foreach ($idea->comments as $comment)
                                <div class="border rounded p-2 mb-1 bg-light">
                                    <strong>{{ $comment->user->name }}</strong> :
                                    <p>{{ $comment->body }}</p>  <!-- Affichage du contenu du commentaire avec 'body' -->
                                    <div class="text-muted" style="font-size: 0.8em;">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info text-center">
            Aucune idée n’a encore été partagée pour le moment.
        </div>
    @endforelse
</div>

<script>
    function showCommentForm(id) {
        // Cacher le bouton Commenter et afficher le formulaire
        document.getElementById('commentBtn-' + id).classList.add('d-none');
        document.getElementById('commentForm-' + id).classList.remove('d-none');
    }

    function handleCommentSubmit(id) {
        // Retourner true pour permettre à Laravel de soumettre le formulaire
        return true;
    }

    function toggleComments(id) {
        const commentDiv = document.getElementById('comments-' + id);
        const viewCommentsBtn = document.getElementById('viewCommentsBtn-' + id);
        const commentBtn = document.getElementById('commentBtn-' + id);

        // Basculer l'affichage des commentaires
        commentDiv.classList.toggle('d-none');

        // Cacher ou réafficher les boutons en fonction de l'état des commentaires
        if (commentDiv.classList.contains('d-none')) {
            // Si les commentaires sont masqués, réafficher les boutons
            viewCommentsBtn.textContent = '👁️ Voir les commentaires';
            commentBtn.classList.remove('d-none');
        } else {
            // Si les commentaires sont visibles, masquer les boutons
            viewCommentsBtn.textContent = '👁️ Masquer les commentaires';
            commentBtn.classList.add('d-none');
        }
    }
</script>

@endsection

@section('styles')
<style>
    .btn-sm {
        width: auto;
        max-width: 200px;
    }
</style>
@endsection
