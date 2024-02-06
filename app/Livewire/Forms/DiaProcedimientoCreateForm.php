<?php

namespace App\Livewire\Forms;

use App\Models\DiaProcedimiento;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DiaProcedimientoCreateForm extends Form
{
    //
    public $procedimiento_id="";
    public $observacion="";
    public function store($dia){
        $diaprocedimiento = DiaProcedimiento::create([
            'procedimiento_id'=>$this->procedimiento_id,
            'dia_id'=>$dia,
            'observacion'=>$this->observacion,
            'fechahora'=>Carbon::now(),
            'user_id'=>auth()->id(),
        ]);
    }
}
