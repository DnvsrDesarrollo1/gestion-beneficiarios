@extends('layouts.app')

@section('content')
    <h5 class="text-center">Registrar datos del Poseedor</h5>


    <form method="GET" action="{{ route('poseedor.index') }}" class="mb-3 no-print w-100">
        <div class="row">
            <div class="col-md-3 mb-2">
                <input type="text" name="nombre_beneficiario_final" class="form-control" placeholder="Buscar por Nombre Beneficiario Final"
                    value="{{ request('nombre_beneficiario_final') }}">
            </div>
            <div class="col-md-2 mb-2">
                <input type="text" name="ci_beneficiario_final" class="form-control" placeholder="Buscar por C.I. Beneficiario Final"
                    value="{{ request('ci_beneficiario_final') }}">
            </div>
            <div class="col-md-2 mb-2">
                <input type="text" name="departamento" class="form-control" placeholder="Buscar por Departamento"
                    value="{{ request('departamento') }}">
            </div>
            <div class="col-md-3 mb-2">
                <input type="text" name="proyecto" class="form-control" placeholder="Buscar por Proyecto"
                    value="{{ request('proyecto') }}">
            </div>

            <div class="col-auto mb-2 d-flex gap-2 align-items-start">
                <button type="submit" class="btn"
                    style="background: linear-gradient(135deg, #4b99da, #0c5697); color: white;">
                    Buscar
                </button>

                <a href="{{ route('poseedor.index') }}" class="btn"
                    style="background: linear-gradient(135deg, #c7115d, #c9c9b9); color: white;">
                    Limpiar
                </a>
            </div>
        </div>
    </form>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <div class="table-responsive">
        <!--Paginacion-->
        <div class="d-flex justify- content-center mt-3">
            <div>{{ $poseedores->links() }}</div>
        </div>
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-danger">
                <tr>
                    <th style="font-size: 11px;">Nro</th>
                    <th style="font-size: 11px;">DEPARTAMENTO</th>
                    <th style="font-size: 11px;">Proy_id</th>
                    <th style="font-size: 11px;">PROYECTO</th>
                    <th style="font-size: 11px;">MANZANO</th>
                    <th style="font-size: 11px;">LOTE</th>
                    <th style="font-size: 11px;">BENEFICIARIO INICIAL</th>
                    <th style="font-size: 11px;">C.I.</th>
                    <th style="font-size: 11px;">CONYUGUE</th>
                    <th style="font-size: 11px;">C.I.</th>
                    <th style="font-size: 11px;">BENEFICIARIO FINAL</th>
                    <th style="font-size: 11px;">C.I.</th>
                    <th style="font-size: 11px;">EXT_CI</th>
                    <th style="font-size: 11px;">TELEFONO BENEFICIARIO</th>
                    <th style="font-size: 11px;">NOMBRES POSEEDOR</th>
                    <th style="font-size: 11px;">CEDULA IDENTIDAD P.</th>
                    <th style="font-size: 11px;">TELEFONO POSEEDOR</th>
                    <th style="font-size: 11px;">OBSERVACIONES</th>
                    <th style="font-size: 11px;">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($poseedores as $poseedor)
                    <tr>
                        <td style="font-size: 11px;">{{ $loop->iteration + ($poseedores->currentPage() - 1) * $poseedores->perPage() }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->departamento }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->proy_id }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->nombre_proyecto }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->manzano }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->lote }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->nombre_titular }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->ci_titular }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->nombre_conyugue }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->ci_conyugue }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->nombre_beneficiario_final }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->ci_beneficiario_final }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->ext_ci_final }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->telefono_final }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->nombre_poseedor }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->ci_poseedor }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->telefono_poseed }}</td>
                        <td style="font-size: 11px;">{{ $poseedor->observacion_benef_final}}</td>


                        <td>
                            <a href="{{ route('poseedor.edit', ['poseedor' => $poseedor->id_soc]) }}" class="btn text-white"
                                style="background: linear-gradient(135deg, #0e6faf, #c2c209); border: none;">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
