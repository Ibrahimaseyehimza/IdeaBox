@extends('adminlte::page')

@section('title', 'Liste des utilisateurs')

@section('content_header')
    <h1>Utilisateurs</h1>
@endsection

@section('content')
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }} ({{ $user->email }})</li>
        @endforeach
    </ul>
@endsection
