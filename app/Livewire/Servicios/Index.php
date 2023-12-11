<?php

namespace App\Livewire\Servicios;

use App\Livewire\Forms\servicios\ServicioCreateForm;
use App\Models\Servicio;
use Livewire\Component;
Use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $datos = false;
    public $buscar = "SI";
    public $tabla = "SI";
    public $opcione ="";
    public $text ="";
    public ServicioCreateForm $servicio_create;


    public function servicio_store(){
        $this->servicio_create->store();
        $this->datos = false;
    }

     public function servicio_edit($id){
        $this->servicio_create->edit($id);
        $this->datos = true;
    }
    public function render()
    {
        $servicios = Servicio::when($this->opcione,function($q){
            $q->where($this->opcione,'like','%'.$this->text.'%');
        })->orderBy('id','desc')->paginate(8);
        return view('livewire..servicios.index',compact('servicios'));
    }
}
