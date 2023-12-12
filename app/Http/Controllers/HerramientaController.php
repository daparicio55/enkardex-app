<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HerramientaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function imc(){
        return view('herramientas.imc');
    }
    
    public function pinsensibles(){
        return view('herramientas.pinsensibles');
    }

    public function scninios(){
        return view('herramientas.scninios');
    }

    public function parterial(){
        return view('herramientas.parterial');
    }
}
