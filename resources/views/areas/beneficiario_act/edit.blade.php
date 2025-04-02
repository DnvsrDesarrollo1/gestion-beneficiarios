@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons para el diseño boton siguiente anterior-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .custom-container {
            max-width: 1000px;
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


        <form method="POST" action="{{ route('beneficiario_act.update', $listar->beneficiario_id) }}">
            @csrf <!-- Token de seguridad -->
            @method('PUT')


            <div class="custom-container">
                <div class="row mb-3 align-items-center">
                    <!-- Nombre del beneficiario  -->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="nombres_beneficiario" class="form-label">Nombres:</label>
                            <input type="text" class="form-control @error('nombres_beneficiario') is-invalid @enderror"
                                name="nombres_beneficiario" id="nombres_beneficiario"
                                value="{{ old('nombres_beneficiario', $listar->nombres_beneficiario ?? '') }}" required>

                            @error('nombres_beneficiario')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!--Apellido paterno del beneficiario-->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="apellido_pa_benef" class="form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control @error('apellido_pa_benef') is-invalid @enderror"
                                name="apellido_pa_benef" id="apellido_pa_benef"
                                value="{{ old('apellido_pa_benef', $listar->apellido_pa_benef ?? '') }}">

                            @error('apellido_pa_benef')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <!--Apellido materno del beneficiario-->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="apellido_ma_benef" class="form-label">Apellido Materno:</label>
                            <input type="text" class="form-control @error('apellido_ma_benef') is-invalid @enderror"
                                name="apellido_ma_benef" id="apellido_ma_benef"
                                value="{{ old('apellido_ma_benef', $listar->apellido_ma_benef ?? '') }}">

                            @error('apellido_ma_benef')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!--Fecha de nacimiento del beneficiario-->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="fecha_na_benef" class="form-label">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" name="fecha_na_benef" id="fecha_na_benef"
                                value="{{ old('fecha_na_benef', $listar->fecha_na_benef ?? '') }}" required>
                        </div>
                    </div>

                    <!-- Segunda columna -->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="cedula_benef" class="form-label">Cédula Identidad:</label>
                            <input type="text" class="form-control @error('apellido_ma_benef') is-invalid @enderror"
                                name="cedula_benef" id="cedula_benef"
                                value="{{ old('cedula_benef', $listar->cedula_benef ?? '') }}" required>

                            @error('cedula_benef')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="ext_benef" class="form-label">Expedido en:</label>
                            <select class="form-input" name="ext_benef" id="ext_benef">
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

                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="sexo_benef" class="form-label">Elige una opción:</label>
                            <select class="form-input" name="sexo_benef" id="sexo_benef">
                                <option value="FE" {{ $listar->sexo_benef == 'CH' ? 'selected' : '' }}>Femenino
                                </option>
                                <option value="MA" {{ $listar->sexo_benef == 'MA' ? 'selected' : '' }}>Masculino
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="telefono_benef" class="form-label">Teléfono / Celular:</label>
                            <input type="text" class="form-control @error('telefono_benef') is-invalid @enderror"
                                name="telefono_benef" id="telefono_benef"
                                value="{{ old('telefono_benef', $listar->telefono_benef ?? '') }}" pattern="[0-9]{8,9}"
                                maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,9);">

                            @error('telefono_benef')
                                <!-- Aquí estaba el error -->
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div style="display: flex; justify-content: center; align-items: center; height: 10vh;">
                        <h5>DATOS DEL CONYUGUE</h5>
                    </div>
                    <input type="hidden" name="conyuge_id" value="{{ $listar->conyuge_id }}">


                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="nombres_conyugue" class="form-label">Nombres</label>
                            <input type="text" class="form-control @error('nombres_conyugue') is-invalid @enderror"
                                name="nombres_conyugue" id="nombres_conyugue"
                                value="{{ old('nombres_conyuge', $listar->nombres_conyuge ?? '') }}" required>

                            @error('nombres_conyugue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="apellido_pa_conyugue" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control @error('apellido_pa_conyugue') is-invalid @enderror"
                                name="apellido_pa_conyugue" id="apellido_pa_conyugue"
                                value="{{ old('apellido_pa_conyugue', $listar->apellido_pa_conyugue ?? '') }}">

                            @error('apellido_pa_conyugue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="apellido_ma_conyugue" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control @error('apellido_ma_conyugue') is-invalid @enderror"
                                name="apellido_ma_conyugue" id="apellido_ma_conyugue"
                                value="{{ old('apellido_ma_conyugue', $listar->apellido_ma_conyugue ?? '') }}">

                            @error('apellido_ma_conyugue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!--Fecha de nacimiento del conyugue-->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="fecha_na_conyugue" class="form-label">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" name="fecha_na_conyugue" id="fecha_na_conyugue"
                                value="{{ old('fecha_na_conyugue', $listar->fecha_na_conyugue ?? '') }}" required>
                        </div>
                    </div>

                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="cedula_conyugue" class="form-label">Cedula Identidad:</label>
                            <input type="text" class="form-control @error('cedula_conyugue') is-invalid @enderror"
                                name="cedula_conyugue" id="cedula_conyugue"
                                value="{{ old('cedula_conyugue', $listar->cedula_conyugue ?? '') }}" required>

                            @error('cedula_conyugue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="ext_conyugue" class="form-label">Expedido en:</label>
                            <select class="form-input" name="ext_conyugue" id="ext_conyugue">
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

                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="sexo_conyugue" class="form-label">Elige una opción:</label>
                            <select class="form-input" name="sexo_conyugue" id="sexo_conyugue">
                                <option value="FE" {{ $listar->sexo_conyugue == 'CH' ? 'selected' : '' }}>Femenino
                                </option>
                                <option value="MA" {{ $listar->sexo_conyugue == 'MA' ? 'selected' : '' }}>Masculino
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="telefono_conyugue" class="form-label">Teléfono / Celular:</label>
                            <input type="text" class="form-control @error('telefono_conyugue') is-invalid @enderror"
                                name="telefono_conyugue" id="telefono_conyugue"
                                value="{{ old('telefono_conyugue', $listar->telefono_conyugue ?? '') }}"
                                pattern="[0-9]{8,9}" maxlength="9"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,9);">

                            @error('telefono_conyugue')
                                <!-- Aquí estaba el error -->
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
