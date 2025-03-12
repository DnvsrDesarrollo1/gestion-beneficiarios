@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Unidad Habitacional</h2>


    <form action="{{ route('unidades_hab.update', $unidades->unidad_habitacional_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="departamento" class="form-label">Departamento</label>

            <select class="form-input" id="departamento" name="departamento_id">
                <option value="1" {{ $unidades->departamento_id == 'CHUQUISACA' ? 'selected' : '' }}>CHUQUISACA</option>
                <option value="2" {{ $unidades->departamento_id == 'LA PAZ' ? 'selected' : '' }}>LA PAZ</option>
                <option value="3" {{ $unidades->departamento_id == 'COCHABAMBA' ? 'selected' : '' }}>COCHABAMBA</option>
                <option value="4" {{ $unidades->departamento_id == 'ORURO' ? 'selected' : '' }}>ORURO</option>
                <option value="5" {{ $unidades->departamento_id == 'POTOSÍ' ? 'selected' : '' }}>POTOSÍ</option>
                <option value="6" {{ $unidades->departamento_id == 'TARIJA' ? 'selected' : '' }}>TARIJA</option>
                <option value="7" {{ $unidades->departamento_id == 'SANTA CRUZ' ? 'selected' : '' }}>SANTA CRUZ</option>
                <option value="8" {{ $unidades->departamento_id == 'BENI' ? 'selected' : '' }}>BENI</option>
                <option value="9"{{ $unidades->departamento_id == 'PANDO' ? 'selected' : '' }}>PANDO</option>
             </select>
        </div>

        <div class="mb-3">
            <label for="manzano" class="form-label">Manzano</label>
            <input type="text" class="form-control" id="manzano" name="manzano" value="{{ $unidades->manzano }}" required>
        </div>

        <div class="mb-3">
            <label for="lote" class="form-label">Lote</label>
            <input type="text" class="form-control" id="lote" name="lote" value="{{ $unidades->lote }}" required>
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea class="form-control" id="observaciones" name="observaciones" required>{{ $unidades->observaciones }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('unidades_hab.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

</div>
@endsection
