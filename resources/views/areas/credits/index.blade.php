@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" />
@endsection

@section('content')
    <div class="container mt-6">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Lista de Créditos</h2>
        <div class="table-responsive">
            <table id="creditos" class="table table-bordered table-hover rounded overflow-hidden" style="width:100%">
                <thead class="table-success">
                    <tr class="align-middle">
                        <th>Departamento</th>
                        <th>Estado</th>
                        <th>Beneficiario</th>
                        <th>C.I.</th>
                        <th>Monto Activado</th>
                        <th>Cancelado a la Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($credits as $c)
                        <tr class="align-middle">
                            <td class="table-primary">{{ $c->departamento }}</td>
                            <td class="table-secondary">{{ $c->estado_cartera }}</td>
                            <td class="table-success">{{ $c->nombre_beneficiario }}</td>
                            <td class="table-danger">{{ $c->ci }}</td>
                            <td class="table-warning">{{ number_format($c->monto_activado, 2) }}</td>
                            <td class="table-info">{{ number_format($c->monto_canceladoafecha, 2) }}</td>
                            <td class="table-light">
                                <a href="{{ route('credits.edit', $c) }}" target="_blank"
                                    class="btn btn-block btn-success">Editar</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#creditos', {
            responsive: true,
            paging: true
        });
    </script>
@endsection
