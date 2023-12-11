<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UnidadeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('livewire.administrador.unidades.index');
    }
    public function delete($id){
        try {
            //code...
            $unidade = Unidade::findOrFail($id);
            $unidade->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administrador.unidades.index')->with('error','no se pudo eliminar la unidad');
        }
        return Redirect::route('administrador.unidades.index')->with('info','se borror la unidad correctamente');
    }
}
