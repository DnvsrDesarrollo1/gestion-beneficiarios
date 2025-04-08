@extends('layouts.app')
@section('content')
    <div class="container mt-4 p-4 bg-light border rounded shadow-md">
        <h5 class="text-center">Cartera de creditos</h5>


        <div class="mb-3 no-print">
            <form method="GET" class="d-flex gap-2">
                <input type="text" name="ci_beneficiario" class="form-control" placeholder="Buscar por C.I. Beneficiario"
                    value="{{ request('ci_beneficiario') }}">

                <input type="text" name="cod_prestamo" class="form-control" placeholder="Buscar por Codigo de Prestamo"
                    value="{{ request('cod_prestamo') }}">

                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>

        <table class="table table-bordered table-striped mt-3">
            <thead class="table-danger">
                <tr>
                    <th>Codigo de Prestamo</th>
                    <th>Beneficiario</th>
                    <th>Cedula Identidad</th>
                    <!--<th>Codigo Unidad Habitacional</th>-->
                    <th>Departamento</th>
                    <th>Proyecto</th>
                    <th>Manzano</th>
                    <th>Lote</th>
                    <th>Unidad Vecinal</th>
                    <th>Estado Cartera</th>
                    <th>Entidad Financiera</th>
                    <th>Total Activo</th>
                    <!--<th>Saldo Credito</th>
                    <th>Fecha Activacion<th>-->
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unid_con_credit as $unidad_habitacional)
                    <tr>
                        <td>{{ $unidad_habitacional->cod_prestamo ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->nombres ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->cedula_identidad ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->departamento ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->nombre_proy ?? '-' }}</td>
                        <!--<td>{{ $unidad_habitacional->unidad_habitacional_id ?? '-' }}</td>-->
                        <td>{{ $unidad_habitacional->manzano ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->lote ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->unidad_vecinal ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->estado_cartera ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->entidad_financiera ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->total_activado ?? '-' }}</td>
                        <!--<td>{{ $unidad_habitacional->saldo_credito ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->fecha_activacion ?? '-' }}</td>-->


                        <td>
                            <a href="{{ route('credito_act.edit', $unidad_habitacional->uh_asignada_id) }}"
                                class="btn btn-warning">Detalle</a>


                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-3">
            <div>{{ $unid_con_credit->links() }}</div>
        </div>

    </div>
@endsection
