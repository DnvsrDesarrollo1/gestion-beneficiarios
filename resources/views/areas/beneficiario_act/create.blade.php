@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Registrar Beneficiario y Conyugue</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('beneficiario_act.store') }}" method="POST">
                @csrf {{-- Token de seguridad --}}

                <!-- Sección Beneficiario -->
                <h4>Datos del Beneficiario</h4>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nombres_beneficiario">Nombres</label>
                        <input type="text" name="nombres_beneficiario" class="form-control @error('nombres_beneficiario') is-invalid @enderror" value="{{ old('nombres_beneficiario') }}" required>
                        @error('nombres_beneficiario') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="apellido_pa_benef">Apellido Paterno</label>
                        <input type="text" name="apellido_pa_benef" class="form-control @error('apellido_pa_benef') is-invalid @enderror" value="{{ old('apellido_pa_benef') }}" required>
                        @error('apellido_pa_benef') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="apellido_ma_benef">Apellido Materno</label>
                        <input type="text" name="apellido_ma_benef" class="form-control @error('apellido_ma_benef') is-invalid @enderror" value="{{ old('apellido_ma_benef') }}">
                        @error('apellido_ma_benef') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="fecha_na_benef">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_na_benef" class="form-control @error('fecha_na_benef') is-invalid @enderror" value="{{ old('fecha_na_benef') }}" required>
                        @error('fecha_na_benef') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="cedula_benef">Cédula de Identidad</label>
                        <input type="text" name="cedula_benef" class="form-control @error('cedula_benef') is-invalid @enderror" value="{{ old('cedula_benef') }}" required>
                        @error('cedula_benef') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ext_benef" class="form-label">Expedido en:</label>
                            <select class="form-select @error('ext_benef') is-invalid @enderror" name="ext_benef" id="ext_benef">
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
                        <label for="sexo_benef">Sexo</label>
                        <select name="sexo_benef" class="form-select @error('sexo_benef') is-invalid @enderror">
                            <option value="M" {{ old('sexo_benef') == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ old('sexo_benef') == 'F' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        @error('sexo_benef') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="telefono_benef">Teléfono</label>
                        <input type="text" name="telefono_benef" class="form-control @error('telefono_benef') is-invalid @enderror" value="{{ old('telefono_benef') }}">
                        @error('telefono_benef') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <hr>

                <!-- Sección Conyugue -->
                <h4>Datos del Conyugue</h4>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nombres_conyugue">Nombres</label>
                        <input type="text" name="nombres_conyugue" class="form-control @error('nombres_conyugue') is-invalid @enderror" value="{{ old('nombres_conyugue') }}" required>
                        @error('nombres_conyugue') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="apellido_pa_conyugue">Apellido Paterno</label>
                        <input type="text" name="apellido_pa_conyugue" class="form-control @error('apellido_pa_conyugue') is-invalid @enderror" value="{{ old('apellido_pa_conyugue') }}" required>
                        @error('apellido_pa_conyugue') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="apellido_ma_conyugue">Apellido Materno</label>
                        <input type="text" name="apellido_ma_conyugue" class="form-control @error('apellido_ma_conyugue') is-invalid @enderror" value="{{ old('apellido_ma_conyugue') }}">
                        @error('apellido_ma_conyugue') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="fecha_na_conyugue">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_na_conyugue" class="form-control @error('fecha_na_conyugue') is-invalid @enderror" value="{{ old('fecha_na_conyugue') }}" required>
                        @error('fecha_na_conyugue') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="cedula_conyugue">Cédula de Identidad</label>
                        <input type="text" name="cedula_conyugue" class="form-control @error('cedula_conyugue') is-invalid @enderror" value="{{ old('cedula_conyugue') }}" required>
                        @error('cedula_conyugue') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ext_conyugue" class="form-label">Expedido en:</label>
                            <select class="form-select @error('ext_conyugue') is-invalid @enderror" name="ext_conyugue" id="ext_conyugue">
                                <option value="">Seleccione una opción</option>
                                <option value="CH" {{ old('ext_conyugue') == 'CH' ? 'selected' : '' }}>CH</option>
                                <option value="LP" {{ old('ext_conyugue') == 'LP' ? 'selected' : '' }}>LP</option>
                                <option value="CB" {{ old('ext_conyugue') == 'CB' ? 'selected' : '' }}>CB</option>
                                <option value="OR" {{ old('ext_conyugue') == 'OR' ? 'selected' : '' }}>OR</option>
                                <option value="PT" {{ old('ext_conyugue') == 'PT' ? 'selected' : '' }}>PT</option>
                                <option value="TJ" {{ old('ext_conyugue') == 'TJ' ? 'selected' : '' }}>TJ</option>
                                <option value="SC" {{ old('ext_conyugue') == 'SC' ? 'selected' : '' }}>SC</option>
                                <option value="BE" {{ old('ext_conyugue') == 'BE' ? 'selected' : '' }}>BE</option>
                                <option value="PA" {{ old('ext_conyugue') == 'PA' ? 'selected' : '' }}>PA</option>
                                <option value="QR" {{ old('ext_conyugue') == 'QR' ? 'selected' : '' }}>QR</option>
                            </select>

                            @error('ext_benef')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                <div class="col-md-4">
                        <label for="sexo_conyugue">Sexo</label>
                        <select name="sexo_conyugue" class="form-select @error('sexo_conyugue') is-invalid @enderror">
                            <option value="M" {{ old('sexo_conyugue') == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ old('sexo_conyugue') == 'F' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        @error('sexo_conyugue') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <hr>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="{{ route('beneficiario_act.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
