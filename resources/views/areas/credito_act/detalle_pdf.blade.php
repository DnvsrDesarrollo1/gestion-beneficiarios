<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Beneficiario</title>
    <style>
        * {
            font-family: DejaVu Sans, sans-serif;
            font-size: 9.5px;
        }

        h4 {
            text-align: center;
            margin-bottom: 12px;
        }

        .section-title {
            background-color: #e07e7e;
            border-left: 5px solid #a94442;
            padding: 6px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th, td {
            border: 1px solid #999;
            padding: 4px 6px;
            vertical-align: top;
            text-align: left;
        }

        th {
            background-color: #f9f9f9;
            font-weight: bold;
        }

        td[colspan="3"] {
            white-space: pre-line;
        }
    </style>
</head>
<body>

    <h4>Detalle del Beneficiario</h4>

    <div class="section-title">Datos Personales</div>
    <table>
        <tr>
            <th>Nombre Completo</th>
            <td>{{ $detalle->nombres }}</td>
            <th>Cédula de Identidad</th>
            <td>{{ $detalle->cedula_identidad }}</td>
        </tr>
        <tr>
            <th>Estado Civil</th>
            <td>{{ $detalle->estado_civil ?? '-' }}</td>
            <th>Teléfono</th>
            <td>{{ $detalle->telefono ?? '-' }}</td>
        </tr>
    </table>

    <div class="section-title">Unidad Habitacional</div>
    <table>
        <tr>
            <th>Departamento</th>
            <td>{{ $detalle->departamento }}</td>
            <th>Proyecto</th>
            <td>{{ $detalle->nombre_proy }}</td>
        </tr>
        <tr>
            <th>Manzano</th>
            <td>{{ $detalle->manzano }}</td>
            <th>Lote</th>
            <td>{{ $detalle->lote }}</td>
        </tr>
        <tr>
            <th>Unidad Vecinal</th>
            <td>{{ $detalle->unidad_vecinal }}</td>
            <th></th>
            <td></td>
        </tr>
    </table>

    <div class="section-title">Datos del Crédito</div>
    <table>
        <tr>
            <th style="width: 120px;">Código de Préstamo</th>
            <td>{{ $detalle->cod_prestamo }}</td>
            <th style="width: 120px;">Estado Cartera</th>
            <td>{{ $detalle->estado_cartera }}</td>
        </tr>
        <tr>
            <th>Entidad Financiera</th>
            <td>{{ $detalle->entidad_financiera }}</td>
            <th>Código Promotor</th>
            <td>{{ $detalle->cod_promotor }}</td>
        </tr>
        <tr>
            <th>Código Cristo Rey</th>
            <td>{{ $detalle->cod_cristorey }}</td>
            <th>Código Fondesif</th>
            <td>{{ $detalle->cod_fondesif }}</td>
        </tr>
        <tr>
            <th>Código SMP</th>
            <td>{{ $detalle->cod_smp }}</td>
            <th>Monto Crédito</th>
            <td>{{ number_format($detalle->monto_credito, 2) }}</td>
        </tr>
        <tr>
            <th>Total Activado</th>
            <td>{{ number_format($detalle->total_activado, 2) }}</td>
            <th>Gastos Judiciales</th>
            <td>{{ number_format($detalle->gastos_judiciales, 2) }}</td>
        </tr>
        <tr>
            <th>Saldo Crédito</th>
            <td>{{ number_format($detalle->saldo_credito, 2) }}</td>
            <th>Monto Recuperado</th>
            <td>{{ number_format($detalle->monto_recuperado, 2) }}</td>
        </tr>
        <tr>
            <th>Fecha Activación</th>
            <td>{{ $detalle->fecha_activacion }}</td>
            <th>Tasa de Interés</th>
            <td>{{ $detalle->tasa_interes }}%</td>
        </tr>
        <tr>
            <th>Plazo del Crédito</th>
            <td>{{ $detalle->plazo_credito }} meses</td>
            <th>Observaciones</th>
            <td colspan="3">{{ $detalle->observaciones }}</td>
        </tr>
    </table>

</body>
</html>


