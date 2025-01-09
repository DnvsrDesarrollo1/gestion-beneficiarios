@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection

@section('content')
<h1>Gestor de Beneficiarios</h1>
<div class="d-flex justify-content-between align-items-center">

    <div class="container">
        <a class="btn btn-primary" href="{{route('home')}}">
            Ir a lista de Beneficiarios
        </a>
    </div>
    <div class="container-fluid">
        <a class="btn btn-primary" href="{{route('extracredito')}}">
             Beneficiario Registrar celular
        </a>
    </div>
</div>

@endsection

@section('js')
@endsection
