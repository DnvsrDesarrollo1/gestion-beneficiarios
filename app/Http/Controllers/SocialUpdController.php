<?php
namespace App\Http\Controllers;
use App\Models\Social;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SocialUpdController extends Controller
{
    public function index(Request $request)
    {
        $ci_beneficiario = $request->input('ci_beneficiario');

        $lis_social = DB::table('unidad_habitacional as uh')
            ->leftJoin('uh_asignada as uha', 'uh.unidad_habitacional_id', '=', 'uha.unidad_habitacional_id')
            ->leftJoin('beneficiarios as b1', 'uha.beneficiario_id', '=', 'b1.beneficiario_id')
            ->leftJoin('estado_social as es', 'uha.uh_asignada_id', '=', 'es.uh_asignada_id')
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
                'es.proceso_estado',
                'es.estado_social',
                'es.fuente',
                'es.observaciones'
            )
            ->when($ci_beneficiario, function ($query, $ci_beneficiario) {
                return $query->whereRaw("b1.cedula_identidad::TEXT LIKE ?", ["%{$ci_beneficiario}%"]);
            })
            ->paginate(10); // Para paginar los resultados

        //return $lis_social;
        //dd($lis_social);

        return view('areas.social_act.index', compact('lis_social'));
    }

    public function edit($uh_asignada_id)
    {
        $unidad_habitacional = DB::table('unidad_habitacional as uh')
            ->leftJoin('uh_asignada as uha', 'uh.unidad_habitacional_id', '=', 'uha.unidad_habitacional_id')
            ->leftJoin('beneficiarios as b1', 'uha.beneficiario_id', '=', 'b1.beneficiario_id')
            ->leftJoin('estado_social as es', 'uha.uh_asignada_id', '=', 'es.uh_asignada_id')
            ->leftJoin('proyectos as p', 'uh.proyecto_id', '=', 'p.proyecto_id')
            ->leftJoin('departamentos as d', 'uh.departamento_id', '=', 'd.departamento_id')
            ->where('uha.uh_asignada_id', $uh_asignada_id)
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
                'es.proceso_estado',
                'es.estado_social',
                'es.fuente',
                'es.observaciones'
            )
            ->first();
        // Traer departamentos y proyectos si son necesarios para selects
        $proyecto = DB::table('proyectos')->select('proyecto_id', 'nombre_proy')->get();
        $departamento = DB::table('departamentos')->select('departamento_id', 'departamento')->get();

        if (!$unidad_habitacional) {
            return redirect()->route('social_act.index')->with('error', 'Unidad habitacional no encontrada.');
        }

        return view('areas.social_act.edit', compact('unidad_habitacional', 'departamento', 'proyecto'));
    }


    public function update(Request $request, $uh_asignada_id)
    {
        // Validación de los datos, incluyendo 'proceso_estado'
        $request->validate([
            'estado_social' => 'required|string|max:50',
            'fuente' => 'nullable|string|max:255',
            'observaciones' => 'nullable|string',
            'proceso_estado' => 'nullable|string|max:255', // Asegúrate de incluir 'proceso_estado' en la validación
        ]);

        // Buscar el registro en la base de datos
        $estado_social = Social::where('uh_asignada_id', $uh_asignada_id)->first();

        if (!$estado_social) {
            return redirect()->route('social_act.index')->with('error', 'No se encontró el registro.');
        }

        // Actualizar los valores
        $estado_social->update([
            'estado_social' => $request->estado_social,
            'fuente' => $request->fuente,
            'observaciones' => $request->observaciones,
            'proceso_estado' => $request->proceso_estado,  // Actualiza el 'proceso_estado'
            'updated_at' => now(), // Fecha de actualización
        ]);

       return redirect()->route('social_act.edit', $uh_asignada_id)
                ->with('success', 'Unidad Habitacional actualizada correctamente.');
    }
}
