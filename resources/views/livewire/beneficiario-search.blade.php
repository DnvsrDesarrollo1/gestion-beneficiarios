@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

@section('title', 'buscador de Beneficiarios')
@section('css')
<style>
    /* Estilos para pantalla */
    .table {
        font-size: 14px;
        background-color: #f8f9fa; /* Color de fondo */
    }
    .table thead {
        background-color: #343a40; /* Color oscuro para la cabecera */
        color: rgb(219, 172, 172);
    }

    /* Estilos para impresión */
    @media print {
        .no-print {
            display: none !important;
        }

        body {
            font-family: 'Arial', sans-serif;
            color: #000;
            margin: 0;
            padding: 15mm;
        }

        .container {
            width: 100%;
            max-width: none;
            padding: 0;
            margin: 0;
        }

        h5 {
            font-size: 16pt;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9pt;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 4px 6px;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background-color: #f0f0f0 !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        thead {
            display: table-header-group;
        }

        tr {
            page-break-inside: avoid;
        }

        @page {
            size: landscape;
            margin: 10mm;
        }
    }
</style>


@endsection


@section('content')
<div>
        <!--<div class="mb-1">
            <input type="text" wire:model.debounce.100ms="search" class="form-control" placeholder="Buscar por nombre, CI o conyugue">
        </div>-->
        <h3>Depuración de Datos</h3>
        <!--<pre>{//{ //print_r(//$listar->toArray(), true) }}</pre>-->
        <div class="mb-4">
            <div class="input-group">
                <span class="input-group-text bg-primary text-white">
                    <i class="fas fa-search"></i>
                </span>
                <div class="form-floating flex-grow-0" style="width: 200px;">
                    <input wire:model.live.debounce.200ms="search" type="text" class="form-control"
                        placeholder="Buscador por C.I." list="searchSuggestions">
                    <label for="searchInput">Ingrese el numero de C.I.</label>
                </div>

            </div>
        </div>
        <button class="btn btn-primary" wire:click="buscar">
            <i class="fas fa-search"></i> Buscar
        </button>


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
        </div>

</div>
@endsection
