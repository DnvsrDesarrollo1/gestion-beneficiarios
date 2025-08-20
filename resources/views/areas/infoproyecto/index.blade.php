@extends('layouts.app')
@section('content')
    <h5 class="text-center">Resumen Integral del Beneficiario: Áreas Legal, Social y Créditos</h5>

    <form method="GET" action="{{ route('infoproyecto') }}" class="mb-3 no-print w-100">
        @csrf
        <div class="row">
            <div class="col-md-3 mb-2">
                <input type="text" name="nombre_beneficiario_final" class="form-control"
                    placeholder="Buscar Nombre Beneficiario Final" value="{{ request('nombre_beneficiario_final') }}">
            </div>
            <div class="col-md-2 mb-2">
                <input type="text" name="ci_beneficiario_final" class="form-control"
                    placeholder="Buscar por C.I. Beneficiario Final" value="{{ request('ci_beneficiario_final') }}">
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

                <a href="{{ route('infoproyecto') }}"
                    style="background: linear-gradient(135deg, #c7115d, #c9c9b9); border: none; color: white;" class="btn">
                    Limpiar
                </a>
            </div>
        </div>
    </form>

    <form method="GET" action="{{ route('exportCsvDirecto') }}"
        class="mb-4 no-print w-100 p-3 rounded shadow-sm border bg-light">
        @csrf
        <div class="row align-items-end">
            {{-- Departamento --}}
            <div class="col-md-4 mb-3">
                <label for="departamento" class="form-label fw-semibold">Departamento</label>
               <select name="departamento" id="departamento" class="form-select" required>
                    <option value="">-- Seleccione Departamento --</option>
                    <i class="fa fa-h-square" aria-hidden="true"></i><i class="fa fa-h-square" aria-hidden="true"></i>@foreach ($departamentos as $dep)
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
                <button type="submit" class="btn btn-success w-100"
                    style="background: linear-gradient(135deg, #1a5d3d, #e0e043); border: none;">
                    <strong>📥 Exportar CVS</strong>
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
                        <th style="font-size: 11px;">Nro</th>
                        <th style="font-size: 11px;">Departamento</th>
                        <th style="font-size: 11px;">Proy_id</th>
                        <th style="font-size: 11px;">Nombre Proyecto</th>
                        <th style="font-size: 11px;">Manzano</th>
                        <th style="font-size: 11px;">Lote</th>
                        <th style="font-size: 11px;">Nombre Beneficiario Inicial</th>
                        <th style="font-size: 11px;">C.I.</th>
                        <th style="font-size: 11px;">Nombre Conyugue</th>
                        <th style="font-size: 11px;">C.I.</th>
                        <th style="font-size: 11px;">Nombre Beneficiario Final</th>
                        <th style="font-size: 11px;">C.I.</th>
                        <th style="font-size: 11px;">EXT. CI.</th>
                        <th style="font-size: 11px;">Estado Social Benef Final</th>
                        <th style="font-size: 11px;">Telefono Celular S.</th>
                        <th style="font-size: 11px;">Entidad Financiera</th>
                        <th style="font-size: 11px;">Telefono Celular C.</th>
                        <th style="font-size: 11px;">Estado Cartera</th>
                        <th style="font-size: 11px;">Nro Folio Real</th>
                        <th style="font-size: 11px;">Titulacion</th>
                        <th style="font-size: 11px;">Folio Nombre AEVIVIENDA</th>
                        <!--<th>Observaciones2</th>-->

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td style="font-size: 11px;">{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</td>
                            <td style="font-size: 11px;">{{ $item->departamento }}</td>
                            <td style="font-size: 11px;">{{ $item->proy_id }}</td>
                            <td style="font-size: 11px;">{{ $item->nombre_proyecto }}</td>
                            <td style="font-size: 11px;">{{ $item->manzano }}</td>
                            <td style="font-size: 11px;">{{ $item->lote }}</td>
                            <td style="font-size: 11px;">{{ $item->nombre_titular }}</td>
                            <td style="font-size: 11px;">{{ $item->ci_titular }}</td>
                            <td style="font-size: 11px;">{{ $item->nombre_conyugue }}</td>
                            <td style="font-size: 11px;">{{ $item->ci_conyugue }}</td>
                            <td style="font-size: 11px;">{{ $item->nombre_beneficiario_final }}</td>
                            <td style="font-size: 11px;">{{ $item->ci_beneficiario_final }}</td>
                            <td style="font-size: 11px;">{{ $item->ext_ci_final }}</td>
                            <td style="font-size: 11px;">{{ $item->estado_social_benef_final }}</td>
                            <td style="font-size: 11px;">{{ $item->telefono_final }}</td>
                            <th style="font-size: 11px;">{{ $item->entidad_financiera }}</th>
                            <td style="font-size: 11px;">{{ $item->fono }}</td>
                            <td style="font-size: 11px;">{{ $item->estado_cartera }}</td>
                            <td style="font-size: 11px;">{{ $item->nro_folio_real }}</td>
                            <td style="font-size: 11px;">{{ $item->titulacion }}</td>
                            <td style="font-size: 11px;">{{ $item->folio_nombre_aevivienda }}</td>

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

