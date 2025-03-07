@extends('layouts.app')

@section('content')
<div class="custom-container mt-4 p-4 bg-light border rounded shadow-md">

    <div style="display: flex; justify-content: center; align-items: center; height: 10vh;" id="step1">
        <h5>MODIFICACIÓN DATOS DEL BENEFICIARIO</h5>
    </div>

    <div class="custom-container">
        <div class="row mb-3 align-items-center">
            <!-- Primera columna -->
            <div class="col-3 col-md-3 col-lg-3">
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombres:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
            </div>

            <!-- Segunda columna -->
            <div class="col-3 col-md-3 col-lg-3">
                <div class="form-group">
                    <label for="apellido" class="form-label">Apellido Paterno:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
            </div>

            <!-- Primera columna (siguiente fila) -->
            <div class="col-3 col-md-3 col-lg-3">
                <div class="form-group">
                    <label for="apellido" class="form-label">Apellido Materno:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
            </div>

            <div class="col-3 col-md-3 col-lg-3">
                <div class="form-group">
                    <label for="telefono" class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="telefono" name="telefono" required>
                </div>
            </div>

            <div class="col-3 col-md-3 col-lg-3">
                <div class="form-group">
                    <label for="apellido" class="form-label">Cedula Identidad:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
            </div>

            <div class="col-3 col-md-3 col-lg-3">
                <div class="form-group">
                    <label for="telefono" class="form-label">Expedido en:</label>
                    <select class="form-input" id="" name="">
                       <option value="1">CH</option>
                       <option value="2">LP</option>
                       <option value="3">CB</option>
                       <option value="4">OR</option>
                       <option value="5">PT</option>
                       <option value="6">TJ</option>
                       <option value="7">SC</option>
                       <option value="8">BE</option>
                       <option value="9">PA</option>
                       <option value="10">QR</option>
                    </select>
                </div>
            </div>

            <div class="col-3 col-md-3 col-lg-3">
                <div class="form-group">
                  <label for="opciones" class="form-label">Elige una opción:</label>
                  <select class="form-input" id="opciones" name="opciones">
                     <option value="opcion1">Femenino</option>
                     <option value="opcion2">Masculino</option>
                 </select>
                </div>
            </div>

            <div class="col-3 col-md-3 col-lg-3">
                <div class="form-group">
                   <label for="telefono" class="form-label">Telefono / Celular:</label>
                   <input type="text" class="form-control" id="telefono" name="telefono" required>
               </div>
            </div>



        </div>
    </div>




</div>
@endsection
