@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons para el diseño boton siguiente anterior-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .custom-container {
            max-width: 900px;
            /* Ancho máximo */
            margin: 0 auto;
            /* Centrar el contenedor */
            padding: 15px;
            /* Espaciado interno */
        }

        /* Estilo general del form-group */
        .form-group {
            display: flex;
            flex-direction: column;
            /* Alinea verticalmente label y select */
            margin-bottom: 15px;
            /* Espaciado entre campos */
        }

        /* Estilo del label */
        .form-group label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            /* Espaciado debajo del label */
        }

        /* Estilo del select */
        .form-group select {
            width: 600px;
            /* Tamaño fijo del select */
            max-width: 100%;
            /* Asegura que no exceda el ancho del contenedor */
            padding: 8px;
            /* Espaciado interno */
            font-size: 14px;
            /* Tamaño de texto */
            border: 1px solid #ccc;
            /* Borde estándar */
            border-radius: 4px;
            /* Esquinas redondeadas */
            background-color: #fff;
            /* Fondo blanco */
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            /* Sombra interna */
        }

        .form-input {
            margin-bottom: 10px;
            /* Espacio debajo de cada input */
            flex: 1;
            /* Hace que los inputs se expandan para ocupar el espacio restante */

        }

        .btn-custom {
            background-color: #5dade2 ;
            color: white;
        }

        .btn-custom:hover {
            background-color: #2c3e50;
            color: white;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-4 p-4 bg-light border rounded shadow-md">
        <h5 class="text-center">LISTA DE BENEFICIARIOS</h5>

        <div class="text-start my-3">
            <a href="{{ route('beneficiario_act.create') }}" class="btn btn-custom">
                Registro de Nuevo Beneficiario
            </a>
        </div>

        <form method="GET" class="d-flex gap-2">
            <input type="text" name="ci_beneficiario" class="form-control" value="{{ request('ci_beneficiario') }}"
                placeholder="Buscar por CI">
            <!--<button type="submit" class="btn btn-primary">Buscar</button>-->
        </form>

        <table class="table table-bordered table-striped mt-3">
            <thead class="table-danger">
                <tr>

                    <th>Nombres</th>
                    <th>Cedula Identidad</th>
                    <th>Expedido en</th>
                    <th>Nombre Conyugue</th>
                    <th>Cedula Identidad C</th>
                    <th>Ext_ci_cony</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listar as $beneficiarios)
                    <tr>

                        <td>{{ $beneficiarios->nombres_beneficiario }}</td>
                        <td>{{ $beneficiarios->cedula_benef }}</td>
                        <td>{{ $beneficiarios->ext_benef }}</td>
                        <td>{{ $beneficiarios->nombres_conyugue }}</td>
                        <td>{{ $beneficiarios->cedula_conyugue }}</td>
                        <td>{{ $beneficiarios->ext_conyugue }}</td>
                        <td>
                            <a href="{{ route('beneficiario_act.edit', $beneficiarios->beneficiario_id) }}"
                                class="btn btn-warning">Editar</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-3">
            <div>{{ $listar->links() }}</div>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <!-- Botón Anterior -->
            <a href="#" class="btn btn-warning">
                <i class="bi bi-arrow-left-circle"></i> Anterior
            </a>
            <!-- Botón Siguiente -->
            <a href="pagina_siguiente.html" class="btn btn-secondary">
                Siguiente <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>
@endsection
