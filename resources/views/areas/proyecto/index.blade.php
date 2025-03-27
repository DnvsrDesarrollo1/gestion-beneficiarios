@extends('layouts.app')
@section('content')
    <div class="container mt-4 p-4 bg-light border rounded shadow-md">
        <h5 class="text-center">Datos de los proyectos</h5>

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

                        <td>{{ $proyectos->departamento_id }}</td>
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

    </div>
@endsection
