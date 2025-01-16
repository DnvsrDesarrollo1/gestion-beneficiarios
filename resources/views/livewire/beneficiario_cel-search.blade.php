<div>
    <div class="mb-4">
        <div class="input-group">
            <span class="input-group-text bg-primary text-white">
                <i class="fas fa-search"></i>
            </span>
            <div class="form-floating flex-grow-1">
                <input wire:model.live.debounce.300ms="search" type="text" class="form-control" id="searchInput" placeholder="Buscar beneficiarios">
                <label for="searchInput">Buscar Beneficiario</label>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            Beneficiarios
        </div>
        <div class="card-body">
            <div>{{ $beneficiarios->links() }}</div>
            <table class="table table-bordered table-hover rounded overflow-hidden" style="width:100%">
                <thead class="align-middle table-dark">
                    <tr>
                        <th>Departamento</th>
                        <th>Nombres</th>
                        <th>C.I.</th>
                        <th>Proyecto</th>
                        <th>Celular</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($beneficiarios as $beneficiario)
                        <tr>
                            <td>{{ $beneficiario->departamento }}</td>
                            <td>{{ $beneficiario->nombre_beneficiario }}</td>
                            <td>{{ $beneficiario->ci }}</td>
                            <td>{{ $beneficiario->proyecto }}</td>
                            <td>{{ $beneficiario->fono }}</td>
                            <td>
                                <a target="_blank"
                                    href="{{ route('extracred.edit', $beneficiario->unid_hab_id) }}"
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
