<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\Spouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeneficiarioUpdController extends Controller
{
    public function index()
    {
        $listar = DB::table('beneficiarios as b1')
            ->select(
                'b1.beneficiario_id',
                'b1.nombres as nombres_beneficiario',
                'b1.apellido_paterno AS apellido_pa_benef',
                'b1.apellido_materno AS apellido_ma_benef',
                'b1.fecha_nacimiento AS fecha_na_benef',
                'b1.cedula_identidad as cedula_benef',
                'b1.extension_ci AS ext_benef',
                'b1.sexo AS sexo_benef',
                'b1.telefono AS telefono_benef',
                'b2.nombres as nombres_conyugue',
                'b2.apellido_paterno AS apellido_pa_conyugue',
                'b2.apellido_materno AS apellido_ma_conyugue',
                'b2.fecha_nacimiento AS fecha_na_conyugue',
                'b2.cedula_identidad as cedula_conyugue',
                'b2.extension_ci as ext_conyugue',
                'b2.sexo AS sexo_conyugue',
                'b2.telefono AS telefono_conyugue'
            )
            ->join('conyugues as c', 'b1.beneficiario_id', '=', 'c.beneficiario_id')
            ->join('beneficiarios as b2', 'c.beneficiario_conyu_id', '=', 'b2.beneficiario_id')
            ->paginate(10);
        //->get();
        //return $listar;
        //return dd($listar);

        // Retornar la vista con los datos obtenidos
        return view('areas.beneficiario_act.index', compact('listar'));
    }

    public function create(Request $request)
    {
        // Pasar el siguiente ID a la vista
        return view('areas.beneficiario_act.create');
    }

    public function store(Request $request)
    {
        // Obtener el ID máximo del beneficiario (este ya lo has calculado previamente)
        $maxBeneficiarioId = DB::select("SELECT COALESCE(obtener_max_id('beneficiarios', 'beneficiario_id'), 0) AS max_id");
        $nextBeneficiarioId = $maxBeneficiarioId[0]->max_id + 1;

        // Obtener el máximo ID actual de la tabla "conyugues"
        $maxConyugueId = DB::select("SELECT COALESCE(obtener_max_id('conyugues', 'conyugue_id'), 0) AS max_id");
        $nextConyugueId = $maxConyugueId[0]->max_id + 1;

        $nexbeneficiarioConyuId = $nextBeneficiarioId + 1;

        //$nextConyugueId = $nextBeneficiarioId + 1;


        dd($nextBeneficiarioId, $nextConyugueId, $nexbeneficiarioConyuId);

        // Insertar en la tabla beneficiarios
        DB::table('beneficiarios')->insert([
            'beneficiario_id' => $nextBeneficiarioId,
            'nombres' => $request->nombres_beneficiario,
            'apellido_paterno' => $request->apellido_pa_benef,
            'apellido_materno' => $request->apellido_ma_benef,
            'fecha_nacimiento' => $request->fecha_na_benef,
            'cedula_identidad' => $request->cedula_benef,
            'extension_ci' => $request->ext_benef,
            'sexo' => $request->sexo_benef,
            'telefono' => $request->telefono_benef,
            'fecha_reg' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Paso 2: Verificar si ya existe un registro con ese beneficiario_id y conyugue_id
        $exists = DB::table('conyugues')
            ->where('beneficiario_id', $nextBeneficiarioId)
            ->where('beneficiario_conyu_id', $nexbeneficiarioConyuId)
            ->where('estado_reg', 'U')
            ->exists();

        // Paso 3: Realizar la inserción según si existe o no el registro
        if (!$exists) {
            DB::table('conyugues')->insert([
                'conyugue_id' => $nextConyugueId,
                'beneficiario_id' => $nextBeneficiarioId,
                'beneficiario_conyu_id' => $nexbeneficiarioConyuId,
                'nombres' => $request->nombres_conyugue,
                'apellido_paterno' => $request->apellido_pa_conyugue,
                'apellido_materno' => $request->apellido_ma_conyugue,
                'fecha_nacimiento' => $request->fecha_na_conyugue,
                'cedula_identidad' => $request->cedula_conyugue,
                'extension_ci' => $request->ext_conyugue,
                'sexo' => $request->sexo_conyugue,
                'telefono' => $request->telefono_conyugue,
                'fecha_reg' => now(),
                'estado_reg' => 'U',
            ]);
        } else {
            DB::table('conyugues')->insert([
                'conyugue_id' => $nextConyugueId,
                'beneficiario_id' => $nextBeneficiarioId,
                'beneficiario_conyu_id' => $nexbeneficiarioConyuId,
                'nombres' => $request->nombres_conyugue,
                'apellido_paterno' => $request->apellido_pa_conyugue,
                'apellido_materno' => $request->apellido_ma_conyugue,
                'fecha_nacimiento' => $request->fecha_na_conyugue,
                'cedula_identidad' => $request->cedula_conyugue,
                'extension_ci' => $request->ext_conyugue,
                'sexo' => $request->sexo_conyugue,
                'telefono' => $request->telefono_conyugue,
                'fecha_reg' => now(),
                'estado_reg' => 'N',

            ]);
        }
        /*DB::table('beneficiarios')->insert([
                'conyugue_id' => $nextConyugueId,
                 'beneficiario_id' => $nextBeneficiarioId,
                 'beneficiario_conyu_id' => $nexbeneficiarioConyuId,
                 'nombres' => $request->nombres_conyugue,
                 'apellido_paterno' => $request->apellido_pa_conyugue,
                 'apellido_materno' => $request->apellido_ma_conyugue,
                 'fecha_nacimiento' => $request->fecha_na_conyugue,
                 'cedula_identidad' => $request->cedula_conyugue,
                 'extension_ci' => $request->ext_conyugue,
                 'sexo' => $request->sexo_conyugue,
                 'telefono' => $request->telefono_conyugue,
                 'fecha_reg' => now(),
                 //'created_at' => now(),
                 //'updated_at' => now(),
             ]);*/

        return redirect()
            ->route('beneficiario_act.index')
            ->with('success', 'Beneficiario y Cónyuge registrados correctamente.');
    }


    public function edit($beneficiario_id)
    {
        // Obtener el beneficiario y su cónyuge
        $listar = DB::table('beneficiarios as b1')
            ->select(
                'b1.beneficiario_id',
                'b1.nombres AS nombres_beneficiario',
                'b1.apellido_paterno AS apellido_pa_benef',
                'b1.apellido_materno AS apellido_ma_benef',
                'b1.fecha_nacimiento AS fecha_na_benef',
                'b1.cedula_identidad as cedula_benef',
                'b1.extension_ci as ext_benef',
                'b1.sexo AS sexo_benef',
                'b1.telefono AS telefono_benef',
                'b2.beneficiario_id as conyuge_id',
                'b2.nombres as nombres_conyuge',
                'b2.apellido_paterno AS apellido_pa_conyugue',
                'b2.apellido_materno AS apellido_ma_conyugue',
                'b2.fecha_nacimiento AS fecha_na_conyugue',
                'b2.cedula_identidad as cedula_conyugue',
                'b2.extension_ci as ext_conyugue',
                'b2.sexo AS sexo_conyugue',
                'b2.telefono AS telefono_conyugue'
            )
            ->join('conyugues as c', 'b1.beneficiario_id', '=', 'c.beneficiario_id')
            ->join('beneficiarios as b2', 'c.beneficiario_conyu_id', '=', 'b2.beneficiario_id')
            ->where('b1.beneficiario_id', $beneficiario_id)
            ->first();

        if (!$listar) {
            return redirect()->route('beneficiario_act.index')->with('error', 'Beneficiario no actualizado.');
        }

        return view('areas.beneficiario_act.edit', compact('listar'));
    }

    // Método para actualizar los datos
    public function update(Request $request, $beneficiario_id)
    {
        // Validación de datos
        $request->validate([
            'nombres_beneficiario' => 'required|string|max:255',
            'apellido_pa_benef' => 'nullable|string|max:255|regex:/^\S+$/',
            'apellido_ma_benef' => 'nullable|string|max:255|regex:/^\S+$/',
            'fecha_na_benef' => 'required|date|before:today',
            'cedula_benef' => 'required|string|max:20',
            'ext_benef' => 'required|string|max:10',
            'sexo_benef' => 'required|string|max:10',
            'telefono_benef' => 'nullable|string|regex:/^\d{8,9}$/',

            'nombres_conyugue' => 'required|string|max:255',
            'apellido_pa_conyugue' => 'nullable|string|max:255|regex:/^\S+$/',
            'apellido_ma_conyugue' => 'nullable|string|max:255|regex:/^\S+$/',
            'fecha_na_conyugue' => 'required|date|before:today',
            'cedula_conyugue' => 'required|string|max:20',
            'ext_conyugue' => 'required|string|max:10',
            'sexo_conyugue' => 'required|string|max:10',
            'telefono_conyugue' => 'nullable|string|regex:/^\d{8,9}$/', // Acepta 8 o 9 dígitos
        ], [
            'telefono_benef.regex' => 'El número de teléfono debe contener 8 o 9 dígitos numéricos.',
            'telefono_conyugue.regex' => 'El número de teléfono debe contener 8 o 9 dígitos numéricos.',
        ]);

        //  Validar que al menos un apellido esté presente (pero permitir ambos)
        if (empty($request->apellido_pa_benef) && empty($request->apellido_ma_benef)) {
            return back()->withErrors([
                'apellido_pa_benef' => 'Debes ingresar al menos un apellido (paterno o materno).',
                'apellido_ma_benef' => 'Debes ingresar al menos un apellido (paterno o materno).'
            ]);
        }


        // Actualizar beneficiario
        DB::table('beneficiarios')
            ->where('beneficiario_id', $beneficiario_id)
            ->update([
                'nombres' => $request->nombres_beneficiario,
                'apellido_paterno' => $request->apellido_pa_benef,
                'apellido_materno' => $request->apellido_ma_benef,
                'fecha_nacimiento' => $request->fecha_na_benef,
                'cedula_identidad' => $request->cedula_benef,
                'extension_ci' => $request->ext_benef,
                'sexo' => $request->sexo_benef,
                'telefono' => $request->telefono_benef
            ]);

        // Actualizar cónyuge
        DB::table('beneficiarios')
            ->where('beneficiario_id', $request->conyuge_id)
            ->update([
                'nombres' => $request->nombres_conyugue,
                'apellido_paterno' => $request->apellido_pa_conyugue,
                'apellido_materno' => $request->apellido_ma_conyugue,
                'fecha_nacimiento' => $request->fecha_na_conyugue,
                'cedula_identidad' => $request->cedula_conyugue,
                'extension_ci' => $request->ext_conyugue,
                'sexo' => $request->sexo_conyugue,
                'telefono' => $request->telefono_conyugue
            ]);

        //return redirect()->route('beneficiario_act.index')->with('success', 'Beneficiario actualizado correctamente.');
        return redirect()
            ->route('beneficiario_act.edit', $beneficiario_id)
            ->with('success', 'Los datos se actualizaron exitosamente.');
    }
}
