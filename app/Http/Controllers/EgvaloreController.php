<?php

namespace App\Http\Controllers;

use App\Models\Egvalore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EgvaloreController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function delete($id){
        try {
            //code...
            $egvalore = Egvalore::findOrFail($id);
            $egvalore->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administrador.escalas.index')->with('error','no se puede eliminar el Valor');
        }
        return Redirect::route('administrador.escalas.index')->with('info','se elimino el valor correctamente');
    }
}
