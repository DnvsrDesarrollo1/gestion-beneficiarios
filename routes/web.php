<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/busqueda', [App\Http\Controllers\HomeBeneController::class, 'index'])->name('homebene');

//---------------------Ruta del nuevo sistema------------------------------------------------------------------------

Route::get('/busquedas', [App\Http\Controllers\BeneficiarioController::class, 'index'])->name('home');



Route::resource('beneficiario_act', App\Http\Controllers\BeneficiarioUpdController::class)
    ->names([
        'index' => 'beneficiario_act.index',
        'create' => 'beneficiario_act.create',
        'store' => 'beneficiario_act.store',
        //'show' => 'beneficiario_act.show',
        'edit' => 'beneficiario_act.edit',
        'update' => 'beneficiario_act.update',
        //'destroy' => 'beneficiario_act.destroy',
    ]);

Route::resource('unidades_hab', App\Http\Controllers\UnidHabitacionalController::class)
->names([
    'index' => 'unidades_hab.index',
    'edit' => 'unidades_hab.edit',
    'update' => 'unidades_hab.update',
    //'destroy' => 'beneficiario_act.destroy',
]);

//---------------------------------------------------------------------------------------------------------------------

//Route::put('/beneficiarios/update', [App\Http\Controllers\HomeBeneController::class, 'update'])->name('beneficiarios.update');

Route::group(['middleware' => 'auth'], function () {

    //Route::get('/dt', function () {
    //    return view('datatables');
    //});

    Route::get('/excredito', [App\Http\Controllers\ExtraCreditoController::class, 'index'])->name('extracredito');
    //Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Route::get('/panel-general/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('home.show');

    Route::resource('creditos', App\Http\Controllers\CreditController::class)->parameters([
        'creditos' => 'credito'
    ])
        ->names('credits');

    Route::resource('sociales', App\Http\Controllers\SocialController::class)->parameters([
        'sociales' => 'social'
    ])
        ->names('socials');
//Reportes

    Route::get('/reportes', [App\Http\Controllers\ReporteController::class, 'index'])->name('reporte');;



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
