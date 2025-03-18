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
            <h5>MODIFICACIÓN DATOS DEL BENEFICIARIO</h5>
        </div>


            <form method="POST" action="{{ route('beneficiario_act.update', $listar->beneficiario_id) }}">
                @csrf <!-- Token de seguridad -->
                @method('PUT')


                <div class="custom-container">
                    <div class="row mb-3 align-items-center">
                        <!-- Primera columna -->
                        <div class="col-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label class="form-label">Nombres:</label>
                                <input type="text" class="form-control" name="nombres_beneficiario"
                                    value="{{ $listar->nombres_beneficiario }}" required>
                            </div>
                        </div>

                        <!-- Segunda columna -->
                        <div class="col-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label class="form-label">Cédula Identidad:</label>
                                <input type="text" class="form-control" name="cedula_benef"
                                    value="{{ $listar->cedula_benef }}" required>
                            </div>
                        </div>

                        <div class="col-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label class="form-label">Expedido en:</label>
                                <select class="form-input" name="ext_benef">
                                    <option value="CH" {{ $listar->ext_benef == 'CH' ? 'selected' : '' }}>CH</option>
                                    <option value="LP" {{ $listar->ext_benef == 'LP' ? 'selected' : '' }}>LP</option>
                                    <option value="CB" {{ $listar->ext_benef == 'CB' ? 'selected' : '' }}>CB</option>
                                    <option value="OR" {{ $listar->ext_benef == 'OR' ? 'selected' : '' }}>OR</option>
                                    <option value="PT" {{ $listar->ext_benef == 'PT' ? 'selected' : '' }}>PT</option>
                                    <option value="TJ" {{ $listar->ext_benef == 'TJ' ? 'selected' : '' }}>TJ</option>
                                    <option value="SC" {{ $listar->ext_benef == 'SJ' ? 'selected' : '' }}>SC</option>
                                    <option value="BE" {{ $listar->ext_benef == 'BE' ? 'selected' : '' }}>BE</option>
                                    <option value="PA" {{ $listar->ext_benef == 'PA' ? 'selected' : '' }}>PA</option>
                                    <option value="QR" {{ $listar->ext_benef == 'QR' ? 'selected' : '' }}>QR</option>
                                </select>
                            </div>
                        </div>

                        <!-- Primera columna (siguiente fila) -->
                        <!--<div class="col-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="apellido_materno" class="form-label">Apellido Materno:</label>
                                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno"
                                    value="" required>
                            </div>
                        </div>

                        <div class="col-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                    value="" required>
                            </div>
                        </div>-->

                        <h4>Datos del Cónyuge</h4>
                        <input type="hidden" name="conyuge_id" value="{{ $listar->conyuge_id }}">


                        <div class="col-3 col-md-3 col-lg-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombres_conyugue" value="{{ $listar->nombres_conyuge }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cédula Identidad</label>
                            <input type="text" class="form-control" name="cedula_conyugue" value="{{ $listar->cedula_conyugue }}" required>
                        </div>

                        <div class="col-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label class="form-label">Cedula Identidad:</label>
                                <input type="text" class="form-control" name="cedula_conyugue"
                                    value="{{ $listar->cedula_conyugue }}" required>
                            </div>
                        </div>

                        <div class="col-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label class="form-label">Expedido en:</label>
                                <select class="form-input" name="ext_conyugue">
                                    <option value="CH" {{ $listar->ext_conyugue == 'CH' ? 'selected' : '' }}>CH</option>
                                    <option value="LP" {{ $listar->ext_conyugue == 'LP' ? 'selected' : '' }}>LP</option>
                                    <option value="CB" {{ $listar->ext_conyugue == 'CB' ? 'selected' : '' }}>CB</option>
                                    <option value="OR" {{ $listar->ext_conyugue == 'OR' ? 'selected' : '' }}>OR</option>
                                    <option value="PT" {{ $listar->ext_conyugue == 'PT' ? 'selected' : '' }}>PT</option>
                                    <option value="TJ" {{ $listar->ext_conyugue == 'TJ' ? 'selected' : '' }}>TJ</option>
                                    <option value="SC" {{ $listar->ext_conyugue == 'SJ' ? 'selected' : '' }}>SC</option>
                                    <option value="BE" {{ $listar->ext_conyugue == 'BE' ? 'selected' : '' }}>BE</option>
                                    <option value="PA" {{ $listar->ext_conyugue == 'PA' ? 'selected' : '' }}>PA</option>
                                    <option value="QR" {{ $listar->ext_conyugue == 'QR' ? 'selected' : '' }}>QR</option>
                                </select>
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
                    <a href="{{ route('beneficiario_act.index') }}" class="btn btn-warning">
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
