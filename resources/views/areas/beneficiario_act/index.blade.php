<div class="container mt-4 p-4 bg-light border rounded shadow-md">
    <h5 class="text-center">LISTA DE BENEFICIARIOS</h5>


    <table class="table table-striped mt-3">
        <thead class="table-dark">
            <tr>

                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Cédula Identidad</th>
                <th>Expedido</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listar as $beneficiarios)
            <tr>

                <td>{{ $beneficiarios->nombres }}</td>
                <td>{{ $beneficiarios->apellido_paterno }}</td>
                <td>{{ $beneficiarios->apellido_materno }}</td>
                <td>{{ $beneficiarios->cedula_identidad }}</td>
                <td>{{ $beneficiarios->extension_ci }}</td>
                <td>{{ $beneficiarios->telefono }}</td>
                <td>
                    <a href="{{ route('beneficiario_act.edit', $beneficiarios->beneficiario_id) }}" class="btn btn-warning">Editar</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

