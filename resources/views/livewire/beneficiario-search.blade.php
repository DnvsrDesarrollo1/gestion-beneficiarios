
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

    <div class="container py-1">
        <div class="text-center mb-4">
            <h5 class="fw-bold text-uppercase">BUSQUEDA BENEFICIARIO</h5>
        </div>
        <div class="row g-3">
            <!--Busqueda por nombre del beneficiario -->
            <div class="col-4 col-md-4 col-lg-3 mb-1">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="nombre" type="text" class="form-control" id="nombreInput"
                            placeholder="Buscar por nombre" style="width: 100%;">
                        <label for="nombreInput">Ingrese el nombre beneficiario</label>
                    </div>
                </div>
            </div>
            <!--Busqueda por carnet de identidad del beneficiario-->
            <div class="col-4 col-md-4 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="cedula" type="text" class="form-control" id="cedulaInput"
                            placeholder="Buscar por C.I." style="width: 100%;">
                        <label for="cedulaInput">Ingrese el numero de C.I.</label>
                    </div>
                </div>
            </div>
            <!--Busqueda por nombre conyugue-->
            <div class="col-3 col-md-4 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="nom_conyugue" type="text" class="form-control"
                            id="nombre_conyugueInput" placeholder="Buscar Nombre Conyugue" style="width: 100%;">
                        <label for="nom_conyugueInput">Nombre Conyugue</label>
                    </div>
                </div>
            </div>

            <!--Busqueda por cedula conyugue-->
            <div class="col-3 col-md-3 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="cedula_cony" type="text" class="form-control"
                            id="cedula_conyInput" placeholder="Buscar por C.I. conyugue" style="width: 100%;">
                        <label for="cedula_conyInput">Ingrese el C.I. conyugue</label>
                    </div>
                </div>
            </div>

        </div>

        <div class="row g-3">
            <!--Busqueda por codigo beneficiario-->
            <div class="col-3 col-md-3 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="benefi_cod" type="text" class="form-control"
                            id="benefi_codInput" placeholder="Buscar por codigo beneficiario" style="width: 100%;">
                        <label for="benefi_codInput">Ingrese el codigo beneficiario</label>
                    </div>
                </div>
            </div>


            <!--Busqueda por fecha nacimiento-->
            <div class="col-3 col-md-3 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="fecha_na" type="date" class="form-control"
                            id="fecha_naInput" placeholder="Buscar por fecha de nacimiento" style="width: 100%;">
                        <label for="fecha_naInput">Ingrese la fecha de nacimiento</label>
                    </div>
                </div>
            </div>

            <!--Busqueda por manzano-->
            <div class="col-3 col-md-3 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="manzano" type="text" class="form-control"
                            id="manzanoInput" placeholder="Buscar por manzano" style="width: 100%;">
                        <label for="manzanoInput">Ingrese el manzano</label>
                    </div>
                </div>
            </div>

            <!--Busqueda por lote-->
            <div class="col-3 col-md-3 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="lote" type="text" class="form-control" id="loteInput"
                            placeholder="Buscar por lote" style="width: 100%;">
                        <label for="loteInput">Ingrese el lote</label>
                    </div>
                </div>
            </div>
        </div>

        <!--Busqueda por unidad habitacional-->
        <div class="col-3 col-md-3 col-lg-3 mb-4">
            <div class="input-group">
                <div class="form-floating flex-grow-0" style="width: 250px;">
                    <input wire:model.live.debounce.300ms="unidad_habitacional" type="text" class="form-control"
                        id="unidad_habitacionalInput" placeholder="Buscar por unidad habitacional" style="width: 100%;">
                    <label for="unidad_habitacionalInput">Ingrese la unidad habitacional</label>
                </div>
            </div>
        </div>

        <button wire:click="buscar" class="btn btn-primary">
            <i class="fas fa-search"></i> Buscar
        </button>

        <!-- Mostrar la paginación -->
        @if ($beneficiarios instanceof \Illuminate\Pagination\LengthAwarePaginator)
            {{ $beneficiarios->links() }}
        @else
            <p>No se encontraron datos paginados.</p>
        @endif


        <div class="table-responsive-sm">
            <table class="table table-bordered table-striped">

                <thead class="table-danger">
                    <tr>
                        <th>Beneficiario</th>
                        <th>C.I.</th>
                        <th>Conyugue</th>
                        <th>C.I.Conyugue</th>
                        <!--<th>Beneficiario Cod</th>
                        <th>Fecha Nacimiento</th>-->
                        <th>Departamento</th>
                        <th>Proyecto</th>
                        <th>Unidad Habitacional:</th>
                        <th>Manzano</th>
                        <th>Lote</th>
                        <!--<th>Unidad Vecinal</th>-->
                        <th>Estado Social</th>
                        <th>Folio Real</th>
                        <th>Codigo Prestamo</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($beneficiarios as $beneficiarios)
                        <tr>
                            <td>{{ $beneficiarios->nombres_beneficiario ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->cedula_benef ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->nombres_conyugue ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->cedula_conyugue ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->departamento ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->proyecto ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->unidad_habitacional_id ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->manzano ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->lote ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->unidad_habitacional_id ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->beneficiario_cod ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->fecha_nacimiento ?? 'N/A' }}</td>


                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

