<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Doctore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MedicoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('livewire.administrador.medicos.index');
    }
    public function delete($id){
        try {
            //code...
            $medico = Doctore::findOrFail($id);
            $medico->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administrador.medicos.index')->with('error','se producio un error al intentar eliminar');
        }
        return Redirect::route('administrador.medicos.index')->with('info','se elimino correctamente');
    }
}
