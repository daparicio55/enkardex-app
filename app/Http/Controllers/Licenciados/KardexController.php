<?php

namespace App\Http\Controllers\Licenciados;

use App\Http\Controllers\Controller;
use App\Models\Ambiente;
use App\Models\Doctore;
use App\Models\Kardex;
use App\Models\Medicamento;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;

class KardexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            //code...
            $kardexes = Kardex::get();
            return view('licenciados.kardexes.index',compact('kardexes'));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicamentos = Medicamento::orderBy('denominacion','asc')
        ->get();
        $doctores = Doctore::orderBy('apellidos','asc')
        ->orderBy('nombres','asc')
        ->get();
        $servicios = Servicio::orderBy('nombre','asc')
        ->get();
        $ambientes = Ambiente::orderBy('nombre','asc')
        ->get();
        return view('licenciados.kardexes.create',compact('medicamentos','doctores','servicios','ambientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            //code...
            $kardex = Kardex::findOrFail($id);
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('licenciados.kardexes.index')->with('error','error cuando se intento eliminar este Kardex');
        }
        return Redirect::route('licenciados.kardexes.index')->with('info','se elimino correctamente el registro de Kardex');
    }
}
