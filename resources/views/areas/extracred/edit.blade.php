
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4">
            <h2>Actualizar Datos del Celular</h2>
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

        <form action="{{route('extracred.update', $credito->unid_hab_id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="departamento" class="form-label fw-bold">Departamento</label>
                            <input type="text" class="form-control @error('departamento') is-invalid @enderror"
                                id="departamento" name="departamento"
                                value="{{ old('departamento', $credito->departamento) }}" disabled>
                            @error('departamento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="nombre_beneficiario" class="form-label fw-bold">Beneficiario</label>
                            <input type="text" class="form-control @error('nombre_beneficiario') is-invalid @enderror"
                                id="nombre_beneficiario" name="nombre_beneficiario"
                                value="{{ old('nombre_beneficiario', $credito->nombre_beneficiario) }}" disabled>
                            @error('nombre_beneficiario')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="ci" class="form-label fw-bold">C.I.</label>
                            <input type="text" class="form-control @error('ci') is-invalid @enderror" id="ci"
                                name="ci" value="{{ old('ci', $credito->ci) }}" disabled>
                            @error('ci')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fono" class="form-label fw-bold">Teléfono / Celular</label>
                            <input type="text" class="form-control @error('fono') is-invalid @enderror"
                                id="fono" name="fono"
                                value="{{ old('fono', $credito->fono) }}" required>
                            @error('fono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button button type="button" onclick="window.open('', '_self', ''); window.close();" class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-between mt-4">
             <a class="btn btn-warning" href="{{ route('extracredito')}}">
             <i class="bi bi-arrow-left-circle"></i> Anterior
             </a>
        </div>

    </div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection

