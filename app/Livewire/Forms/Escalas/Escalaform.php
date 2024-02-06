<?php

namespace App\Livewire\Forms\Escalas;

use App\Models\DiaEscala;
use App\Models\DiaEscalaDetalle;
use App\Models\Escala;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Escalaform extends Form
{
    //
    public $id=0;
    public $nombre;
    public $formulario = false;
    public $frmcreate = false;
    public $grupo0;
    public $grupo1;
    public $grupo2;
    public $grupo3;
    public $grupo4;
    public $grupo5;
    public $grupo6;
    public $grupo7;


    public $escala;

    public function store(){
        if ($this->id == 0){
            $escala = Escala::create([
                'nombre'=>$this->nombre
            ]);
        }else{
            $escala = Escala::find($this->id);
            $escala->nombre = $this->nombre;
            $escala->update();
        }
        $this->reset(['id','nombre']);
        $this->formulario = false;
    }

    public function edit($id){
        $this->id = $id;
        $escala = Escala::find($this->id);
        $this->nombre = $escala->nombre;
        $this->formulario = true;
    }

    public function crear($id){
        $this->escala = Escala::findOrFail($id);
        $this->frmcreate = true;
    }

    public function guardar($dia_id,$escala_id){
        //dd($this->all());
        //dd($this->escala->egrupos);
        //primero registramos el dia_escala
        //dd("hola");

        $diaEscala = new DiaEscala();
        $diaEscala->dia_id = $dia_id;
        $diaEscala->escala_id = $escala_id;
        $diaEscala->user_id = auth()->id();
        $diaEscala->hora = Carbon::now();
        $diaEscala->save();
        //guardamos los valores de
        foreach ($this->escala->egrupos as $key => $egrupo) {
            # code...
            $varname = "grupo{$key}";
            $detalle = new DiaEscalaDetalle();
            $detalle->diaescala_id = $diaEscala->id;
            $detalle->egvalores_id = $this->$varname;
            $detalle->save();
        }
        $this->frmcreate = false;
    }

}
