<?php

namespace App\Http\Controllers;

use App\Models\Kardex;
use App\Models\Procedimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProcedimientoController extends Controller
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
            $procedimientos = Procedimiento::orderBy('nombre','asc')
            ->get();
            $kardex = Kardex::findOrFail($request->kardex);
            return view('licenciados.kardexes.procedimientos.index',compact('kardex','procedimientos'));
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('licenciados.kardexes.index')->with('error','nose puede mostrar las los procedimientos');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            //code...
            $kardex = Kardex::findOrFail($request->kardex);
            $procedimientos = Procedimiento::orderBy('nombre','asc')
            ->get();
            return view('licenciados.kardexes.procedimientos.create',compact('kardex','procedimientos'));
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
        /* $request->validate([
            'procedimientos'=>'required',
        ]);
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
        } */
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
