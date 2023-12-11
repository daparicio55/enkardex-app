<?php

namespace App\Livewire\Forms\Unidades;

use App\Models\Unidade;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UnidadeCreateForm extends Form
{
    //
    public $id;
    public $nombre;
    
    public function store(){
        if($this->id){
            $unidade = Unidade::find($this->id);
            $unidade->nombre = $this->nombre;
            $unidade->update();
        }else{
            $unidade = Unidade::create([
                'nombre'=>$this->nombre,
            ]);
        }
        //reseteamos los valores
        $this->reset(['id','nombre']);
    }
    public function edit($id){
        $unidade = Unidade::find($id);
        $this->id = $unidade->id;
        $this->nombre = $unidade->nombre;
    }
}
