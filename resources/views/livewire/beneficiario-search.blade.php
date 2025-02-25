<!-- filepath: /C:/laragon/www/gestion-beneficiarios/gestion-beneficiarios/resources/views/livewire/beneficiario-search.blade.php -->
@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

@section('title', 'Lista de Beneficiarios')
@section('css')


@endsection


@section('content')
    <h1>Buscar Beneficiario</h1>
    <div>
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Buscar beneficiario..." />

    </div>


    <div class="table-responsive-sm">
        <table class="table table-bordered table-striped">

            <thead class="table-danger">
                <tr>
                    <th>Beneficiario</th>
                    <th>C.I.</th>
                    <th>Conyugue</th>
                    <th>C.I.Conyugue</th>
                    <th>Departamento</th>
                    <th>Proyecto</th>
                    <th>Unidad Habitacional:</th>
                    <th>Manzano</th>
                    <th>Lote</th>
                    <th>Unidad Vecinal</th>
                    <th>Estado Social</th>
                    <th>Folio Real</th>
                    <th>Codigo Prestamo</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($listar as $beneficiarios)
                    <tr>
                        <td>{{ $beneficiarios->nombres_beneficiario ?? 'N/A' }}</td>
                        <td>{{ $beneficiarios->cedula_benef ?? 'N/A' }}</td>
                        <td>{{ $beneficiarios->nombres_conyugue ?? 'N/A' }}</td>
                        <td>{{ $beneficiarios->cedula_conyugue ?? 'N/A' }}</td>
                        <td>{{ $beneficiarios->departamento ?? 'N/A' }}</td>
                        <td>{{ $beneficiarios->proyecto ?? 'N/A' }}</td>
                        <td>{{ $beneficiarios->manzano ?? 'N/A' }}</td>
                        <td>{{ $beneficiarios->lote ?? 'N/A' }}</td>
                        <td>{{ $beneficiarios->uh_asignada_id ?? 'N/A' }}</td>
                        <td>{{ $beneficiarios->unidad_habitacional_id ?? 'N/A' }}</td>


                    </tr>
                @endforeach

            </tbody>
        </table>
        <!-- Mostrar la paginación --


    </div>
@endsection
