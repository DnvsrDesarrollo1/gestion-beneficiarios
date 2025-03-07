<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestor de Beneficiarios</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar-custom {
            background: linear-gradient(45deg, #173844, #7ca7b6);
        }

        .navbar-title, .custom-nav-link {
            color: white;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
        }

        .navbar-title:hover, .custom-nav-link:hover {
            color: #ddd;
        }

        .footer-custom {
            background-color: #173844;
            color: white;
            padding: 20px;
            margin-top: 30px;
        }
        .custom-container {
            max-width: 90%; /* Hace el contenido más ancho */
            margin: auto;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom p-3">
        <div class="container-fluid">
            <a class="navbar-title ms-4" href="">Gestor de Beneficiarios</a>
            <a class="navbar-title ms-4" href="{{ route('home') }}">Beneficiario</a>
            <a class="navbar-title ms-4" href="#">Datos del Proyecto</a>
            <a class="navbar-title ms-4" href="#">Asignacion Habitacional</a>
            <a class="navbar-title ms-4" href="#">Devolucion de Pagos</a>
            <a class="navbar-title ms-4" href="#">Saldo de Terreno</a>
            <a class="navbar-title ms-4" href="#">Reportes</a>


            <div class="ms-auto">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-light me-2">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-warning">Registrarse</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="container mt-2 custom-container">
        @livewire('beneficiario-search')
    </main>

    <!-- Footer -->
    <footer class="footer-custom text-center">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) - &copy; {{ date('Y') }}
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
