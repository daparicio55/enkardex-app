<?php

use App\Http\Controllers\Administrador\ApiController;
use App\Http\Controllers\Administrador\MedicamentoController;
use App\Http\Controllers\Administrador\MedicoController;
use App\Http\Controllers\Administrador\ServicioController;
use App\Http\Controllers\Administrador\UnidadeController;
use App\Http\Controllers\DietaController;
use App\Http\Controllers\EauxiliareController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndicacioneController;
use App\Http\Controllers\Licenciados\KardexController;
use App\Http\Controllers\Licenciados\DiaController;
use App\Http\Controllers\Licenciados\DiaDietaController;
use App\Http\Controllers\Licenciados\DiaEauxiliareController;
use App\Http\Controllers\Licenciados\DiaIndicacioneController;
use App\Http\Controllers\Licenciados\DiaProcediminetoController;
use App\Http\Controllers\ProcedimientoController;

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

Route::get('/kardex',[KardexController::class,'crear'])->name('kardex.crear');
Route::get('/kardex/editar/{id}',[KardexController::class,'editar'])->name('kardex.editar');


Route::get('/administrador/medicamentos',[MedicamentoController::class,'index'])->name('administrador.medicamentos.index');
Route::delete('/administrador/medicamentos/{id}',[MedicamentoController::class,'delete'])->name('administrador.medicamento.destroy');

Route::get('/administrador/unidades',[UnidadeController::class,'index'])->name('administrador.unidades.index');
Route::delete('/administrador/unidades/{id}',[UnidadeController::class,'delete'])->name('administrador.unidades.destroy');

Route::get('/administrador/servicios',[ServicioController::class,'index'])->name('administrador.servicios.index');
Route::delete('/administrador/servicios/{id}',[ServicioController::class,'delete'])->name('administrador.servicios.destroy');

Route::get('/administrador/medicos',[MedicoController::class,'index'])->name('administrador.medicos.index');
Route::delete('/administrador/medicos/{id}',[MedicoController::class,'delete'])->name('administrador.medicos.destroy');

//Rutas para LIcenciados
    //DETALLES DE LAS PARTES DE KARDEX
    Route::resource('/licenciados/kardexes/dins',DiaIndicacioneController::class)
    ->names('licenciados.kardexes.dins');
    Route::resource('/licenciados/kardexes/deas',DiaEauxiliareController::class)
    ->names('licenciados.kardexes.deas');
    Route::resource('/licenciados/kardexes/ddietas',DiaDietaController::class)
    ->names('licenciados.kardexes.ddietas');
    Route::resource('/licenciados/kardexes/dprocedimientos',DiaProcediminetoController::class)
    ->names('licenciados.kardexes.dprocedimientos');

    //PARTES DEL KAXDES
    Route::resource('/licenciados/kardexes/indicaciones',IndicacioneController::class)
    ->names('licenciados.kardexes.indicaciones');
    Route::resource('/licenciados/kardexes/eauxiliares',EauxiliareController::class)
    ->names('licenciados.kardexes.eauxiliares');
    Route::resource('/licenciados/kardexes/dietas',DietaController::class)
    ->names('licenciados.kardexes.dietas');
    Route::resource('/licenciados/kardexes/procedimientos',ProcedimientoController::class)
    ->names('licenciados.kardexes.procedimientos');

    //--->
    Route::resource('/licenciados/kardexes/dias',DiaController::class)
    ->names('licenciados.kardexes.dias');
    //--->
    Route::resource('/licenciados/kardexes', KardexController::class)
    ->names('licenciados.kardexes');
    
//RUTA DE INICIO
Route::get('/',[HomeController::class,'index'])->name('index');

//RUTAS DE APIS
Route::get('/apis/getdni/{dni}',[ApiController::class,'getdni'])
->name('apis.getdni');