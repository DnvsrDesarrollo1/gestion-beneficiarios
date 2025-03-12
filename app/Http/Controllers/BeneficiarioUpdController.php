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
        return view('areas.beneficiario_act.index', compact('listar'));
    }

    public function edit($beneficiario_id)
    {
        $listar = Beneficiary::findOrFail($beneficiario_id);
        //return $listar;
       return view('areas.beneficiario_act.edit', compact('listar'));
    }

    public function update(Request $request, $beneficiario_id)
    {
        //$beneficiario = Beneficiary::findOrFail($beneficiario_id);
        $beneficiario = Beneficiary::findOrFail($beneficiario_id);
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

        //$beneficiario->update($request->all());
        try {
            $beneficiario->update($request->all());
            return $beneficiario;
            //return redirect()->route('areas.beneficiario_act.index')->with('success', 'Beneficiario actualizado exitosamente.');
        } catch (\Exception $e) {

        return redirect()->route('areas.beneficiario_act.index')->with('success', 'Beneficiario actualizado.');
        }
    }
    /*public function update(Request $request)
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
                ->route('beneficiario_act.edit')
                ->with('success', 'Los datos se actualizaron exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('beneficiario_act.edit')
                ->with('error', 'Hubo un problema al actualizar los datos. Por favor, inténtalo de nuevo.')
                ->with('code', $e->getMessage())
                ->withInput();
        }
    }*/


}
