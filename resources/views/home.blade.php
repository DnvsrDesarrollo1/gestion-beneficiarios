@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow-x: hidden; /* Evita el scroll horizontal */
        }
        .full-container {
            width: 100%;
            min-height: 100vh; /* Ocupa toda la altura de la pantalla */
            padding: 20px;
        }

    </style>
@endsection

@section('content')
    <div class="container-fluid full-container">
        <h5 class="text-center mb-4">Panel General de Beneficiarios</h5>

        <div class="overflow-hidden">
            <div>
                @livewire('beneficiario-search')
            </div>
        </div>
    </div>
@endsection
