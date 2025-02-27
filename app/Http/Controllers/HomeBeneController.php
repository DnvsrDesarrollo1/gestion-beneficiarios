<?php

namespace App\Http\Controllers;
use App\Models\Beneficiari;
use Illuminate\Http\Request;

class HomeBeneController extends Controller
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
       $beneficiarios = \App\Models\Beneficiari::where('departamento', '<>', '')->get();
        //return $beneficiarios;
        return view('homebene', compact('beneficiarios'));


    }

    public function show($id)
    {

    }

    public function update(Request $request)
    {
        //return $request;
        // Validación
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            //'departamento' => 'required',
            //'nombres' => 'required',
            //'cedula_identidad' => 'required',

            'telefono' => 'required|regex:/^\d{8,9}$/', // Acepta 8 o 9 dígitos
        ], [
            'telefono.required' => 'El número de teléfono es obligatorio.',
            'telefono.regex' => 'El número de teléfono debe contener 8 o 9 dígitos numéricos.',


        ]);

        $ci = Beneficiari::where('beneficiario_id', $request->input('bei'))->first();

        //return $validator->getMessageBag();
        //return $ci;

        if ($validator->fails()) {
            return redirect()->back();
        }

        //return $ci;
        // Actualización

        try {
            $ci->update([
                'telefono' => $request->input('telefono'),
                'user_id' => auth()->id() ?? 3, // Actualizamos el 'user_id'
            ]);

            return redirect()
                ->route('homebene')
                ->with('success', 'Los datos se actualizaron exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('homebene')
                ->with('error', 'Hubo un problema al actualizar el crédito. Por favor, inténtalo de nuevo.')
                ->with('code', $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beneficiari $beneficiari)
    {
        //
    }


}
