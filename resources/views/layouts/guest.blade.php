{{-- resources/views/layouts/guest.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bienvenue sur IdeaBox')</title>
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-user.css') }}">
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        {{-- Navbar utilisateur (ou publique) --}}
        @include('partials.user-navbar')

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
</body>
</html>
