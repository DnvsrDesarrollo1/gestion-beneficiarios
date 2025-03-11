<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UnidHabitacionalController extends Controller
{
    public function index()
    {
        $unidades = DB::table('unidad_habitacional as uh')
            ->select(
                'uh.unidad_habitacional_id',
                'd.departamento',
                'p.nombre_proy',
                'uh.manzano',
                'uh.lote',
                'uh.observaciones'
            )
            ->leftJoin('proyectos as p', 'uh.proyecto_id', '=', 'p.proyecto_id')
            ->leftJoin('departamentos as d', 'uh.departamento_id', '=', 'd.departamento_id')
            ->where('uh.estado_reg', 'U')
            ->orderBy('d.departamento', 'asc') // Agregamos orden por departamento
            ->get();

        return view('unidades_hab.index', compact('unidades')); // Retorna a la vista

    }

    // Método para mostrar el formulario de edición
    public function edit($id)
    {
        $unidades = DB::table('unidad_habitacional')->where('unidad_habitacional_id', $id)->first();
        //return $unidad_habitacional;
        // Si no se encuentra la unidad, redirigir con un mensaje de error
        /*if (!$unidad_habitacional) {
        return redirect()->route('unidades.index')->with('error', 'Unidad Habitacional no encontrada.');
        }*/

        return view('unidades_hab.edit', compact('unidades'));
    }

    // Método para actualizar los datos en la base de datos
    public function update(Request $request, $id)
    {
        DB::table('unidad_habitacional')
            ->where('unidad_habitacional_id', $id)
            ->update([
                'manzano' => $request->manzano,
                'lote' => $request->lote,
                'observaciones' => $request->observaciones,
            ]);

        return redirect()->route('unidades_hab.index')->with('success', 'Unidad Habitacional actualizada correctamente');
    }
}

