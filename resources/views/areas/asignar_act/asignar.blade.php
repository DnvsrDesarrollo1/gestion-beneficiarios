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

            {{-- SELECT de unidad habitacional --}}
            <select name="unidad_habitacional_id" class="form-select" required>
                <option value="">Seleccione una unidad habitacional</option>
                @foreach ($unidades as $unidad)
                    <option value="{{ $unidad->unidad_habitacional_id }}" data-proyecto="{{ $unidad->proyecto_id }}"
                        data-departamento="{{ $unidad->departamento_id }}">
                        {{ $unidad->departamento }} - {{ $unidad->manzano }} - {{ $unidad->lote }}
                    </option>
                @endforeach
            </select>

            {{-- MOSTRAR datos en pantalla --}}
            <p>Proyecto ID: <span id="proyecto_id">-</span></p>
            <p>Departamento ID: <span id="departamento_id">-</span></p>

            {{-- ENVIAR datos al backend --}}
            <input type="hidden" name="proyecto_id" id="proyecto_id_hidden">
            <input type="hidden" name="departamento_id" id="departamento_id_hidden">

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
    document.addEventListener('DOMContentLoaded', function () {
        const unidadSelect = document.querySelector('select[name="unidad_habitacional_id"]');
        const proyectoView = document.getElementById('proyecto_id_view');
        const departamentoView = document.getElementById('departamento_id_view');
        const inputProyecto = document.getElementById('proyecto_id_hidden');
        const inputDepartamento = document.getElementById('departamento_id_hidden');

        unidadSelect.addEventListener('change', function () {
            const selected = this.selectedOptions[0];
            const proyecto = selected.dataset.proyecto ?? '';
            const departamento = selected.dataset.departamento ?? '';

            proyectoView.textContent = proyecto || '-';
            departamentoView.textContent = departamento || '-';

            inputProyecto.value = proyecto;
            inputDepartamento.value = departamento;
        });
    });
</script>
@endsection
