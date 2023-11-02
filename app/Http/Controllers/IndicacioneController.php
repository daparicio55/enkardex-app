<?php

namespace App\Http\Controllers;

use App\Models\Indicacione;
use App\Models\Kardex;
use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class IndicacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        //
        try {
            //code...
            $medicamentos = Medicamento::orderBy('denominacion','asc')
            ->get();
            $kardex = Kardex::findOrFail($request->kardex);
            return view('licenciados.kardexes.indicaciones.index',compact('kardex','medicamentos'));
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('licenciados.kardexes.index')->with('error','nose puede mostrar las indicaciones');
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
            $medicamentos = Medicamento::orderBy('denominacion','asc')
            ->get();
            return view('licenciados.kardexes.indicaciones.create',compact('kardex','medicamentos'));
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
        try {
            //code...
            DB::beginTransaction();
            for ($i=0; $i < count($request->medicamentos); $i++) { 
                # code...
                $indicacione = new Indicacione();
                $indicacione->medicamento_id = $request->medicamentos[$i];
                $indicacione->kardex_id = $request->kardex;
                $indicacione->save();
            }
            DB::commit();
            return Redirect::to(asset('/licenciados/kardexes/indicaciones?kardex=').$request->kardex)->with('info','se guardo las indicaciones correctamente');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return Redirect::to(asset('/licenciados/kardexes/indicaciones?kardex=').$request->kardex)->with('error','se producio un error cuando se intento guardar las indicaciones');
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
            $indicacione = Indicacione::findOrFail($id);
            $indicacione->dosis = $request->dosis;
            $indicacione->via_id = $request->via_id;
            $indicacione->frecuencia = $request->frecuencia;
            $indicacione->update();
            return Redirect::to(asset('/licenciados/kardexes/indicaciones?kardex=').$indicacione->kardex_id)->with('info','se guardo las indicaciones correctamente');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return Redirect::to(asset('/licenciados/kardexes/indicaciones?kardex=').$indicacione->kardex_id)->with('error','se producio un error cuando se intento guardar las indicaciones');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
