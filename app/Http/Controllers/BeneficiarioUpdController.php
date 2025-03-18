<?php
namespace App\Http\Controllers;
use App\Models\Beneficiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class BeneficiarioUpdController extends Controller
{
    public function index()
    {
        //$listar = Beneficiary::where('departamento', '<>', '')
        //->get();
        //->paginate(10);
        //return $listar;
        //return view('areas.beneficiario_act.index', compact('listar'));
        $listar = DB::table('beneficiarios as b1')
            ->select(
                'b1.beneficiario_id',
                'b1.nombres as nombres_beneficiario',
                'b1.cedula_identidad as cedula_benef',
                'b1.extension_ci as ext_benef',
                'b2.nombres as nombres_conyugue',
                'b2.cedula_identidad as cedula_conyugue',
                'b2.extension_ci as ext_conyugue'
            )
            ->join('conyugues as c', 'b1.beneficiario_id', '=', 'c.beneficiario_id')
            ->join('beneficiarios as b2', 'c.beneficiario_conyu_id', '=', 'b2.beneficiario_id')
            ->paginate(10);
            //->get();
            //return $listar;

        // Retornar la vista con los datos obtenidos
        return view('areas.beneficiario_act.index', compact('listar'));
    }

    public function edit($beneficiario_id)
    {
        // Obtener el beneficiario y su cónyuge
        $listar = DB::table('beneficiarios as b1')
            ->select(
                'b1.beneficiario_id',
                'b1.nombres as nombres_beneficiario',
                'b1.cedula_identidad as cedula_benef',
                'b1.extension_ci as ext_benef',
                'b2.beneficiario_id as conyuge_id',
                'b2.nombres as nombres_conyuge',
                'b2.cedula_identidad as cedula_conyugue',
                'b2.extension_ci as ext_conyugue'
            )
            ->join('conyugues as c', 'b1.beneficiario_id', '=', 'c.beneficiario_id')
            ->join('beneficiarios as b2', 'c.beneficiario_conyu_id', '=', 'b2.beneficiario_id')
            ->where('b1.beneficiario_id', $beneficiario_id)
            ->first();

        if (!$listar) {
            return redirect()->route('areas.beneficiario_act.index')->with('error', 'Beneficiario no actualizado.');
        }

        return view('areas.beneficiario_act.edit', compact('listar'));

    }

    // Método para actualizar los datos
    public function update(Request $request, $beneficiario_id)
    {
        // Validación de datos
        $request->validate([
            'nombres_beneficiario' => 'required|string|max:255',
            'cedula_benef' => 'required|string|max:20',
            'ext_benef' => 'required|string|max:10',
            'nombres_conyugue' => 'required|string|max:255',
            'cedula_conyugue' => 'required|string|max:20',
            'ext_conyugue' => 'required|string|max:10',
        ]);

        // Actualizar beneficiario
        DB::table('beneficiarios')
            ->where('beneficiario_id', $beneficiario_id)
            ->update([
                'nombres' => $request->nombres_beneficiario,
                'cedula_identidad' => $request->cedula_benef,
                'extension_ci' => $request->ext_benef
            ]);

        // Actualizar cónyuge
        DB::table('beneficiarios')
            ->where('beneficiario_id', $request->conyuge_id)
            ->update([
                'nombres' => $request->nombres_conyugue,
                'cedula_identidad' => $request->cedula_conyugue,
                'extension_ci' => $request->ext_conyugue
            ]);

        return redirect()->route('areas.beneficiario_act.index')->with('success', 'Beneficiario actualizado correctamente.');

    }



    /*public function edit($beneficiario_id)
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
*/


}
