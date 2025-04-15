
@php
    $myIdeasCount = \App\Models\Idea::where('user_id', auth()->id())->count();
@endphp


<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <!-- Nom de l'application -->
        <a class="navbar-brand font-weight-bold" href="{{ url('/home') }}">
            💡 IdeaBox
        </a>

        <!-- Bouton pour les petits écrans -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarUser"
                aria-controls="navbarUser" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenu de la navbar -->
        <div class="collapse navbar-collapse" id="navbarUser">
            <!-- Liens de navigation -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/home') }}">🏠 Accueil</a>
                </li>
                <li class="nav-item {{ request()->is('mes-idees') ? 'active' : '' }}">

                    <a class="nav-link" href="{{ route('ideas.mine') }}">💼 Mes idées

                        @if($myIdeasCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark shadow-sm">
                                {{ $myIdeasCount }}
                            </span>
                        @endif

                    </a>





                </li>
                <li class="nav-item {{ request()->is('ajouter') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ideas.create') }}">➕ Ajouter une idée</a>
                </li>
            </ul>

            <!-- Utilisateur connecté -->
            <ul class="navbar-nav ml-auto">
                @auth
    @if(Auth::user())
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                👤 {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    🚪 Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endif
@else
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">🔐 Connexion</a>
    </li>
@endauth

            </ul>
        </div>
    </div>
</nav>
