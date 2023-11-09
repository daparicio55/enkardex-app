<?php

namespace App\Http\Controllers\Licenciados;

use App\Http\Controllers\Controller;
use App\Models\Dia;
use App\Models\Kardex;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        /* $this->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified']); */
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        /* $kardex = Kardex::findOrFail($request->kardex);
        return view('licenciados.kardexes.dias.index',compact('kardex')); */
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
        //dd($request);
        try {
            //code...
            $kardex = Kardex::findOrFail($request->kardex);
            $day = Carbon::parse($kardex->dias()->orderBy('fecha','desc')->first()->fecha);    
            for ($i=0; $i < $request->add; $i++) { 
                # code...
                $dia = new Dia();
                $dia->fecha = $day->addDay();
                $dia->kardex_id = $kardex->id;
                $dia->save();
            }
            if($request->local == "kardexes"){
                return Redirect::route('licenciados.kardexes.index')->with('info','se agrego correctamente el día');
            }else{
                return Redirect::to('/licenciados/kardexes/'.$request->local.'?kardex='.$request->kardex)->with('info','se agrego correctamente el día');
            }
        } catch (\Throwable $th) {
            //throw $th;
            if($request->local == "kardexes"){
                return Redirect::route('licenciados.kardexes.index')->with('error','no se agregó agregar el día');
            }else{
                return Redirect::to('/licenciados/kardexes/'.$request->local.'?kardex='.$request->kardex)->with('error','no se agregó agregar el día');
            }
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
