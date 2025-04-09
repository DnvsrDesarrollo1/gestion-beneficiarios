<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignarController extends Controller
{
    public function index()
    {
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
                'uh.manzano',
                'uh.lote',
                'uh.unidad_vecinal',
                'b1.nombres as beneficiario_nombre',
                'b1.cedula_identidad'
            )
            ->get();
            //return($unidades);

        return view('areas.asignar_act.index', compact('unidades'));
    }
}
