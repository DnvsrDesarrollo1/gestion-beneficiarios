<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;
use App\Models\Credit;
use Illuminate\Support\Facades\DB;


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
    public function index(Request $request)
    {
        $beneficiarios = DB::table('extrasocial as s')
            ->join('extracreditos as c', 's.unid_hab_id', '=', 'c.unid_hab_id')
            ->select([
                's.id_soc',
                's.unid_hab_id',
                's.departamento',
                's.nombre_beneficiario_final',
                's.ci_beneficiario_final',
                's.ext_ci_final',
                's.telefono_final',
                'c.fono',
                'c.fono1',
                'c.fono2',
            ])
            ->get();
        //return $beneficiarios;
        return view('homebene', compact('beneficiarios'));
    }

    // Aquí comienza el foreach

    /*public function update(Request $request, $id_soc)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'fono' => 'nullable|regex:/^\d{8,9}$/',
            //'fono1' => 'nullable|regex:/^\d{8,9}$/',
            'telefono_final' => 'nullable|regex:/^\d{8,9}$/',

        ], [

            'fono.regex' => 'El número de teléfono debe contener 8 o 9 dígitos numéricos.',
            //'fono1.regex' => 'El número de teléfono debe contener 8 o 9 dígitos numéricos.',
            'telefono_final.regex' => 'El número de teléfono debe contener 8 o 9 dígitos numéricos.',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Buscar en extrasocial por id_soc
            $social = Social::find($id_soc);

            if (!$social) {
                return redirect()->back()->with('error', 'Registro no encontrado.');
            }

            // Obtener el id unid_hab común
            $unidHabId = $social->unid_hab_id;

            // Actualizar datos en extrasocial
            $social->update([
                'telefono_final' => $request->input('telefono_final'),
                'user_id' => auth()->id() ?? 3,
            ]);

            // Actualizar datos en extracreditos
            DB::table('extracreditos')
                ->where('unid_hab_id', $unidHabId)
                ->update([
                    'fono' => $request->input('fono'),
                    'fono1' => $request->input('fono1'),
                    // 'fono2' => $request->input('fono2'),
                ]);

            return redirect()
                ->route('homebene')
                ->with('success', 'Los datos se actualizaron exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('homebene')
                ->with('error', 'Hubo un error al actualizar.')
                ->with('code', $e->getMessage());
        }
    }*/

    public function edit($id)
    {
        $beneficiario = DB::table('extrasocial as s')
            ->join('extracreditos as c', 's.unid_hab_id', '=', 'c.unid_hab_id')
            ->select(
                's.id_soc',
                's.unid_hab_id',
                's.departamento',
                's.nombre_beneficiario_final',
                's.ci_beneficiario_final',
                's.telefono_final',
                'c.fono'
            )
            ->where('s.id_soc', $id)
            ->first();

        if (!$beneficiario) {
            return redirect()->route('beneficiarios.index')->with('error', 'Beneficiario no encontrado');
        }

        return view('beneficiarios.edit', compact('beneficiario'));
    }
    public function update(Request $request, $id_soc)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'telefono_final' => ['nullable', 'regex:/^(\d{8,9})(-\d{8,9})*$/'],
            'fono' => ['nullable', 'regex:/^(\d{8,9})(-\d{8,9})*$/'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Actualizar extrasocial
        $social = Social::findOrFail($id_soc);
        $social->telefono_final = $request->telefono_final;
        $social->save();

        // Actualizar extracreditos por unid_hab_id
        if ($request->unid_hab_id) {
            $credito = Credit::where('unid_hab_id', $request->unid_hab_id)->first();
            if ($credito) {
                $credito->fono = $request->fono;
                $credito->save();
            }
        }

        return back()->with('success', 'Datos actualizados correctamente');
    }
}
