<?php

namespace App\Livewire\Forms;

use App\Models\DiaDieta;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DiadietaCreateForm extends Form
{
    //
    public function store($dieta,$dia){
        DiaDieta::create([
            'dia_id'=>$dia,
            'dieta_id'=>$dieta,
        ]);
    }
}
