@extends('layouts.app')
@section('content')
    <h5 class="text-center">Resumen Integral del Beneficiario: Áreas Legal, Social y Créditos</h5>

    <form method="GET" action="{{ route('infproyecto') }}" class="mb-3 no-print w-100">
        <div class="row">
            <div class="col-md-3 mb-2">
                <input type="text" name="nombre_beneficiario_final" class="form-control" placeholder="Buscar por Nombre"
                    value="{{ request('nombre_beneficiario_final') }}">
            </div>
            <div class="col-md-2 mb-2">
                <input type="text" name="ci_beneficiario_final" class="form-control" placeholder="Buscar por C.I. Titular"
                    value="{{ request('ci_beneficiario_final') }}">
            </div>
            <div class="col-md-2 mb-2">
                <input type="text" name="departamento" class="form-control" placeholder="Buscar por Departamento"
                    value="{{ request('departamento') }}">
            </div>
            <div class="col-md-3 mb-2">
                <input type="text" name="proyecto" class="form-control" placeholder="Buscar por Proyecto"
                    value="{{ request('proyecto') }}">
            </div>
            <div class="col-auto mb-2 d-flex gap-1">
                <button type="submit"
                    style="background: linear-gradient(135deg, #4b99da, #0c5697); border: none; color: white;">
                    Buscar
                </button>

                <a href="{{ route('infproyecto') }}"
                    style="background: linear-gradient(135deg, #c7115d, #c9c9b9); border: none; color: white;"
                    class="btn">
                    Limpiar
                </a>
            </div>
        </div>
    </form>


<form method="GET" action="{{ route('exportCsvDirecto') }}" class="mb-4 no-print w-100 p-3 rounded shadow-sm border bg-light">
    <div class="row align-items-end">
        {{-- Departamento --}}
        <div class="col-md-4 mb-3">
            <label for="departamento" class="form-label fw-semibold">Departamento</label>
            <select name="departamento" id="departamento" class="form-select" required>
                <option value="">-- Seleccione Departamento --</option>
                @foreach ($departamentos as $dep)
                    <option value="{{ $dep->departamento_id }}"
                        {{ request('departamento') == $dep->departamento_id ? 'selected' : '' }}>
                        {{ $dep->departamento }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Proyecto --}}
        <div class="col-md-4 mb-3">
            <label for="proyecto" class="form-label fw-semibold">Proyecto</label>
            <select name="proyecto" id="proyecto" class="form-select" required>
                <option value="">-- Seleccione Proyecto --</option>
                {{-- Opciones cargadas vía AJAX --}}
            </select>
        </div>

        {{-- Botón --}}
        <div class="col-md-4 mb-3 text-end">
            <button type="submit" class="btn btn-success w-100" style="background: linear-gradient(135deg, #1a5d3d, #e0e043); border: none;">
                <strong>📥 Exportar CSV</strong>
            </button>
        </div>
    </div>
</form>


    <div class="table-responsive">
        <!--Paginacion-->
        <div class="d-flex justify- content-center mt-3">
            <div>{{ $data->links() }}</div>
        </div>
        <table class="table table-bordered table-striped w-100">
            <thead class="table-danger">
                <tr>
                    <th>Departamento</th>
                    <th>Nombre Proyecto</th>
                    <th>Manzano</th>
                    <th>Lote</th>
                    <th>Nombre Beneficiario</th>
                    <th>C.I.</th>
                    <th>EXT. CI.</th>
                    <th>Estado Social Benef Final</th>
                    <th>Telefono/Celular S.</th>
                    <th>Entidad Financiera</th>
                    <th>Telefono/Celular C.</th>
                    <th>Estado Cartera</th>
                    <th>Nro Folio Real</th>
                    <th>Titulacion</th>
                    <th>Folio Nombre AEVIVIENDA</th>
                    <!--<th>Observaciones2</th>-->

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->departamento }}</td>
                        <td>{{ $item->nombre_proyecto }}</td>
                        <td>{{ $item->manzano }}</td>
                        <td>{{ $item->lote }}</td>

                        <td>{{ $item->nombre_beneficiario_final }}</td>
                        <td>{{ $item->ci_beneficiario_final }}</td>
                        <td>{{ $item->ext_ci_final }}</td>
                        <td>{{ $item->estado_social_benef_final }}</td>
                        <td>{{ $item->telefono_final}}</td>
                        <th>{{ $item->entidad_financiera }}</th>
                        <td>{{ $item->fono }}</td>
                        <td>{{ $item->estado_cartera }}</td>
                        <td>{{ $item->nro_folio_real }}</td>
                        <td>{{ $item->titulacion }}</td>
                        <td>{{ $item->folio_nombre_aevivienda }}</td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#departamento').on('change', function() {
            let departamento_id = $(this).val();
            let $proyecto = $('#proyecto');

            $proyecto.html('<option value="">Cargando proyectos...</option>');

            if (departamento_id !== '') {
                $.ajax({
                    url: "{{ route('get.proyectos') }}",
                    type: "GET",
                    data: {
                        departamento: departamento_id
                    },
                    success: function(data) {
                        console.log(data); // Para verificar los datos
                        let options = '<option value="">-- Seleccione Proyecto --</option>';
                        data.forEach(proy => {
                            options +=
                                `<option value="${proy.proy_id}">[${proy.proy_id}] ${proy.nombre_proyecto}</option>`;
                        });
                        $proyecto.html(options);
                    },
                    error: function() {
                        alert("Error al cargar los proyectos.");
                        $proyecto.html('<option value="">-- Seleccione Proyecto --</option>');
                    }
                });
            } else {
                $proyecto.html('<option value="">-- Seleccione Proyecto --</option>');
            }
        });
    </script>
@endsection
