<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ServicioController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index (){
        return view('livewire.administrador.servicios.index');
    }
    public function delete($id){
        try {
            //code...
            $servicio = Servicio::findOrFail($id);
            $servicio->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administrador.servicios.index')->with('error','no se elimino el servicio correctamente');
        }
        return Redirect::route('administrador.servicios.index')->with('info','se elimino el servicio correctamente');
    }
}
