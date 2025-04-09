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

        .navbar-title {
        color: white; /* Color del texto */
        font-family: Arial, sans-serif; /* Fuente del texto */
        font-size: 1rem; /* Tamaño del texto */
        font-weight: bold; /* Negrita (opcional) */
        margin-right: 20px; /* Espaciado entre los elementos */
        text-decoration: none; /* Sin subrayado */
        }

        .custom-nav-link {
            color: white;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
        }
        .navbar-title:hover {
        color: #f3f3ef; /* Color al pasar el cursor */
        }
        .custom-nav-link {
        color: white; /* Cambiar color a blanco */
        text-decoration: none; /* Quitar subrayado (opcional) */
        }

        .footer-custom {
            background-color: #173844;
            color: white;
            padding: 20px;
            margin-top: 30px;
        }

        .custom-container {
            max-width: 90%;
            /* Hace el contenido más ancho */
            margin: auto;
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white navbar-custom p-3">
        <div class="container-fluid">

            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestor de Beneficiarios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" >Menu item</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Beneficiario
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"  href="{{ route('home') }}">Beneficiario</a></li>
                            <li><a class="dropdown-item" href="{{ route('beneficiario_act.index') }}">Registro de Nuevo Beneficiario / Actualizar Datos</a></li>
                            <li><a class="dropdown-item" href="{{ route('unidades_hab.index')}}">Unidad Habitacional / Actualizar Datos</a></li>
                            <li><a class="dropdown-item" href="{{ route('social_act.index') }}">Estado Social del Beneficiario</a></li>
                            <li><a class="dropdown-item" href="{{ route('legal_act.index') }}">Informacion legal del Beneficiario</a></li>
                            <li><a class="dropdown-item" href="{{ route('credito_act.index') }}">Cartera de Creditos del Beneficiario</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Datos del Proyecto
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('proyecto.index') }}">Datos del proyecto</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Unidad Habitacional
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"  href="#">Asignacion Habitacional</a></li>
                            <li><a class="dropdown-item" href="#"></a></li>
                            <li><a class="dropdown-item" href="">Menu item</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Devolucion de Pagos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Beneficiario</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Saldo de Terreno
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Beneficiario</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Reportes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Beneficiario</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                        </ul>
                    </li>

                </ul>
            </div>


            <div class="ms-auto">
                @guest
                    @if (Route::has('login'))

                            <a class="btn btn-outline-light me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif

                    @if (Route::has('register'))

                            <a class="btn btn-warning" href="{{ route('register') }}">{{ __('Register') }}</a>

                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); if(confirm('¿Estás seguro de que quieres cerrar sesión?'))
                                                 document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                {{ __('Cerrar Sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="container mt-2 custom-container">
        @livewire('beneficiario-search')
    </main>

    <!-- Footer -->
    <footer class="footer-custom text-center">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) - &copy;
        {{ date('Y') }}
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
