<?php

namespace App\Http\Controllers\Licenciados;

use App\Http\Controllers\Controller;
use App\Models\Dia;
use App\Models\DiaProcedimiento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DiaProcediminetoController extends Controller
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
        $request->validate([
            'procedimientos'=>'required',
            'hora'=>'required',
        ]);
        try {
            //code...
            $dia = Dia::findOrFail($request->dia);
            for ($i=0; $i < count($request->procedimientos); $i++) { 
                # code...
                $dprocedimiento = new DiaProcedimiento();
                $dprocedimiento->hora = $request->hora;
                $dprocedimiento->procedimiento_id = $request->procedimientos[$i];
                $dprocedimiento->dia_id = $request->dia;
                $dprocedimiento->save();
            }
            return Redirect::to('/licenciados/kardexes/procedimientos?kardex='.$dia->kardex->id)->with('info','se registro correctamente el procedimiento');
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('licenciados.kardexes.index')->with('error','error no se registro el procedimiento');
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
        try {
            //code...
            $dprocedimiento = DiaProcedimiento::findOrFail($id);
            $dprocedimiento->registro = Carbon::now();
            $dprocedimiento->user_id = Auth::user()->id;
            $dprocedimiento->update();
            return Redirect::to("/licenciados/kardexes/procedimientos?kardex=".$dprocedimiento->dia->kardex_id)->with('info','se actualizo la informacion correctamente');
        } catch (\Throwable $th) {
            return Redirect::to("/licenciados/kardexes/procedimientos?kardex=".$dprocedimiento->dia->kardex_id)->with('error','no se actualizo la informacion correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            //code...
            $dprocedimiento = DiaProcedimiento::findOrFail($id);
            $kardex = $dprocedimiento->dia->kardex_id;
            $dprocedimiento->delete();
            return Redirect::to('/licenciados/kardexes/procedimientos?kardex='.$kardex)
            ->with('info','se agregaron las dietas correctamente');
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('licenciados.kardexes.index')
            ->with('error','no puede agregar las dietas');
        }
    }
}
