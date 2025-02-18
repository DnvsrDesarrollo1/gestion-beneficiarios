<?php

namespace App\Http\Controllers;

use App\Models\Audit;
//use App\Models\Department;
//use App\Models\Project;
//use App\Models\User2;
use Illuminate\Http\Request;
//use Barrydh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {

        $search = $request->input('search'); // Obtiene la cadena de búsqueda desde la solicitud

        $reports = DB::table('vauditoria as aud')
            ->join('users as us', 'aud.usuario_id', '=', 'us.id')
            ->join('departamentos as d', DB::raw("substring(aud.registro_modifi, '\.(.)')"), '=', DB::raw("CAST(d.departamento_id AS TEXT)"))
            ->join('proyectos as p', DB::raw("substring(aud.registro_modifi, '\.(...)')"), '=', 'p.proyecto_id')
            ->select('d.departamento', 'p.nombre_proy', 'aud.registro_modifi', 'aud.campo_modific', 'aud.valor_anterior_campo', 'aud.valor_actual_campo', 'us.name', 'aud.fechahora')
            ->when($search, function ($query, $search) {
                return $query->where('p.nombre_proy', 'like', '%' . $search . '%');
            }) // Aplica el filtro de búsqueda si hay una cadena de búsqueda
            ->orderBy('aud.fechahora')
            ->get();

        return view('areas.reporte.index', compact('reports'));
        //$pdf = PDF::loadView('areas.reporte.pdf', compact('reports'))->setPaper('a4', 'landscape');

        //return $pdf->download('reporte.pdf');




    }
}
