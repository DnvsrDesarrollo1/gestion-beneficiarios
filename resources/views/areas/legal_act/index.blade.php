@extends('layouts.app')
@section('content')
    <div class="container mt-4 p-4 bg-light border rounded shadow-md">
        <h5 class="text-center">Informacion Legal</h5>


        <div class="mb-3 no-print">
            <form method="GET" class="d-flex gap-2">
                <input type="text" name="ci_beneficiario" class="form-control" placeholder="Buscar por C.I. Beneficiario"
                    value="{{ request('ci_beneficiario') }}">

                <input type="text" name="folio" class="form-control" placeholder="Buscar por Nro Folio Real"
                    value="{{ request('folio') }}">

                <button type="submit" class="btn text-white"
                style="background: linear-gradient(135deg, #4d616e, #c2c209); border: none;">Buscar</button>
            </form>
        </div>

        <table class="table table-bordered table-striped mt-3">
            <thead class="table-danger">
                <tr>
                    <th>Nro Folio Real</th>
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
                        <td>{{ $unidad_habitacional->nro_folio_real ?? '-' }}</td>
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
                                class="btn text-white" style="background: linear-gradient(135deg, #6e694d, #08c908); border: none;" >Editar</a>


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
