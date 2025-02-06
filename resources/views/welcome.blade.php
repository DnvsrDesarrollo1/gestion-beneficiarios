@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection

@section('content')

<div class="container my-4">
    <div class="card p-4 shadow-sm">
        <h5 class="text-center mb-4">Gestión de Beneficiarios</h5>
        <div class="d-grid gap-3">

            <a class="btn btn-lg text-white" href="{{ route('home') }}" style="background-color: #173844; border-color: #4CAF50;">
               <i class="bi bi-list-ul"></i> Ir a lista de Beneficiarios
            </a>
            <a class="btn btn-lg text-white" href="{{route('extracredito')}}" style="background-color: #173844; border-color: #4CAF50;">
                <i class="bi bi-pencil-square"></i> Actualizar número de Teléfono / Celular
            </a>

        </div>
    </div>
</div>

@endsection


@section('js')
@endsection

