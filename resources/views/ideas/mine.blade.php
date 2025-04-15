@extends('layouts.guest')

@section('content')

    <h1>Mes Idées 💡</h1>

    @forelse ($ideas ?? [] as $idea)
        {{-- <li>{{ $idea->title }}</li> --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex align-items-center">
                <img src="{{ $idea->user->avatar_url ?? 'https://via.placeholder.com/40' }}"
                     alt="Avatar"
                     class="rounded-circle mr-2"
                     width="40" height="40">
                <div class="ml-2">
                    <strong>{{ $idea->user->name }}</strong><br>
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
                    <span>👍 {{ $idea->voters->count() }} votes</span>
                    <a href="{{ route('ideas.show', $idea->id) }}" class="btn btn-sm btn-outline-secondary">
                        💬 Voir les détails
                    </a>
                </div>
            </div>
        </div>

    @empty
        <p>Aucune idée proposée pour le moment.</p>
    @endforelse

@endsection
