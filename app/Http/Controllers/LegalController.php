<?php

namespace App\Http\Controllers;

use App\Models\Legal;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $legals = Legal::where('nombre_apellidos', '<>', '')->get();
        return view('areas.legals.index', compact('legals'));
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

    /**
     * Display the specified resource.
     */
    public function show(Legal $legal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($legal)
    {
        $legal = Legal::where('unid_hab_id', $legal)->first();
        $prj = $legal->unid_hab_id;
        //extrae los 3 caracteres luego del punto "." de $prj, por ejemplo: 8.109000102E -> resultado = 109
        //esto es para obtener el proyecto de la unidad habitacional, puede ser necesario adaptarlo para obtener el proyecto de otros tipos de unidades habitacionales
        $prj = $legal->unid_hab_id;
        $prj = substr($prj, strrpos($prj, '.') + 1);
        $prj = substr($prj, 0, 1);

        //return $prj;

        $proyectos = \App\Models\Project::where('departamento_id', $prj)->get();

        //return $proyectos;

        return view('areas.legals.edit', compact('legal', 'proyectos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Legal $legal)
    {
        //// Validación
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'departamento' => 'required',
            'proyecto' => 'required',
            'nombre_apellidos' => 'required',
            'cedula_identidad' => 'required',
            'manzano' => 'required',
            'lote' => 'required',
            'nro_folio_real' => 'required',
            'titulacion' => 'required',
            'observaciones1' => 'required',
            'levantam_grav_dev_documentos' => 'required',
            'observado_ley850' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('legals.edit', $legal->unid_hab_id)
                ->withErrors($validator)
                ->withInput();
        }

        // Actualización

        try {

            $legal['user_id'] = auth()->id();

            $legal->update($validator->validated());

            return redirect()
                ->route('legals.edit', $legal->unid_hab_id)
                ->with('success', 'Los criterios legales han sido actualizados exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('legals.edit', $legal->unid_hab_id)
                ->with('error', 'Hubo un problema al actualizar los criterios legales. Por favor, inténtalo de nuevo.')
                ->with('code', $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Legal $legal)
    {
        //
    }
}
