<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Social;

class InfoProyectoController extends Controller
{    public function index()
    {

        $data = Social::all();
           return response()->json([
           'status'=> true,
           'message'=> 'Datos obtenidos correctamente',
           'data'=> $data
           ], 200);


    }

}
