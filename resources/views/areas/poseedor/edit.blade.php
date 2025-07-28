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
    <div class="container">
        <h5 class="text-center">Registrar datos del poseedor y actualizar el teléfono del beneficiario</h5>

    </div>
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
        <form action="{{ route('poseedor.update', ['poseedor' => $poseedor->id_soc]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="nombre_beneficiario_final" class="form-label text-dark">Nombre del Beneficiario</label>
                    <input type="text" name="nombre_beneficiario_final" id="nombre_beneficiario_final" class="form-control border-dark"
                        value="{{ old('nombre_beneficiario_final', $poseedor->nombre_beneficiario_final) }}" disabled>
                </div>
            </div>

            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="ci_beneficiario_final" class="form-label text-dark">C.I.</label>
                    <input type="text" name="ci_beneficiario_final" id="ci_beneficiario_final" class="form-control border-dark"
                        value="{{ old('ci_beneficiario_final', $poseedor->ci_beneficiario_final) }}" disabled>
                </div>
            </div>

            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="telefono_final" class="form-label text-dark">Teléfono Beneficiario</label>
                    <input type="text" name="telefono_final" id="telefono_final" class="form-control border-dark"
                        value="{{ old('telefono_final', $poseedor->telefono_final) }}" pattern="\d{8,9}" maxlength="9"
                        title="Debe contener entre 8 y 9 dígitos numéricos">
                </div>
            </div>

            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="nombre_poseedor" class="form-label text-dark">Nombre del Poseedor</label>
                    <input type="text" name="nombre_poseedor" id="nombre_poseedor" class="form-control border-dark"
                        value="{{ old('nombre_poseedor', $poseedor->nombre_poseedor) }}">
                </div>
            </div>

            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="ci_poseedor" class="form-label text-dark">CI del Poseedor</label>
                    <input type="text" name="ci_poseedor" id="ci_poseedor" class="form-control border-dark"
                        value="{{ old('ci_poseedor', $poseedor->ci_poseedor) }}">
                </div>
            </div>

            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="telefono_poseed" class="form-label text-dark">Teléfono</label>
                    <input type="text" name="telefono_poseed" id="telefono_poseed" class="form-control border-dark"
                        value="{{ old('telefono_poseed', $poseedor->telefono_poseed) }}" pattern="\d{8,9}" maxlength="9"
                        title="Debe contener entre 8 y 9 dígitos numéricos">
                </div>
            </div>


            <div class="d-flex justify-content-center gap-2 mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Actualizar
                </button>

                <a href="{{ route('poseedor.index') }}" class="btn btn-danger px-4"
                    onclick="return confirm('¿Estás segura/o que quieres cancelar? Se perderán los cambios no guardados.')">
                    <i class="fas fa-times me-1"></i> Cancelar
                </a>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <!-- Botón Anterior -->
                <a href="{{ route('poseedor.index') }}" class="btn btn-warning">
                    <i class="bi bi-arrow-left-circle"></i> Anterior
                </a>

            </div>

        </form>
    </div>
@endsection
