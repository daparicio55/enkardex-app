<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LicenciadoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        return view('livewire.administrador.licenciados.index');
    }

    public function delete($id){
        try {
            //code...
            $licenciado = User::findOrFail($id);
            $licenciado->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administrador.licenciados.index')->with('error','no se pudo eliminar el usuario');
        }
        return Redirect::route('administrador.licenciados.index')->with('info','se elimino el usuario correctamente');
    }
}
