<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MedicamentoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('livewire.administrador.medicamentos.index');
    }
    public function delete($id){        
        try {
            //code...
            $medicamento = Medicamento::findOrFail($id);
            $medicamento->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administrador.medicamentos.index')->with('error','error al intentar eliminar este medicamento');
        }
        return Redirect::route('administrador.medicamentos.index')->with('info','se elimino correctamente');
    }
}
