@extends('layouts.app')

@section('css')
@endsection
@section('content')
<div>
   <h5 class="text-center" style="color: #766c6f; font-family: 'Georgia', serif; font-weight: bold;">
    Reporte
   </h5>
</div>
<div>

      <table class="table table-bordered table-hover rounded overflow-hidden" style="width:100%">
         <thead class="align-middle table-dark">
            <tr>
               <th>Departamento</th>
               <th>Nombre Proyecto</th>
               <th>Registro Modificado</th>
               <th>Campo Modificado</th>
               <th>Valor Anterior Campo</th>
               <th>Valor Actual Campo</th>
               <th>Fecha y Hora</th>
            </tr>
            </thead>
            <tbody class="align-middle">
               @foreach ($reports as $vauditoria)
            <tr>
               <td>{{ $vauditoria->departamentos->departamento }}</td>
              <!-- <td>{{ $vauditoria->proyectos->nombre_proy }}</td>-->
               <td>{{ $vauditoria->registro_modifi }}</td>
               <td>{{ $vauditoria->campo_modific }}</td>
               <td>{{ $vauditoria->valor_anterior_campo }}</td>
               <td>{{ $vauditoria->valor_actual_campo }}</td>
               <td>{{ $vauditoria->fechahora }}</td>

            </tr>
                @endforeach
            </tbody>

      </table>
</div>


@endsection

