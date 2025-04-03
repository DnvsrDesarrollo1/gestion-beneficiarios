<?php

namespace App\Http\Controllers;

use App\Models\Usignad;
use App\Models\Social;
use App\Models\Unit;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SocialUpdController extends Controller
{
    public function index(Request $request)
    {

        $ci_beneficiario = $request->input('ci_beneficiario');
        $lis_social = Usignad::select(
            'uh_asignada.uh_asignada_id',
            'beneficiarios.beneficiario_id',
            'beneficiarios.nombres',
            'beneficiarios.cedula_identidad',
            'unidad_habitacional.unidad_habitacional_id',
            'unidad_habitacional.departamento_id',
            'unidad_habitacional.proyecto_id',
            'unidad_habitacional.manzano',
            'unidad_habitacional.lote',
            'unidad_habitacional.unidad_vecinal',
            'estado_social.estado_social_id',
            'estado_social.proceso_estado',
            'estado_social.estado_social',
            'estado_social.fuente',
            'estado_social.observaciones'
        )
            ->leftJoin('beneficiarios', 'uh_asignada.beneficiario_id', '=', 'beneficiarios.beneficiario_id')
            ->leftJoin('unidad_habitacional', 'uh_asignada.unidad_habitacional_id', '=', 'unidad_habitacional.unidad_habitacional_id')
            ->leftJoin('estado_social', 'uh_asignada.uh_asignada_id', '=', 'estado_social.uh_asignada_id')
            ->when($ci_beneficiario, function ($query, $ci_beneficiario) {
                return $query->whereRaw("beneficiarios.cedula_identidad::TEXT LIKE ?", ["%{$ci_beneficiario}%"]);
            })
            ->paginate(10); // Para paginar los resultados

        //return $lis_social;

        return view('areas.social_act.index', compact('lis_social'));
    }

    public function edit($uh_asignada_id)
    {
        $lis_social = Usignad::select(
            'uh_asignada.uh_asignada_id',
            'beneficiarios.beneficiario_id',
            'beneficiarios.nombres',
            'beneficiarios.cedula_identidad',
            'unidad_habitacional.unidad_habitacional_id',
            'unidad_habitacional.departamento_id',
            'unidad_habitacional.proyecto_id',
            'unidad_habitacional.manzano',
            'unidad_habitacional.lote',
            'unidad_habitacional.unidad_vecinal',
            'estado_social.estado_social_id',
            'estado_social.proceso_estado',
            'estado_social.estado_social',
            'estado_social.fuente',
            'estado_social.observaciones'
        )
            ->leftJoin('beneficiarios', 'uh_asignada.beneficiario_id', '=', 'beneficiarios.beneficiario_id')
            ->leftJoin('unidad_habitacional', 'uh_asignada.unidad_habitacional_id', '=', 'unidad_habitacional.unidad_habitacional_id')
            ->leftJoin('estado_social', 'uh_asignada.uh_asignada_id', '=', 'estado_social.uh_asignada_id')

            ->where('uh_asignada.uh_asignada_id', $uh_asignada_id)
            ->first();
        //return dd($lis_social);

        if (!$lis_social) {
            return redirect()->route('social_act.index')->with('error', 'Estado social no actualizado.');
        }
         return view('areas.social_act.index', compact('lis_social'));
    }


    public function update(Request $request, $uh_asignada_id)
    {
        // ✅ Validación de datos
        $request->validate([
            'departamento_id'  => 'required|exists:departamentos,departamento_id',
            'proyecto_id'      => 'required|exists:proyectos,proyecto_id',
            'manzano'          => 'required|string|max:10',
            'lote'             => 'required|string|max:10',
            'unidad_vecinal'   => 'nullable|string|max:50',
            'proceso_estado'   => 'required|string|max:50',
            'estado_social'    => 'required|string|max:50',
            'fuente'           => 'required|string|max:50',
            'observaciones'    => 'nullable|string|max:255',
        ]);

        // ✅ Buscar la unidad asignada
        $uh_asignada = Usignad::find($uh_asignada_id);

        if (!$uh_asignada) {
            return redirect()->route('social_act.index')->with('error', 'Unidad habitacional no encontrada.');
        }

        // ✅ Actualizar los datos de la unidad habitacional
        // Aquí actualizamos la relación de `unidad_habitacional` de forma correcta.
        $unidad_habitacional = $uh_asignada->unidadHabitacional; // Relación cargada previamente
        if ($unidad_habitacional) {
            $unidad_habitacional->update([
                'manzano'         => $request->manzano,
                'lote'            => $request->lote,
                'unidad_vecinal'  => $request->unidad_vecinal,
                'proyecto_id'     => $request->proyecto_id,
                'departamento_id' => $request->departamento_id,
                'updated_at'      => now(), // Fecha de actualización
            ]);
        }

        // ✅ Actualizar el estado social si existe
        $estado_social = Social::where('uh_asignada_id', $uh_asignada_id)->first();

        if ($estado_social) {
            $estado_social->update([
                'proceso_estado' => $request->proceso_estado,
                'estado_social'  => $request->estado_social,
                'fuente'         => $request->fuente,
                'observaciones'  => $request->observaciones,
            ]);
        }

        return redirect()->route('social_act.edit', $uh_asignada_id)
            ->with('success', 'Estado social actualizado correctamente.');
    }
}
