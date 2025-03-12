@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Unidades Habitacionales</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Departamento</th>
                <th>Proyecto</th>
                <th>Manzano</th>
                <th>Lote</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unidades as $unidad_habitacional)
                <tr>
                    <td>{{ $unidad_habitacional->unidad_habitacional_id }}</td>
                    <td>{{ $unidad_habitacional->departamento }}</td>
                    <td>{{ $unidad_habitacional->proyecto }}</td>
                    <td>{{ $unidad_habitacional->manzano }}</td>
                    <td>{{ $unidad_habitacional->lote }}</td>
                    <td>{{ $unidad_habitacional->observaciones }}</td>
                    <td>
                        <a href="{{ route('unidades_hab.edit', $unidad_habitacional->unidad_habitacional_id) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
