<?php

namespace App\Http\Controllers;

use App\Models\Doctore;
use App\Models\Eauxiliare;
use App\Models\Examene;
use App\Models\Kardex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EauxiliareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            //code...
            $eauxiliares = Eauxiliare::get();
            $kardex = Kardex::findOrFail($request->kardex);
            return view('licenciados.kardexes.eauxiliares.index',compact('kardex','eauxiliares'));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return Redirect::route('licenciados.kardexes.eauxiliares.index')->with('error','nose puede mostrar los examenes');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        try {
            //code...
            $kardex = Kardex::findOrFail($request->kardex);
            $examenes = Examene::orderBy('nombre','asc')
            ->get();
            $doctores = Doctore::orderBy('apellidos','asc')
            ->orderBy('nombres','asc')
            ->get();
            return view('licenciados.kardexes.eauxiliares.create',compact('kardex','examenes','doctores'));
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('licenciados.kardexes.index')->with('error','no se puede crear una indicacion por un error, intentelo otra vez');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            DB::beginTransaction();
            for ($i=0; $i < count($request->examenes); $i++) { 
                # code...
                $eauxiliare = new Eauxiliare();
                $eauxiliare->examene_id = $request->examenes[$i];
                $eauxiliare->descripcion = $request->descripcion;
                $eauxiliare->doctore_id = $request->doctore;
                $eauxiliare->kardex_id = $request->kardex;
                $eauxiliare->save();
            }
            DB::commit();
            return Redirect::to(asset('/licenciados/kardexes/eauxiliares?kardex=').$request->kardex)->with('info','se guardo los examenes correctamente');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            DB::rollBack();
            return Redirect::to(asset('/licenciados/kardexes/eauxiliares?kardex=').$request->kardex)->with('error','se producio un error cuando se intento guardar los examenes');
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
