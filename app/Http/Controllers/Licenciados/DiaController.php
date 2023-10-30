<?php

namespace App\Http\Controllers\Licenciados;

use App\Http\Controllers\Controller;
use App\Models\Dia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            $dia = new Dia();
            $dia->fecha = $request->fecha;
            //$dia->hora = $request->hora;
            $dia->kardex_id = $request->kardex;
            $dia->save();
            return Redirect::to('/licenciados/kardexes/indicaciones?kardex='.$request->kardex)->with('info','se agrego correctamente el día');
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
            return Redirect::to('/licenciados/kardexes/indicaciones?kardex='.$request->kardex)->with('erro','no se pudo agregar el día');
        }
        
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
    }
}
