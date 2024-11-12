@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4">
            <h2>Actualizar Datos Legales</h2>
            <span>Ultima actualizacion hecha por: {{$legal->user->name}} ({{$legal->updated_at}})</span>
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

        <form action="{{ route('legals.update', $legal) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="departamento" class="form-label fw-bold">Departamento</label>
                            <input type="text" class="form-control @error('departamento') is-invalid @enderror"
                                id="departamento" name="departamento"
                                value="{{ old('departamento', $legal->departamento) }}" required>
                            @error('departamento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="proyecto" class="form-label fw-bold">Proyecto</label>
                            <select class="form-select @error('proyecto') is-invalid @enderror" id="proyecto"
                                name="proyecto" required>
                                <option value="{{ $legal->proyecto }}">(actual) {{ $legal->proyecto }}</option>
                                @foreach ($proyectos as $p)
                                    @if ($p != $legal->proyecto)
                                        <option value="{{ $p->nombre_proy }}">{{ $p->nombre_proy }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('proyecto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre_apellidos" class="form-label fw-bold">Nombre y Apellidos</label>
                            <input type="text" class="form-control @error('nombre_apellidos') is-invalid @enderror"
                                id="nombre_apellidos" name="nombre_apellidos"
                                value="{{ old('nombre_apellidos', $legal->nombre_apellidos) }}" required>
                            @error('nombre_apellidos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cedula_identidad" class="form-label fw-bold">Cédula de Identidad</label>
                            <input type="text" class="form-control @error('cedula_identidad') is-invalid @enderror"
                                id="cedula_identidad" name="cedula_identidad"
                                value="{{ old('cedula_identidad', $legal->cedula_identidad) }}" required>
                            @error('cedula_identidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="manzano" class="form-label fw-bold">Manzano</label>
                            <input type="text" class="form-control @error('manzano') is-invalid @enderror"
                                id="manzano" name="manzano"
                                value="{{ old('manzano', $legal->manzano) }}">
                            @error('manzano')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="lote" class="form-label fw-bold">Lote</label>
                            <input type="text" class="form-control @error('lote') is-invalid @enderror"
                                id="lote" name="lote"
                                value="{{ old('lote', $legal->lote) }}">
                            @error('lote')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="nro_folio_real" class="form-label fw-bold">Nro. Folio Real</label>
                            <input type="text" class="form-control @error('nro_folio_real') is-invalid @enderror"
                                id="nro_folio_real" name="nro_folio_real"
                                value="{{ old('nro_folio_real', $legal->nro_folio_real) }}">
                            @error('nro_folio_real')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="titulacion" class="form-label fw-bold">Titulación</label>
                            <input type="text" class="form-control @error('titulacion') is-invalid @enderror"
                                id="titulacion" name="titulacion"
                                value="{{ old('titulacion', $legal->titulacion) }}">
                            @error('titulacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="observaciones1" class="form-label fw-bold">Observaciones</label>
                            <textarea class="form-control @error('observaciones1') is-invalid @enderror"
                                id="observaciones1" name="observaciones1" rows="3">{{ old('observaciones1', $legal->observaciones1) }}</textarea>
                            @error('observaciones1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="levantam_grav_dev_documentos" class="form-label fw-bold">Levantamiento de Gravamen / Devolución de Documentos</label>
                            <input type="text" class="form-control @error('levantam_grav_dev_documentos') is-invalid @enderror"
                                id="levantam_grav_dev_documentos" name="levantam_grav_dev_documentos"
                                value="{{ old('levantam_grav_dev_documentos', $legal->levantam_grav_dev_documentos) }}">
                            @error('levantam_grav_dev_documentos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="observado_ley850" class="form-label fw-bold">Observado Ley 850</label>
                            <input type="text" class="form-control @error('observado_ley850') is-invalid @enderror"
                                id="observado_ley850" name="observado_ley850"
                                value="{{ old('observado_ley850', $legal->observado_ley850) }}">
                            @error('observado_ley850')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Actualizar legal</button>
                    <button button type="button" onclick="window.open('', '_self', ''); window.close();" class="btn btn-secondary">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
