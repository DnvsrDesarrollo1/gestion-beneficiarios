<?php

namespace App\Http\Controllers;
use App\Services\BeneficiarioService;

use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    protected $beneficiarioService;

    public function __construct(BeneficiarioService $beneficiarioService)
    {
        $this->beneficiarioService = $beneficiarioService;
    }

    public function index(Request $request)
    {
        $listar = $this->beneficiarioService->obtenerBeneficiarios($request->input('search'));
        //dd($listar);
        return view('livewire.beneficiario-search', compact('listar'));

    }


}

