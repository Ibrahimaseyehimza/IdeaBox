@extends('layouts.app')

@section('content')

    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Idées') }}
    </h2>
    @endsection

    <h1>{{ $idea->title }}</h1>
    <p>{{ $idea->description }}</p>
    <p>Status: {{ $idea->status }}</p>
    <a href="{{ route('ideas.edit', $idea->id) }}">Editer</a>
    <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
@endsection

