<?php

namespace App\Livewire\Dietas;

use App\Livewire\Forms\Dietas\DietaCreateForm;
use App\Models\Dieta;
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
    public DietaCreateForm $dieta_create;

    public function dieta_store(){
        $this->dieta_create->store();
        $this->datos = false;
    }

    public function dieta_edit($id){
        $this->dieta_create->edit($id);
        $this->datos = true;
    }
    
    public function render()
    {
        $dietas = Dieta::when($this->opcione,function($q){
            $q->where($this->opcione,'like','%'.$this->text.'%');
        })->orderBy('id','desc')->paginate(8);
        return view('livewire..dietas.index',compact('dietas'));
    }
}
