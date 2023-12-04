<?php

namespace App\Livewire\Forms;

use App\Models\DiaIndicacione;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DiaindicacioneCreateForm extends Form
{
    //
    public $id;
    public $hora;
    public $dia_id;
    public $indicacione_id;
    public $user_id;
    public $tipo;
    public function store($hora,$dia,$indicacione,$tipo){
        DiaIndicacione::updateOrCreate(
            [
                'dia_id'=>$dia,
                'indicacione_id'=>$indicacione,
                'hora'=>$hora,
            ],
            [
                'dia_id'=>$dia,
                'indicacione_id'=>$indicacione,
                'hora'=>$hora,
                'user_id'=>auth()->id(),
                'tipo'=>$tipo,
                'registro'=>Carbon::now(),
            ]
        );

    }

}
