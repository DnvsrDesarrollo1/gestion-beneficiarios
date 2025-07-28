<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $social = Social::all();
        return response()
            ->json([
                'status' => ($social->count() > 0),
                'message' => 'Social records retrieved successfully',
                'data' => $social,
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
        $social = Social::where('unid_hab_id', $codigo)->first();
        return response()
            ->json([
                'status' => ($social->count() > 0 ? 200 : 404),
                'message' => 'Social record retrieved successfully',
                'data' => $social,
            ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Social $social)
    {
        return response()->json([
            'status' => false,
            'message' => 'Method not allowed'
        ], 405);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Social $social)
    {
        return response()->json([
            'status' => false,
            'message' => 'Method not allowed'
        ], 405);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Social $social)
    {
        return response()->json([
            'status' => false,
            'message' => 'Method not allowed'
        ], 405);
    }
}
