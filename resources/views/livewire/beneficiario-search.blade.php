
<div>
    <h1>Buscar Beneficiario</h1>
    <!--Busqueda por nombre del beneficiario -->
    <div class="mb-4">
        <div class="input-group">
            <span class="input-group-text bg-primary text-white">
                <i class="fas fa-search"></i>
            </span>
            <div class="form-floating flex-grow-0" style="width: 200px;">
                <input wire:model.live.debounce.300ms="nombre" type="text" class="form-control" id="nombreInput"
                    placeholder="Buscar por nombre">
                <label for="nombreInput">Ingrese el nombre beneficiario</label>
            </div>
        </div>
    </div>
    <!--Busqueda por carnet de identidad del beneficiario-->
    <div class="mb-4">
        <div class="input-group">
            <span class="input-group-text bg-primary text-white">
                <i class="fas fa-search"></i>
            </span>
            <div class="form-floating flex-grow-0" style="width: 200px;">
                <input wire:model.live.debounce.300ms="cedula" type="text" class="form-control" id="cedulaInput"
                    placeholder="Buscar por C.I.">
                <label for="cedulaInput">Ingrese el numero de C.I.</label>
            </div>
        </div>
    </div>
    <!--Busqueda por nombre conyugue-->
    <div class="mb-4">
        <div class="input-group">
            <span class="input-group-text bg-primary text-white">
                <i class="fas fa-search"></i>
            </span>
            <div class="form-floating flex-grow-0" style="width: 200px;">
                <input wire:model.live.debounce.300ms="nom_conyugue" type="text" class="form-control" id="nombre_conyugueInput"
                    placeholder="Buscar por C.I.">
                <label for="nom_conyugueInput">Ingrese el proyecto</label>
            </div>
        </div>
    </div>

    <!--Busqueda por cedula conyugue-->
    <div class="mb-4">
        <div class="input-group">
            <span class="input-group-text bg-primary text-white">
                <i class="fas fa-search"></i>
            </span>
            <div class="form-floating flex-grow-0" style="width: 200px;">
                <input wire:model.live.debounce.300ms="cedula_cony" type="text" class="form-control" id="cedula_conyInput"
                    placeholder="Buscar por C.I.">
                <label for="cedula_conyInput">Ingrese el proyecto</label>
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
                    <th>Departamento</th>
                    <th>Proyecto</th>
                    <th>Unidad Habitacional:</th>
                    <th>Manzano</th>
                    <th>Lote</th>
                    <th>Unidad Vecinal</th>
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
                        <td>{{ $beneficiarios->manzano ?? 'N/A' }}</td>
                        <td>{{ $beneficiarios->lote ?? 'N/A' }}</td>
                        <td>{{ $beneficiarios->uh_asignada_id ?? 'N/A' }}</td>
                        <td>{{ $beneficiarios->unidad_habitacional_id ?? 'N/A' }}</td>


                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>
