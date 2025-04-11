@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Contenedor responsivo con scroll */
        .table-container {
            width: 100%;
            max-height: 500px;
            /* Ajusta la altura máxima para activar el scroll vertical */
            overflow-x: auto;
            overflow-y: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            padding: 10px;
        }

        /* Tabla responsiva */
        .custom-table {
            min-width: 1200px;
            /* Asegura que la tabla sea más ancha que el contenedor */
            width: 100%;
            white-space: nowrap;
            /* Evita que las celdas se rompan en varias líneas */
        }

        /* Fijar los encabezados */
        .table thead {
            position: sticky;
            top: 0;
            background-color: #dc3545 !important;
            color: white !important;
            z-index: 2;
        }

        /* Mejoras en el formulario */
        .form-group label {
            font-size: 14px;
            font-weight: bold;
        }

        .form-group select,
        .form-group input {
            width: 100%;
            max-width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
@endsection

<div class="container mt-3">
    <div class="custom-container p-3 bg-light border rounded shadow">
        <div class="text-center mb-4">
            <h5 class="fw-bold text-uppercase">Busqueda Beneficiario</h5>
        </div>

        <div class="row g-3">
            <!--Busqueda por departamento-->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="departamento_id" class="form-label fw-bold">Buscar por Departamento:</label>
                    <select wire:model.live.debounce.300ms="departamentos" id="departamentos" class="form-select">
                        <option value="">-- Seleccione un departamento --</option>
                        @foreach ($departamento as $departamentos)
                            <option value="{{ $departamentos->departamento_id }}">
                                {{ $departamentos->departamento }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!--Busqueda por Proyecto-->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proyecto_id" class="form-label fw-bold">Buscar por Proyecto:</label>
                    <select wire:model.live.debounce.300ms="proy" class="form-select" id="proyecto_id">
                        <option value="">-- Seleccione un Proyecto --</option>
                        @foreach ($proyecto as $proyectos)
                            <option value="{{ $proyectos->proyecto_id }}">{{ $proyectos->nombre_proy }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

           <!--Busqueda por Codigo de beneficiario-->

            <div class="col-md-4">
                <div class="form-group">
                    <label for="benefi_codInput" class="form-label fw-bold">Buscar por Código Beneficiario:</label>
                    <div class="input-group">
                        <input wire:model.live.debounce.300ms="benefi_cod" type="text" class="form-control"
                            id="benefi_codInput" placeholder="Ingrese el código beneficiario">
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <!--Busqueda por nombre del beneficiario -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nombreInput" class="form-label fw-bold">Ingrese el nombre beneficiario</label>
                    <div class="input-group">
                        <input wire:model.live.debounce.300ms="nombre" type="text" class="form-control"
                            id="nombreInput" placeholder="Buscar por nombre">
                    </div>
                </div>
            </div>
            <!--Busqueda por carnet de identidad del beneficiario-->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cedulaInput" class="form-label fw-bold">Ingrese el numero de C.I.</label>
                    <div class="input-group">
                        <input wire:model.live.debounce.300ms="cedula" type="text" class="form-control"
                            id="cedulaInput" placeholder="Buscar por C.I.">
                    </div>
                </div>
            </div>
            <!--Busqueda por nombre conyugue-->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nom_conyugueInput" class="form-label fw-bold">Nombre Conyugue</label>
                    <div class="input-group">
                        <input wire:model.live.debounce.300ms="nom_conyugue" type="text" class="form-control"
                            id="nombre_conyugueInput" placeholder="Buscar Nombre Conyugue">
                    </div>
                </div>
            </div>

        </div>

        <div class="row g-3">

            <!--Busqueda por cedula conyugue-->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cedula_conyInput" class="form-label fw-bold">Ingrese el C.I. conyugue</label>
                    <div class="input-group">
                        <input wire:model.live.debounce.300ms="cedula_cony" type="text" class="form-control"
                            id="cedula_conyInput" placeholder="Buscar por C.I. conyugue">
                    </div>
                </div>
            </div>

            <!--Busqueda por fecha nacimiento-->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fecha_naInput" class="form-label fw-bold">Ingrese la fecha de nacimiento</label>
                    <div class="input-group">
                        <input wire:model.live.debounce.300ms="fecha_na" type="date" class="form-control"
                            id="fecha_naInput" placeholder="Buscar por fecha de nacimiento">
                    </div>
                </div>
            </div>

            <!--Busqueda por manzano-->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="manzanoInput" class="form-label fw-bold">Ingrese el manzano</label>
                    <div class="input-group">
                        <input wire:model.live.debounce.300ms="manzano" type="text" class="form-control"
                            id="manzanoInput" placeholder="Buscar por manzano">
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">

            <!--Busqueda por lote-->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="loteInput" class="form-label fw-bold">Ingrese el lote</label>
                    <div class="input-group">
                        <input wire:model.live.debounce.300ms="lote" type="text" class="form-control"
                            id="loteInput" placeholder="Buscar por lote">
                    </div>
                </div>
            </div>

            <!--Busqueda por unidad habitacional-->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="unidad_habitacionalInput" class="form-label fw-bold">Ingrese la unidad
                        habitacional</label>
                    <div class="input-group">
                        <input wire:model.live.debounce.300ms="unidad_habitacional" type="text"class="form-control"
                            id="unidad_habitacionalInput" placeholder="Buscar por unidad habitacional">
                    </div>
                </div>
            </div>

            <!--Busqueda Codigo de prestamo-->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prestamoInput" class="form-label fw-bold">Ingrese codigo de prestamo</label>
                    <div class="input-group">
                        <input wire:model.live.debounce.300ms="prestamo" type="text"class="form-control"
                            id="prestamoInput" placeholder="Buscar por codigo de prestamo">
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <!--Busqueda folio real-->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="folioInput" class="form-label fw-bold">Ingrese folio real</label>
                    <div class="input-group">
                        <input wire:model.live.debounce.300ms="folio" type="text"class="form-control"
                            id="folioInput" placeholder="Buscar por folio real">
                    </div>
                </div>
            </div>
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-3">
            @if ($beneficiarios instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $beneficiarios->links() }}
            @else
                <p>No se encontraron datos paginados.</p>
            @endif
        </div>

        <!-- Tabla de resultados con scroll -->
        <div class="table-responsive" style="max-height: 500px; overflow-y: auto; overflow-x: auto;">
            <table class="table table-bordered table-striped custom-table">
                <thead class="table-danger text-center">
                    <tr>
                        <th>Beneficiario</th>
                        <th>C.I.</th>
                        <th>Conyugue</th>
                        <th>C.I.Conyugue</th>
                        <th>Beneficiario Cod</th>
                        <th>Fecha Nacimiento</th>
                        <th>Departamento</th>
                        <th>Proyecto</th>
                        <th>Unidad Habitacional</th>
                        <th>Manzano</th>
                        <th>Lote</th>
                        <th>Unidad Vecinal</th>
                        <th>Estado Social</th>
                        <th>Folio Real</th>
                        <th>Código Préstamo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beneficiarios as $beneficiarios)
                        <tr>
                            <td>{{ $beneficiarios->nombres_beneficiario ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->cedula_benef ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->nombres_conyugue ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->cedula_conyugue ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->beneficiario_cod ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->fecha_nacimiento ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->departamento ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->proyecto ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->unidad_habitacional_id ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->manzano ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->lote ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->unidad_vecinal ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->estado_social ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->nro_folio_real ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->cod_prestamo ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@section('js')
@endsection
