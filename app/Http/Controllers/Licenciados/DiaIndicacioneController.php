<?php

namespace App\Http\Controllers\Licenciados;

use App\Http\Controllers\Controller;
use App\Models\Dia;
use App\Models\DiaIndicacione;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DiaIndicacioneController extends Controller
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
        //
        try {
            //RECORDAR LA VALIDACION 

            $dia = Dia::findOrFail($request->dia_id);
            $diaindicaciones = DiaIndicacione::updateOrCreate([
                'dia_id'=>$request->dia_id,
                'indicacione_id'=>$request->indicacione_id,
                'hora'=>$request->hora
            ],
            [
                'dia_id'=>$request->dia_id,
                'indicacione_id'=>$request->indicacione_id,
                'hora'=>$request->hora,
                'registro'=>Carbon::now(),
                'tipo'=>$request->tipo,
                /* 'user_id'=>auth()->id(), */
            ]);
            return Redirect::to('/licenciados/kardexes/indicaciones?kardex='.$diaindicaciones->dia->kardex->id)->with('info','se puso la hora en '.$request->tipo);
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::to('/licenciados/kardexes/indicaciones?kardex='.$diaindicaciones->dia->kardex->id)->with('error','nose pudo guardar los datos correctamente');
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
