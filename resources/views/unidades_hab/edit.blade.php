@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Unidad Habitacional</h2>
    @foreach ($unidades as $unidad_habitacional)

    <form action="{{ route('unidades.update', $unidades->unidad_habitacional_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="manzano" class="form-label">Manzano</label>
            <input type="text" class="form-control" id="manzano" name="manzano" value="{{ $unidad_habitacional->manzano }}" required>
        </div>

        <div class="mb-3">
            <label for="lote" class="form-label">Lote</label>
            <input type="text" class="form-control" id="lote" name="lote" value="{{ $unidad_habitacional->lote }}" required>
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea class="form-control" id="observaciones" name="observaciones" required>{{ $unidad_habitacional->observaciones }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('unidades_hab.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endforeach
</div>
@endsection
