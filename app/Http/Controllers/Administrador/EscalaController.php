<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Escala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EscalaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        return view('livewire.administrador.escalas.index');
    }

    public function delete($id){
        try {
            //code...
            $escala = Escala::findOrFail($id);
            $escala->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administrador.escalas.index')->with('error','no se pudo eliminar la Escala');
        }
        return Redirect::route('administrador.escalas.index')->with('info','se elimino correctamente la Escala');
    }
}
