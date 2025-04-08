<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreditoUpdController extends Controller
{
    //public function index(Request $request)
    public function index(Request $request)
    {
        $ci_beneficiario = $request->input('ci_beneficiario');
        $cod_prestamo = $request->input('cod_prestamo');

        //mostrara las unidades asignadas con creditos y sin creditos
        $unid_con_credit = DB::table('unidad_habitacional as uh')
            ->leftJoin('uh_asignada as uha', 'uh.unidad_habitacional_id', '=', 'uha.unidad_habitacional_id')
            ->leftJoin('beneficiarios as b1', 'uha.beneficiario_id', '=', 'b1.beneficiario_id')
            ->leftJoin('creditos as cr', 'uha.uh_asignada_id', '=', 'cr.uh_asignada_id')
            ->whereNotNull('uha.uh_asignada_id')  // Aseguramos que solo mostramos unidades asignadas
            ->whereNotNull('cr.uh_asignada_id') //Aseguramos que solo se mostra a las personas con credito
            ->select(
                'uh.unidad_habitacional_id',
                'uha.uh_asignada_id',
                'b1.nombres',
                'b1.cedula_identidad',
                'uh.departamento_id',
                'uh.proyecto_id',
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
            //->get();
            ->when($ci_beneficiario, function ($query, $ci_beneficiario) {
                return $query->whereRaw("b1.cedula_identidad::TEXT LIKE ?", ["%{$ci_beneficiario}%"]);
            })

            ->when($cod_prestamo, function ($query, $cod_prestamo) {
                return $query->whereRaw("cr.cod_prestamo::TEXT LIKE ?", ["%{$cod_prestamo}%"]);
            })
            ->paginate(10);
            return view('areas.credito_act.index', compact('unid_con_credit'));
    }
}
