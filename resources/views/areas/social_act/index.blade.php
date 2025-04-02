@extends('layouts.app')
@section('content')
    <div class="container mt-4 p-4 bg-light border rounded shadow-md">
        <h5 class="text-center">Estado Social</h5>



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
                    <th>Departamento</th>
                    <th>Proyecto</th>
                    <th>Manzano</th>
                    <th>Lote</th>
                    <th>Unidad Vecinal</th>
                    <th>Proceso Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lis_social as $uh_asignada)
                    <tr>

                        <td>{{ $uh_asignada->nombres }}</td>
                        <td>{{ $uh_asignada->cedula_identidad }}</td>
                        <td>{{ $uh_asignada->departamento_id }}</td>
                        <td>{{ $uh_asignada->proyecto_id }}</td>
                        <td>{{ $uh_asignada->manzano }}</td>
                        <td>{{ $uh_asignada->lote }}</td>
                        <td>{{ $uh_asignada->unidad_vecinal }}</td>
                        <td>{{ $uh_asignada->proceso_estado }}</td>
                        <td>
                            <a href="{{ route('social_act.edit', $uh_asignada->uh_asignada_id) }}"
                                class="btn btn-warning">Editar</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-3">
            <div>{{ $lis_social->links() }}</div>
        </div>

    </div>
@endsection
