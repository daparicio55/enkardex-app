<?php

namespace App\Http\Controllers;

use App\Models\Dieta;
use App\Models\Kardex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DietaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        try {
            $dietas = Dieta::orderBy('nombre','asc')
            ->get();
            $kardex = Kardex::findOrFail($request->kardex);
            $dietas = Dieta::orderBy('nombre','asc')->get();
            return view('licenciados.kardexes.dietas.index',compact('kardex','dietas'));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return Redirect::route('licenciados.kardexes.dietas.index')->with('error','nose puede mostrar los examenes');
        }
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
