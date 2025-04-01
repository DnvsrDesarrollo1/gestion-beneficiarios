<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UnidHabitacionalController extends Controller
{
    public function index(Request $request)
    {
        $unid_habitacionalId = $request->input('unid_habitacionalId');

        $unidades = DB::table('unidad_habitacional as uh')
            ->select(
                'uh.unidad_habitacional_id',
                'd.departamento',
                'p.nombre_proy',
                'uh.manzano',
                'uh.lote',
                'uh.unidad_vecinal',
                'uh.observaciones'
            )
            ->leftJoin('proyectos as p', 'uh.proyecto_id', '=', 'p.proyecto_id')
            ->leftJoin('departamentos as d', 'uh.departamento_id', '=', 'd.departamento_id')
            ->when($unid_habitacionalId, function ($query, $unid_habitacionalId) {
                return $query->whereRaw("uh.unidad_habitacional_id::TEXT LIKE ?", ["%{$unid_habitacionalId}%"]);
            })

            ->where('uh.estado_reg', 'U')
            ->orderBy('uh.unidad_habitacional_id', 'asc') // Ordenar por departamento
            ->paginate(10);
        //->get();
        //return $unidades;
        $proyecto = DB::table('proyectos')->select('proyecto_id', 'nombre_proy')->get();
        $departamento = DB::table('departamentos')->select('departamento_id', 'departamento')->get();
        //return $departamento;

        return view('areas.unidades_hab.index', compact('unidades', 'departamento', 'proyecto')); // Retorna la vista con datos paginados


    }

    public function create()
    {
        $proyecto = DB::table('proyectos')->select('proyecto_id', 'nombre_proy')->get();
        $departamento = DB::table('departamentos')->select('departamento_id', 'departamento')->get();

        return view('areas.unidades_hab.create', compact('proyecto', 'departamento'));
    }

    // Método para mostrar el formulario de edición
    public function edit($unidad_habitacional_id)
    {
        // Buscar la unidad habitacional con su proyecto y departamento
        $unidades = DB::table('unidad_habitacional as uh')
            ->select(
                'uh.unidad_habitacional_id',
                'uh.manzano',
                'uh.lote',
                'uh.unidad_vecinal',
                'uh.observaciones',
                'uh.proyecto_id',
                'uh.departamento_id',
                'p.nombre_proy',
                'd.departamento'
            )
            ->leftJoin('proyectos as p', 'uh.proyecto_id', '=', 'p.proyecto_id')
            ->leftJoin('departamentos as d', 'uh.departamento_id', '=', 'd.departamento_id')
            ->where('uh.unidad_habitacional_id', $unidad_habitacional_id)
            ->first();
        //return dd($unidades);

        $proyecto = DB::table('proyectos')->select('proyecto_id', 'nombre_proy')->get();
        $departamento = DB::table('departamentos')->select('departamento_id', 'departamento')->get();


        // Verificar si la unidad existe
        if (!$unidades) {
            return redirect()->route('unidades_hab.index')->with('error', 'Unidad Habitacional no encontrada.');
        }

        //return dd($unidades, $proyecto, $departamento);
        // Retornar la vista con los datos de la unidad
        return view('areas.unidades_hab.edit', compact('unidades', 'departamento', 'proyecto'));
    }

    public function update(Request $request, $unidad_habitacional_id)
    {
        // Validación de datos
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,proyecto_id',
            'departamento_id' => 'required|exists:departamentos,departamento_id',
            'manzano' => 'required|string|max:10',
            'lote' => 'required|string|max:10',
            'unidad_vecinal' => 'nullable|string|max:50',
            'observaciones' => 'nullable|string|max:255',
        ]);

        // Verificar si la unidad habitacional existe
        $unidades = DB::table('unidad_habitacional')->where('unidad_habitacional_id', $unidad_habitacional_id)->first();

        if (!$unidades) {
            return redirect()->route('unidades_hab.index')->with('error', 'Unidad Habitacional no encontrada.');
        }

        // Intentar actualizar los datos
        $actualizar = DB::table('unidad_habitacional')
            ->where('unidad_habitacional_id', $unidad_habitacional_id)
            ->update([
                'manzano' => $request->manzano,
                'lote' => $request->lote,
                'unidad_vecinal' => $request->unidad_vecinal,
                'observaciones' => $request->observaciones,
                'proyecto_id' => $request->proyecto_id,
                'departamento_id' => $request->departamento_id,
                'updated_at' => now(), // Fecha de actualización
            ]);

        // Redireccionar con mensaje adecuado
        if ($actualizar) {
            return redirect()->route('unidades_hab.edit', $unidad_habitacional_id)
                ->with('success', 'Unidad Habitacional actualizada correctamente.');
        }
    }
}
