@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

@endsection
<div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger d-flex justify-content-evenly align-items-center">
            <span>
                {{ session('error') }}
            </span>
            <span class="rounded overflow-hidden">
                {!! QrCode::color(88, 23, 28)->backgroundColor(245, 212, 215)->margin(1)->size(175)->generate(session('code')) !!}
            </span>
        </div>
    @endif

    <div class="mb-4">
        <div class="input-group">
            <span class="input-group-text bg-primary text-white">
                <i class="fas fa-search"></i>
            </span>
            <div class="form-floating flex-grow-0" style="width: 200px;">
                <input wire:model.live.debounce.200ms="search" type="text" class="form-control" id="searchInput"
                    placeholder="Buscador por C.I." list="searchSuggestions">
                <label for="searchInput">Ingrese el numero de C.I.</label>
            </div>
        </div>
    </div>

    <div wire:loading>
        <p>Cargando...</p>
    </div>



    @foreach ($beneficiarios as $beneficiario)
        {{-- 0 --}}

        <form action="{{ route('beneficiarios.update', $beneficiario->id_soc) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="unid_hab_id" value="{{ $beneficiario->unid_hab_id }}">

            <div class="row g-3">

                <div class="col-md-6 mb-3">
                    <label for="departamento" class="form-label fw-bold">Departamento</label>
                    <input type="text" class="form-control @error('departamento') is-invalid @enderror"
                        id="departamento" name="departamento"
                        value="{{ old('departamento', $beneficiario->departamento) }}" disabled>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nombre_beneficiario_final" class="form-label fw-bold">Beneficiario</label>
                    <input type="text" class="form-control @error('nombre_beneficiario_final') is-invalid @enderror"
                        id="nombre_beneficiario_final" name="nombre_beneficiario_final"
                        value="{{ old('nombre_beneficiario_final', $beneficiario->nombre_beneficiario_final) }}" disabled>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="ci_beneficiario_final" class="form-label fw-bold">C.I.</label>
                    <input type="text" class="form-control @error('ci_beneficiario_final') is-invalid @enderror" id="ci_beneficiario_final"
                        name="ci_beneficiario_final" value="{{ old('ci_beneficiario_final', $beneficiario->ci_beneficiario_final) }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fono" class="form-label fw-bold">Teléfono / Celular Creditos</label>

                    <input
                    type="text"
                    name="fono"
                    id="fono"
                    class="form-control @error('fono') is-invalid @enderror"
                    value="{{ old('fono', $beneficiario->fono) }}"
                    placeholder="Ej: 78945612-71234567"
                    pattern="^(\d{8,9})(-\d{8,9})*$"
                    />

                </div>

                <div class="col-md-6 mb-3">
                    <label for="telefono_final" class="form-label fw-bold">Teléfono / Celular Social</label>

                    <input
                    type="text"
                    name="telefono_final"
                    id="telefono_final"
                    class="form-control @error('telefono_final') is-invalid @enderror"
                    value="{{ old('telefono_final', $beneficiario->telefono_final) }}"
                    placeholder="Ej: 78945612-71234567"
                    pattern="^(\d{8,9})(-\d{8,9})*$"
                    />
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button button type="button" onclick="window.open('', '_self', ''); window.close();"
                    class="btn btn-danger">Cancelar</button>
            </div>

        </form>
    @endforeach




</div>
