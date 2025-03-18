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
        <form action="{{ route('beneficiarios.update') }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="bei" value="{{ $beneficiario->beneficiario_id }}">


            <div class="row g-3">

                <div class="col-md-6 mb-3">
                    <label for="departamento" class="form-label fw-bold">Departamento</label>
                    <input type="text" class="form-control @error('departamento') is-invalid @enderror"
                        id="departamento" name="departamento"
                        value="{{ old('departamento', $beneficiario->departamento) }}" disabled>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nombres" class="form-label fw-bold">Beneficiario</label>
                    <input type="text" class="form-control @error('nombres') is-invalid @enderror"
                        id="nombres" name="nombres"
                        value="{{ old('nombres', $beneficiario->nombres) }}" disabled>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="cedula_identidad" class="form-label fw-bold">C.I.</label>
                    <input type="text" class="form-control @error('cedula_identidad') is-invalid @enderror" id="cedula_identidad"
                        name="cedula_identidad" value="{{ old('cedula_identidad', $beneficiario->cedula_identidad) }}" disabled>
                </div>


                <div class="col-md-6 mb-3">
                    <label for="telefono" class="form-label fw-bold">Teléfono / Celular</label>
                    <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                    id="telefono"
                    name="telefono"
                    value="{{ old('telefono', $beneficiario->telefono) }}"
                    pattern="[0-9]{8,9}"
                    maxlength="9"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,9);"
                    required>
                    @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
