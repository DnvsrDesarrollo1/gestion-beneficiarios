@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection

@section('content')
    <div class="container">
        <h1>Panel General de Beneficiarios</h1>
        <p>Aqui podrá ver y administrar a los beneficiarios, tanto en Creditos / Social y Legal.</p>

        @livewire('beneficiario-search')
    </div>
@endsection
