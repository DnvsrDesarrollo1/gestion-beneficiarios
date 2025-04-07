@extends('layouts.app')
@section('content')
    <div class="container mt-4 p-4 bg-light border rounded shadow-md">
        <h5 class="text-center">Informacion Legal</h5>



        <div class="mb-3 no-print">
            <form method="GET" class="d-flex gap-2">
                <input type="text" name="ci_beneficiario" class="form-control" placeholder="Buscar por C.I. Beneficiario"
                    value="{{ request('ci_beneficiario') }}">
                <!--<button type="submit" class="btn btn-primary">Buscar</button>-->
            </form>
        </div>


        <table class="table table-bordered table-striped mt-3">
            <thead class="table-danger">
                <tr>
                    <th>Beneficiario</th>
                    <th>Cedula Identidad</th>
                    <th>Codigo Unidad Habitacional</th>
                    <th>Departamento</th>
                    <th>Proyecto</th>
                    <th>Manzano</th>
                    <th>Lote</th>
                    <th>Unidad Vecinal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lis_legal as $unidad_habitacional)
                    <tr>
                        <td>{{ $unidad_habitacional->nombres ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->cedula_identidad ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->departamento ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->nombre_proy ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->unidad_habitacional_id ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->manzano ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->lote ?? '-' }}</td>
                        <td>{{ $unidad_habitacional->unidad_vecinal ?? '-' }}</td>

                        <td>
                            <a href="{{ route('legal_act.edit', $unidad_habitacional->uh_asignada_id) }}"
                                class="btn btn-warning">Editar</a>


                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-3">
            <div>{{ $lis_legal->links() }}</div>
        </div>

    </div>
@endsection
