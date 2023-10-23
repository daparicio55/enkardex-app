<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndicacioneController;
use App\Http\Controllers\Licenciados\KardexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Rutas para LIcenciados
Route::resource('/licenciados/kardexes/indicaciones',IndicacioneController::class)
->names('licenciados.kardexes.indicaciones');
Route::resource('/licenciados/kardexes', KardexController::class)
->names('licenciados.kardexes');





Auth::routes(['register'=>false]);
//RUTA DE INICIO
Route::get('/',[HomeController::class,'index'])->name('index');

