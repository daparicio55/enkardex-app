<?php

namespace App\Http\Controllers;

use App\Models\Egrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EgrupoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function delete($id){
        try {
            //code...
            $egrupo = Egrupo::findOrFail($id);
            $egrupo->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administrador.escalas.index')->with('error','no se puede eliminar el grupo');
        }
        return Redirect::route('administrador.escalas.index')->with('info','se elimino el grupo correctamente');
    }
}
