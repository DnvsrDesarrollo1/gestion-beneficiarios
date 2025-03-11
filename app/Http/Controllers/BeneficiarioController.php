<?php

namespace App\Http\Controllers;
use App\Models\Beneficiary;
use Illuminate\Http\Request;


class BeneficiarioController extends Controller
{
    public function index(Request $request)
    {
        return view('home');
    }


}

