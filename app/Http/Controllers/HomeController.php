<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        $beneficiarios = \App\Models\Social::paginate(100);
        return view('home', compact('beneficiarios'));
    }

    public function show($id)
    {
        $beneficiario = \App\Models\Social::with(['legal', 'credit'])
                                            ->where('unid_hab_id', $id)->first();
        //return $beneficiario;
        return view('areas.index', compact('beneficiario'));
    }
}
