<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/busqueda', [App\Http\Controllers\HomeBeneController::class, 'index'])->name('homebene');
//Route::put('/beneficiarios/update', [App\Http\Controllers\HomeBeneController::class, 'update'])->name('beneficiarios.update');
Route::get('/beneficiarios/{id}/edit', [App\Http\Controllers\HomeBeneController::class, 'edit'])->name('beneficiarios.edit');
Route::put('/beneficiarios/update/{id_soc}', [App\Http\Controllers\HomeBeneController::class, 'update'])->name('beneficiarios.update');

Route::group(['middleware' => 'auth'], function () {

    //Route::get('/dt', function () {
    //    return view('datatables');
    //});

    Route::get('/excredito', [App\Http\Controllers\ExtraCreditoController::class, 'index'])->name('extracredito');

    Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/panel-general/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('home.show');

    Route::resource('creditos', App\Http\Controllers\CreditController::class)->parameters([
        'creditos' => 'credito'
    ])->names('credits');

    Route::resource('sociales', App\Http\Controllers\SocialController::class)->parameters([
        'sociales' => 'social'
    ])->names('socials');


    Route::resource('poseedor', App\Http\Controllers\RegPoseedorController::class)
    ->only(['index', 'edit', 'update'])
    ->names([
        'index'  => 'poseedor.index',
        'edit'   => 'poseedor.edit',
        'update' => 'poseedor.update',
    ]);


    Route::resource('legales', App\Http\Controllers\LegalController::class)->parameters([
        'legales' => 'legal'
    ])->names('legals');

    //Reportes

    Route::get('/reportes', [App\Http\Controllers\ReporteController::class, 'index'])->name('reporte');
    //Query informacion de las 3 areas(legal, social y credito)
    Route::get('/infproyecto', [App\Http\Controllers\InfoProyectoController::class, 'index'])->name('infproyecto');
    //Exportar-CSV
    Route::get('/descargar-csv', [App\Http\Controllers\ExportController::class, 'exportCsvDirecto'])->name('exportCsvDirecto');
    Route::get('/get-proyectos', [App\Http\Controllers\InfoProyectoController::class, 'getProyectos'])->name('get.proyectos');




    Route::resource('extracred', App\Http\Controllers\SocExtcreController::class)->parameters([
        'creditos' => 'credito'
    ])->names('extracred');
});

// -------------------------------------------------------------------------------------------------------------

Auth::routes();

// -------------------------------------------------------------------------------------------------------------
