<?php

namespace App\Http\Controllers\Licenciados;

use App\Http\Controllers\Controller;
use App\Models\Dia;
use App\Models\DiaDieta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DiaDietaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        /* $this->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified']); */
        $this->middleware('auth');
    }
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
        try {
            //code...
            $dia = Dia::findOrFail($request->dia);
            $ddieta = new DiaDieta();
            for ($i=0; $i < count($request->dietas); $i++) { 
                # code...
                $ddieta->dia_id = $request->dia;
                $ddieta->dieta_id = $request->dietas[$i];
                $ddieta->save();
            }
            return Redirect::to('/licenciados/kardexes/dietas?kardex='.$dia->kardex->id)
            ->with('info','se agregaron las dietas correctamente');
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('licenciados.kardexes.index')
            ->with('error','no puede agregar las dietas');
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
        try {
            //code...
            $ddieta = DiaDieta::findOrFail($id);
            $kardex = $ddieta->dia->kardex_id;
            $ddieta->delete();
            return Redirect::to('/licenciados/kardexes/dietas?kardex='.$kardex)
            ->with('info','se agregaron las dietas correctamente');
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('licenciados.kardexes.index')
            ->with('error','no puede agregar las dietas');
        }
    }
}
