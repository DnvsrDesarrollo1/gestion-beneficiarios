<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SocialUpdController extends Controller
{
    public function index(Request $request)
    {
        $ci_beneficiario = $request->input('ci_beneficiario');

        $lis_social = DB::table('uh_asignada as uha')
        ->select(
            'b.nombres',
            'b.cedula_identidad',
            'uh.departamento_id',
            'uh.proyecto_id',
            'uh.manzano',
            'uh.lote',
            'uh.unidad_vecinal',
            'es.proceso_estado',
            'es.estado_social',
            'es.fuente',
            'es.observaciones'
        )
        ->leftJoin('beneficiarios as b', 'uha.beneficiario_id', '=', 'b.beneficiario_id')
        ->leftJoin('unidad_habitacional as uh', 'uha.unidad_habitacional_id', '=', 'uh.unidad_habitacional_id')
        ->leftJoin('estado_social as es', function ($join) {
            $join->on('uha.uh_asignada_id', '=', 'es.uh_asignada_id')
                 ->where('es.estado_reg', '=', 'U');
        })
        ->when($ci_beneficiario, function ($query, $ci_beneficiario) {
            return $query->whereRaw("b.cedula_identidad::TEXT LIKE ?", ["%{$ci_beneficiario}%"]);
        })
        ->paginate(10); // Paginación de 10 resultados

        return view('areas.social_act.index', compact('lis_social'));
    }

    public function edit($uh_asignada_id)
    {
        $lis_social = DB::table('uh_asignada as uha')
        ->select(
            'b.nombres',
            'b.cedula_identidad',
            'uh.departamento_id',
            'uh.proyecto_id',
            'uh.manzano',
            'uh.lote',
            'uh.unidad_vecinal',
            'es.proceso_estado',
            'es.estado_social',
            'es.fuente',
            'es.observaciones'
        )
        ->leftJoin('beneficiarios as b', 'uha.beneficiario_id', '=', 'b.beneficiario_id')
        ->leftJoin('unidad_habitacional as uh', 'uha.unidad_habitacional_id', '=', 'uh.unidad_habitacional_id')
        ->leftJoin('estado_social as es', function ($join) {
            $join->on('uha.uh_asignada_id', '=', 'es.uh_asignada_id')
                 ->where('es.estado_reg', '=', 'U');
        })

        ->where('uh_asignada_id', $uh_asignada_id)
            ->first();

        if (!$lis_social) {
            return redirect()->route('social_act.index')->with('error', 'Estado social no actualizado.');
        }


        return view('areas.social_act.index', compact('lis_social'));

    }


}
