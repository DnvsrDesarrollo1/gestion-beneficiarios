<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegPoseedorController extends Controller
{

    public function index(Request $request)
    {
        $query = Social::select([
            'id_soc', // ¡Muy importante!
            'proy_id',
            'departamento',
            'nombre_proyecto',
            'manzano',
            'lote',
            'nombre_titular',
            'ci_titular',
            'nombre_conyugue',
            'ci_conyugue',
            'nombre_beneficiario_final',
            'ci_beneficiario_final',
            'ext_ci_final',
            'telefono_final',
            'nombre_poseedor',
            'ci_poseedor',
            'telefono_poseed',
            'observacion_benef_final'
        ]);

        if ($request->filled('nombre_beneficiario_final')) {
            $query->where('nombre_beneficiario_final', 'ILIKE', '%' . $request->nombre_beneficiario_final . '%');
        }

        if ($request->filled('ci_beneficiario_final')) {
            $query->where('ci_beneficiario_final', 'ILIKE', '%' . $request->ci_beneficiario_final . '%');
        }

        if ($request->filled('departamento')) {
            $query->where('departamento', 'ILIKE', '%' . $request->departamento . '%');
        }

        if ($request->filled('proyecto')) {
            $query->where('nombre_proyecto', 'ILIKE', '%' . $request->proyecto . '%');
        }

        $poseedores = $query->orderBy('departamento')
                        ->paginate(10)
                        ->appends($request->query());
        //dd($query);

        return view('areas.poseedor.index', compact('poseedores'));
    }



    public function edit($id_soc)
    {
        $poseedor = Social::findOrFail($id_soc);
        return view('areas.poseedor.edit', compact('poseedor'));
    }
    public function update(Request $request, $id_soc)
    {
        $request->merge([
            'nombre_poseedor' => strtoupper($request->nombre_poseedor),
            'ci_poseedor'     => strtoupper($request->ci_poseedor),
        ]);
        // Validar los datos
        $validator = Validator::make($request->all(), [
            'nombre_beneficiario_final',
            'ci_beneficiario_final',
            'telefono_final'     => 'nullable|regex:/^\d{8,9}$/',
            'nombre_poseedor'    => 'nullable|string|max:255',
            'ci_poseedor'        => 'nullable|string|max:40',
            'telefono_poseed'    => 'nullable|regex:/^\d{8,9}$/',
        ], [
            //'telefono_final.required'     => 'El número de teléfono es obligatorio.',
            'telefono_final.regex'        => 'El número de teléfono debe contener 8 o 9 dígitos numéricos.',
            //'nombre_poseedor.required'    => 'El nombre del poseedor es obligatorio.',
            //'ci_poseedor.required'        => 'El CI del poseedor es obligatorio.',
            //'telefono_poseed.required'    => 'El número de teléfono es obligatorio.',
            'telefono_poseed.regex'       => 'El número de teléfono debe contener 8 o 9 dígitos numéricos.',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Buscar el registro por ID
        $poseedor = Social::find($id_soc);

        if (!$poseedor) {
            return redirect()
                ->route('poseedor.index')
                ->with('error', 'El poseedor no fue encontrado.');
        }

        // Intentar actualizar
        try {
            $poseedor->update([
                'telefono_final' => $request->telefono_final,
                'nombre_poseedor' => $request->nombre_poseedor,
                'ci_poseedor'     => $request->ci_poseedor,
                'telefono_poseed'        => $request->telefono_poseed,
                'user_id'         => auth()->id() ?? 3,
            ]);

            return redirect()
                ->route('poseedor.index')
                ->with('success', 'Los datos del poseedor se actualizaron correctamente.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Error al actualizar: ' . $e->getMessage())
                ->withInput();
        }
    }
}
