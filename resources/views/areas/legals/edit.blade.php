@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4">
            <h2>Actualizar Datos Legales</h2>
            <div class="d-flex align-items-center gap-2">
                <svg width="25px" height="25px" viewBox="-102.4 -102.4 1228.80 1228.80" fill="#000000" class="icon"
                    version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M574.4 590.4l-3.2 7.2 1.6 8L608 740.8l8 33.6 28-20L760 672l5.6-4 2.4-6.4 220-556.8 8.8-22.4-22.4-8.8-140-55.2-21.6-8-8.8 20.8-229.6 559.2z m244-528l140 55.2-13.6-30.4-220 556.8 8-10.4-116 82.4 36 13.6-33.6-135.2-0.8 15.2 229.6-560-29.6 12.8z"
                            fill=""></path>
                        <path
                            d="M872 301.6l-107.2-40c-7.2-2.4-10.4-10.4-8-17.6l8-20.8c2.4-7.2 10.4-10.4 17.6-8l107.2 40c7.2 2.4 10.4 10.4 8 17.6l-8 20.8c-2.4 7.2-10.4 10.4-17.6 8zM718.4 645.6l-107.2-40c-7.2-2.4-10.4-10.4-8-17.6l8-20.8c2.4-7.2 10.4-10.4 17.6-8l107.2 40c7.2 2.4 10.4 10.4 8 17.6l-8 20.8c-2.4 7.2-10.4 10.4-17.6 8zM900.8 224l-107.2-40c-7.2-2.4-10.4-10.4-8-17.6l8-20.8c2.4-7.2 10.4-10.4 17.6-8l107.2 40c7.2 2.4 10.4 10.4 8 17.6l-8 20.8c-2.4 7.2-10.4 11.2-17.6 8z"
                            fill=""></path>
                        <path
                            d="M930.4 965.6H80c-31.2 0-56-24.8-56-56V290.4c0-31.2 24.8-56 56-56h576c13.6 0 24 10.4 24 24s-10.4 24-24 24H80c-4 0-8 4-8 8v619.2c0 4 4 8 8 8h850.4c4 0 8-4 8-8V320c0-13.6 10.4-24 24-24s24 10.4 24 24v589.6c0 31.2-24.8 56-56 56z"
                            fill=""></path>
                        <path
                            d="M366.4 490.4H201.6c-13.6 0-25.6-11.2-25.6-25.6 0-13.6 11.2-25.6 25.6-25.6h165.6c13.6 0 25.6 11.2 25.6 25.6-0.8 14.4-12 25.6-26.4 25.6zM409.6 584h-208c-13.6 0-25.6-11.2-25.6-25.6 0-13.6 11.2-25.6 25.6-25.6h208c13.6 0 25.6 11.2 25.6 25.6-0.8 14.4-12 25.6-25.6 25.6zM441.6 676.8h-240c-13.6 0-25.6-11.2-25.6-25.6 0-13.6 11.2-25.6 25.6-25.6h240c13.6 0 25.6 11.2 25.6 25.6-0.8 14.4-12 25.6-25.6 25.6z"
                            fill=""></path>
                    </g>
                </svg>
                <span>Ultima actualizacion hecha por: {{ $legal->user->name }} ({{ $legal->updated_at }})</span>
            </div>
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

        <form action="{{ route('legals.update', $legal) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <!-- Grupo 1 -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="card-title">Información del Beneficiario</h5>
                        </div>
                        <div class="card-body">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="departamento" class="form-label">Departamento</label>
                                    <input type="text" class="form-control @error('departamento') is-invalid @enderror"
                                        id="departamento" name="departamento"
                                        value="{{ old('departamento', $legal->departamento) }}" required>
                                    @error('departamento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="proyecto" class="form-label">Proyecto</label>
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

                                <div class="col-md-4">
                                    <label for="nro" class="form-label">Numero de Proyecto</label>
                                    <input type="text" class="form-control @error('nro') is-invalid @enderror"
                                        id="nro" name="nro" value="{{ old('nro', $legal->nro) }}" required>
                                    @error('nro')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="nombre_apellidos" class="form-label">Nombre y Apellidos</label>
                                    <input type="text"
                                        class="form-control @error('nombre_apellidos') is-invalid @enderror"
                                        id="nombre_apellidos" name="nombre_apellidos"
                                        value="{{ old('nombre_apellidos', $legal->nombre_apellidos) }}" required>
                                    @error('nombre_apellidos')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="cedula_identidad" class="form-label">Cédula de Identidad</label>
                                    <input type="text"
                                        class="form-control @error('cedula_identidad') is-invalid @enderror"
                                        id="cedula_identidad" name="cedula_identidad"
                                        value="{{ old('cedula_identidad', $legal->cedula_identidad) }}" required>
                                    @error('cedula_identidad')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title">Detalles de la Propiedad</h5>
                        </div>
                        <div class="card-body">

                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="manzano" class="form-label">Manzano</label>
                                    <input type="text" class="form-control @error('manzano') is-invalid @enderror"
                                        id="manzano" name="manzano" value="{{ old('manzano', $legal->manzano) }}">
                                    @error('manzano')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="lote" class="form-label">Lote</label>
                                    <input type="text" class="form-control @error('lote') is-invalid @enderror"
                                        id="lote" name="lote" value="{{ old('lote', $legal->lote) }}">
                                    @error('lote')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="nro_folio_real" class="form-label">Nro. Folio Real</label>
                                    <input type="text"
                                        class="form-control @error('nro_folio_real') is-invalid @enderror"
                                        id="nro_folio_real" name="nro_folio_real"
                                        value="{{ old('nro_folio_real', $legal->nro_folio_real) }}">
                                    @error('nro_folio_real')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="titulacion" class="form-label">Titulación</label>
                                    <input type="text" class="form-control @error('titulacion') is-invalid @enderror"
                                        id="titulacion" name="titulacion"
                                        value="{{ old('titulacion', $legal->titulacion) }}">
                                    @error('titulacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="observaciones1" class="form-label">Observaciones</label>
                                    <textarea class="form-control @error('observaciones1') is-invalid @enderror" id="observaciones1"
                                        name="observaciones1" rows="3">{{ old('observaciones1', $legal->observaciones1) }}</textarea>
                                    @error('observaciones1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grupo 2 -->
                    <hr class="border border-2 border-primary">
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Información Legal</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="levantam_grav_dev_documentos" class="form-label">Levantamiento de Gravamen
                                        / Devolución de Documentos</label>
                                    <input type="text"
                                        class="form-control @error('levantam_grav_dev_documentos') is-invalid @enderror"
                                        id="levantam_grav_dev_documentos" name="levantam_grav_dev_documentos"
                                        value="{{ old('levantam_grav_dev_documentos', $legal->levantam_grav_dev_documentos) }}">
                                    @error('levantam_grav_dev_documentos')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="observado_ley850" class="form-label">Observado Ley 850</label>
                                    <input type="text"
                                        class="form-control @error('observado_ley850') is-invalid @enderror"
                                        id="observado_ley850" name="observado_ley850"
                                        value="{{ old('observado_ley850', $legal->observado_ley850) }}">
                                    @error('observado_ley850')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="notificación_intención" class="form-label">Notificación de
                                        Intención</label>
                                    <input type="text"
                                        class="form-control @error('notificación_intención') is-invalid @enderror"
                                        id="notificación_intención" name="notificación_intención"
                                        value="{{ old('notificación_intención', $legal->notificación_intención) }}">
                                    @error('notificación_intención')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="notificación_res_contractual" class="form-label">Notificación de
                                        Resolución Contractual</label>
                                    <input type="text"
                                        class="form-control @error('notificación_res_contractual') is-invalid @enderror"
                                        id="notificación_res_contractual" name="notificación_res_contractual"
                                        value="{{ old('notificación_res_contractual', $legal->notificación_res_contractual) }}">
                                    @error('notificación_res_contractual')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="elab_minut_res_contrc_testim" class="form-label">Elaboración de Minuta /
                                        Testimonio</label>
                                    <input type="text"
                                        class="form-control @error('elab_minut_res_contrc_testim') is-invalid @enderror"
                                        id="elab_minut_res_contrc_testim" name="elab_minut_res_contrc_testim"
                                        value="{{ old('elab_minut_res_contrc_testim', $legal->elab_minut_res_contrc_testim) }}">
                                    @error('elab_minut_res_contrc_testim')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="folio_nombre_aevivienda" class="form-label">Folio Nombre
                                        AEVIVIENDA</label>
                                    <input type="text"
                                        class="form-control @error('folio_nombre_aevivienda') is-invalid @enderror"
                                        id="folio_nombre_aevivienda" name="folio_nombre_aevivienda"
                                        value="{{ old('folio_nombre_aevivienda', $legal->folio_nombre_aevivienda) }}">
                                    @error('folio_nombre_aevivienda')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="observaciones2" class="form-label">Observaciones</label>
                                    <textarea class="form-control @error('observaciones2') is-invalid @enderror" id="observaciones2"
                                        name="observaciones2" rows="3">{{ old('observaciones2', $legal->observaciones2) }}</textarea>
                                    @error('observaciones2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grupo 3 -->
                    <hr class="border border-2 border-primary">
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Reasignación / Sustitución</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="inicio_reasignación_sustitución" class="form-label">Inicio de Reasignación
                                        / Sustitución</label>
                                    <input type="text"
                                        class="form-control @error('inicio_reasignación_sustitución') is-invalid @enderror"
                                        id="inicio_reasignación_sustitución" name="inicio_reasignación_sustitución"
                                        value="{{ old('inicio_reasignación_sustitución', $legal->inicio_reasignación_sustitución) }}">
                                    @error('inicio_reasignación_sustitución')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="nuevo_beneficiario" class="form-label">Nuevo Beneficiario</label>
                                    <input type="text"
                                        class="form-control @error('nuevo_beneficiario') is-invalid @enderror"
                                        id="nuevo_beneficiario" name="nuevo_beneficiario"
                                        value="{{ old('nuevo_beneficiario', $legal->nuevo_beneficiario) }}">
                                    @error('nuevo_beneficiario')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ci_nuevo_benef" class="form-label">CI Nuevo Beneficiario</label>
                                    <input type="text"
                                        class="form-control @error('ci_nuevo_benef') is-invalid @enderror"
                                        id="ci_nuevo_benef" name="ci_nuevo_benef"
                                        value="{{ old('ci_nuevo_benef', $legal->ci_nuevo_benef) }}">
                                    @error('ci_nuevo_benef')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="minuta_testimonio_folio" class="form-label">Minuta / Testimonio /
                                        Folio</label>
                                    <input type="text"
                                        class="form-control @error('minuta_testimonio_folio') is-invalid @enderror"
                                        id="minuta_testimonio_folio" name="minuta_testimonio_folio"
                                        value="{{ old('minuta_testimonio_folio', $legal->minuta_testimonio_folio) }}">
                                    @error('minuta_testimonio_folio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="observaciones3" class="form-label">Observaciones</label>
                                    <textarea class="form-control @error('observaciones3') is-invalid @enderror" id="observaciones3"
                                        name="observaciones3" rows="3">{{ old('observaciones3', $legal->observaciones3) }}</textarea>
                                    @error('observaciones3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="hstack gap-3">
                        <button type="submit" class="btn btn-primary ms-auto">Actualizar Datos Sociales</button>
                        <div class="vr"></div>
                        <button button type="button" onclick="window.open('', '_self', ''); window.close();"
                            class="btn btn-secondary">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
