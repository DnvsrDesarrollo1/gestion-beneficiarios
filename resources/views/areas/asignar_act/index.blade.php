@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="mb-4">Listado de Unidades Habitacionales Disponibles</h4>

        <div class="mb-3 no-print">
            <form method="GET" class="d-flex gap-2">
                <input type="text" name="unid_habitacionaId" class="form-control"
                    placeholder="Buscar por ID Unidad Habitacional" value="{{ request('unid_habitacionaId') }}">

                <input type="text" name="lote" class="form-control" placeholder="Buscar por Lote"
                    value="{{ request('lote') }}">

                <input type="text" name="manzano" class="form-control" placeholder="Buscar por Manzano"
                    value="{{ request('lote') }}">

                <button type="submit" class="btn text-white"
                    style="background: linear-gradient(135deg, #4d616e, #c2c209); border: none;">Buscar</button>

            </form>
        </div>
        <!-- Tabla para mostrar unidades habitacionales disponibles -->
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-danger">
                <tr>
                    <th>Nro</th>
                    <th>ID Unidad Habitacional</th>
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
                        <td>{{ $unidad->unidad_habitacional_id }}</td>
                        <td>{{ $unidad->departamento }}</td>
                        <td>{{ $unidad->nombre_proy }}</td>
                        <td>{{ $unidad->manzano }}</td>
                        <td>{{ $unidad->lote }}</td>
                        <td>{{ $unidad->unidad_vecinal }}</td>
                        <td>

                            <a href="{{ route('asignar_act.formulario', $unidad->unidad_habitacional_id) }}"
                                class="btn text-white"
                                style="background: linear-gradient(135deg, #6e694d, #08c908); border: none;">Asignar</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!--Paginacion-->
        <div class="d-flex justify- content-center mt-3">
            <div>{{ $unidades->links() }}</div>
        </div>
    </div>
@endsection
