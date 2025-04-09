@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endsection
@section('content')
    <div class="container mt-4 p-4 bg-light border rounded shadow-md">
        <h5 class="text-center">Cartera de creditos</h5>


        <div class="mb-3 no-print">
            <form method="GET" class="d-flex gap-2">
                <input type="text" name="ci_beneficiario" class="form-control" placeholder="Buscar por C.I. Beneficiario"
                    value="{{ request('ci_beneficiario') }}">

                <input type="text" name="cod_prestamo" class="form-control" placeholder="Buscar por Codigo de Prestamo"
                    value="{{ request('cod_prestamo') }}">

                <button type="submit" class="btn text-white"
                    style="background: linear-gradient(135deg, #4d616e, #c2c209); border: none;">Buscar</button>

            </form>
        </div>

        <table class="table table-bordered table-striped mt-3">
            <thead class="table-danger">
                <tr>
                    <th>Codigo de Prestamo</th>
                    <th>Beneficiario</th>
                    <th>Cedula Identidad</th>
                    <th>Departamento</th>
                    <th>Proyecto</th>
                    <th>Manzano</th>
                    <th>Lote</th>
                    <th>Unidad Vecinal</th>
                    <th>Estado Cartera</th>
                    <th>Entidad Financiera</th>
                    <th>Total Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detalle as $unidad_habitacional)
                    <tr>
                        <td>{{ $unidad_habitacional->cod_prestamo ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->nombres ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->cedula_identidad ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->departamento ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->nombre_proy ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->manzano ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->lote ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->unidad_vecinal ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->estado_cartera ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->entidad_financiera ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->total_activado ?? '-' }}</td>

                        <td>
                            <a href="{{ route('credito_act.detalle_pdf', $unidad_habitacional->uh_asignada_id) }}"
                                class="btn btn-sm text-white"
                                style="background: linear-gradient(135deg, #b461b4, #612727); border: none;">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Ver PDF
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-3">
            <div>{{ $detalle->links() }}</div>
        </div>

    </div>
@endsection
