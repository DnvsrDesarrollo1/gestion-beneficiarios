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

    public function edit($uh_asignada_id)
    {

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
            ->where('il.uh_asignada_id', $uh_asignada_id)
            ->first();


        if (!$lis_legal) {
            return redirect()->route('legal_act.index')->with('error', 'Unidad habitacional no encontrada.');
        }

        return view('areas.legal_act.edit', compact('lis_legal'));
    }


    public function update(Request $request, $uh_asignada_id)
    {
        $request->validate([
            'levanta_grav_dev_doc' => 'nullable|string|max:255',
            'observado_ley850' => 'nullable|string|max:255',
            'notificacion_intencion' => 'nullable|string|max:255',
            'notificacion_contractual' => 'nullable|string|max:255',
            'folio_aevivienda' => 'nullable|string|max:255',
            'elab_min_cont_test' => 'nullable|string|max:255',
            'observaciones2' => 'nullable|string|max:255',
            'inicio_reasig_sustit' => 'nullable|string|max:255',
            'nuevo_beneficiario' => 'nullable|string|max:255',
            'ci_nuevo_benef' => 'nullable|string|max:255',
            'minuta_testimonio' => 'nullable|string|max:255',
            'observaciones3' => 'nullable|string|max:255',
        ]);

        DB::table('infor_legal')
            ->where('uh_asignada_id', $uh_asignada_id)
            ->update([
                'levanta_grav_dev_doc' => $request->levanta_grav_dev_doc,
                'observado_ley850' => $request->observado_ley850,
                'notificacion_intencion' => $request->notificacion_intencion,
                'notificacion_contractual' => $request->notificacion_contractual,
                'folio_aevivienda' => $request->folio_aevivienda,
                'elab_min_cont_test' => $request->elab_min_cont_test,
                'observaciones2' => $request->observaciones2,
                'inicio_reasig_sustit' => $request->inicio_reasig_sustit,
                'nuevo_beneficiario' => $request->nuevo_beneficiario,
                'ci_nuevo_benef' => $request->ci_nuevo_benef,
                'minuta_testimonio' => $request->minuta_testimonio,
                'observaciones3' => $request->observaciones3,
                'updated_at' => now(),
            ]);

        return redirect()->route('modulo_legal.index')->with('success', 'Información legal actualizada correctamente.');
    }
}
