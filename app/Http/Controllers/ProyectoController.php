<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{

    public function index()
    {

        $datos_proy = DB::table('proyectos as p')
            ->select(
                'p.proyecto_id',
                'd.departamento_id',
                'p.nombre_proy',
                'p.cant_uh',
                'p.num_acta',
                'p.estado_proy',
                'p.modalidad',
                'p.fecha_ini_obra',
                'p.fecha_fin_obra',
                'p.viviends_conclui',
                'p.componente',
                'p.provincia',
                'p.municipio',
                'p.direccion',
                'p.latitud',
                'p.longitud',
                'p.anio_relevamiento'
            )
            ->join('departamentos as d', 'p.departamento_id', '=', 'd.departamento_id')
            ->get();
        //return $datos_proy;

        return view('areas.proyecto.index', compact('datos_proy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function edit(Project $project)
    {
        $datos_proy = DB::table('proyectos as p')
            ->select(
                'p.proyecto_id',
                'd.departamento_id',
                'p.nombre_proy',
                'p.cant_uh',
                'p.num_acta',
                'p.estado_proy',
                'p.modalidad',
                'p.fecha_ini_obra',
                'p.fecha_fin_obra',
                'p.viviends_conclui',
                'p.componente',
                'p.provincia',
                'p.municipio',
                'p.direccion',
                'p.latitud',
                'p.longitud',
                'p.anio_relevamiento'
            )
            ->join('departamentos as d', 'p.departamento_id', '=', 'd.departamento_id')
            ->first();
        //return $datos_proy;
        //$proyecto = DB::table('proyectos')->select('proyecto_id', 'nombre_proy')->get();
        $departamento = DB::table('departamentos')->select('departamento_id', 'departamento')->get();

         //return dd($datos_proy, $departamento);

        return view('areas.proyecto.edit', compact('datos_proy', 'departamento'));
    }


    public function update(Request $request, $proyecto_id)
    {
        // Validación de datos
        $request->validate([
            'departamento_id' => 'required|exists:departamentos,departamento_id',
            'nombre_proy' => 'required|string|max:255',
            'cant_uh' => 'required|integer',
            'num_acta' => 'nullable|string|max:50',
            'estado_proy' => 'nullable|string|max:255',
            'modalidad' => 'nullable|string|max:255',
            'fecha_ini_obra' => 'nullable|date',
            'fecha_fin_obra' => 'nullable|date|after_or_equal:fecha_ini_obra',
            'viviends_conclui' => 'nullable|integer',
            'componente' => 'nullable|string|max:255',
            'provincia' => 'nullable|string|max:255',
            'municipio' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'anio_relevamiento' => 'nullable|integer|min:1900|max:' . date('Y'),
        ]);

        // Buscar el proyecto por ID
        $proyecto = DB::table('proyectos')->where('proyecto_id', $proyecto_id)->first();

        // Verificar si el proyecto existe
        if (!$proyecto) {
            return redirect()->route('proyectos.index')->with('error', 'Proyecto no encontrado.');
        }

        // Actualizar el proyecto
        DB::table('proyectos')
            ->where('proyecto_id', $proyecto_id)
            ->update([
                'departamento_id' => $request->departamento_id,
                'nombre_proy' => $request->nombre_proy,
                'cant_uh' => $request->cant_uh,
                'num_acta' => $request->num_acta,
                'estado_proy' => $request->estado_proy,
                'modalidad' => $request->modalidad,
                'fecha_ini_obra' => $request->fecha_ini_obra,
                'fecha_fin_obra' => $request->fecha_fin_obra,
                'viviends_conclui' => $request->viviends_conclui,
                'componente' => $request->componente,
                'provincia' => $request->provincia,
                'municipio' => $request->municipio,
                'direccion' => $request->direccion,
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
                'anio_relevamiento' => $request->anio_relevamiento,
                'updated_at' => now()
            ]);

        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado correctamente.');
    }
}
