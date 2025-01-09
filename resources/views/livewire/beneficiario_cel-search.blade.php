<div>
    <div class="mb-4">
        <div class="input-group">
            <span class="input-group-text bg-primary text-white">
                <i class="fas fa-search"></i>
            </span>
            <div class="form-floating flex-grow-1">
                <input wire:model.live.debounce.300ms="search" type="text" class="form-control" id="searchInput" placeholder="Buscar beneficiarios">
                <label for="searchInput">Buscar beneficiarios2</label>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            Beneficiarios Activos2
        </div>
        <div class="card-body">
            <div>{{ $beneficiarios->links() }}</div>
            <table class="table table-bordered table-hover rounded overflow-hidden" style="width:100%">
                <thead class="align-middle table-dark">
                    <tr>
                        <th>Departamento</th>
                        <th>Nombres</th>
                        <th>Cedula</th>
                        <th>Proyecto</th>
                        <th>Proc. Estado Social</th>
                        <th>Celular</th>
                        <th>Observaciones</th>
                        <th>Cartera</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($beneficiarios as $beneficiario)
                        <tr>
                            <td>{{ $beneficiario->departamento }}</td>
                            <td>{{ $beneficiario->nombre_beneficiario_final }}</td>
                            <td>{{ $beneficiario->ci_beneficiario_final }}</td>
                            <td>{{ $beneficiario->nombre_proyecto }}</td>
                            <td>{{ $beneficiario->proceso_estado_benef_final }}</td>
                            <td>{{ $beneficiario->credit->fono }}</td>
                            <td>{{ $beneficiario->observacion_benef_final }}</td>
                            <td>
                                {{ $beneficiario->credit ? "Cartera Activa" : "Cartera Pendiente" }}
                            </td>
                            <td>
                                <a target="_blank"
                                    href="{{ route('credits.edit', $beneficiario->unid_hab_id) }}"
                                    class="d-block btn btn-primary">Actualizar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
        </div>
    </div>
</div>
