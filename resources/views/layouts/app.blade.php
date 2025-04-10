{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{-- {{ $slot }} --}}
                {{-- @yield('content') --}}
            {{-- </main> --}}
        {{-- </div> --}}
    {{-- </body> --}}
{{-- </html> --}} --}}


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AdminLTE Dashboard')</title>
    @stack('adminlte-css')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        {{-- @include('adminlte::partials.navbar') --}}

        @include('partials.navbar') {{-- si tu as ton propre fichier navbar.blade.php --}}

         <!-- Vérifier si la vue actuelle a un sidebar -->

            {{-- @include('adminlte::partials.sidebar') --}}

            {{-- @include('partials.sidebar')  tu crées resources/views/partials/sidebar.blade.php --}}


        <div class="content-wrapper">
            @yield('content_header')

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        {{-- @include('adminlte::partials.footer') --}}
    </div>
    @stack('adminlte-js')
</body>
</html>
