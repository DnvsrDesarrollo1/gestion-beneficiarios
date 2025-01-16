<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;

class SocExtcreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extracred = Credit::where('codigo_credito', '<>', null)->get();

        return view('areas.extracred.index', compact('extracred'));
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
    public function show(Credit $credit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($credito)
    {
        //return $credito;
        $credito = Credit::where('unid_hab_id', $credito)->first();
        $estados = Credit::select('estado_cartera')->distinct()->get()->pluck('estado_cartera');
        //return $credito;
        return view('areas.extracred.edit', compact('credito', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $credito)
    {
        //return $credito;
        // Validación
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            //'departamento' => 'required',
            //'nombre_beneficiario' => 'required',
            //'ci' => 'required',
            'fono' => 'required',
        ]);

        $credito = Credit::where('unid_hab_id', $credito)->first();

        if ($validator->fails()) {
            return redirect()
                ->route('extracred.edit', $credito->id_cred)
                ->withErrors($validator)
                ->withInput();
        }

        //return $credito;

        // Actualización

        try {

            $credito['user_id'] = auth()->id();

            $credito->update($validator->validated());

            return redirect()
                ->route('extracred.edit', $credito->unid_hab_id)
                ->with('success', 'Los datos se actualizaron exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('extracred.edit', $credito->unid_hab_id)
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
}
