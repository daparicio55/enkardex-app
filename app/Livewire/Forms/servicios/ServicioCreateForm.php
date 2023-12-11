<?php

namespace App\Livewire\Forms\servicios;

use App\Models\Servicio;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Psy\CodeCleaner\FunctionContextPass;

class ServicioCreateForm extends Form
{
    //
    public $id;
    public $nombre;
    public function store(){
        if($this->id){
            $servicio = Servicio::find($this->id);
            $servicio->nombre = $this->nombre;
            $servicio->update();
        }else{
            $servicio = Servicio::create([
                'nombre'=>$this->nombre,
            ]);
        }
        //reseteamos los valores
        $this->reset(['id','nombre']);
    }
    public function edit($id){
        try {
            //code...
            $servicio = Servicio::find($id);
            $this->id = $servicio->id;
            $this->nombre = $servicio->nombre;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function delete($id){
        try {
            $servicio = Servicio::find($id);
            $servicio->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
