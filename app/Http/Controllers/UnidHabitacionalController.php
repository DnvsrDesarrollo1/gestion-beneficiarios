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
                'd.departamento as departamento',
                'p.nombre_proy as proyecto',
                'uh.manzano',
                'uh.lote',
                'uh.unidad_vecinal',
                'uh.observaciones'
            )
            ->leftJoin('proyectos as p', 'uh.proyecto_id', '=', 'p.proyecto_id')
            ->leftJoin('departamentos as d', 'uh.departamento_id', '=', 'd.departamento_id')
            ->where('uh.estado_reg', 'U')
            ->orderBy('d.departamento', 'asc') // Agregamos orden por departamento
            ->paginate(10);
           // $unidades = UnidadHabitacional::paginate(10);

        return view('areas.unidades_hab.index', compact('unidades')); // Retorna a la vista

    }

    // Método para mostrar el formulario de edición
    public function edit($unidad_habitacional_id)
    {
        $unidades = DB::table('unidad_habitacional')->where('unidad_habitacional_id', $unidad_habitacional_id)->first();
        //return $unidades;
        return view('areas.unidades_hab.edit', compact('unidades'));
    }

    // Método para actualizar los datos en la base de datos
    public function update(Request $request, $unidad_habitacional_id)
    {
        DB::table('unidad_habitacional')
            ->where('unidad_habitacional_id', $unidad_habitacional_id)
            ->update([
                'manzano' => $request->manzano,
                'lote' => $request->lote,
                'unidad_vecinal' => $request->unidad_vecinal,
                'observaciones' => $request->observaciones,
            ]);

        return redirect()->route('areas.unidades_hab.index')->with('success', 'Unidad Habitacional actualizada correctamente');
    }
}

