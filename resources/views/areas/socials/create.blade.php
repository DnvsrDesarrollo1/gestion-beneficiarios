@extends('layouts.app')
@section('css')
    <style>
        @keyframes highlightCopied {
            0% {
                background-color: #ffffff;
            }

            50% {
                background-color: #90EE90;
            }

            /* Light green */
            100% {
                background-color: #ffffff;
            }
        }

        .highlight-copied {
            animation: highlightCopied 1s ease;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="mb-4">
            <h2>Crear Beneficiario</h2>
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

        <form action="{{ route('socials.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0">Información del Beneficiario</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="departamento" class="form-label">Departamento</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('departamento') is-invalid @enderror" id="departamento"
                                        name="departamento" value="" required>
                                    @error('departamento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="nombre_proyecto" class="form-label">Nombre del Proyecto</label>
                                    <select class="form-select @error('proyecto') is-invalid @enderror" id="proyecto"
                                        name="nombre_proyecto" required>
                                        @foreach ($proyectos as $p)
                                            <option value="{{ $p->nombre_proy }}">{{ $p->nombre_proy }}</option>
                                        @endforeach
                                    </select>
                                    @error('proyecto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="manzano" class="form-label">Manzano</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('manzano') is-invalid @enderror" id="manzano"
                                        name="manzano">
                                    @error('manzano')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="lote" class="form-label">Lote</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('lote') is-invalid @enderror" id="lote"
                                        name="lote">
                                    @error('lote')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="unidad_vecinal" class="form-label">Unidad Vecinal</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('unidad_vecinal') is-invalid @enderror"
                                        id="unidad_vecinal" name="unidad_vecinal">
                                    @error('unidad_vecinal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0">Información del Titular</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nombre_titular" class="form-label">Nombre del Titular</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('nombre_titular') is-invalid @enderror"
                                        id="nombre_titular" name="nombre_titular" required>
                                    @error('nombre_titular')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="ci_titular" class="form-label">CI del Titular</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('ci_titular') is-invalid @enderror" id="ci_titular"
                                        name="ci_titular" required>
                                    @error('ci_titular')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="ext_ci_titular" class="form-label">Extensión</label>
                                    <select class="form-select @error('ext_ci_titular') is-invalid @enderror"
                                        id="ext_ci_titular" name="ext_ci_titular">
                                        @foreach ($expeds as $e)
                                            <option value="{{ $e->extension }}">{{ $e->extension }}</option>
                                        @endforeach
                                    </select>
                                    @error('ext_ci_titular')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0">Información del Cónyuge</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nombre_conyugue" class="form-label">Nombre del Cónyuge</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('nombre_conyugue') is-invalid @enderror"
                                        id="nombre_conyugue" name="nombre_conyugue">
                                    @error('nombre_conyugue')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="ci_conyugue" class="form-label">CI del Cónyuge</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('ci_conyugue') is-invalid @enderror" id="ci_conyugue"
                                        name="ci_conyugue">
                                    @error('ci_conyugue')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="ext_ci_cony" class="form-label">Extensión</label>
                                    <select class="form-select @error('ext_ci_cony') is-invalid @enderror"
                                        id="ext_ci_cony" name="ext_ci_cony">
                                        @foreach ($expeds as $e)
                                            <option value="{{ $e->extension }}">{{ $e->extension }}</option>
                                        @endforeach
                                    </select>
                                    @error('ext_ci_cony')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0">Información Adicional</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="aplic_ley850_estado_social_fuente" class="form-label">Aplicación Ley 850 -
                                        Estado Social Fuente</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('aplic_ley850_estado_social_fuente') is-invalid @enderror"
                                        id="aplic_ley850_estado_social_fuente" name="aplic_ley850_estado_social_fuente">
                                    @error('aplic_ley850_estado_social_fuente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- EXCEPCIONALIDADES -->
                    <hr class="border border-2 border-success mb-4">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Información de Excepcionalidad</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="fuente_excepcionalidad" class="form-label">Fuente de
                                        Excepcionalidad</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('fuente_excepcionalidad') is-invalid @enderror"
                                            id="fuente_excepcionalidad" name="fuente_excepcionalidad">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="copyFuenteExcepcionalidad" title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('fuente_excepcionalidad')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="nombre_benef_excepcionalidad" class="form-label">Nombre Beneficiario
                                        Excepcionalidad</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('nombre_benef_excepcionalidad') is-invalid @enderror"
                                            id="nombre_benef_excepcionalidad" name="nombre_benef_excepcionalidad">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="copyNombreExcepcionalidad" title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('nombre_benef_excepcionalidad')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="ci_benef_excepcionalidad" class="form-label">CI Beneficiario
                                        Excepcionalidad</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('ci_benef_excepcionalidad') is-invalid @enderror"
                                            id="ci_benef_excepcionalidad" name="ci_benef_excepcionalidad">
                                        <select class="form-select @error('ext_ci_excep') is-invalid @enderror"
                                            id="ext_ci_excep" name="ext_ci_excep" style="max-width: 80px;">
                                            @foreach ($expeds as $e)
                                                <option value="{{ $e->extension }}">{{ $e->extension }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="copyCIExcepcionalidad" title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('ci_benef_excepcionalidad')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('ext_ci_excep')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="estado_social_excepcionalidad" class="form-label">Estado Social
                                        Excepcionalidad</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('estado_social_excepcionalidad') is-invalid @enderror"
                                            id="estado_social_excepcionalidad" name="estado_social_excepcionalidad">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="copyEstadoSocialExcepcionalidad" title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('estado_social_excepcionalidad')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- REASIGNACIONES -->
                    <hr class="border border-2 border-success">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Información de Reasignaciones</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="fuente_reasignacion" class="form-label">Fuente de
                                        Reasignacion</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('fuente_reasignacion') is-invalid @enderror"
                                            id="fuente_reasignacion" name="fuente_reasignacion">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="copyFuenteReasignacion" title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('fuente_reasignacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="nombre_benef_reasignacion" class="form-label">Nombre Beneficiario
                                        Reasignacion</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('nombre_benef_reasignacion') is-invalid @enderror"
                                            id="nombre_benef_reasignacion" name="nombre_benef_reasignacion">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="copyNombreReasignacion" title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('nombre_benef_reasignacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="ci_benef_reasignacion" class="form-label">CI Beneficiario
                                        Reasignacion</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('ci_benef_reasignacion') is-invalid @enderror"
                                            id="ci_benef_reasignacion" name="ci_benef_reasignacion">
                                        <select class="form-select @error('ext_ci_reasig') is-invalid @enderror"
                                            id="ext_ci_reasig" name="ext_ci_reasig" style="max-width: 80px;">
                                            @foreach ($expeds as $e)
                                                <option value="{{ $e->extension }}">{{ $e->extension }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-outline-secondary" type="button" id="copyCIreasignacion"
                                            title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('ci_benef_reasignacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('ext_ci_reasig')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="estado_social_reasignacion" class="form-label">Estado Social
                                        Reasignacion</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('estado_social_reasignacion') is-invalid @enderror"
                                            id="estado_social_reasignacion" name="estado_social_reasignacion">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="copyEstadoSocialReasignacion" title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('estado_social_reasignacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SUSTITUCIONES -->
                    <hr class="border border-2 border-success">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Información de Sustituciones</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="fuente_sustitucion" class="form-label">Fuente de
                                        Sustitucion</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('fuente_sustitucion') is-invalid @enderror"
                                            id="fuente_sustitucion" name="fuente_sustitucion">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="copyFuenteSustitucion" title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('fuente_sustitucion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="nombre_sustitucion" class="form-label">Nombre Beneficiario
                                        Sustitucion</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('nombre_sustitucion') is-invalid @enderror"
                                            id="nombre_sustitucion" name="nombre_sustitucion">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="copyNombreSustitucion" title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('nombre_sustitucion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="ci_benf_sustitucion" class="form-label">CI Beneficiario
                                        Sustitucion</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('ci_benf_sustitucion') is-invalid @enderror"
                                            id="ci_benf_sustitucion" name="ci_benf_sustitucion">
                                        <select class="form-select @error('ext_ci_sust') is-invalid @enderror"
                                            id="ext_ci_sust" name="ext_ci_sust" style="max-width: 80px;">
                                            @foreach ($expeds as $e)
                                                <option value="{{ $e->extension }}">{{ $e->extension }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-outline-secondary" type="button" id="copyCISustitucion"
                                            title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('ci_benef_sustitucion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('ext_ci_reasig')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="estado_social_sustitucion" class="form-label">Estado Social
                                        Sustitucion</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('estado_social_sustitucion') is-invalid @enderror"
                                            id="estado_social_sustitucion" name="estado_social_sustitucion">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="copyEstadoSocialsustitucion" title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('estado_social_sustitucion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CAMBIO TITULAR -->
                    <hr class="border border-2 border-success">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Información de Cambio Titular</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="fuente_cambio_titular" class="form-label">Fuente de
                                        Cambio Titular</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('fuente_cambio_titular') is-invalid @enderror"
                                            id="fuente_cambio_titular" name="fuente_cambio_titular">
                                        <button class="btn btn-outline-secondary" type="button" id="copyFuenteCambio"
                                            title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('fuente_cambio_titular')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="nombre_cambio_titular" class="form-label">Nombre Beneficiario
                                        Cambio Titular</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('nombre_cambio_titular') is-invalid @enderror"
                                            id="nombre_cambio_titular" name="nombre_cambio_titular">
                                        <button class="btn btn-outline-secondary" type="button" id="copyNombreCambio"
                                            title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('nombre_cambio_titular')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="ci_cambio_titular" class="form-label">CI Beneficiario
                                        Cambio Titular</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('ci_cambio_titular') is-invalid @enderror"
                                            id="ci_cambio_titular" name="ci_cambio_titular">
                                        <select class="form-select @error('ext_ci_sust') is-invalid @enderror"
                                            id="ext_ci_sust" name="ext_ci_sust" style="max-width: 80px;">
                                            @foreach ($expeds as $e)
                                                <option value="{{ $e->extension }}">{{ $e->extension }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-outline-secondary" type="button" id="copyCICambio"
                                            title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('ci_cambio_titular')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('ext_ci_reasig')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="estado_social_cambiotitular" class="form-label">Estado Social
                                        Cambio Titular</label>
                                    <div class="input-group">
                                        <input autocomplete="on" type="text"
                                            class="form-control @error('estado_social_cambiotitular') is-invalid @enderror"
                                            id="estado_social_cambiotitular" name="estado_social_cambiotitular">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="copyEstadoSocialCambio" title="Copiar a campo Final">
                                            <svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <rect x="4" y="8" width="12" height="12" rx="1"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round">
                                                    </rect>
                                                    <path
                                                        d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-dasharray="2 2"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('estado_social_cambiotitular')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FINALES -->
                    <hr class="border border-2 border-success">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Información Final</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nombre_beneficiario_final" class="form-label">Nombre del Beneficiario
                                        Final</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('nombre_beneficiario_final') is-invalid @enderror"
                                        id="nombre_beneficiario_final" name="nombre_beneficiario_final">
                                    @error('nombre_beneficiario_final')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="ci_beneficiario_final" class="form-label">CI del Beneficiario
                                        Final</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('ci_beneficiario_final') is-invalid @enderror"
                                        id="ci_beneficiario_final" name="ci_beneficiario_final">
                                    @error('ci_beneficiario_final')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="ext_ci_final" class="form-label">Extensión</label>
                                    <select class="form-select @error('ext_ci_final') is-invalid @enderror"
                                        id="ext_ci_final" name="ext_ci_final">
                                        @foreach ($expeds as $e)
                                            <option value="{{ $e->extension }}">{{ $e->extension }}</option>
                                        @endforeach
                                    </select>
                                    @error('ext_ci_final')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <label for="nom_cony_benef_final" class="form-label">Nombre del Cónyuge del
                                        Beneficiario Final</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('nom_cony_benef_final') is-invalid @enderror"
                                        id="nom_cony_benef_final" name="nom_cony_benef_final">
                                    @error('nom_cony_benef_final')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="ci_conyu_benef_final" class="form-label">CI del Cónyuge del Beneficiario
                                        Final</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('ci_conyu_benef_final') is-invalid @enderror"
                                        id="ci_conyu_benef_final" name="ci_conyu_benef_final">
                                    @error('ci_conyu_benef_final')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="ext_ci_final_cony" class="form-label">Extensión</label>
                                    <select class="form-select @error('ext_ci_final_cony') is-invalid @enderror"
                                        id="ext_ci_final_cony" name="ext_ci_final_cony">
                                        @foreach ($expeds as $e)
                                            <option value="{{ $e->extension }}">{{ $e->extension }}</option>
                                        @endforeach
                                    </select>
                                    @error('ext_ci_final_cony')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-3 mt-3">
                                <div class="col-md-4">
                                    <label for="proceso_estado_benef_final" class="form-label">Proceso Estado del
                                        Beneficiario Final</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('proceso_estado_benef_final') is-invalid @enderror"
                                        id="proceso_estado_benef_final" name="proceso_estado_benef_final">
                                    @error('proceso_estado_benef_final')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="estado_social_benef_final" class="form-label">Estado Social del
                                        Beneficiario Final</label>
                                    <input autocomplete="on" type="text"
                                        class="form-control @error('estado_social_benef_final') is-invalid @enderror"
                                        id="estado_social_benef_final" name="estado_social_benef_final">
                                    @error('estado_social_benef_final')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="observacion_benef_final" class="form-label">Observación del Beneficiario
                                        Final</label>
                                    <textarea class="form-control @error('observacion_benef_final') is-invalid @enderror" id="observacion_benef_final"
                                        name="observacion_benef_final" rows="2">
                                    </textarea>
                                    @error('observacion_benef_final')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="hstack gap-3">
                        <button type="submit" class="btn btn-primary ms-auto">Guardar y Crear</button>
                        <div class="vr"></div>
                        <button button type="button" onclick="window.open('', '_self', ''); window.close();"
                            class="btn btn-secondary">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const copyFields = [{
                    source: 'fuente_excepcionalidad',
                    target: 'observacion_benef_final',
                    button: 'copyFuenteExcepcionalidad'
                },
                {
                    source: 'nombre_benef_excepcionalidad',
                    target: 'nombre_beneficiario_final',
                    button: 'copyNombreExcepcionalidad'
                },
                {
                    source: 'ci_benef_excepcionalidad',
                    target: 'ci_beneficiario_final',
                    button: 'copyCIExcepcionalidad'
                },
                {
                    source: 'estado_social_excepcionalidad',
                    target: 'estado_social_benef_final',
                    button: 'copyEstadoSocialExcepcionalidad'
                },
                // REASIGNACIÓN DE BENEFICIARIOS
                {
                    source: 'fuente_reasignacion',
                    target: 'observacion_benef_final',
                    button: 'copyFuenteReasignacion'
                },
                {
                    source: 'nombre_benef_reasignacion',
                    target: 'nombre_beneficiario_final',
                    button: 'copyNombreReasignacion'
                },
                {
                    source: 'ci_benef_reasignacion',
                    target: 'ci_beneficiario_final',
                    button: 'copyCIReasignacion'
                },
                {
                    source: 'estado_social_reasignacion',
                    target: 'estado_social_benef_final',
                    button: 'copyEstadoSocialReasignacion'
                },
                // SUSTITUCION DE BENEFICIARIOS
                {
                    source: 'fuente_sustitucion',
                    target: 'observacion_benef_final',
                    button: 'copyFuenteSustitucion'
                },
                {
                    source: 'nombre_sustitucion',
                    target: 'nombre_beneficiario_final',
                    button: 'copyNombreSustitucion'
                },
                {
                    source: 'ci_benf_sustitucion',
                    target: 'ci_beneficiario_final',
                    button: 'copyCISustitucion'
                },
                {
                    source: 'estado_social_sustitucion',
                    target: 'estado_social_benef_final',
                    button: 'copyEstadoSocialSustitucion'
                },
                // CAMBIO TITULAR
                {
                    source: 'fuente_cambio_titular',
                    target: 'observacion_benef_final',
                    button: 'copyFuenteCambio'
                },
                {
                    source: 'nombre_cambio_titular',
                    target: 'nombre_beneficiario_final',
                    button: 'copyNombreCambio'
                },
                {
                    source: 'ci_cambio_titular',
                    target: 'ci_beneficiario_final',
                    button: 'copyCICambio'
                },
                {
                    source: 'estado_social_cambiotitular',
                    target: 'estado_social_benef_final',
                    button: 'copyEstadoSocialCambio'
                }
            ];

            copyFields.forEach(field => {
                const sourceInput = document.getElementById(field.source);
                const targetInput = document.getElementById(field.target);
                const copyButton = document.getElementById(field.button);

                if (sourceInput && targetInput && copyButton) {
                    copyButton.addEventListener('click', function() {
                        targetInput.value = sourceInput.value;

                        targetInput.classList.add('highlight-copied');
                        setTimeout(() => {
                            targetInput.classList.remove('highlight-copied');
                        }, 1000);
                    });
                }
            });
        });
    </script>
@endsection
