<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Dieta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DietaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('livewire.administrador.dietas.index');
    }
    public function delete($id){
        try {
            //code...
            $dieta = Dieta::findOrFail($id);
            $dieta->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administrador.dietas.index')->with('error','no se completo el borrado correctamente');
        }
        return Redirect::route('administrador.dietas.index')->with('info','se elimino la dieta correctamente');
    }
}
