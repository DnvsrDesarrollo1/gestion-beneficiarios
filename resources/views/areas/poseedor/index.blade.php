@extends('layouts.app')

@section('content')
    <h5 class="text-center">Registrar datos del Poseedor</h5>


    <form method="GET" action="{{ route('poseedor.index') }}" class="mb-3 no-print w-100">
        <div class="row">
            <div class="col-md-3 mb-2">
                <input type="text" name="nombre_beneficiario_final" class="form-control" placeholder="Buscar por Nombre"
                    value="{{ request('nombre_beneficiario_final') }}">
            </div>
            <div class="col-md-2 mb-2">
                <input type="text" name="ci_beneficiario_final" class="form-control" placeholder="Buscar por C.I."
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
                    <th>DEPARTAMENTO</th>
                    <th>PROYECTO</th>
                    <th>MANZANO</th>
                    <th>LOTE</th>
                    <th>BENEFICIARIO</th>
                    <th>CI</th>
                    <th>EXT_CI</th>
                    <th>TELEFONO BENEFICIARIO</th>
                    <th>NOMBRES POSEEDOR</th>
                    <th>CEDULA IDENTIDAD P.</th>
                    <th>TELEFONO POSEEDOR</th>
                    <th>OBSERVACIONES</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($poseedores as $poseedor)
                    <tr>
                        <td>{{ $poseedor->departamento }}</td>
                        <td>{{ $poseedor->nombre_proyecto }}</td>
                        <td>{{ $poseedor->manzano }}</td>
                        <td>{{ $poseedor->lote }}</td>
                        <td>{{ $poseedor->nombre_beneficiario_final }}</td>
                        <td>{{ $poseedor->ci_beneficiario_final }}</td>
                        <td>{{ $poseedor->ext_ci_final }}</td>
                        <td>{{ $poseedor->telefono_final }}</td>
                        <td>{{ $poseedor->nombre_poseedor }}</td>
                        <td>{{ $poseedor->ci_poseedor }}</td>
                        <td>{{ $poseedor->telefono_poseed }}</td>
                        <td>{{ $poseedor->observacion_benef_final}}</td>


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
