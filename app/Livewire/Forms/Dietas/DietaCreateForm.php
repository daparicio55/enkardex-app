<?php

namespace App\Livewire\Forms\Dietas;

use App\Models\Dieta;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DietaCreateForm extends Form
{
    //
    public $id;
    public $nombre;
    public $descripcion;

    public function store(){
        if($this->id){
            $dieta = Dieta::find($this->id);
            $dieta->nombre = $this->nombre;
            $dieta->descripcion = $this->descripcion;
            $dieta->update();
        }else{
            $dieta = Dieta::create([
                'nombre'=>$this->nombre,
                'descripcion'=>$this->descripcion,
            ]);
        }
        $this->reset([
            'nombre',
            'descripcion',
        ]);
    }
    
    public function edit($id){
        $dieta = Dieta::find($id);
        $this->id = $id;
        $this->nombre = $dieta->nombre;
        $this->descripcion = $dieta->descripcion;
    }
}
