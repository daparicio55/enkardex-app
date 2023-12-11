<?php

namespace App\Livewire\Forms\Doctores;

use App\Models\Doctore;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DoctoreCreateForm extends Form
{
    //
    public $id;
    public $apellidos;
    public $nombres;

    public function store(){
        if($this->id){
            $doctore = Doctore::find($this->id);
            $doctore->nombres = $this->nombres;
            $doctore->apellidos = $this->apellidos;
            $doctore->update();
        }else{
            $servicio = Doctore::create([
                'nombres'=>$this->nombres,
                'apellidos'=>$this->apellidos,
            ]);
        }
        //reseteamos los valores
        $this->reset(['id','nombres','apellidos']);
    }
    
    public function edit($id){
        try {
            //code...
            $doctore = Doctore::find($id);
            $this->id = $doctore->id;
            $this->apellidos = $doctore->apellidos;
            $this->nombres = $doctore->nombres;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function delete($id){
        try {
            //code...
            $doctore = Doctore::find($id);
            $doctore->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
