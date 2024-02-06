<?php

namespace App\Livewire\Forms\Egvalores;

use App\Models\Egvalore;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EgvaloreForm extends Form
{
    //
    public $id = 0;
    public $nombre;
    public $valor;
    public $egrupo_id;
    public $formulario = False;

    public function create($id){
        $this->egrupo_id = $id;
        $this->reset(['nombre','valor']);
        $this->formulario = true;
    }

    public function edit($id){
        try {
            //code...
            $egvalore = Egvalore::findOrFail($id);
            $this->id = $egvalore->id;
            $this->nombre = $egvalore->nombre;
            $this->valor = $egvalore->valor;
            $this->egrupo_id = $egvalore->egrupo_id;
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
        $this->formulario = true;
    }

    public function store(){
        try {
            //code...
            if ($this->id == 0){
                Egvalore::create([
                    'nombre'=>$this->nombre,
                    'valor'=>$this->valor,
                    'egrupo_id'=>$this->egrupo_id,
                ]);
            }else{
                $egvalore = Egvalore::findorFail($this->id);
                $egvalore->nombre = $this->nombre;
                $egvalore->valor = $this->valor;
                $egvalore->update();
            }
            $this->reset(['nombre','valor','egrupo_id','id']);
            $this->formulario = false;
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
        $this->reset(['nombre','valor','id','egrupo_id']);
    }

}
