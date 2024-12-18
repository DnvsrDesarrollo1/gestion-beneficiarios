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
        $expeds = \App\Models\Extension::all();

        return view('areas.socials.edit', compact('social', 'proyectos', 'expeds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Social $social)
    {
        // Validación
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'departamento' => '',
            'nombre_proyecto' => '',
            'manzano' => '',
            'lote' => '',
            'unidad_vecinal' => '',
            'nombre_titular' => '',
            'ci_titular' => '',
            'ext_ci_titular' => '',
            'nombre_conyugue' => '',
            'ci_conyugue' => '',
            'ext_ci_cony' => '',
            'aplic_ley850_estado_social_fuente' => '',
            'fuente_excepcionalidad' => '',
            'nombre_benef_excepcionalidad' => '',
            'ci_benef_excepcionalidad' => '',
            'ext_ci_excep' => '',
            'estado_social_excepcionalidad' => '',
            'fuente_reasignacion' => '',
            'nombre_benef_reasignacion' => '',
            'ci_benef_reasignacion' => '',
            'ext_ci_reasig' => '',
            'estado_social_reasignacion' => '',
            'fuente_sustitucion' => '',
            'nombre_sustitucion' => '',
            'ci_benf_sustitucion' => '',
            'ext_ci_sust' => '',
            'estado_social_sustitucion' => '',
            'fuente_cambio_titular' => '',
            'nombre_cambio_titular' => '',
            'ci_cambio_titular' => '',
            'ext_cambio_titular' => '',
            'estado_social_cambiotitular' => '',
            'observaciones_detalles' => '',
            'nombre_beneficiario_final' => '',
            'ci_beneficiario_final' => '',
            'ext_ci_final' => '',
            'nom_cony_benef_final' => '',
            'ci_conyu_benef_final' => '',
            'ext_ci_final_cony' => '',
            'estado_social_benef_final' => '',
            'proceso_estado_benef_final' => '',
            'observacion_benef_final' => '',
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
