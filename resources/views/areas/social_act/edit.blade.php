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
            <h5>Estado Social</h5>
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


        <form action="{{ route('social_act.update', $unidad_habitacional->uh_asignada_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="custom-container">
                <div class="row mb-3 align-items-center">
                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="nombres" class="form-label">Nombres del Beneficiario:</label>
                            <input type="text" class="form-control" id="nombres" name="nombres"
                                value="{{ $unidad_habitacional->nombres }}" disabled>
                        </div>
                    </div>

                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="cedula_identidad" class="form-label">Cedula Identidad:</label>
                            <input type="text" class="form-control" id="cedula_identidad" name="cedula_identidad"
                                value="{{ $unidad_habitacional->cedula_identidad }}" disabled>
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="departamento" class="form-label">Departamento:</label>
                            <input type="text" class="form-control" id="departamento" name="departamento"
                                value="{{ $unidad_habitacional->departamento }}" disabled>
                        </div>
                    </div>

                    <div class="col-8 col-md-8 col-lg-8">
                        <div class="form-group">
                            <label for="nombre_proy" class="form-label">Proyecto:</label>
                            <input type="text" class="form-control" id="nombre_proy" name="nombre_proy"
                                value="{{ $unidad_habitacional->nombre_proy }}" disabled>
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="manzano" class="form-label">Manzano</label>
                            <input type="text" class="form-control @error('manzano') is-invalid @enderror" id="manzano"
                                name="manzano" value="{{ old('manzano', $unidad_habitacional->manzano ?? '') }}" disabled>

                            @error('manzano')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="lote" class="form-label">Lote</label>
                            <input type="text" class="form-control @error('lote') is-invalid @enderror" id="lote"
                                name="lote" value="{{ old('lote', $unidad_habitacional->lote ?? '') }}" disabled>

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
                                value="{{ old('unidad_vecinal', $unidad_habitacional->unidad_vecinal ?? '') }}" required>

                            @error('unidad_vecinal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="proceso_estado" class="form-label">Proceso Estado</label>
                            <select class="form-input" name="proceso_estado" id="proceso_estado">
                                <option value="BENEFICIARIO INICIAL"
                                    {{ $unidad_habitacional->proceso_estado == 'BENEFICIARIO INICIAL' ? 'selected' : '' }}>
                                    BENEFICIARIO INICIAL
                                </option>
                                <option value="PENDIENTE DE APLICACION DE LA LEY 850"
                                    {{ $unidad_habitacional->proceso_estado == 'PENDIENTE DE APLICACION DE LA LEY 850' ? 'selected' : '' }}>
                                    PENDIENTE DE APLICACION DE LA LEY 850
                                </option>
                                <option value="EN PROCESO DE SUSTITUCION"
                                    {{ $unidad_habitacional->proceso_estado == 'EN PROCESO DE SUSTITUCION' ? 'selected' : '' }}>
                                    EN PROCESO DE SUSTITUCION
                                </option>
                                <option value="EXCEPCIONALIDAD"
                                    {{ $unidad_habitacional->proceso_estado == 'EXCEPCIONALIDAD' ? 'selected' : '' }}>
                                    EXCEPCIONALIDAD
                                </option>
                                <option value="REASIGNACION"
                                    {{ $unidad_habitacional->proceso_estado == 'REASIGNACION' ? 'selected' : '' }}>
                                    REASIGNACION
                                </option>
                                <option value="SUSTITUCION"
                                    {{ $unidad_habitacional->proceso_estado == 'SUSTITUCION' ? 'selected' : '' }}>
                                    SUSTITUCION
                                </option>
                                <option value="CAMBIO DE TITULARIDAD"
                                    {{ $unidad_habitacional->proceso_estado == 'CAMBIO DE TITULARIDAD' ? 'selected' : '' }}>
                                    CAMBIO DE TITULARIDAD
                                </option>
                                <option value="CANCELADO"
                                    {{ $unidad_habitacional->proceso_estado == 'CANCELADO' ? 'selected' : '' }}>
                                    CANCELADO
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="estado_social" class="form-label">Estado Social</label>

                            <select class="form-input" name="estado_social" id="estado_social">
                                <option value="CUMPLE FUNCION SOCIAL"
                                    {{ $unidad_habitacional->estado_social == 'CUMPLE FUNCION SOCIAL' ? 'selected' : '' }}>
                                    CUMPLE FUNCION SOCIAL
                                </option>
                                <option value="NO CUMPLE FUNCION SOCIAL"
                                    {{ $unidad_habitacional->estado_social == 'NO CUMPLE FUNCION SOCIAL' ? 'selected' : '' }}>
                                    NO CUMPLE FUNCION SOCIAL
                                </option>
                                <option value="REASIGNACION"
                                    {{ $unidad_habitacional->estado_social == 'REASIGNACION' ? 'selected' : '' }}>
                                    NO APLICA
                                </option>

                            </select>

                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="fuente" class="form-label">Fuente</label>
                            <input type="text" class="form-control @error('fuente') is-invalid @enderror"
                                id="fuente" name="fuente"
                                value="{{ old('fuente', $unidad_habitacional->fuente ?? '') }}">

                            @error('fuente')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-3 col-md-3 col-lg-12">
                        <div class="form-group">
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control @error('observaciones') is-invalid @enderror" id="observaciones" name="observaciones"
                                rows="1" cols="100" placeholder="Escribe tus observaciones aquí">{{ old('observaciones', $unidad_habitacional->observaciones ?? '') }}
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
                <a href="{{ route('social_act.index') }}" class="btn btn-warning">
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
