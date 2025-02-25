<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\BeneficiarioController;

Route::get('/', function () {
    return view('welcome');


});

Route::get('beneficiarios', [App\Http\Controllers\BeneficiarioController::class, 'index'])->name('beneficiarios.index');
Route::get('/busqueda', [App\Http\Controllers\BeneficiarioController::class, 'index'])->name('beneficiario');


// -------------------------------------------------------------------------------------------------------------

Auth::routes();

// -------------------------------------------------------------------------------------------------------------

