<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{

    public function index(Request $request)
    {  // dd($request->input('proyecto'));
        $proy = $request->input('proy', null); // Obtén lo que el usuario ingresa en el campo

        $datos_proy = DB::table('proyectos as p')
            ->select(
                'p.proyecto_id',
                'd.departamento',
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
            //->orderBy('proyecto_id', 'ASC')
            ->when($proy, function ($query, $proy) {
                return $query->whereRaw('LOWER(p.proyecto_id) LIKE LOWER(?)', ['%' . $proy . '%']);
            })
            ->paginate(10); // Paginación: muestra 10 resultados por página

         return view('areas.proyecto.index', compact('datos_proy'));
    }

    //public function edit(Project $project)
    public function edit($proyecto_id)
    {
        $datos_proy = DB::table('proyectos as p')
            ->select(
                'p.proyecto_id',
                'd.departamento',
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
            ->where('p.proyecto_id', $proyecto_id) // Filtra por el ID recibido
            ->orderBy('proyecto_id','ASC')
            ->first();
        //return $datos_proy;
        if (!$datos_proy) {
            return redirect()->route('proyectos.index')->with('error', 'Proyecto no encontrado.');
        }


        return view('areas.proyecto.edit', compact('datos_proy'));

    }


    public function update(Request $request, $proyecto_id)
    {
        // Validación de datos
        $request->validate([

            'estado_proy' => 'nullable|string|max:255',
            'modalidad' => 'nullable|string|max:255',
            'fecha_ini_obra' => 'nullable|date',
            'fecha_fin_obra' => 'nullable|date|after_or_equal:fecha_ini_obra',
            'viviends_conclui' => 'nullable|string|max:255',
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
        $actualizar= DB::table('proyectos')
            ->where('proyecto_id', $proyecto_id)
            ->update([

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
            //return $actualizar;

        // Redireccionar con mensaje adecuado
        if ($actualizar) {
            return redirect()->route('proyecto.edit', $proyecto_id)
            ->with('success', 'Proyecto actualizada correctamente.');

        }

    }
}
