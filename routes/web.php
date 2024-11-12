<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

    //Route::get('/dt', function () {
    //    return view('datatables');
    //});

    Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/panel-general/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('home.show');

    Route::resource('creditos', App\Http\Controllers\CreditController::class)->parameters([
        'creditos' => 'credito'
    ])
        ->names('credits');

    Route::resource('sociales', App\Http\Controllers\SocialController::class)->parameters([
        'sociales' => 'social'
    ])
        ->names('socials');

    Route::resource('legales', App\Http\Controllers\LegalController::class)->parameters([
        'legales' => 'legal'
    ])
        ->names('legals');
});

// -------------------------------------------------------------------------------------------------------------

Auth::routes();

// -------------------------------------------------------------------------------------------------------------
