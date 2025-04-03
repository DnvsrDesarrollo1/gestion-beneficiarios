@extends('layouts.app')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons para el diseño boton siguiente anterior-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .custom-container {
            max-width: 900px;
            /* Ancho máximo */
            margin: 0 auto;
            /* Centrar el contenedor */
            padding: 15px;
            /* Espaciado interno */
        }

        /* Estilo general del form-group */
        .form-group {
            display: flex;
            flex-direction: column;
            /* Alinea verticalmente label y select */
            margin-bottom: 15px;
            /* Espaciado entre campos */
        }

        /* Estilo del label */
        .form-group label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            /* Espaciado debajo del label */
        }

        /* Estilo del select */
        .form-group select {
            width: 600px;
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
            margin-bottom: 10px;
            /* Espacio debajo de cada input */
            flex: 1;
            /* Hace que los inputs se expandan para ocupar el espacio restante */

        }
    </style>
@endsection

@section('content')
    <div class="custom-container mt-4 p-4 bg-light border rounded shadow-md">
        <div style="display: flex; justify-content: center; align-items: center; height: 10vh;" id="step1">
            <h5>Unidad Habitacional</h5>
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


        <form action="{{ route('social_act.update', $lis_social->uh_asignada_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="custom-container">
                <div class="row mb-3 align-items-center">
                    <!--<div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="nombres" class="form-label">Beneficiario:</label>
                            <input type="text" class="form-control" id="nombres"
                                name="nombres" value="" disabled>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label for="nombres">Nombres del beneficiario:</label>
                        <input type="text" name="nombres" value="{{ $lis_social->beneficiarios->nombres }}" class="form-control">
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="cedula_identidad" class="form-label">Cedula Identidad:</label>
                            <input type="text" class="form-control" id="cedula_identidad"
                                name="cedula_identidad" value="{{ $lis_social->beneficiarios->cedula_identidad }}" disabled>
                        </div>
                    </div>


                    <!--<div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="departamento_id" class="form-label">Departamento</label>
                            <select name="departamento_id" class="form-select">
                                <option value="">Seleccione un departamento</option>
                                @foreach ($departamento as $departamentos)
                                    <option value="{{ $departamentos->departamento_id }}"
                                        {{ old('departamento_id', $$lis_social->departamento_id ?? '') == $departamentos->departamento_id ? 'selected' : '' }}>
                                        {{ $departamentos->departamento }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>-->


                    <!--Select Proyecto-->
                    <!--<div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="proyecto_id" class="form-label">Proyecto:</label>
                            <select name="proyecto_id" class="form-select">
                                <option value="">Seleccione un Proyecto</option>
                                @foreach ($proyecto as $proyectos)
                                    <option value="{{ $proyectos->proyecto_id }}"
                                        {{ old('proyecto_id', $lis_social->proyecto_id ?? '') == $proyectos->proyecto_id ? 'selected' : '' }}>
                                        {{ $proyectos->nombre_proy }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>-->

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="manzano" class="form-label">Manzano</label>
                            <input type="text" class="form-control @error('manzano') is-invalid @enderror" id="manzano"
                                name="manzano" value="{{ old('manzano', $lis_social->manzano ?? '') }}" required>

                            @error('manzano')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="lote" class="form-label">Lote</label>
                            <input type="text" class="form-control @error('lote') is-invalid @enderror" id="lote"
                                name="lote" value="{{ old('lote', $lis_social->lote ?? '') }}" required>

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
                                value="{{ old('unidad_vecinal', $lis_social->unidad_vecinal ?? '') }}" required>

                            @error('unidad_vecinal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="proceso_estado" class="form-label">Proceso Estado</label>
                            <input type="text" class="form-control @error('proceso_estado') is-invalid @enderror"
                                id="proceso_estado" name="proceso_estado"
                                value="{{ old('proceso_estado', $lis_social->proceso_estado ?? '') }}" required>

                            @error('proceso_estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="estado_social" class="form-label">Estado Social</label>
                            <input type="text" class="form-control @error('estado_social') is-invalid @enderror"
                                id="estado_social" name="estado_social"
                                value="{{ old('estado_social', $lis_social->estado_social ?? '') }}" required>

                            @error('estado_social')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="fuente" class="form-label">Fuente</label>
                            <input type="text" class="form-control @error('fuente') is-invalid @enderror"
                                id="fuente" name="fuente"
                                value="{{ old('fuente', $lis_social->fuente ?? '') }}" required>

                            @error('fuente')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-3 col-md-3 col-lg-12">
                        <div class="form-group">
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control @error('observaciones') is-invalid @enderror" id="observaciones" name="observaciones"
                                rows="1" cols="100" placeholder="Escribe tus observaciones aquí">{{ old('observaciones', $unidades->observaciones ?? '') }}
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
                <a href="{{ route('unidades_hab.index') }}" class="btn btn-warning">
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

