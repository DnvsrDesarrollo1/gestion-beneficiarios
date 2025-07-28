<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Legal;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function index()
    {
        $legal = Legal::all();
        return response()
            ->json([
                'status' => ($legal->count() > 0),
                'message' => 'Legal records retrieved successfully',
                'data' => $legal,
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
        $legal = Legal::where('unid_hab_id', $codigo)->first();
        return response()
            ->json([
                'status' => ($legal->count() > 0 ? 200 : 404),
                'message' => 'Legal record retrieved successfully',
                'data' => $legal,
            ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Legal $legal)
    {
        return response()->json([
            'status' => false,
            'message' => 'Method not allowed'
        ], 405);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Legal $legal)
    {
        return response()->json([
            'status' => false,
            'message' => 'Method not allowed'
        ], 405);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Legal $legal)
    {
        return response()->json([
            'status' => false,
            'message' => 'Method not allowed'
        ], 405);
    }
}
