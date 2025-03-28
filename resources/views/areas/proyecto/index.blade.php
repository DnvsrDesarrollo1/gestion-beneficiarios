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
@section('content')
    <div class="container mt-4 p-4 bg-light border rounded shadow-md">
        <h5 class="text-center">Datos de los proyectos</h5>


        <!--<div class="col-md-4">
            <div class="form-group">
                <label for="proyectoInput" class="form-label fw-bold">Ingrese Código Proyecto</label>
                <div class="input-group">
                    <input type="text" name="proyecto" class="form-control" id="proyectoInput"
                        placeholder="Ingrese Código Proyecto" value="{{ request('proyecto') }}">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </div>-->
        <div class="mb-3 no-print">
            <form method="GET" class="d-flex gap-2">
                <input type="text" name="proy" class="form-control" placeholder="Buscar por Codigo Proyecto"
                    value="{{ request('proy') }}">
                <!--<button type="submit" class="btn btn-primary">Buscar</button>-->
            </form>
        </div>


        <table class="table table-bordered table-striped mt-3">
            <thead class="table-danger">
                <tr>

                    <th>Departamento</th>
                    <th>Proyecto</th>
                    <th>Codigo Proyecto</th>
                    <th>Nro de U.H</th>
                    <th>Estado Proyecto</th>
                    <th>Fecha inicio obra</th>
                    <th>Fecha fin obra</th>
                    <th>Viviendas Concluidas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos_proy as $proyectos)
                    <tr>

                        <td>{{ $proyectos->departamento }}</td>
                        <td>{{ $proyectos->nombre_proy }}</td>
                        <td>{{ $proyectos->proyecto_id }}</td>
                        <td>{{ $proyectos->cant_uh }}</td>
                        <td>{{ $proyectos->estado_proy }}</td>
                        <td>{{ $proyectos->fecha_ini_obra }}</td>
                        <td>{{ $proyectos->fecha_fin_obra }}</td>
                        <td>{{ $proyectos->viviends_conclui }}</td>
                        <td>
                            <a href="{{ route('proyecto.edit', $proyectos->proyecto_id) }}"
                                class="btn btn-warning">Editar</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-3">
            <div>{{ $datos_proy->links() }}</div>
        </div>

    </div>
@endsection
