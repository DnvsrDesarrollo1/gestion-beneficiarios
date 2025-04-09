@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Listado de Unidades Habitacionales Disponibles</h4>

    <!-- Tabla para mostrar unidades habitacionales disponibles -->
    <table  class="table table-bordered table-striped mt-3">
        <thead class="table-danger">
            <tr>
                <th>#</th>
                <th>Departamento</th>
                <th>Proyecto</th>
                <th>Manzano</th>
                <th>Lote</th>
                <th>Unidad Vecinal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unidades as $unidad)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $unidad->departamento }}</td>
                <td>{{ $unidad->nombre_proy }}</td>
                <td>{{ $unidad->manzano }}</td>
                <td>{{ $unidad->lote }}</td>
                <td>{{ $unidad->unidad_vecinal }}</td>
                <td>
                   <!-- <a href="#" class="btn btn-primary btn-sm">Asignar</a>-->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
