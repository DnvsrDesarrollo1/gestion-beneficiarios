<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf; // Asegúrate de tener instalado barryvdh/laravel-dompdf


class CreditoUpdController extends Controller
{

    public function index(Request $request)
    {
        $ci_beneficiario = $request->input('ci_beneficiario');
        $cod_prestamo = $request->input('cod_prestamo');

        //mostrara las unidades asignadas con creditos y sin creditos
        $detalle = DB::table('unidad_habitacional as uh')
            ->leftJoin('uh_asignada as uha', 'uh.unidad_habitacional_id', '=', 'uha.unidad_habitacional_id')
            ->leftJoin('beneficiarios as b', 'uha.beneficiario_id', '=', 'b.beneficiario_id')
            ->leftJoin('creditos as cr', 'uha.uh_asignada_id', '=', 'cr.uh_asignada_id')
            ->leftJoin('proyectos as p', 'uh.proyecto_id', '=', 'p.proyecto_id')
            ->leftJoin('departamentos as d', 'uh.departamento_id', '=', 'd.departamento_id')
            ->whereNotNull('uha.uh_asignada_id')  // Aseguramos que solo mostramos unidades asignadas
            ->whereNotNull('cr.uh_asignada_id') //Aseguramos que solo se mostra a las personas con credito
            ->select(
                'uh.unidad_habitacional_id',
                'uha.uh_asignada_id',
                'b.nombres',
                'b.cedula_identidad',
                'b.telefono',
                'd.departamento',
                'p.nombre_proy',
                'uh.manzano',
                'uh.lote',
                'uh.unidad_vecinal',
                'cr.creditos_id',
                'cr.cod_prestamo',
                'cr.estado_cartera',
                'cr.entidad_financiera',
                'cr.cod_promotor',
                'cr.cod_cristorey',
                'cr.cod_fondesif',
                'cr.cod_smp',
                'cr.monto_credito',
                'cr.total_activado',
                'cr.gastos_judiciales',
                'cr.saldo_credito',
                'cr.monto_recuperado',
                'cr.fecha_activacion',
                'cr.plazo_credito',
                'cr.tasa_interes',
                'cr.observaciones'
            )

            ->when($ci_beneficiario, function ($query, $ci_beneficiario) {
                return $query->whereRaw("b.cedula_identidad::TEXT LIKE ?", ["%{$ci_beneficiario}%"]);
            })

            ->when($cod_prestamo, function ($query, $cod_prestamo) {
                return $query->whereRaw("cr.cod_prestamo::TEXT LIKE ?", ["%{$cod_prestamo}%"]);
            })
            ->paginate(10);
        return view('areas.credito_act.index', compact('detalle'));
    }


    public function obtenerDetalle($uh_asignada_id)
    {
        // Aquí se obtiene el detalle de la base de datos
        $detalle = DB::table('unidad_habitacional as uh')
            ->leftJoin('uh_asignada as uha', 'uh.unidad_habitacional_id', '=', 'uha.unidad_habitacional_id')
            ->leftJoin('beneficiarios as b', 'uha.beneficiario_id', '=', 'b.beneficiario_id')
            ->leftJoin('creditos as cr', 'uha.uh_asignada_id', '=', 'cr.uh_asignada_id')
            ->leftJoin('proyectos as p', 'uh.proyecto_id', '=', 'p.proyecto_id')
            ->leftJoin('departamentos as d', 'uh.departamento_id', '=', 'd.departamento_id')
            ->where('uha.uh_asignada_id', $uh_asignada_id)
            ->select(
                'uh.unidad_habitacional_id',
                'uha.uh_asignada_id',
                'b.nombres',
                'b.cedula_identidad',
                'b.telefono',
                'd.departamento',
                'p.nombre_proy',
                'uh.manzano',
                'uh.lote',
                'uh.unidad_vecinal',
                'cr.creditos_id',
                'cr.cod_prestamo',
                'cr.estado_cartera',
                'cr.entidad_financiera',
                'cr.cod_promotor',
                'cr.cod_cristorey',
                'cr.cod_fondesif',
                'cr.cod_smp',
                'cr.monto_credito',
                'cr.total_activado',
                'cr.gastos_judiciales',
                'cr.saldo_credito',
                'cr.monto_recuperado',
                'cr.fecha_activacion',
                'cr.plazo_credito',
                'cr.tasa_interes',
                'cr.observaciones'
            )
            ->first();

        return $detalle; // Devuelve el detalle
    }

     public function verPDF($uh_asignada_id)
    {
        // Llamada al método obtenerDetalle
        $detalle = $this->obtenerDetalle($uh_asignada_id);

        if (!$detalle) {
            return redirect()->route('credito_act.index')->withErrors('No se encontró el detalle del beneficiario.');
        }

        // Carga la vista del PDF
        $pdf = Pdf::loadView('areas.credito_act.detalle_pdf', compact('detalle'));

        // Muestra el PDF en el navegador
        return $pdf->stream("detalle_beneficiario_{$uh_asignada_id}.pdf");
    }

}
