<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BeneficiarioController extends Controller
{
    public function index(Request $request)
    {
        return view('home');
    }


}

