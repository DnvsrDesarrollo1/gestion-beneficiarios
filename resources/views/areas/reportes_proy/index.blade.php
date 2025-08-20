@extends('layouts.app')
@section('content')
     <h5 class="text-center">Reporte por Departamento</h5>
    <table>
        <thead>
            <tr>
                <th>Departamento</th>
                <th>Total Proyectos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $p)
                <tr>
                    <td>{{ $p->departamento }}</td>
                    <td>{{ $p->total_proyectos }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Total General</th>
                <th>{{ $totalGeneral->total_proyectos }}</th>
            </tr>
        </tfoot>
    </table>
@endsection
