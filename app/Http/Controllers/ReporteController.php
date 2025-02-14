<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Department;
use App\Models\Project;
use App\Models\User2;
use Illuminate\Http\Request;
//use Barrydh\DomPDF\Facade as PDF;
//use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {  //$reports = Audit::with(['user', 'department', 'project'])
        //$reports = \App\Models\Audit::with(['user', 'department'])

        //->select('department.departamento', 'project.nombre_proy', 'vauditoria.registro_modifi', 'vauditoria.campo_modific', 'vauditoria.valor_anterior_campo', 'vauditoria.valor_actual_campo', 'users.name', 'vauditoria.fechahora')
        //->select('departamentos.departamento','vauditoria.registro_modifi', 'vauditoria.campo_modific', 'vauditoria.valor_anterior_campo', 'vauditoria.valor_actual_campo','vauditoria.fechahora')
        //->join('users', 'vauditoria.user_id', '=', 'users.id')
        //->join('departamentos', \DB::raw("SUBSTRING(vauditoria.registro_modifi, '\.(.)')"), '=', 'departamentos.departamento_id')
        //->join('departamentos', DB::raw('CAST(SUBSTRING(vauditoria.registro_modifi, \'\\.(.)\') AS INTEGER)'), '=', 'departamentos.departamento_id')
        //->join('projects', \DB::raw("SUBSTRING(audits.registro_modifi, '\.(...)')"), '=', 'projects.proyecto_id')
       //->get();
        //return($reports);

        //return view('areas.reporte.index', compact('reports'));
        $reports = Department::find($id); // Ejemplo en Laravel

        if ($reports) {
            echo $reports->departamento;
        } else {
            echo "Usuario no encontrado.";
        }




    //consulta manualmente
     //$auditorias = Audit::with(['department', 'project','users'])
     //->select('departments.departamento', 'projects.nombre_proy', 'audits.registro_modifi', 'audits.campo_modific', 'audits.valor_anterior_campo', 'audits.valor_actual_campo', 'users.name', 'audits.fechahora')
    //$auditorias = DB::table('vauditoria')
    //->join('departamentos', 'vauditoria.department_id', '=', 'departamentos.id')
    //->join('proyectos', 'vauditoria.project_id', '=', 'proyecto.id')
    //->join('users', 'vauditoria.user_id', '=', 'user.id')
    //->select('departamentos.departamento', 'proyectos.nombre_proy','vauditoria.*')
    //->select('departamentos.departamento','vauditoria.*')
    //->select('departamentos.departamento')
    //->get();
     //return ($auditorias);





    }

}
