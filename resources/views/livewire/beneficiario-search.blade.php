<div>
    <div class="mb-4">
        <div class="input-group">
            <span class="input-group-text bg-primary text-white">
                <i class="fas fa-search"></i>
            </span>
            <div class="form-floating flex-grow-1">
                <input wire:model.live.debounce.300ms="search" type="text" class="form-control" id="searchInput"
                    placeholder="Buscar beneficiarios">
                <label for="searchInput">Buscar beneficiarios</label>
            </div>
            <div class="form-floating">
                <select wire:model.live="searchType" class="form-select" id="searchType" aria-label="Tipo de búsqueda">
                    <option value="partial">Búsqueda Parcial</option>
                    <option value="exact">Búsqueda Exacta</option>
                </select>
                <label for="searchType">Tipo de búsqueda</label>
            </div>
            <div class="form-floating">
                <select wire:model.live="proyecto" class="form-select" id="proyecto" aria-label="Filtrar por proyecto">
                    <option value="">Todos los proyectos</option>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->nombre_proyecto }}">{{ $proyecto->nombre_proyecto }}</option>
                    @endforeach
                </select>
                <label for="proyecto">Filtrar por proyecto</label>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Beneficiarios Activos
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div>{{ $beneficiarios->links() }}</div>
            <table class="table table-bordered table-hover rounded overflow-hidden" style="width:100%">
                <thead class="align-middle table-dark">
                    <tr>
                        <th>Departamento</th>
                        <th>Nombres</th>
                        <th>Cedula</th>
                        <th>Proyecto</th>
                        <th>Celular</th>
                        <th>Observaciones</th>
                        <th>Manzano</th>
                        <th>Lote</th>
                        <th>Estado Visita</th>
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
                            <td>{{ $beneficiario->credit->fono }}</td>
                            <td class="text-sm">{{ $beneficiario->observacion_benef_final }}</td>
                            <td>
                                {{ $beneficiario->manzano }}
                            </td>
                            <td>
                                {{ $beneficiario->lote }}
                            </td>
                            <td>
                                <select class="form-select form-select-sm"
                                    wire:change="updateAlerta({{ $beneficiario->id_soc }}, $event.target.value)">
                                    <option value="{{$beneficiario->alerta}}">{{$beneficiario->alerta}}</option>
                                    @foreach ($alertaOpciones as $valor => $texto)
                                        <option value="{{ $valor }}"
                                            {{ $beneficiario->alerta == $valor ? 'selected' : '' }}>
                                            {{ $texto }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <a target="_blank" href="{{ route('home.show', $beneficiario->unid_hab_id) }}"
                                    class="d-block btn btn-info">Revisar</a>
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
