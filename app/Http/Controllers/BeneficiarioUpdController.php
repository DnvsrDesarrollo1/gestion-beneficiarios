<?php
namespace App\Http\Controllers;
use App\Models\Beneficiary;
use Illuminate\Http\Request;




class BeneficiarioUpdController extends Controller
{
    public function index()
    {
        $listar = Beneficiary::where('departamento', '<>', '')
        ->get();
        //return $listar;
        return view('beneficiario.edit', compact('listar'));
    }

   /* public function edit($id)
    {
        $listar = Beneficiary::findOrFail($id);
        return view('beneficiario.edit', compact('listar'));
    }

    public function update(Request $request, $id)
    {
        $beneficiario = Beneficiary::findOrFail($id);
        $request->validate([
            'nombres' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'fecha_nacimiento' => 'required',
            'cedula_identidad' => 'required',
            'extension_ci' => 'required',
            'sexo' => 'required',
            'telefono' => 'required'
        ]);

        $beneficiario->update($request->all());

        return redirect()->route('beneficiario.index')->with('success', 'Beneficiario actualizado.');
    }*/
    public function update(Request $request)
    {
        //return $request;
        // Validación
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'nombres' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'fecha_nacimiento' => 'required',
            'cedula_identidad' => 'required',
            'extension_ci' => 'required',
            'sexo' => 'required',
            'telefono' => 'required'

        ]);

        $ci = Beneficiary::where('beneficiario_id', $request->input('be_id'))->first();

        //return $validator->getMessageBag();
        //return $ci;

        if ($validator->fails()) {
            return redirect()->back();
        }

        //return $ci;
        // Actualización

        try {
            $ci->update([
                'nombres' => $request->input('nombres'),
                'apellido_paterno' => $request->input('apellido_paterno'),
                'apellido_materno' => $request->input('apellido_materno'),
                'fecha_nacimiento' => $request->input('fecha_nacimiento'),
                'cedula_identidad' => $request->input('cedula_identidad'),
                'extension_ci' => $request->input('extension_ci'),
                'sexo' => $request->input('sexo'),
                'telefono' => $request->input('telefono'),
                'user_id' => auth()->id() ?? 3, // Actualizamos el 'user_id'
            ]);

            return redirect()
                ->route('beneficiario.edit')
                ->with('success', 'Los datos se actualizaron exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('beneficiario.edit')
                ->with('error', 'Hubo un problema al actualizar los datos. Por favor, inténtalo de nuevo.')
                ->with('code', $e->getMessage())
                ->withInput();
        }
    }


}
