<?php

namespace App\Livewire\Unidades;

use App\Livewire\Forms\Unidades\UnidadeCreateForm;
use App\Models\Unidade;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $datos = false;
    public $buscar = "SI";
    public $tabla = "SI";
    public $text ="";
    public UnidadeCreateForm $unidade_create;

    public function unidade_store(){
        $this->unidade_create->store();
        $this->datos = false;
    }
    public function unidade_edit($id){
        $this->unidade_create->edit($id);
        $this->datos = true;
    }
    public function render()
    {
        $unidades = Unidade::when($this->text,function($q){
            $q->where('nombre','like','%'.$this->text.'%');
        })->orderBy('id','desc')->paginate(8);

        return view('livewire..unidades.index',compact('unidades'));
    }
}
