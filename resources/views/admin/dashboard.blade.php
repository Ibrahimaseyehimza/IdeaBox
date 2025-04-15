@extends('adminlte::page')

@section('title', 'Tableau de bord')

@section('content_header')
    <h1>Tableau de bord de l\'administrateur</h1>
@endsection

@section('content')
    <div class="row">
        <!-- Statistiques générales -->

        {{-- Nombre totale des idées --}}
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fas fa-lightbulb"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Idées</span>
                    <span class="info-box-number">{{ $totalIdeas }}</span>
                </div>
            </div>
        </div>

        {{-- Nobre de participation --}}
         <!-- Taux de participation -->
    <div class="col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-secondary"><i class="fas fa-user-check"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Taux de participation</span>
                <span class="info-box-number">{{ $participationRate }}%</span>
            </div>
        </div>
    </div>

        {{-- Totales des projets --}}
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-project-diagram"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Projets</span>
                    <span class="info-box-number">{{ $totalProjects }}</span>
                </div>
            </div>
        </div>

        {{-- Total des themes --}}
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fas fa-tags"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Thèmes</span>
                    <span class="info-box-number">{{ $totalThemes }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Totale des idée en études --}}
    <div class="row">
        <!-- Statistiques sur l'état des idées -->
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-clock"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Idées en Etude</span>
                    <span class="info-box-number">{{ $ideasInProgress }}</span>
                </div>
            </div>
        </div>

        {{-- Totale des idée validée --}}
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-check"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Idées validées</span>
                    <span class="info-box-number">{{ $ideasValidated }}</span>
                </div>
            </div>
        </div>

          {{-- Totale des idée Mise en oeuvre --}}

    <div class="col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-cogs"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">✅Idées mises en œuvre</span>
                <span class="info-box-number">{{ $implementedIdeas }}</span>
            </div>
        </div>
    </div>



      <!-- Idées rejetées -->
      <div class="col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="fas fa-times"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Idées rejetées</span>
                <span class="info-box-number">{{ $rejectedIdeas }}</span>
            </div>
        </div>
    </div>
    </div>


@endsection
