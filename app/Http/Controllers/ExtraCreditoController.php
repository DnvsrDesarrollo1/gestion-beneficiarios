<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraCreditoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $beneficiarios = \App\Models\Credit::select('extracreditos.*')
        ->from( 'extracreditos')
        ->where('extracreditos.departamento', '<>', '')
        ->paginate(100);
        //dump($beneficiarios);
        //return $beneficiarios;
        return view('extracredito', compact('beneficiarios'));
    }

    public function show($id)
    {
        $beneficiario = \App\Models\Social::with(['legal', 'credit'])
                                            ->where('unid_hab_id', $id)->first();

        return view('areas.index', compact('beneficiario'));
    }


    /**
     * Update the specified resource in storage.
     */

}
