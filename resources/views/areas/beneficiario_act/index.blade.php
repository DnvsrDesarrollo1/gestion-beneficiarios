@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
    </style>
@endsection
<div class="container mt-4 p-4 bg-light border rounded shadow-md">
    <h5 class="text-center">LISTA DE BENEFICIARIOS</h5>


    <table class="table table-bordered table-striped mt-3">
        <thead class="table-danger">
            <tr>

                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Cédula Identidad</th>
                <th>Expedido</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listar as $beneficiarios)
                <tr>

                    <td>{{ $beneficiarios->nombres }}</td>
                    <td>{{ $beneficiarios->apellido_paterno }}</td>
                    <td>{{ $beneficiarios->apellido_materno }}</td>
                    <td>{{ $beneficiarios->cedula_identidad }}</td>
                    <td>{{ $beneficiarios->extension_ci }}</td>
                    <td>{{ $beneficiarios->telefono }}</td>
                    <td>
                        <a href="{{ route('beneficiario_act.edit', $beneficiarios->beneficiario_id) }}"
                            class="btn btn-warning">Editar</a>

                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
