<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignarController extends Controller
{
    public function index(Request $request)
    {
        $unid_habitacionaId = $request->input('unid_habitacionaId');
        $lote = $request->input('lote');
        $manzano = $request->input('manzano');

        // Obtener unidades habitacionales no asignadas
        $unidades = DB::table('unidad_habitacional as uh')
            ->leftJoin('uh_asignada as uha', 'uh.unidad_habitacional_id', '=', 'uha.unidad_habitacional_id')
            ->leftJoin('beneficiarios as b1', 'uha.beneficiario_id', '=', 'b1.beneficiario_id')
            ->leftJoin('proyectos as p', 'uh.proyecto_id', '=', 'p.proyecto_id')
            ->leftJoin('departamentos as d', 'uh.departamento_id', '=', 'd.departamento_id')
            ->whereNull('uha.uh_asignada_id')
            ->select(
                'uh.unidad_habitacional_id',
                'd.departamento',
                'p.nombre_proy',
                'uh.proyecto_id',
                'uh.departamento_id',
                'uh.manzano',
                'uh.lote',
                'uh.unidad_vecinal',
                'b1.nombres as beneficiario_nombre',
                'b1.cedula_identidad',
                'uh.proyecto_id', // Asegúrate de que `proyecto_id` esté seleccionado
                'uh.departamento_id' // Asegúrate de que `departamento_id` esté seleccionado
            )
            ->when($unid_habitacionaId, function ($query, $unid_habitacionaId) {
                return $query->whereRaw("uh.unidad_habitacional_id::TEXT LIKE ?", ["%{$unid_habitacionaId}%"]);
            })

            ->when($lote, function ($query, $lote) {
                return $query->whereRaw("uh.lote::TEXT LIKE ?", ["%{$lote}%"]);
            })

            ->when($manzano, function ($query, $manzano) {
                return $query->whereRaw("uh.manzano::TEXT LIKE ?", ["%{$manzano}%"]);
            })
            ->paginate(10);
        //return($unidades);
        // dd($unidades);


        return view('areas.asignar_act.index', compact('unidades'));
    }

    public function asignar(Request $request)
    {
        // Validar los campos requeridos
        $request->validate([
            'unidad_habitacional_id' => 'required|exists:unidad_habitacional,unidad_habitacional_id',
            'beneficiario_id' => 'required|exists:beneficiarios,beneficiario_id',
        ]);

        // Obtener los datos de la unidad (proyecto y departamento)
        $unidad = DB::table('unidad_habitacional')
            ->where('unidad_habitacional_id', $request->unidad_habitacional_id)
            ->select('proyecto_id', 'departamento_id')
            ->first();

        if (!$unidad) {
            return back()->withErrors(['unidad_habitacional_id' => 'Unidad no encontrada.']);
        }

        // Insertar en uh_asignada
        DB::table('uh_asignada')->insert([
            'unidad_habitacional_id' => $request->unidad_habitacional_id,
            'beneficiario_id' => $request->beneficiario_id,
            'proyecto_id' => $unidad->proyecto_id,
            'departamento_id' => $unidad->departamento_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('asignar_act.formulario', ['id' => $request->unidad_habitacional_id])
            ->with('success', 'Unidad habitacional asignada correctamente.');
    }




    public function formulario($uh_asignada)
    {
        $unidad = DB::table('unidad_habitacional as uh')
            ->leftJoin('uh_asignada as uha', 'uh.unidad_habitacional_id', '=', 'uha.unidad_habitacional_id')
            ->leftJoin('departamentos as d', 'uh.departamento_id', '=', 'd.departamento_id')
            ->leftJoin('proyectos as p', 'uh.proyecto_id', '=', 'p.proyecto_id')
            ->where('uh.unidad_habitacional_id', $uh_asignada)
            ->select(
                'uh.unidad_habitacional_id',
                'uh.manzano',
                'uh.lote',
                'uh.unidad_vecinal',
                'uh.proyecto_id',
                'uh.departamento_id',
                'd.departamento',
                'p.nombre_proy'
            )
            ->first();

        $beneficiario = DB::table('beneficiarios as b')
            ->leftJoin('uh_asignada as uha', 'b.beneficiario_id', '=', 'uha.beneficiario_id')
            ->whereNull('uha.beneficiario_id') // Solo los que no están asignados
            ->select('b.*')
            ->get();

        return view('areas.asignar_act.asignar', [
            'unidades' => [$unidad], // Solo uno, pero estructura como array
            'beneficiario' => $beneficiario
        ]);
    }
}
