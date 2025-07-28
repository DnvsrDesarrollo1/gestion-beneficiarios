<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $credit = Credit::all();
        return response()
            ->json([
                'status' => ($credit->count() > 0),
                'message' => 'Credit records retrieved successfully',
                'data' => $credit,
            ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'status' => false,
            'message' => 'Method not allowed'
        ], 405);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json([
            'status' => false,
            'message' => 'Method not allowed'
        ], 405);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $codigo)
    {
        $credit = Credit::where('codigo_credito', $codigo)
            ->orWhere('codigo_credito', 'LIKE', '%'. substr($codigo, 0, strlen($codigo) - 3) .'%')
            ->first();

        return response()
            ->json([
                'status' => ($credit->count() > 0),
                'message' => 'Credit record retrieved successfully',
                'data' => $credit,
            ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Credit $credit)
    {
        return response()->json([
            'status' => false,
            'message' => 'Method not allowed'
        ], 405);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Credit $credit)
    {
        return response()->json([
            'status' => false,
            'message' => 'Method not allowed'
        ], 405);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Credit $credit)
    {
        return response()->json([
            'status' => false,
            'message' => 'Method not allowed'
        ], 405);
    }
}
