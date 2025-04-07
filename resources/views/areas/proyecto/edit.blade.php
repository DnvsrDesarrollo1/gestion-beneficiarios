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
            <h5>MODIFICACIÓN DATOS DEL PROYECTO</h5>
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



        <form method="POST" action="{{ route('proyecto.update', $datos_proy->proyecto_id) }}">
            @csrf <!-- Token de seguridad -->
            @method('PUT')


            <div class="custom-container">
                <div class="row mb-3 align-items-center">

                    <!--Select Departamento-->
                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="departamento" class="form-label">Departamento:</label>
                            <input type="text" class="form-control" name="departamento"
                                id="departamento" value="{{ old('departamento', $datos_proy->departamento) }}" disabled>
                        </div>
                    </div>

                    <div class="col-8 col-md-8 col-lg-8">
                        <div class="form-group">
                            <label for="nombre_proy" class="form-label">Proyecto:</label>
                            <input type="text" class="form-control" name="nombre_proy"
                                id="nombre_proy" value="{{ old('nombre_proy', $datos_proy->nombre_proy) }}" disabled>
                        </div>
                    </div>

                    <!--Nro de U.H-->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="cant_uh" class="form-label">Nro de U.H:</label>
                            <input type="number" class="form-control" name="cant_uh"
                                id="cant_uh" value="{{ old('cant_uh', $datos_proy->cant_uh) }}" disabled>
                        </div>
                    </div>

                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="num_acta" class="form-label">Nro de acta:</label>
                            <input type="number" class="form-control" name="num_acta"
                                id="num_acta" value="{{ old('num_acta', $datos_proy->num_acta) }}" disabled>
                        </div>
                    </div>

                    <!-- Estado Proyecto -->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="estado_proy" class="form-label">Estado Proyecto:</label>
                            <input type="text" class="form-control @error('estado_proy') is-invalid @enderror"
                                name="estado_proy" id="estado_proy"
                                value="{{ old('estado_proy', $datos_proy->estado_proy ?? '') }}">

                            @error('estado_proy')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!--Modalidad -->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="modalidad" class="form-label">Modalidad:</label>
                            <input type="text" class="form-control @error('modalidad') is-invalid @enderror"
                                name="modalidad" id="modalidad"
                                value="{{ old('modalidad', $datos_proy->modalidad ?? '') }}">

                            @error('modalidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!--Fecha de inicio obra-->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="fecha_ini_obra" class="form-label">Fecha inicio obra:</label>
                            <input type="date" class="form-control" name="fecha_ini_obra" id="fecha_ini_obra"
                                value="{{ old('fecha_ini_obra', $datos_proy->fecha_ini_obra ?? '') }}">
                        </div>
                    </div>

                    <!--Fecha fin obra-->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="fecha_fin_obra" class="form-label">Fecha fin de obra:</label>
                            <input type="date" class="form-control" name="fecha_fin_obra" id="fecha_fin_obra"
                                value="{{ old('fecha_fin_obra', $datos_proy->fecha_fin_obra ?? '') }}">
                        </div>
                    </div>

                    <!-- Viviendas Concluidas -->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="viviends_conclui" class="form-label">Viviendas Concluidas:</label>
                            <input type="text" class="form-control @error('viviends_conclui') is-invalid @enderror"
                                name="viviends_conclui" id="viviends_conclui"
                                value="{{ old('viviends_conclui', $datos_proy->viviends_conclui ?? '') }}">

                            @error('viviends_conclui')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Componente -->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="componente" class="form-label">Componente:</label>
                            <input type="text" class="form-control @error('componente') is-invalid @enderror"
                                name="componente" id="componente"
                                value="{{ old('componente', $datos_proy->componente ?? '') }}">

                            @error('componente')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Provincia -->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="provincia" class="form-label">Provincia:</label>
                            <input type="text" class="form-control @error('provincia') is-invalid @enderror"
                                name="provincia" id="provincia"
                                value="{{ old('provincia', $datos_proy->provincia ?? '') }}">

                            @error('provincia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Municipio -->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="municipio" class="form-label">Municipio:</label>
                            <input type="text" class="form-control @error('municipio') is-invalid @enderror"
                                name="municipio" id="municipio"
                                value="{{ old('municipio', $datos_proy->municipio ?? '') }}">

                            @error('municipio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Direccion -->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="direccion" class="form-label">Direccion:</label>
                            <input type="text" class="form-control @error('direccion') is-invalid @enderror"
                                name="direccion" id="direccion"
                                value="{{ old('direccion', $datos_proy->direccion ?? '') }}">

                            @error('direccion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Latitud -->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="latitud" class="form-label">Latitud:</label>
                            <input type="text" class="form-control @error('latitud') is-invalid @enderror"
                                name="latitud" id="latitud" value="{{ old('latitud', $datos_proy->latitud ?? '') }}">

                            @error('latitud')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Longitud -->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="longitud" class="form-label">Longitud:</label>
                            <input type="text" class="form-control @error('longitud') is-invalid @enderror"
                                name="longitud" id="longitud"
                                value="{{ old('longitud', $datos_proy->longitud ?? '') }}">

                            @error('longitud')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!--Año de relevamiento-->
                    <div class="col-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="anio_relevamiento" class="form-label">Año de relevamiento:</label>
                            <input type="text" class="form-control" name="anio_relevamiento" id="anio_relevamiento"
                                value="{{ old('anio_relevamiento', $datos_proy->anio_relevamiento ?? '') }}">
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
                <a href="{{ route('proyecto.index') }}" class="btn btn-warning">
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
