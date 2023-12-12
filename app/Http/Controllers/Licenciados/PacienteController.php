<?php

namespace App\Http\Controllers\Licenciados;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PacienteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('livewire.licenciados.indexPacientes');
    }

    public function delete($id){
        try {
            //code...
            $paciente = Paciente::findOrFail($id);
            $paciente->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('licenciados.pacientes.index')->with('error','no se puede eliminar el paciente');
        }
        return Redirect::route('licenciados.pacientes.index')->with('info','se elimino correctamente el paciente');
    }
}
