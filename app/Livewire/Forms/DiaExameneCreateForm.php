<?php

namespace App\Livewire\Forms;

use App\Models\DiaEauxiliare;
use App\Models\DiaExamene;
use App\Models\Eauxiliare;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DiaExameneCreateForm extends Form
{
    //
    public $id;
    public $descripcion;
    public $examene_id="";
    public $doctore_id="";
    public function store($dia){
        
        $euxiliare = DiaExamene::create([
            'examene_id'=>$this->examene_id,
            'dia_id'=>$dia,
            'doctore_id'=>$this->doctore_id,
            'user_id'=>auth()->id(),
            'fechahora'=>Carbon::now(),
        ]);
    }
    
}

