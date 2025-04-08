@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons para el diseño boton siguiente anterior-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .custom-container {
            max-width: 1200px;
            /* Ancho máximo */
            margin: 0 auto;
            /* Centrar el contenedor */
            padding: 0px;
            /* Espaciado interno */
        }

        /* Estilo general del form-group */
        .form-group {
            display: flex;
            flex-direction: column;
            /* Alinea verticalmente label y select */
            margin-bottom: 7px;
            /* Espaciado entre campos */
        }

        /* Estilo del label */
        .form-group label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 1px;
            /* Espaciado debajo del label */
        }

        /* Estilo del select */
        .form-group select {
            width: 800px;
            /* Tamaño fijo del select */
            max-width: 100%;
            /* Asegura que no exceda el ancho del contenedor */
            padding: 8px;
            /* Espaciado interno */
            font-size: 14px;
            /* Tamaño de texto */
            border: 1px solid #ccc;
            /* Borde estándar */
            border-radius: 4px;
            /* Esquinas redondeadas */
            background-color: #fff;
            /* Fondo blanco */
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            /* Sombra interna */
        }

        .form-input {
            margin-bottom: 5px;
            /* Espacio debajo de cada input */
            flex: 1;
            /* Hace que los inputs se expandan para ocupar el espacio restante */

        }
    </style>
@endsection
@section('content')
    <div class="custom-container mt-4 p-4 bg-light border rounded shadow-md">
        <div style="display: flex; justify-content: center; align-items: center; height: 7vh;" id="step1">
            <h5>Informacion Legal</h5>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


        <form action="{{ route('legal_act.update', $lis_legal->uh_asignada_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="custom-container">
                <div class="row mb-3 align-items-center">
                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="nombres" class="form-label">Nombres del Beneficiario:</label>
                            <input type="text" class="form-control" id="nombres" name="nombres"
                                value="{{ $lis_legal->nombres }}" disabled>
                        </div>
                    </div>

                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="cedula_identidad" class="form-label">Cedula Identidad:</label>
                            <input type="text" class="form-control" id="cedula_identidad" name="cedula_identidad"
                                value="{{ $lis_legal->cedula_identidad }}" disabled>
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="departamento" class="form-label">Departamento:</label>
                            <input type="text" class="form-control" id="departamento" name="departamento"
                                value="{{ $lis_legal->departamento }}" disabled>
                        </div>
                    </div>

                    <div class="col-8 col-md-8 col-lg-8">
                        <div class="form-group">
                            <label for="nombre_proy" class="form-label">Proyecto:</label>
                            <input type="text" class="form-control" id="nombre_proy" name="nombre_proy"
                                value="{{ $lis_legal->nombre_proy }}" disabled>
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="manzano" class="form-label">Manzano</label>
                            <input type="text" class="form-control @error('manzano') is-invalid @enderror" id="manzano"
                                name="manzano" value="{{ old('manzano', $lis_legal->manzano ?? '') }}" disabled>

                            @error('manzano')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="lote" class="form-label">Lote</label>
                            <input type="text" class="form-control @error('lote') is-invalid @enderror" id="lote"
                                name="lote" value="{{ old('lote', $lis_legal->lote ?? '') }}" disabled>

                            @error('lote')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="unidad_vecinal" class="form-label">Unidad Vecinal</label>
                            <input type="text" class="form-control @error('unidad_vecinal') is-invalid @enderror"
                                id="unidad_vecinal" name="unidad_vecinal"
                                value="{{ old('unidad_vecinal', $lis_legal->unidad_vecinal ?? '') }}" disabled>

                            @error('unidad_vecinal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Opciones con radio buttons -->
                    <div class="mb-4">
                        <div style="display: flex; justify-content: center; align-items: center; height: 7vh;"
                            id="step1">
                            <h5>Datos para elegir una opcion</h5>
                        </div>

                        <table class="table table-bordered">
                            @php
                                $opciones = ['si' => 'Sí', 'no' => 'No', 'pendiente' => 'Pendiente'];
                            @endphp

                            <tr>
                                <td>Levantamiento Gravamen y Dev. Documentos:</td>
                                @foreach ($opciones as $val => $label)
                                    <td>
                                        <label>
                                            <input type="radio" name="levanta_grav_dev_doc"
                                                value="{{ $val }}"
                                                {{ old('levanta_grav_dev_doc', $lis_legal->levanta_grav_dev_doc) === $val ? 'checked' : '' }}>
                                            {{ $label }}
                                        </label>
                                    </td>
                                @endforeach
                            </tr>

                            <tr>
                                <td>Ley 850 Observado:</td>
                                @foreach ($opciones as $val => $label)
                                    <td>
                                        <label><input type="radio" name="observado_ley850" value="{{ $val }}"
                                                {{ old('observado_ley850', $lis_legal->observado_ley850) === $val ? 'checked' : '' }}>
                                            {{ $label }}</label>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Notificación con Intención:</td>
                                @foreach ($opciones as $val => $label)
                                    <td>
                                        <label><input type="radio" name="notificacion_intencion"
                                                value="{{ $val }}"
                                                {{ old('notificacion_intencion', $lis_legal->notificacion_intencion) === $val ? 'checked' : '' }}>
                                            {{ $label }}</label>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Notificación Resolución Contractual:</td>
                                @foreach ($opciones as $val => $label)
                                    <td>
                                        <label><input type="radio" name="notificacion_contractual"
                                                value="{{ $val }}"
                                                {{ old('notificacion_contractual', $lis_legal->notificacion_contractual) === $val ? 'checked' : '' }}>
                                            {{ $label }}</label>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Folio a Nombre de AEVIVIENDA:</td>
                                @foreach ($opciones as $val => $label)
                                    <td>
                                        <label><input type="radio" name="folio_aevivienda" value="{{ $val }}"
                                                {{ old('folio_aevivienda', $lis_legal->folio_aevivienda) === $val ? 'checked' : '' }}>
                                            {{ $label }}</label>
                                    </td>
                                @endforeach
                            </tr>

                        </table>
                    </div>

                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="elab_min_cont_test" class="form-label">Elaboracion de Minuta/Resolucion
                                Contractual/Testimonio:</label>
                            <input type="text" class="form-control" id="elab_min_cont_test" name="elab_min_cont_test"
                                value="{{ $lis_legal->elab_min_cont_test }}">
                        </div>
                    </div>

                    <div class="col-3 col-md-3 col-lg-12">
                        <div class="form-group">
                            <label for="observaciones2" class="form-label">Observaciones</label>
                            <textarea class="form-control @error('observaciones2') is-invalid @enderror" id="observaciones2"
                                name="observaciones2" rows="1" cols="100" placeholder="Escribe tus observaciones aquí">{{ old('observaciones2', $lis_legal->observaciones2 ?? '') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="mb-4">
                        <table class="table table-bordered">
                            @php
                                $opciones = ['si' => 'Sí', 'no' => 'No', 'pendiente' => 'Pendiente'];
                            @endphp
                            <tr>
                                <td>Inicio de Recuperación o Sustitución:</td>
                                @foreach ($opciones as $val => $label)
                                    <td>
                                        <label><input type="radio" name="inicio_reasig_sustit"
                                                value="{{ $val }}"
                                                {{ old('inicio_reasig_sustit', $lis_legal->inicio_reasig_sustit) === $val ? 'checked' : '' }}>
                                            {{ $label }}</label>
                                    </td>
                                @endforeach
                            </tr>
                        </table>
                    </div>

                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="nuevo_beneficiario" class="form-label">Nombre Nuevo Beneficiario:</label>
                            <input type="text" class="form-control" id="nuevo_beneficiario" name="nuevo_beneficiario"
                                value="{{ $lis_legal->nuevo_beneficiario }}">
                        </div>
                    </div>

                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="ci_nuevo_benef" class="form-label">CI Nuevo Beneficiario:</label>
                            <input type="text" class="form-control" id="ci_nuevo_benef" name="ci_nuevo_benef"
                                value="{{ $lis_legal->ci_nuevo_benef }}">
                        </div>
                    </div>

                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="minuta_testimonio" class="form-label">Testimonio / Minuta / Folio:</label>
                            <input type="text" class="form-control" id="minuta_testimonio" name="minuta_testimonio"
                                value="{{ $lis_legal->minuta_testimonio }}">
                        </div>
                    </div>

                    <div class="col-3 col-md-3 col-lg-12">
                        <div class="form-group">
                            <label for="observaciones3" class="form-label">Observaciones</label>
                            <textarea class="form-control @error('observaciones3') is-invalid @enderror" id="observaciones3"
                                name="observaciones3" rows="1" cols="100" placeholder="Escribe tus observaciones aquí">{{ old('observaciones3', $lis_legal->observaciones3 ?? '') }}
                                    </textarea>
                        </div>
                    </div>



                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button button type="button" onclick="window.open('', '_self', ''); window.close();"
                    class="btn btn-danger">Cancelar</button>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <!-- Botón Anterior -->
                <a href="{{ route('legal_act.index') }}" class="btn btn-warning">
                    <i class="bi bi-arrow-left-circle"></i> Anterior
                </a>
                <!-- Botón Siguiente -->
                <a href="pagina_siguiente.html" class="btn btn-secondary">
                    Siguiente <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </form>

    </div>
@endsection
