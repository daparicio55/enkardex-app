<?php

namespace App\Livewire\Forms\Medicamentos;

use App\Models\Medicamento;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MedicamentoCreateForm extends Form
{
    //
    public $id;
    public $codigo;
    public $denominacion;
    public $especificaciones;
    public $unidad;
    public $restriccion;
    public $indicaciones;
    
    public function store(){
        if($this->id){
            $medicamento = Medicamento::find($this->id);
            $medicamento->codigo=$this->codigo;
            $medicamento->denominacion=$this->denominacion;
            $medicamento->especificaciones=$this->especificaciones;
            $medicamento->unidad=$this->unidad;
            $medicamento->restriccion=$this->restriccion;
            $medicamento->indicaciones=$this->indicaciones;
            $medicamento->update();
        }else{
            $medicamento = Medicamento::Create([
                'codigo'=>$this->codigo,
                'denominacion'=>$this->denominacion,
                'especificaciones'=>$this->especificaciones,
                'unidad'=>$this->unidad,
                'restriccion'=>$this->restriccion,
                'indicaciones'=>$this->indicaciones,
            ]);
        }
        //reseteamos los valores
        $this->reset(['id','codigo','denominacion','especificaciones','unidad','restriccion','indicaciones']);
    }
    public function edit($id){
        $medicamento = Medicamento::find($id);
        $this->id = $medicamento->id;
        $this->codigo=$medicamento->codigo;
        $this->denominacion=$medicamento->denominacion;
        $this->especificaciones=$medicamento->especificaciones;
        $this->unidad=$medicamento->unidad;
        $this->restriccion=$medicamento->restriccion;
        $this->indicaciones=$medicamento->indicaciones;
    }
}
