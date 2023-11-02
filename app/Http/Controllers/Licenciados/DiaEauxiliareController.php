<?php

namespace App\Http\Controllers\Licenciados;

use App\Http\Controllers\Controller;
use App\Models\DiaEauxiliare;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DiaEauxiliareController extends Controller
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
            $diaeauxiliare = new DiaEauxiliare();
            $diaeauxiliare->eauxiliare_id = $request->eauxiliare;
            $diaeauxiliare->dia_id = $request->dia;
            $diaeauxiliare->hora = date('H:i:00',strtotime(Carbon::now()));
            $diaeauxiliare->save();
            return Redirect::to('/licenciados/kardexes/eauxiliares?kardex='.$request->kardex)->with('info','se guardo los datos correctamente');
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('licenciados.kardexes.deas.index')->with('error','se producio un error al intentar guardar los datos');
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
            $dia = DiaEauxiliare::findOrFail($id);
            if($dia->estado == "solicitado"){
                $dia->estado ="realizado";
            }else{
                $dia->estado ="solicitado";
            }
            $dia->update();
            return Redirect::to("/licenciados/kardexes/eauxiliares?kardex=".$dia->eauxiliare->kardex->id)->with('info','se cambio el estado el exámen');
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::to("/licenciados/kardexes/eauxiliares?kardex=".$dia->eauxiliare->kardex->id)->with('error','error al actualizar');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            //code...
            $dia = DiaEauxiliare::findOrFail($id);
            $kardex = $dia->eauxiliare->kardex->id;
            $dia->delete();
            return Redirect::to("/licenciados/kardexes/eauxiliares?kardex=".$kardex)->with('info','se eliminó correctamente el exámen');
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::to("/licenciados/kardexes/eauxiliares?kardex=".$kardex)->with('error','hay un error al intentar eliminar el exámen');
        }
    }
}
