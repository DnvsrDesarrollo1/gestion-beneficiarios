@extends('layouts.app')

@section('css')
    <style>
        /* Estilos para pantalla */
        .table {
            font-size: 14px;
            background-color: #f8f9fa; /* Color de fondo */
        }
        .table thead {
    background-color: #343a40; /* Color oscuro para la cabecera */
    color: rgb(219, 172, 172);
        }


        /* Estilos para impresión */
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                font-family: 'Arial', sans-serif;
                color: #000;
                margin: 0;
                padding: 15mm;
            }

            .container {
                width: 100%;
                max-width: none;
                padding: 0;
                margin: 0;
            }

            h5 {
                font-size: 16pt;
                margin-bottom: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                font-size: 9pt;
                margin-bottom: 20px;
            }

            th,
            td {
                border: 1px solid #000;
                padding: 4px 6px;
                text-align: left;
                vertical-align: middle;
            }

            th {
                background-color: #f0f0f0 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            thead {
                display: table-header-group;
            }

            tr {
                page-break-inside: avoid;
            }

            @page {
                size: landscape;
                margin: 10mm;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <!-- Encabezado del reporte -->
        <div class="text-center mb-4">
            <h5 style="color: #766c6f; font-family: 'Georgia', serif; font-weight: bold;">
                Reporte de Auditoria
            </h5>
            <p class="no-print">Fecha de generación: {{ now()->format('d/m/Y H:i:s') }}</p>
        </div>

        <!-- Formulario de búsqueda - solo visible en pantalla -->
        <div class="mb-3 no-print">
            <form method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Buscar por proyecto"
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>

        <!-- Tabla de reporte -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-danger">
                    <tr>
                        <th>Departamento</th>
                        <th>Nombre Proyecto</th>
                        <th>Registro Modificado</th>
                        <!--<th>Campo Modificado</th>-->
                        <th>Valor Anterior</th>
                        <th>Valor Actual</th>
                        <th>Usuario</th>
                        <th>Fecha y Hora</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $vauditoria)
                        <tr>
                            <td>{{ $vauditoria->departamento }}</td>
                            <td>{{ $vauditoria->nombre_proy }}</td>
                            <td>{{ $vauditoria->registro_modifi }}</td>
                            <!--<td>{{ $vauditoria->campo_modific }}</td>-->
                            <td>{{ $vauditoria->valor_anterior_campo }}</td>
                            <td>{{ $vauditoria->valor_actual_campo }}</td>
                            <td>{{ $vauditoria->name }}</td>
                            <td>{{ $vauditoria->fechahora }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Botones de acción - solo visibles en pantalla -->
        <div class="no-print mt-3">
            <button class="btn" onclick="window.print()" style="background-color: #c22749; color: white; border: none; font-weight: bold; border-radius: 5px; padding: 5px 10px;">
            Imprimir Reporte
            </button>

        </div>
    </div>
@endsection

@section('js')
    <script>
        // Agregar número de páginas al imprimir
        window.onbeforeprint = function() {
            const fecha = new Date().toLocaleDateString('es-ES');
            const pieDepagina = document.createElement('div');
            pieDepagina.style.position = 'fixed';
            pieDepagina.style.bottom = '0';
            pieDepagina.style.width = '100%';
            pieDepagina.style.textAlign = 'center';
            pieDepagina.style.fontSize = '8pt';
            pieDepagina.innerHTML = `Fecha de impresión: ${fecha} - Página `;
            document.body.appendChild(pieDepagina);
        };

        window.onafterprint = function() {
            // JS
            const pieDepagina = document.querySelector('.pie-pagina');
            if (pieDepagina) {
                pieDepagina.remove();
            }
        };
    </script>
@endsection
