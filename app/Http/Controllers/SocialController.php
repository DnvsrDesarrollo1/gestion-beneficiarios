<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socials = Social::where('departamento', '<>', '')->get();
        return view('areas.socials.index', compact('socials'));
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
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($social)
    {
        $social = Social::where('unid_hab_id', $social)->first();

        $prj = $social->unid_hab_id;
        $prj = substr($prj, strrpos($prj, '.') + 1);
        $prj = substr($prj, 0, 1);

        //return $prj;

        $proyectos = \App\Models\Project::where('departamento_id', $prj)->get();

        return view('areas.socials.edit', compact('social', 'proyectos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Social $social)
    {
        // Validación
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'departamento' => 'required',
            'nombre_proyecto' => 'required',
            'manzano' => 'required',
            'lote' => 'required',
            'nombre_titular' => 'required',
            'ci_titular' => 'required',
            'nombre_conyugue' => 'required',
            'ci_conyugue' => 'required',
            'aplic_ley850_estado_social_fuente' => 'required',
            'fuente_excepcionalidad' => 'required',
            'nombre_benef_excepcionalidad' => 'required',
            'ci_benef_excepcionalidad' => 'required',
            'estado_social_excepcionalidad' => 'required',
            'fuente_reasignacion' => 'required',
            'nombre_benef_reasignacion' => 'required',
            'ci_benef_reasignacion' => 'required',
            'estado_social_reasignacion' => 'required',
            'fuente_sustitucion' => 'required',
            'nombre_sustitucion' => 'required',
            'ci_benf_sustitucion' => 'required',
            'estado_social_sustitucion' => 'required',
            'nombre_beneficiario_final' => 'required',
            'ci_beneficiario_final' => 'required',
            'nom_cony_benef_final' => 'required',
            'ci_conyu_benef_final' => 'required',
            'estado_social_benef_final' => 'required',
            'proceso_estado_benef_final' => 'required',
            'observacion_benef_final' => 'required',
        ]);

        $ref = \App\Models\Credit::where('unid_hab_id', $social->unid_hab_id)->first();

        if ($validator->fails()) {
            //return $validator->errors();
            return redirect()
                ->route('socials.edit', $social->unid_hab_id)
                ->withErrors($validator)
                ->withInput();
        }

        // Actualización

        try {

            $social['user_id'] = auth()->id();

            $social->update($validator->validated());

            return redirect()
                ->route('socials.edit', $social->unid_hab_id)
                ->with('success', 'Los criterios sociales han sido actualizados exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('socials.edit', $social->unid_hab_id)
                ->with('error', 'Hubo un problema al actualizar los criterios sociales. Por favor, inténtalo de nuevo.')
                ->with('code', $e->getMessage())
                ->withInput();
        }
    }



    public function destroy(Social $social)
    {
        //
    }


}
