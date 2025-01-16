@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" />
@endsection

@section('content')
    <div class="container mt-6">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Datos del Beneficiarios</h2>
        <div class="table-responsive">
            <table id="creditos" class="table table-bordered table-hover rounded overflow-hidden" style="width:100%">
                <thead class="table-success">
                    <tr class="align-middle">
                        <th>Departamento</th>

                        <th>Beneficiario</th>
                        <th>C.I.</th>
                        <th>Telefono/Celular</th>


                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($extracred as $c)
                        <tr class="align-middle">
                            <td class="table-primary">{{ $c->departamento }}</td>

                            <td class="table-success">{{ $c->nombre_beneficiario }}</td>
                            <td class="table-danger">{{ $c->ci }}</td>


                            <td></td>
                            <td class="table-light">
                                <a href="{{ route('extracred.edit', $c->unid_hab_id) }}" target="_blank"
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
        new DataTable('#extracred', {
            responsive: true,
            paging: true
        });
    </script>
@endsection
