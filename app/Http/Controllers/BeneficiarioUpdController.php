<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeneficiarioUpdController extends Controller
{

    public function index(Request $request)
    {
        /* $ci_beneficiario = $request->input('ci_beneficiario');

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
                'b2.nombres as nombres_conyugue',// Puede ser NULL si no tiene cónyuge

                'b2.apellido_paterno AS apellido_pa_conyugue',
                'b2.apellido_materno AS apellido_ma_conyugue',
                'b2.fecha_nacimiento AS fecha_na_conyugue',
                'b2.cedula_identidad as cedula_conyugue', // Puede ser NULL si no tiene cónyuge
                'b2.extension_ci as ext_conyugue', // Puede ser NULL si no tiene có<nyuge></nyuge>
                'b2.sexo AS sexo_conyugue',
                'b2.telefono AS telefono_conyugue'
            )
            ->leftJoin('conyugues as c', 'b1.beneficiario_id', '=', 'c.beneficiario_id')
            ->leftJoin('beneficiarios as b2', 'c.beneficiario_conyu_id', '=', 'b2.beneficiario_id')

            ->when($ci_beneficiario, function ($query, $ci_beneficiario) {
                return $query->whereRaw("b1.cedula_identidad::TEXT LIKE ?", ["%{$ci_beneficiario}%"]);
            })
            ->paginate(10);*/
        /*$ci_beneficiario = $request->input('ci_beneficiario');

        $listar = Beneficiary::select(
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
            ->from('beneficiarios as b1')
            ->leftJoin('conyugues as c', 'b1.beneficiario_id', '=', 'c.beneficiario_id') // LEFT JOIN para traer beneficiarios con o sin cónyuge
            ->leftJoin('beneficiarios as b2', 'c.beneficiario_conyu_id', '=', 'b2.beneficiario_id') // LEFT JOIN para obtener datos del cónyuge si existe
            ->when($ci_beneficiario, function ($query, $ci_beneficiario) {
                return $query->whereRaw("b1.cedula_identidad::TEXT LIKE ?", ["%{$ci_beneficiario}%"]);
            })
            ->paginate(10);*/
        /*$ci_beneficiario = $request->input('ci_beneficiario');

        $listar = Beneficiary::select(
            'b1.beneficiario_id',
            'b1.nombres as nombres_beneficiario',
            'b1.apellido_paterno AS apellido_pa_benef',
            'b1.apellido_materno AS apellido_ma_benef',
            'b1.fecha_nacimiento AS fecha_na_benef',
            'b1.cedula_identidad as cedula_benef',
            'b1.extension_ci AS ext_benef',
            'b1.sexo AS sexo_benef',
            'b1.telefono AS telefono_benef',

            DB::raw("STRING_AGG(b2.nombres, ', ') as nombres_conyugue"),
            DB::raw("STRING_AGG(b2.apellido_paterno, ', ') as apellido_pa_conyugue"),
            DB::raw("STRING_AGG(b2.apellido_materno, ', ') as apellido_ma_conyugue"),
            DB::raw("STRING_AGG(b2.fecha_nacimiento::TEXT, ', ') as fecha_na_conyugue"),
            DB::raw("STRING_AGG(b2.cedula_identidad::TEXT, ', ') as cedula_conyugue"),
            DB::raw("STRING_AGG(b2.extension_ci, ', ') as ext_conyugue"),
            DB::raw("STRING_AGG(b2.sexo, ', ') as sexo_conyugue"),
            DB::raw("STRING_AGG(b2.telefono::TEXT, ', ') as telefono_conyugue")
        )
            ->from('beneficiarios as b1')
            ->leftJoin('conyugues as c', 'b1.beneficiario_id', '=', 'c.beneficiario_id')
            ->leftJoin('beneficiarios as b2', 'c.beneficiario_conyu_id', '=', 'b2.beneficiario_id')
            ->when($ci_beneficiario, function ($query, $ci_beneficiario) {
                return $query->whereRaw("b1.cedula_identidad::TEXT LIKE ?", ["%{$ci_beneficiario}%"]);
            })
            ->groupBy(
                'b1.beneficiario_id',
                'b1.nombres',
                'b1.apellido_paterno',
                'b1.apellido_materno',
                'b1.fecha_nacimiento',
                'b1.cedula_identidad',
                'b1.extension_ci',
                'b1.sexo',
                'b1.telefono'
            )
            ->paginate(10);*/
        /* $ci_beneficiario = $request->input('ci_beneficiario');

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
            ->leftJoin('conyugues as c', function ($join) {
                $join->on('b1.beneficiario_id', '=', 'c.beneficiario_id')
                    ->whereRaw('c.conyugue_id = (SELECT MIN(c2.conyugue_id) FROM conyugues c2 WHERE c2.beneficiario_id = c.beneficiario_id)');
            })
            ->leftJoin('beneficiarios as b2', 'c.beneficiario_conyu_id', '=', 'b2.beneficiario_id')
            ->when($ci_beneficiario, function ($query, $ci_beneficiario) {
                return $query->where('b1.cedula_identidad', 'LIKE', "%{$ci_beneficiario}%");
            })
            ->paginate(10); // Paginación de 10 registros por página*/
        $ci_beneficiario = $request->input('ci_beneficiario');

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
            ->leftJoinSub(
                DB::table('conyugues as c')
                    ->select('c.beneficiario_id', 'c.beneficiario_conyu_id')
                    ->orderBy('c.conyugue_id') // Ordenamos para tomar el primero
                    ->limit(1), // Solo tomamos un cónyuge por beneficiario
                'c',
                function ($join) {
                    $join->on('b1.beneficiario_id', '=', 'c.beneficiario_id');
                }
            )
            ->leftJoin('beneficiarios as b2', 'c.beneficiario_conyu_id', '=', 'b2.beneficiario_id')
            ->when($ci_beneficiario, function ($query, $ci_beneficiario) {
                return $query->where('b1.cedula_identidad', 'LIKE', "%{$ci_beneficiario}%");
            })
            ->groupBy(
                'b1.beneficiario_id',
                'b1.nombres',
                'b1.apellido_paterno',
                'b1.apellido_materno',
                'b1.fecha_nacimiento',
                'b1.cedula_identidad',
                'b1.extension_ci',
                'b1.sexo',
                'b1.telefono',
                'b2.nombres',
                'b2.apellido_paterno',
                'b2.apellido_materno',
                'b2.fecha_nacimiento',
                'b2.cedula_identidad',
                'b2.extension_ci',
                'b2.sexo',
                'b2.telefono'
            )
            ->paginate(10);



        return view('areas.beneficiario_act.index', compact('listar'));
    }

    public function create(Request $request)
    {
        // Pasar el siguiente ID a la vista
        return view('areas.beneficiario_act.create');
    }

    public function store(Request $request)
    {
        /*$request->validate([
            // Beneficiario
            'nombres_beneficiario' => 'required|string|max:255',
            'apellido_pa_benef' => 'nullable|string|max:255|regex:/^\S+$/|required_without:apellido_ma_benef',
            'apellido_ma_benef' => 'nullable|string|max:255|regex:/^\S+$/|required_without:apellido_pa_benef',
            'fecha_na_benef' => 'required|date|before:today',
            'cedula_benef' => 'required|string|max:20|unique:beneficiarios,cedula_identidad',
            'ext_benef' => 'required|string|max:10',
            'sexo_benef' => 'required|string|max:10',
            'telefono_benef' => 'nullable|string|regex:/^\d{8,9}$/',

            // Cónyuge (solo requerido si se ingresa el nombre)
            'nombres_conyugue' => 'nullable|string|max:255',
            'apellido_pa_conyugue' => 'nullable|string|max:255|regex:/^\S+$/|required_without:apellido_ma_conyugue|required_with:nombres_conyugue',
            'apellido_ma_conyugue' => 'nullable|string|max:255|regex:/^\S+$/|required_without:apellido_pa_conyugue|required_with:nombres_conyugue',
            'fecha_na_conyugue' => 'nullable|date|before:today|required_with:nombres_conyugue',
            'cedula_conyugue' => 'nullable|string|max:20|required_with:nombres_conyugue',
            'ext_conyugue' => 'nullable|string|max:10|required_with:nombres_conyugue',
            'sexo_conyugue' => 'nullable|string|max:10|required_with:nombres_conyugue',
            'telefono_conyugue' => 'nullable|string|regex:/^\d{8,9}$/',
        ], [
            'telefono_benef.regex' => 'El número de teléfono debe contener 8 o 9 dígitos numéricos.',
            'telefono_conyugue.regex' => 'El número de teléfono debe contener 8 o 9 dígitos numéricos.',
            'apellido_pa_benef.required_without' => 'Debe ingresar al menos un apellido (paterno o materno) para el beneficiario.',
            'apellido_ma_benef.required_without' => 'Debe ingresar al menos un apellido (paterno o materno) para el beneficiario.',
            'apellido_pa_conyugue.required_without' => 'Debe ingresar al menos un apellido (paterno o materno) para el cónyuge.',
            'apellido_ma_conyugue.required_without' => 'Debe ingresar al menos un apellido (paterno o materno) para el cónyuge.',
        ]);*/

        $request->validate([
            // Beneficiario
            'nombres_beneficiario' => 'required|string|max:255',
            'apellido_pa_benef' => 'nullable|string|max:255|regex:/^\S+$/|required_without:apellido_ma_benef',
            'apellido_ma_benef' => 'nullable|string|max:255|regex:/^\S+$/|required_without:apellido_pa_benef',
            'fecha_na_benef' => 'required|date|before:today',
            'cedula_benef' => 'required|string|max:20|unique:beneficiarios,cedula_identidad',
            'ext_benef' => 'required|string|max:10',
            'sexo_benef' => 'required|string|max:10',
            'telefono_benef' => 'nullable|string|regex:/^\d{8,9}$/',

            // Cónyuge (solo requerido si se ingresa el nombre)
            'nombres_conyugue',
            'apellido_pa_conyugue',
            'apellido_ma_conyugue',
            'fecha_na_conyugue',
            'cedula_conyugue',
            'ext_conyugue',
            'sexo_conyugue',
            'telefono_conyugue',
        ], [
            'telefono_benef',
            'telefono_conyugue',
            'apellido_pa_benef',
            'apellido_ma_benef',
            'apellido_pa_conyugue',
            'apellido_ma_conyugue',
        ]);


        // Obtener el ID máximo del beneficiario (este ya lo has calculado previamente)
        $maxBeneficiarioId = DB::select("SELECT COALESCE(obtener_max_id('beneficiarios', 'beneficiario_id'), 0) AS max_id");
        $nextBeneficiarioId = $maxBeneficiarioId[0]->max_id + 1;


        //dd($nextBeneficiarioId, $nexIdeCoyugue, $nextConyugueId, $nexbeneficiarioConyuId);


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
            'tipo' => 'B', // Tipo Beneficiario
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Verificar si el beneficiario tiene cónyuge
        $tieneConyugue = $request->filled('nombres_conyugue') && $request->filled('cedula_conyugue');

        if ($tieneConyugue) {
            //Obtener el siguiente ID para el cónyuge en la tabla beneficiarios
            $nexIdeCoyugue  = $nextBeneficiarioId + 1;

            // Obtener el máximo ID actual de la tabla "conyugues"
            $maxConyugueId = DB::select("SELECT COALESCE(obtener_max_id('conyugues', 'conyugue_id'), 0) AS max_id");
            $nextConyugueId = $maxConyugueId[0]->max_id + 1;
            //Obtener el siguiente ID beneficiario_conyu_id
            $nexbeneficiarioConyuId = $nextBeneficiarioId + 1;

            // Insertar cónyuge en la misma tabla beneficiarios
            DB::table('beneficiarios')->insert([
                'beneficiario_id' => $nexIdeCoyugue,
                'nombres' => $request->nombres_conyugue,
                'apellido_paterno' => $request->apellido_pa_conyugue,
                'apellido_materno' => $request->apellido_ma_conyugue,
                'fecha_nacimiento' => $request->fecha_na_conyugue,
                'cedula_identidad' => $request->cedula_conyugue,
                'extension_ci' => $request->ext_conyugue,
                'sexo' => $request->sexo_conyugue,
                'telefono' => $request->telefono_conyugue,
                'fecha_reg' => now(),
                'tipo' => 'C', // Tipo Cónyuge
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            //Insertar en la tabla conyugues
            DB::table('conyugues')->insert([
                'conyugue_id' => $nextConyugueId,
                'beneficiario_id' => $nextBeneficiarioId,
                'beneficiario_conyu_id' => $nexbeneficiarioConyuId,

                'fecha_reg' => now(),
                'estado_reg' => 'U',
                'usuario_reg' => 'MARITZA',


            ]);
        }

        return redirect()
            ->route('beneficiario_act.index')
            ->with('success', $tieneConyugue ? 'Beneficiario y Cónyuge registrados correctamente.' : 'Beneficiario registrado correctamente.');
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
            ->leftJoin('conyugues as c', 'b1.beneficiario_id', '=', 'c.beneficiario_id')
            ->leftJoin('beneficiarios as b2', 'c.beneficiario_conyu_id', '=', 'b2.beneficiario_id')
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
