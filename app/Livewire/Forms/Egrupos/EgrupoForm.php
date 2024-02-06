<?php

namespace App\Livewire\Forms\Egrupos;

use App\Models\Egrupo;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EgrupoForm extends Form
{
    //
    public $id = 0;
    public $nombre;
    public $escala_id;
    public $formulario = false;

    public function create($id){
        $this->escala_id = $id;
        $this->reset(['nombre','id']);
        $this->formulario = true;
    }
    
    public function store(){
        
        try {
            //code...
            if ($this->id == 0){
                Egrupo::create([
                    'nombre'=>$this->nombre,
                    'escala_id'=>$this->escala_id,
                ]);
            }else{
                $egrupo = Egrupo::find($this->id);
                $egrupo->update([
                    'nombre'=>$this->nombre,
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
        $this->reset(['id','nombre','escala_id']);
        $this->formulario = false;
    }

    public function edit($id){
        try {
            //code...
            $egrupo = Egrupo::find($id);
            $this->id = $egrupo->id;
            $this->nombre = $egrupo->nombre;
            $this->escala_id = $egrupo->escala_id;
            $this->formulario = true;
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
        $this->formulario = true;
    }
}
