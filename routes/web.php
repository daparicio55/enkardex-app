<?php

use App\Http\Controllers\EauxiliareController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndicacioneController;
use App\Http\Controllers\Licenciados\KardexController;
use App\Http\Controllers\Licenciados\DiaController;
use App\Http\Controllers\Licenciados\DiaEauxiliareController;
use App\Http\Controllers\Licenciados\DiaIndicacioneController;
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
//RUTAS AUTH
    Auth::routes(['register'=>false]);

//Rutas para LIcenciados
    //DETALLES DE LAS PARTES DE KARDEX
    Route::resource('/licenciados/kardexes/dins',DiaIndicacioneController::class)
    ->names('licenciados.kardexes.dins');
    Route::resource('/licenciados/kardexes/deas',DiaEauxiliareController::class)
    ->names('licenciados.kardexes.deas');
    //PARTES DEL KAXDES
    Route::resource('/licenciados/kardexes/indicaciones',IndicacioneController::class)
    ->names('licenciados.kardexes.indicaciones');
    Route::resource('/licenciados/kardexes/eauxiliares',EauxiliareController::class)
    ->names('licenciados.kardexes.eauxiliares');

    Route::resource('/licenciados/kardexes/dias',DiaController::class)
    ->names('licenciados.kardexes.dias');
    
    Route::resource('/licenciados/kardexes', KardexController::class)
    ->names('licenciados.kardexes');
    
//RUTA DE INICIO
Route::get('/',[HomeController::class,'index'])->name('index');

