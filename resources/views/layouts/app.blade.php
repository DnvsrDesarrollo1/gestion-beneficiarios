<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Gestión de Beneficiarios">
    <link rel="apple-touch-icon" href="{{ asset('images/fontLogin.jpg') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="manifest" href="{{ asset('manifest.json') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles

    @yield('css')

    <style>
        #app {
            display: grid;
            min-height: 100dvh;
            grid-template-rows: auto 1fr;
        }

        body {
            background-color: #f0f0f0;
            background-image: radial-gradient(circle, #0000002a 1px, transparent 1px);
            background-size: 20px 20px;
        }

        * {
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
        }

        #sbar::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }

        #sbar::-webkit-scrollbar {
            width: 10px;
            background-color: #F5F5F5;
        }

        #sbar::-webkit-scrollbar-thumb {
            background-color: rgb(0, 102, 255);
            background-image: -webkit-linear-gradient(45deg,
                    rgba(255, 255, 255, .2) 25%,
                    transparent 25%,
                    transparent 50%,
                    rgba(255, 255, 255, .2) 50%,
                    rgba(255, 255, 255, .2) 75%,
                    transparent 75%,
                    transparent)
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            margin-bottom: 20px;
        }

        .card:hover {
            /* transform: translateY(-1px); */
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #dcdcdc;
            border-radius: 8px 8px 0 0;
            padding: 1rem;
            font-weight: bold;
            font-size: 1.25rem;
        }

        .card-body {
            padding: 1.5rem;
            background-color: #f9f9f9;
        }

        .card-footer {
            background-color: #ffffff;
            border-top: 1px solid #dcdcdc;
            border-radius: 0 0 8px 8px;
            padding: 1rem;
            text-align: right;
        }

        .btn:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }

        .pagination li {
            margin: 0 3px;
        }

        .pagination .page-link {
            display: block;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #ffffff;
            border: 1px solid #dcdcdc;
            color: #007bff;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination .page-link:hover {
            background-color: #007bff;
            color: #ffffff;
        }

        .pagination .active .page-link {
            background-color: #007bff;
            color: #ffffff;
            border-color: #007bff;
        }

        .pagination .disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }

        .navbar-custom {
            background: linear-gradient(45deg, #173844, #7ca7b6);
        }
        .navbar-title {
        color: white; /* Color del texto */
        font-family: Arial, sans-serif; /* Fuente del texto */
        font-size: 1.25rem; /* Tamaño del texto */
        font-weight: bold; /* Negrita (opcional) */
        margin-right: 20px; /* Espaciado entre los elementos */
        text-decoration: none; /* Sin subrayado */
        }

        .navbar-title:hover {
        color: #f3f3ef; /* Color al pasar el cursor */
        }
        .custom-nav-link {
        color: white; /* Cambiar color a blanco */
        text-decoration: none; /* Quitar subrayado (opcional) */
        }

        .custom-nav-link:hover {
        color: #ddd; /* Cambiar color al pasar el cursor (hover) */
        }

    </style>

    <!-- Scripts -->
</head>

<body class="bg-body-tertiary" id="sbar">
    <div id="app">
        @include('layouts.components.navbar')

        <main>
            <div class="container pt-4 pb-4 bg-white border-start border-end border-body-tertiary border-3">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <livewire:offline>
                            @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
    @stack('scripts')
    @yield('js')

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js').then(function(registration) {
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
</body>

</html>
