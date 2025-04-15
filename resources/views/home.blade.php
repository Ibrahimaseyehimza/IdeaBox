{{-- @extends('layouts.guest') --}}
{{-- @extends('adminlte::page')

@section('title', 'Bienvenue')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h2>👋 Bienvenue, {{ Auth::user()->name }} !</h2>
        <p class="lead">Heureux de te revoir sur ta plateforme !</p>
    </div>

    <div class="mt-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Mon Espace</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ideas.index') }}">💡 Idées</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('projects.index') }}">📁 Projets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('departments.index') }}">🏛️ Départements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('themes.index') }}">🎯 Thèmes</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button class="nav-link btn btn-link" style="display: inline; padding: 0; border: none;">🚪 Déconnexion</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
@endsection --}}




@extends('layouts.guest')
{{-- @extends('adminlte::page') --}}
@section('title', 'Bienvenue')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">

            {{-- Carte de bienvenue --}}
            <div class="card card-primary shadow">
                <div class="card-header">
                    <h3 class="card-title">👋 Bienvenue, {{ Auth::user()->name }} !</h3>
                </div>

                <div class="card-body">
                    <p class="lead">
                        Vous êtes connecté avec succès à la plateforme 💡<strong>IdeaBox</strong> !
                    </p>
                    <p>
                        Ici, vous pouvez :
                        <ul>
                            <li>📌 Proposer de nouvelles idées</li>
                            <li>💬 Commenter et liker les idées de la communauté</li>
                            <li>📁 Gérer vos projets, thèmes et départements</li>
                        </ul>
                    </p>

                    <a href="{{ route('welcome') }}" class="btn btn-primary">
                        🌟 Voir les idées
                    </a>
                </div>
            </div>

            {{-- Exemple de widget / stats rapides --}}
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ Auth::user()->ideas->count() }}</h3>
                            <p>Idées proposées</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <a href="{{ route('ideas.index') }}" class="small-box-footer">
                            Voir plus <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ Auth::user()->comments->count() }}</h3>
                            <p>Commentaires publiés</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <a href="#" class="small-box-footer">Voir plus</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            {{-- <h3>{{ Auth::user()->projects->count() ?? 0 }}</h3> --}}
                            <p>Projets suivis</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <a href="#" class="small-box-footer">Voir plus</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
