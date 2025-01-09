
extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4">
            <h2>Actualizar Datos Creditícios</h2>
            <span>Ultima actualizacion hecha por: {{$credito->user->name}} ({{$credito->updated_at}})</span>
        </div>

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
                    {!! QrCode::color(88, 23, 28)
                        ->backgroundColor(245, 212, 215)
                        ->margin(1)
                        ->size(175)
                        ->generate(session('code')) !!}
                </span>
            </div>
        @endif

        <form action="{{ route('extracred.update', $credito) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="codigo_credito" class="form-label fw-bold">Codigo Credito</label>
                            <input type="text" class="form-control @error('codigo_credito') is-invalid @enderror"
                                id="codigo_credito" name="codigo_credito"
                                value="{{ old('codigo_credito', $credito->codigo_credito) }}" required>
                            @error('codigo_credito')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fono" class="form-label fw-bold">Telefono / Celular</label>
                            <input type="text" class="form-control @error('fono') is-invalid @enderror"
                                id="fono" name="fono"
                                value="{{ old('fono', $credito->fono) }}" required>
                            @error('fono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="departamento" class="form-label fw-bold">Departamento</label>
                            <input type="text" class="form-control @error('departamento') is-invalid @enderror"
                                id="departamento" name="departamento"
                                value="{{ old('departamento', $credito->departamento) }}" required>
                            @error('departamento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="estado_cartera" class="form-label fw-bold">Estado</label>
                            <select class="form-select @error('estado_cartera') is-invalid @enderror" id="estado_cartera"
                                name="estado_cartera" required>
                                <option value="{{ $credito->estado_cartera }}">{{ $credito->estado_cartera }}</option>
                                @foreach ($estados as $e)
                                    @if ($e != $credito->estado_cartera)
                                        <option value="{{ $e }}">{{ $e }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('estado_cartera')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre_beneficiario" class="form-label fw-bold">Beneficiario</label>
                            <input type="text" class="form-control @error('nombre_beneficiario') is-invalid @enderror"
                                id="nombre_beneficiario" name="nombre_beneficiario"
                                value="{{ old('nombre_beneficiario', $credito->nombre_beneficiario) }}" required>
                            @error('nombre_beneficiario')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ci" class="form-label fw-bold">C.I.</label>
                            <input type="text" class="form-control @error('ci') is-invalid @enderror" id="ci"
                                name="ci" value="{{ old('ci', $credito->ci) }}" required>
                            @error('ci')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="total_activado" class="form-label fw-bold">Total Activado</label>
                            <input type="number" class="form-control @error('total_activado') is-invalid @enderror"
                                id="total_activado" name="total_activado"
                                value="{{ old('total_activado', $credito->total_activado) }}" step="0.01" required>
                            @error('total_activado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="monto_canceladoafecha" class="form-label fw-bold">Cancelado a la Fecha</label>
                            <input type="number" class="form-control @error('monto_canceladoafecha') is-invalid @enderror"
                                id="monto_canceladoafecha" name="monto_canceladoafecha"
                                value="{{ old('monto_canceladoafecha', $credito->monto_canceladoafecha) }}" step="0.01"
                                required>
                            @error('monto_canceladoafecha')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Actualizar Crédito</button>
                    <button button type="button" onclick="window.open('', '_self', ''); window.close();" class="btn btn-secondary">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
