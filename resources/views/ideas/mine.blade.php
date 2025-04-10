@extends('layouts.user')

@section('content')

    <h1>Mes Idées 💡</h1>

    @forelse ($ideas ?? [] as $idea)
        <li>{{ $idea->title }}</li>
    @empty
        <p>Aucune idée proposée pour le moment.</p>
    @endforelse

@endsection
