@extends('layouts.app')
@section('css')
    <!-- Bootstrap Icons para el diseño boton siguiente anterior-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif
        <h4 class="mb-4">Asignar Unidad Habitacional</h4>


        <form action="{{ route('asignar_act.asignar') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="unidad_habitacional_id">Unidad Habitacional</label>
                <select name="unidad_habitacional_id" class="form-select" required>
                    <option value="">Seleccione una unidad habitacional</option>
                    @foreach ($unidades as $unidad)
                    <option value="{{ $unidad->unidad_habitacional_id }}"
                        data-proyecto="{{ $unidad->proyecto_id }}"
                        data-departamento="{{ $unidad->departamento_id }}">
                    {{ $unidad->departamento }} - {{ $unidad->manzano }} - {{ $unidad->lote }}
                </option>
                    @endforeach
                </select>

                <!-- Campos ocultos -->
                <input type="hidden" name="proyecto_id" value="">
                <input type="hidden" name="departamento_id" value="">

            </div>

            <div class="form-group mt-3">
                <label for="beneficiario_id">Beneficiario</label>
                <select name="beneficiario_id" class="form-select" required>
                    <option value="">Seleccione un beneficiario</option>
                    @foreach ($beneficiario as $beneficiarios)
                        <option value="{{ $beneficiarios->beneficiario_id }}" selected>
                            {{ $beneficiarios->nombres }} - {{ $beneficiarios->cedula_identidad }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-4">Asignar</button>

            <div class="d-flex justify-content-between mt-4">
                <!-- Botón Anterior -->
                <a href="{{ route('asignar_act.index') }}" class="btn btn-warning">
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

@section('scripts')
    <script>
        document.querySelector('select[name="unidad_habitacional_id"]').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var proyecto_id = selectedOption.getAttribute('data-proyecto');
            var departamento_id = selectedOption.getAttribute('data-departamento');

            document.querySelector('input[name="proyecto_id"]').value = proyecto_id;
            document.querySelector('input[name="departamento_id"]').value = departamento_id;
        });
    </script>
@endsection
