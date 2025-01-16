<?php

namespace App\Http\Controllers;
use App\Models\Credit;
use Illuminate\Http\Request;

class HomeExtrController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $beneficiarios = \App\Models\Credit::select('extracreditos.*')
        ->from( 'extracreditos')
        ->where('extracreditos.departamento', '<>', '')
        //->first();
        ->paginate(100);
        //dump($beneficiarios);
        //return $beneficiarios;
        return view('homext', compact('beneficiarios'));
    }

    public function show($id)
    {
        $beneficiario = \App\Models\Social::with(['legal', 'credit'])
                                            ->where('unid_hab_id', $id)->first();

        return view('areas.index', compact('beneficiario'));
    }

    public function update(Request $request)
    {
        //return $request;
        // Validación
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            //'departamento' => 'required',
            //'nombre_beneficiario' => 'required',
            //'ci' => 'required',
            'fono' => 'required',
        ]);

        $credito = Credit::where('unid_hab_id', $request->input('uhi'))->first();

        //return $validator->getMessageBag();
        //return $credito;

        if ($validator->fails()) {
            return redirect()->back();
        }

        //return $credito;

        // Actualización

        try {

            $credito['user_id'] = auth()->id() ?? 3;

            $credito->update($validator->validated());

            return redirect()
                ->route('homext')
                ->with('success', 'Los datos se actualizaron exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('homext')
                ->with('error', 'Hubo un problema al actualizar el crédito. Por favor, inténtalo de nuevo.')
                ->with('code', $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Credit $credit)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */

}
