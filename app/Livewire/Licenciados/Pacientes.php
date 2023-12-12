<?php

namespace App\Livewire\Licenciados;

use App\Livewire\Forms\PacienteCreateForm;
use App\Models\Paciente;
use Livewire\Component;
Use Livewire\WithPagination;

class Pacientes extends Component
{
    use WithPagination;
    public $datos = false;
    public $buscar = "SI";
    public $tabla = "SI";
    public $opcione ="";
    public $text ="";
    public PacienteCreateForm $paciente_store;

    public function store_paciente(){
        $this->paciente_store->store();
        $this->paciente_store->reset([
            'id','nombres','apellidopaterno','apellidomaterno','dni','sexo','talla','edad','peso','historia'
        ]);
        $this->datos = false;
    }
    public function edit_paciente($id){
        $this->paciente_store->edit($id);
        $this->datos = true;
    }

    public function render()
    {
        $pacientes = Paciente::when($this->opcione,function($q){
            $q->where($this->opcione,'like','%'.$this->text.'%');
        })->orderBy('id','desc')->paginate(8);
        return view('livewire..licenciados.pacientes',compact('pacientes'));
    }

    public function buscardni(){
        $this->paciente_store->buscardni();
    }

}
