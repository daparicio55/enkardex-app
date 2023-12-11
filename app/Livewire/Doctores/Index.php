<?php

namespace App\Livewire\Doctores;

use App\Livewire\Forms\Doctores\DoctoreCreateForm;
use App\Models\Doctore;
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

    public DoctoreCreateForm $doctore_create;

    public function doctore_store(){
        $this->doctore_create->store();
        $this->datos = false;
    }

    public function doctore_edit($id){
        $this->doctore_create->edit($id);
        $this->datos = true;
    }

    public function render()
    {
        $doctores = Doctore::when($this->opcione,function($q){
            $q->where($this->opcione,'like','%'.$this->text.'%');
        })->orderBy('id','desc')->paginate(8);
        return view('livewire..doctores.index',compact('doctores'));
    }
}
