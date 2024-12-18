@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection

@section('content')
    <div class="container">
        <h2>Panel General de Beneficiarios</h2>

        <div class="overflow-hidden">
            @livewire('beneficiario-search')
        </div>
    </div>
@endsection
