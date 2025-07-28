@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Editar Beneficiario</h4>

    <form action="{{ route('beneficiarios.update', $beneficiario->id_soc) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="unid_hab_id" value="{{ $beneficiario->unid_hab_id }}">

        <div class="mb-3">
            <label for="departamento" class="form-label">Departamento</label>
            <input type="text" class="form-control" value="{{ $beneficiario->departamento }}" disabled>
        </div>

        <div class="mb-3">
            <label for="nombre_beneficiario_final" class="form-label">Nombre del Beneficiario</label>
            <input type="text" class="form-control" value="{{ $beneficiario->nombre_beneficiario_final }}" disabled>
        </div>

        <div class="mb-3">
            <label for="telefono_final" class="form-label">Teléfono Social</label>
            <input type="text" name="telefono_final" id="telefono_final" class="form-control"
                value="{{ old('telefono_final', $beneficiario->telefono_final) }}"
                pattern="^(\d{8,9})(-\d{8,9})*$"
                placeholder="Ej: 78945612-71234567">
        </div>

        <div class="mb-3">
            <label for="fono" class="form-label">Teléfono Créditos</label>
            <input type="text" name="fono" id="fono" class="form-control"
                value="{{ old('fono', $beneficiario->fono) }}"
                pattern="^(\d{8,9})(-\d{8,9})*$"
                placeholder="Ej: 78945612-71234567">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="{{ route('beneficiarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
