<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bienvenue sur IdeaBox')</title>
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-user.css') }}">
    @stack('adminlte-css')
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        {{-- Navbar utilisateur (ou publique) --}}
        @include('partials.user-navbar')

                {{-- @include('adminlte::partials.navbar') --}}


        <!-- Contenu principal sans sidebar -->
         <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        {{-- Footer (optionnel) --}}
        @include('partials.user-footer')

    </div>
    @stack('adminlte-js')
    <!-- jQuery (nécessaire pour Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS (dropdowns, modals, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

{{-- layouts/user.blade.php --}}
{{-- <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>{{ $title ?? 'Accueil utilisateur' }}</title>
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    </head>
    <body class="hold-transition layout-top-nav">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand-md navbar-light navbar-white border-bottom">
                <div class="container">
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <span class="brand-text font-weight-light">🌟 MonApp</span>
                    </a>

                    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarUser" aria-controls="navbarUser" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse order-3" id="navbarUser">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link">🏠 Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('projects.index') }}" class="nav-link">📂 Projets</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('departments.index') }}" class="nav-link">🏛️ Départements</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('themes.index') }}" class="nav-link">🎨 Thèmes</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="userDropdown" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        🔓 Déconnexion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Contenu -->
            <div class="content-wrapper">
                <section class="content pt-4">
                    <div class="container">
                        @yield('content')
                    </div>
                </section>
            </div>

        </div>

    <!-- Scripts nécessaires à Bootstrap -->
        <script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html> --}}

