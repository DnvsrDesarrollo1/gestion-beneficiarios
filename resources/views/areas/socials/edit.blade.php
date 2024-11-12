@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mb-4">
            <h2>Actualizar Datos Sociales</h2>
            <span>Ultima actualizacion hecha por: {{$social->user->name}} ({{$social->updated_at}})</span>
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
                    {!! QrCode::color(88, 23, 28)->backgroundColor(245, 212, 215)->margin(1)->size(175)->generate(session('code')) !!}
                </span>
            </div>
        @endif

        <form action="{{ route('socials.update', $social) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="departamento" class="form-label fw-bold">Departamento</label>
                            <input type="text" class="form-control @error('departamento') is-invalid @enderror"
                                id="departamento" name="departamento"
                                value="{{ old('departamento', $social->departamento) }}" required>
                            @error('departamento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nombre_proyecto" class="form-label fw-bold">Nombre del Proyecto</label>
                            <select class="form-select @error('proyecto') is-invalid @enderror" id="proyecto"
                                name="nombre_proyecto" required>
                                <option value="{{ $social->nombre_proyecto }}">(actual) {{ $social->nombre_proyecto }}</option>
                                @foreach ($proyectos as $p)
                                    @if ($p != $social->nombre_proyecto)
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
                            <label for="manzano" class="form-label fw-bold">Manzano</label>
                            <input type="text" class="form-control @error('manzano') is-invalid @enderror" id="manzano"
                                name="manzano" value="{{ old('manzano', $social->manzano) }}">
                            @error('manzano')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lote" class="form-label fw-bold">Lote</label>
                            <input type="text" class="form-control @error('lote') is-invalid @enderror" id="lote"
                                name="lote" value="{{ old('lote', $social->lote) }}">
                            @error('lote')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre_titular" class="form-label fw-bold">Nombre del Titular</label>
                            <input type="text" class="form-control @error('nombre_titular') is-invalid @enderror"
                                id="nombre_titular" name="nombre_titular"
                                value="{{ old('nombre_titular', $social->nombre_titular) }}" required>
                            @error('nombre_titular')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ci_titular" class="form-label fw-bold">CI del Titular</label>
                            <input type="text" class="form-control @error('ci_titular') is-invalid @enderror"
                                id="ci_titular" name="ci_titular" value="{{ old('ci_titular', $social->ci_titular) }}"
                                required>
                            @error('ci_titular')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre_conyugue" class="form-label fw-bold">Nombre del Cónyuge</label>
                            <input type="text" class="form-control @error('nombre_conyugue') is-invalid @enderror"
                                id="nombre_conyugue" name="nombre_conyugue"
                                value="{{ old('nombre_conyugue', $social->nombre_conyugue) }}">
                            @error('nombre_conyugue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ci_conyugue" class="form-label fw-bold">CI del Cónyuge</label>
                            <input type="text" class="form-control @error('ci_conyugue') is-invalid @enderror"
                                id="ci_conyugue" name="ci_conyugue" value="{{ old('ci_conyugue', $social->ci_conyugue) }}">
                            @error('ci_conyugue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="aplic_ley850_estado_social_fuente" class="form-label fw-bold">Aplicación Ley 850 -
                                Estado Social Fuente</label>
                            <input type="text"
                                class="form-control @error('aplic_ley850_estado_social_fuente') is-invalid @enderror"
                                id="aplic_ley850_estado_social_fuente" name="aplic_ley850_estado_social_fuente"
                                value="{{ old('aplic_ley850_estado_social_fuente', $social->aplic_ley850_estado_social_fuente) }}">
                            @error('aplic_ley850_estado_social_fuente')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fuente_excepcionalidad" class="form-label fw-bold">Fuente de
                                Excepcionalidad</label>
                            <input type="text"
                                class="form-control @error('fuente_excepcionalidad') is-invalid @enderror"
                                id="fuente_excepcionalidad" name="fuente_excepcionalidad"
                                value="{{ old('fuente_excepcionalidad', $social->fuente_excepcionalidad) }}">
                            @error('fuente_excepcionalidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="nombre_benef_excepcionalidad" class="form-label fw-bold">Nombre Beneficiario
                                Excepcionalidad</label>
                            <input type="text"
                                class="form-control @error('nombre_benef_excepcionalidad') is-invalid @enderror"
                                id="nombre_benef_excepcionalidad" name="nombre_benef_excepcionalidad"
                                value="{{ old('nombre_benef_excepcionalidad', $social->nombre_benef_excepcionalidad) }}">
                            @error('nombre_benef_excepcionalidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="ci_benef_excepcionalidad" class="form-label fw-bold">CI Beneficiario
                                Excepcionalidad</label>
                            <input type="text"
                                class="form-control @error('ci_benef_excepcionalidad') is-invalid @enderror"
                                id="ci_benef_excepcionalidad" name="ci_benef_excepcionalidad"
                                value="{{ old('ci_benef_excepcionalidad', $social->ci_benef_excepcionalidad) }}">
                            @error('ci_benef_excepcionalidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="estado_social_excepcionalidad" class="form-label fw-bold">Estado Social
                                Excepcionalidad</label>
                            <input type="text"
                                class="form-control @error('estado_social_excepcionalidad') is-invalid @enderror"
                                id="estado_social_excepcionalidad" name="estado_social_excepcionalidad"
                                value="{{ old('estado_social_excepcionalidad', $social->estado_social_excepcionalidad) }}">
                            @error('estado_social_excepcionalidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <hr class="border border-2 border-primary">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="fuente_reasignacion" class="form-label fw-bold">Fuente de Reasignación</label>
                            <input type="text" class="form-control @error('fuente_reasignacion') is-invalid @enderror"
                                id="fuente_reasignacion" name="fuente_reasignacion"
                                value="{{ old('fuente_reasignacion', $social->fuente_reasignacion) }}">
                            @error('fuente_reasignacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="nombre_benef_reasignacion" class="form-label fw-bold">Nombre Beneficiario
                                Reasignación</label>
                            <input type="text"
                                class="form-control @error('nombre_benef_reasignacion') is-invalid @enderror"
                                id="nombre_benef_reasignacion" name="nombre_benef_reasignacion"
                                value="{{ old('nombre_benef_reasignacion', $social->nombre_benef_reasignacion) }}">
                            @error('nombre_benef_reasignacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="ci_benef_reasignacion" class="form-label fw-bold">CI Beneficiario
                                Reasignación</label>
                            <input type="text"
                                class="form-control @error('ci_benef_reasignacion') is-invalid @enderror"
                                id="ci_benef_reasignacion" name="ci_benef_reasignacion"
                                value="{{ old('ci_benef_reasignacion', $social->ci_benef_reasignacion) }}">
                            @error('ci_benef_reasignacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="estado_social_reasignacion" class="form-label fw-bold">Estado Social
                                Reasignación</label>
                            <input type="text"
                                class="form-control @error('estado_social_reasignacion') is-invalid @enderror"
                                id="estado_social_reasignacion" name="estado_social_reasignacion"
                                value="{{ old('estado_social_reasignacion', $social->estado_social_reasignacion) }}">
                            @error('estado_social_reasignacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <hr class="border border-2 border-primary">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="fuente_sustitucion" class="form-label fw-bold">Fuente de Sustitución</label>
                            <input type="text" class="form-control @error('fuente_sustitucion') is-invalid @enderror"
                                id="fuente_sustitucion" name="fuente_sustitucion"
                                value="{{ old('fuente_sustitucion', $social->fuente_sustitucion) }}">
                            @error('fuente_sustitucion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="nombre_sustitucion" class="form-label fw-bold">Nombre Sustitución</label>
                            <input type="text" class="form-control @error('nombre_sustitucion') is-invalid @enderror"
                                id="nombre_sustitucion" name="nombre_sustitucion"
                                value="{{ old('nombre_sustitucion', $social->nombre_sustitucion) }}">
                            @error('nombre_sustitucion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="ci_benf_sustitucion" class="form-label fw-bold">CI Beneficiario Sustitución</label>
                            <input type="text" class="form-control @error('ci_benf_sustitucion') is-invalid @enderror"
                                id="ci_benf_sustitucion" name="ci_benf_sustitucion"
                                value="{{ old('ci_benf_sustitucion', $social->ci_benf_sustitucion) }}">
                            @error('ci_benf_sustitucion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="estado_social_sustitucion" class="form-label fw-bold">Estado Social
                                Sustitución</label>
                            <input type="text"
                                class="form-control @error('estado_social_sustitucion') is-invalid @enderror"
                                id="estado_social_sustitucion" name="estado_social_sustitucion"
                                value="{{ old('estado_social_sustitucion', $social->estado_social_sustitucion) }}">
                            @error('estado_social_sustitucion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <hr class="border border-2 border-primary">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre_beneficiario_final" class="form-label fw-bold">Nombre del Beneficiario
                                Final</label>
                            <input type="text"
                                class="form-control @error('nombre_beneficiario_final') is-invalid @enderror"
                                id="nombre_beneficiario_final" name="nombre_beneficiario_final"
                                value="{{ old('nombre_beneficiario_final', $social->nombre_beneficiario_final) }}">
                            @error('nombre_beneficiario_final')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ci_beneficiario_final" class="form-label fw-bold">CI del Beneficiario
                                Final</label>
                            <input type="text"
                                class="form-control @error('ci_beneficiario_final') is-invalid @enderror"
                                id="ci_beneficiario_final" name="ci_beneficiario_final"
                                value="{{ old('ci_beneficiario_final', $social->ci_beneficiario_final) }}">
                            @error('ci_beneficiario_final')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nom_cony_benef_final" class="form-label fw-bold">Nombre del Cónyuge del
                                Beneficiario Final</label>
                            <input type="text"
                                class="form-control @error('nom_cony_benef_final') is-invalid @enderror"
                                id="nom_cony_benef_final" name="nom_cony_benef_final"
                                value="{{ old('nom_cony_benef_final', $social->nom_cony_benef_final) }}">
                            @error('nom_cony_benef_final')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ci_conyu_benef_final" class="form-label fw-bold">CI del Cónyuge del Beneficiario
                                Final</label>
                            <input type="text"
                                class="form-control @error('ci_conyu_benef_final') is-invalid @enderror"
                                id="ci_conyu_benef_final" name="ci_conyu_benef_final"
                                value="{{ old('ci_conyu_benef_final', $social->ci_conyu_benef_final) }}">
                            @error('ci_conyu_benef_final')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="proceso_estado_benef_final" class="form-label fw-bold">Proceso Estado del
                                Beneficiario Final</label>
                            <input type="text"
                                class="form-control @error('proceso_estado_benef_final') is-invalid @enderror"
                                id="proceso_estado_benef_final" name="proceso_estado_benef_final"
                                value="{{ old('proceso_estado_benef_final', $social->proceso_estado_benef_final) }}">
                            @error('proceso_estado_benef_final')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="estado_social_benef_final" class="form-label fw-bold">Estado Social del
                                Beneficiario Final</label>
                            <input type="text"
                                class="form-control @error('estado_social_benef_final') is-invalid @enderror"
                                id="estado_social_benef_final" name="estado_social_benef_final"
                                value="{{ old('estado_social_benef_final', $social->estado_social_benef_final) }}">
                            @error('estado_social_benef_final')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="observacion_benef_final" class="form-label fw-bold">Observación del Beneficiario
                                Final</label>
                            <textarea class="form-control @error('observacion_benef_final') is-invalid @enderror" id="observacion_benef_final"
                                name="observacion_benef_final" rows="1">{{ old('observacion_benef_final', $social->observacion_benef_final) }}</textarea>
                            @error('observacion_benef_final')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Actualizar Datos Sociales</button>
                <button button type="button" onclick="window.open('', '_self', ''); window.close();"
                    class="btn btn-secondary">Cancelar</button>
            </div>
    </div>
    </form>
    </div>
@endsection
