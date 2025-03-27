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

        ::placeholder {
            color: rgba(0, 0, 0, 0.3);
            /* Color negro con 50% de transparencia */
            opacity: 1;
            /* Necesario para algunos navegadores */
        }
    </style>
@endsection

@section('content')
    <div class="custom-container mt-4 p-4 bg-light border rounded shadow-md">
        <div class="row mb-3 align-items-center">
            <div style="display: flex; justify-content: center; align-items: center; height: 5vh;" id="step1">
                <h5>REGISTRAR DATOS DEL BENEFICIARIO</h5>
            </div>
            <div class="custom-container">
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


                <form action="{{ route('beneficiario_act.store') }}" method="POST">
                    @csrf {{-- Token de seguridad --}}

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombres_beneficiario" class="form-label">Nombres:</label>
                                <input type="text" name="nombres_beneficiario"
                                    class="form-control @error('nombres_beneficiario') is-invalid @enderror"
                                    value="{{ old('nombres_beneficiario') }}" placeholder="Ingrese nombres" required>
                                @error('nombres_beneficiario')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_pa_benef" class="form-label">Apellido Paterno</label>
                                <input type="text" name="apellido_pa_benef"
                                    class="form-control @error('apellido_pa_benef') is-invalid @enderror"
                                    value="{{ old('apellido_pa_benef') }}" placeholder="Ingrese Apellido Paterno">
                                @error('apellido_pa_benef')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_ma_benef" class="form-label">Apellido Materno</label>
                                <input type="text" name="apellido_ma_benef"
                                    class="form-control @error('apellido_ma_benef') is-invalid @enderror"
                                    value="{{ old('apellido_ma_benef') }}" placeholder="Ingrese Apellido Materno">
                                @error('apellido_ma_benef')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha_na_benef" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_na_benef"
                                    class="form-control @error('fecha_na_benef') is-invalid @enderror"
                                    value="{{ old('fecha_na_benef') }}" required>
                                @error('fecha_na_benef')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cedula_benef" class="form-label">Cédula de Identidad</label>
                                <input type="text" name="cedula_benef"
                                    class="form-control @error('cedula_benef') is-invalid @enderror"
                                    value="{{ old('cedula_benef') }}" placeholder="Ingrese la cédula" required>
                                @error('cedula_benef')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ext_benef" class="form-label">Expedido en:</label>
                                <select class="form-select @error('ext_benef') is-invalid @enderror" name="ext_benef"
                                    id="ext_benef">
                                    <option value="">Seleccione una opción</option>
                                    <option value="CH" {{ old('ext_benef') == 'CH' ? 'selected' : '' }}>CH</option>
                                    <option value="LP" {{ old('ext_benef') == 'LP' ? 'selected' : '' }}>LP</option>
                                    <option value="CB" {{ old('ext_benef') == 'CB' ? 'selected' : '' }}>CB</option>
                                    <option value="OR" {{ old('ext_benef') == 'OR' ? 'selected' : '' }}>OR</option>
                                    <option value="PT" {{ old('ext_benef') == 'PT' ? 'selected' : '' }}>PT</option>
                                    <option value="TJ" {{ old('ext_benef') == 'TJ' ? 'selected' : '' }}>TJ</option>
                                    <option value="SC" {{ old('ext_benef') == 'SC' ? 'selected' : '' }}>SC</option>
                                    <option value="BE" {{ old('ext_benef') == 'BE' ? 'selected' : '' }}>BE</option>
                                    <option value="PA" {{ old('ext_benef') == 'PA' ? 'selected' : '' }}>PA</option>
                                    <option value="QR" {{ old('ext_benef') == 'QR' ? 'selected' : '' }}>QR</option>
                                </select>

                                @error('ext_benef')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sexo_benef" class="form-label">Sexo</label>
                                <select name="sexo_benef" class="form-select @error('sexo_benef') is-invalid @enderror">
                                    <option value="">Seleccione una opción</option>
                                    <option value="M" {{ old('sexo_benef') == 'M' ? 'selected' : '' }}>Masculino
                                    </option>
                                    <option value="F" {{ old('sexo_benef') == 'F' ? 'selected' : '' }}>Femenino
                                    </option>
                                </select>
                                @error('sexo_benef')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefono_benef" class="form-label">Teléfono / Celular</label>
                                <input type="text" name="telefono_benef"
                                    class="form-control @error('telefono_benef') is-invalid @enderror"
                                    value="{{ old('telefono_benef') }}" placeholder="Ingrese Teléfono / Celular"
                                    pattern="[0-9]{8,9}" maxlength="9"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,9);">
                                @error('telefono_benef')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <!-- Checkbox para mostrar/ocultar los datos del cónyuge -->
                    <label>
                        <input type="checkbox" id="tiene_conyugue"> ¿Tiene Cónyuge?
                    </label>

                    <div id="conyugue_section" style="display: none;">
                        <!-- Sección Conyugue -->
                        <div style="display: flex; justify-content: center; align-items: center; height: 5vh;"
                            id="step1">
                            <h5>REGISTRAR DATOS DEL CONYUGUE</h5>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombres_conyugue" class="form-label">Nombres</label>
                                    <input type="text" name="nombres_conyugue"
                                        class="form-control @error('nombres_conyugue') is-invalid @enderror"
                                        value="{{ old('nombres_conyugue') }}" placeholder="Ingrese nombres">
                                    @error('nombres_conyugue')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="apellido_pa_conyugue" class="form-label">Apellido Paterno</label>
                                    <input type="text" name="apellido_pa_conyugue"
                                        class="form-control @error('apellido_pa_conyugue') is-invalid @enderror"
                                        value="{{ old('apellido_pa_conyugue') }}" placeholder="Ingrese Apellido Paterno">
                                    @error('apellido_pa_conyugue')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="apellido_ma_conyugue" class="form-label">Apellido Materno</label>
                                    <input type="text" name="apellido_ma_conyugue"
                                        class="form-control @error('apellido_ma_conyugue') is-invalid @enderror"
                                        value="{{ old('apellido_ma_conyugue') }}" placeholder="Ingrese Apellido Materno">
                                    @error('apellido_ma_conyugue')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_na_conyugue">Fecha de Nacimiento</label>
                                    <input type="date" name="fecha_na_conyugue"
                                        class="form-control @error('fecha_na_conyugue') is-invalid @enderror"
                                        value="{{ old('fecha_na_conyugue') }}">
                                    @error('fecha_na_conyugue')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cedula_conyugue" class="form-label">Cédula de Identidad</label>
                                    <input type="text" name="cedula_conyugue"
                                        class="form-control @error('cedula_conyugue') is-invalid @enderror"
                                        value="{{ old('cedula_conyugue') }}" placeholder="Ingrese la cédula">
                                    @error('cedula_conyugue')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ext_conyugue" class="form-label">Expedido en:</label>
                                    <select class="form-select @error('ext_conyugue') is-invalid @enderror"
                                        name="ext_conyugue" id="ext_conyugue">
                                        <option value="">Seleccione una opción</option>
                                        <option value="CH" {{ old('ext_conyugue') == 'CH' ? 'selected' : '' }}>CH
                                        </option>
                                        <option value="LP" {{ old('ext_conyugue') == 'LP' ? 'selected' : '' }}>LP
                                        </option>
                                        <option value="CB" {{ old('ext_conyugue') == 'CB' ? 'selected' : '' }}>CB
                                        </option>
                                        <option value="OR" {{ old('ext_conyugue') == 'OR' ? 'selected' : '' }}>OR
                                        </option>
                                        <option value="PT" {{ old('ext_conyugue') == 'PT' ? 'selected' : '' }}>PT
                                        </option>
                                        <option value="TJ" {{ old('ext_conyugue') == 'TJ' ? 'selected' : '' }}>TJ
                                        </option>
                                        <option value="SC" {{ old('ext_conyugue') == 'SC' ? 'selected' : '' }}>SC
                                        </option>
                                        <option value="BE" {{ old('ext_conyugue') == 'BE' ? 'selected' : '' }}>BE
                                        </option>
                                        <option value="PA" {{ old('ext_conyugue') == 'PA' ? 'selected' : '' }}>PA
                                        </option>
                                        <option value="QR" {{ old('ext_conyugue') == 'QR' ? 'selected' : '' }}>QR
                                        </option>
                                    </select>

                                    @error('ext_benef')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sexo_conyugue" class="form-label">Sexo</label>
                                    <select name="sexo_conyugue"
                                        class="form-select @error('sexo_conyugue') is-invalid @enderror">
                                        <option value="">Seleccione una opción</option>
                                        <option value="M" {{ old('sexo_conyugue') == 'M' ? 'selected' : '' }}>
                                            Masculino
                                        </option>
                                        <option value="F" {{ old('sexo_conyugue') == 'F' ? 'selected' : '' }}>
                                            Femenino
                                        </option>
                                    </select>
                                    @error('sexo_conyugue')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telefono_conyugue" class="form-label">Teléfono</label>
                                    <input type="text" name="telefono_conyugue"
                                        class="form-control @error('telefono_conyugue') is-invalid @enderror"
                                        value="{{ old('telefono_conyugue') }}" placeholder="Ingrese Teléfono / Celular"
                                        pattern="[0-9]{8,9}" maxlength="9"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,9);">
                                    @error('telefono_conyugue')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <button type="button" onclick="window.open('', '_self', ''); window.close();"
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
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.getElementById('tiene_conyugue').addEventListener('change', function() {
            let conyugueSection = document.getElementById('conyugue_section');

            if (this.checked) {
                conyugueSection.style.display = 'block';
                document.getElementById('nombres_conyugue').setAttribute('required', true);
                document.getElementById('cedula_conyugue').setAttribute('required', true);
            } else {
                conyugueSection.style.display = 'none';
                document.getElementById('nombres_conyugue').removeAttribute('required');
                document.getElementById('cedula_conyugue').removeAttribute('required');
            }
        });
    </script>
@endsection
