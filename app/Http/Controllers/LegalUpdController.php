<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LegalUpdController extends Controller
{
    public function index(Request $request)
    {

        $ci_beneficiario = $request->input('ci_beneficiario');

        $lis_legal = DB::table('unidad_habitacional as uh')
            ->leftJoin('uh_asignada as uha', 'uh.unidad_habitacional_id', '=', 'uha.unidad_habitacional_id')
            ->leftJoin('beneficiarios as b1', 'uha.beneficiario_id', '=', 'b1.beneficiario_id')
            ->leftJoin('infor_legal as il', 'uha.uh_asignada_id', '=', 'il.uh_asignada_id')
            ->leftJoin('proyectos as p', 'uh.proyecto_id', '=', 'p.proyecto_id')
            ->leftJoin('departamentos as d', 'uh.departamento_id', '=', 'd.departamento_id')
            ->whereNotNull('uha.uh_asignada_id')
            ->select(
                'uh.unidad_habitacional_id',
                'uha.uh_asignada_id',
                'b1.nombres',
                'b1.cedula_identidad',
                'd.departamento',
                'p.nombre_proy',
                'uh.manzano',
                'uh.lote',
                'uh.unidad_vecinal',
                'il.levanta_grav_dev_doc',
                'il.observado_ley850',
                'il.notificacion_intencion',
                'il.notificacion_contractual',
                'il.folio_aevivienda',
                'il.elab_min_cont_test',
                'il.observaciones2',
                'il.inicio_reasig_sustit',
                'il.nuevo_beneficiario',
                'il.ci_nuevo_benef',
                'il.minuta_testimonio',
                'il.observaciones3',

            )
            ->when($ci_beneficiario, function ($query, $ci_beneficiario) {
                return $query->whereRaw("b1.cedula_identidad::TEXT LIKE ?", ["%{$ci_beneficiario}%"]);
            })
            ->paginate(10); // Para paginar los resultados

        //return $lis_legal;
        //dd( $lis_legal);

        return view('areas.legal_act.index', compact('lis_legal'));
    }
}
