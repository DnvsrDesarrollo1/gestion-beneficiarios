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

            <a class="btn btn-lg text-white" href="{{ route('poseedor.index') }}" style="background-color: #173844; border-color: #4CAF50;">
                <i class="bi bi-pencil-square"></i>Registro del telefono del Beneficiario y Registro Poseedor
            </a>
            <a class="btn btn-lg text-white" href="{{route('reporte')}}" style="background-color: #173844; border-color: #4CAF50;">
                <i class="bi bi-pencil-square"></i> Reporte de Auditoria
            </a>
            <a class="btn btn-lg text-white" href="{{ route('infproyecto') }}" style="background-color: #173844; border-color: #4CAF50;">
                <i class="bi bi-pencil-square"></i>Resumen Integral del Beneficiario: Áreas Legal, Social y Créditos
            </a>
        </div>
    </div>
</div>

@endsection



