<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::fallback(function () {
    return response()->json([
        'message' => 'Invalid end-point, please check the provided URL.',
        'full_request_url' => request()->fullUrl(),
        'fallback_related_url' => request()->path()
    ], 404);
});

Route::apiResource('social', \App\Http\Controllers\Api\SocialController::class);
Route::apiResource('legal', \App\Http\Controllers\Api\LegalController::class);
Route::apiResource('credito', \App\Http\Controllers\Api\CreditController::class);
Route::apiResource('/infproyecto', \App\Http\Controllers\Api\InfoProyectoController::class)->names([
    'index' => 'api.infproyecto',

]);




