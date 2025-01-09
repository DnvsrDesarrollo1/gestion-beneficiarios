@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection

@section('content')
    <div class="container">
        <h2>Panel General de Beneficiarios2</h2>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
            <a href="{{route('socials.create')}}" class="btn btn-primary" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Agregar Beneficiario2
            </a>
        </div>
        <div class="overflow-hidden">
            <div>
                @livewire('beneficiario_cel-search')
            </div>
        </div>
    </div>
@endsection
