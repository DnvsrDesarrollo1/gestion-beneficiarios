@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection

@section('content')
    <div class="container">
        <h5 class="text-center mb-4">Datos del Beneficiario</h5>

        <div class="overflow-hidden">
            <div>
                @livewire('beneficiario_cel-search')
            </div>
        </div>
    </div>
@endsection
