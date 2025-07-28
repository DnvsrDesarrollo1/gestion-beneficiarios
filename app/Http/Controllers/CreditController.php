<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $credits = Credit::where('codigo_credito', '<>', null)->get();

        return view('areas.credits.index', compact('credits'));
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
        $credito = Credit::where('unid_hab_id', $credito)->first();
        $estados = Credit::select('estado_cartera')->distinct()->get()->pluck('estado_cartera');
        return view('areas.credits.edit', compact('credito', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Credit $credito)
    {
        // Validación
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'departamento' => '',
            'estado_cartera' => '',
            'nombre_beneficiario' => '',
            'ci' => '',
            'total_activado' => '',
            'monto_canceladoafecha' => '',
            'observacion' => ''
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('credits.edit', $credito->id_cred)
                ->withErrors($validator)
                ->withInput();
        }

        // Actualización

        try {

            $credito['user_id'] = auth()->id();

            $credito->update($validator->validated());

            return redirect()
                ->route('credits.edit', $credito->unid_hab_id)
                ->with('success', 'El crédito ha sido actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('credits.edit', $credito->unid_hab_id)
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
