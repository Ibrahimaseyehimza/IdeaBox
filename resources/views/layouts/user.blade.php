{{-- resources/views/layouts/user.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tableau de bord utilisateur')</title>
{{-- @include('adminlte::auth.css') --}}
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/custom-user.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        {{-- @include('adminlte::auth.navbar')  Barre de navigation --}}

        @include('partials.user-navbar')

        <!-- Sidebar utilisateur personnalisé -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">IdeaBox</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Auth::user()->avatar_url }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Tableau de bord
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ideas.mine') }}" class="nav-link">
                                <i class="nav-icon fas fa-lightbulb"></i>
                                <p>
                                    Mes idées
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ideas.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>
                                    Soumettre une idée
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Contenu principal -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        {{-- @include('adminlte::auth.footer')  Footer --}}

        @include('partials.user-footer')
    </div>
</body>
</html>
