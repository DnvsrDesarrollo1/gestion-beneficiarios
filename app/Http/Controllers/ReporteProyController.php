<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ReporteProyController extends Controller
{
    public function reporteProyectos()
    {
        $proyectos = DB::select("
            SELECT p.departamento_id, d.departamento, COUNT(DISTINCT p.nombre_proy) AS total_proyectos
            FROM proyectos p
            JOIN departamentos d ON d.departamento_id = p.departamento_id
            WHERE p.departamento_id IN (1,2,3,4,5,6,7,8,9)
              AND p.nombre_proy IS NOT NULL
            GROUP BY p.departamento_id, d.departamento
            ORDER BY p.departamento_id
        ");

        $totalGeneral = DB::selectOne("
            SELECT COUNT(DISTINCT nombre_proy) AS total_proyectos
            FROM proyectos
            WHERE departamento_id IN (1,2,3,4,5,6,7,8,9)
              AND nombre_proy IS NOT NULL
        ");

        // Retornamos solo la vista sin PDF
        return view('reportes_proy.proyectos', [
            'proyectos' => $proyectos,
            'totalGeneral' => $totalGeneral
        ]);
    }
}
