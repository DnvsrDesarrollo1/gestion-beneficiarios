@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                                <label for="nombres" class="form-label">Nombres:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres"
                                    value="{{ $listar->nombres }}" required>
                            </div>
                        </div>

                        <!-- Segunda columna -->
                        <div class="col-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="apellido_paterno" class="form-label">Apellido Paterno:</label>
                                <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno"
                                    value="{{ $listar->apellido_paterno }}" required>
                            </div>
                        </div>

                        <!-- Primera columna (siguiente fila) -->
                        <div class="col-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="apellido_materno" class="form-label">Apellido Materno:</label>
                                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno"
                                    value="{{ $listar->apellido_materno }}" required>
                            </div>
                        </div>

                        <div class="col-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                    value="{{ $listar->fecha_nacimiento }}" required>
                            </div>
                        </div>

                        <div class="col-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="cedula_identidad" class="form-label">Cedula Identidad:</label>
                                <input type="text" class="form-control" id="cedula_identidad" name="cedula_identidad"
                                    value="{{ $listar->cedula_identidad }}" required>
                            </div>
                        </div>

                        <div class="col-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="extension_ci" class="form-label">Expedido en:</label>
                                <select class="form-input" id="extension_ci" name="extension_ci">
                                    <option value="CH" {{ $listar->extension_ci == 'CH' ? 'selected' : '' }}>CH</option>
                                    <option value="LP" {{ $listar->extension_ci == 'LP' ? 'selected' : '' }}>LP</option>
                                    <option value="CB" {{ $listar->extension_ci == 'CB' ? 'selected' : '' }}>CB</option>
                                    <option value="OR" {{ $listar->extension_ci == 'OR' ? 'selected' : '' }}>OR</option>
                                    <option value="PT" {{ $listar->extension_ci == 'PT' ? 'selected' : '' }}>PT</option>
                                    <option value="TJ" {{ $listar->extension_ci == 'TJ' ? 'selected' : '' }}>TJ</option>
                                    <option value="SC" {{ $listar->extension_ci == 'SJ' ? 'selected' : '' }}>SC</option>
                                    <option value="BE" {{ $listar->extension_ci == 'BE' ? 'selected' : '' }}>BE</option>
                                    <option value="PA" {{ $listar->extension_ci == 'PA' ? 'selected' : '' }}>PA</option>
                                    <option value="QR" {{ $listar->extension_ci == 'QR' ? 'selected' : '' }}>QR</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="sexo" class="form-label">Elige una opción:</label>
                                <select class="form-input" id="sexo" name="opciones">
                                    <option value="FE" {{ $listar->sexo == 'CH' ? 'selected' : '' }}>Femenino</option>
                                    <option value="MA" {{ $listar->sexo == 'MA' ? 'selected' : '' }}>Masculino</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="telefono" class="form-label">Telefono / Celular:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    value="{{ $listar->telefono }}" required>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button button type="button" onclick="window.open('', '_self', ''); window.close();"
                        class="btn btn-danger">Cancelar</button>
                </div>
            </form>

    </div>
@endsection
