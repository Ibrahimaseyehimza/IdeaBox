@extends('adminlte::page')

@section('title', 'Tableau de bord')

@section('content_header')
    <h1>Tableau de bord de l\'administrateur</h1>
@endsection

@section('content')
    <div class="row">
        <!-- Statistiques générales -->
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fas fa-lightbulb"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Idées</span>
                    <span class="info-box-number">{{ $totalIdeas }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-project-diagram"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Projets</span>
                    <span class="info-box-number">{{ $totalProjects }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fas fa-tags"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Thèmes</span>
                    <span class="info-box-number">{{ $totalThemes }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Statistiques sur l'état des idées -->
        <div class="col-md-6">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-clock"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Idées en cours</span>
                    <span class="info-box-number">{{ $ideasInProgress }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-check"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Idées validées</span>
                    <span class="info-box-number">{{ $ideasValidated }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
