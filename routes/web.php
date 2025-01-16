<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/busqueda', [App\Http\Controllers\HomeExtrController::class, 'index'])->name('homext');

Route::put('/beneficiario/update', [App\Http\Controllers\HomeExtrController::class, 'update'])->name('beneficiario.update');

Route::group(['middleware' => 'auth'], function () {

    //Route::get('/dt', function () {
    //    return view('datatables');
    //});

    Route::get('/excredito', [App\Http\Controllers\ExtraCreditoController::class, 'index'])->name('extracredito');
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

    Route::resource('extracred', App\Http\Controllers\SocExtcreController::class)->parameters([
        'creditos' => 'credito'
    ])
        ->names('extracred');

});

// -------------------------------------------------------------------------------------------------------------

Auth::routes();

// -------------------------------------------------------------------------------------------------------------
