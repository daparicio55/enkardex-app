<?php

namespace App\Livewire\Forms;

use App\Models\Indicacione;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MedicamentoCreateForm extends Form
{
    //
    public $dosis="";
    public $frecuencia="";
    public $via_id="";
    public $kardex_id;
    public $id;
    public function store($kardex,$medicamento){
        $indicacione = Indicacione::create([
            'dosis'=>$this->dosis,
            'frecuencia'=>$this->frecuencia,
            'medicamento_id'=>$medicamento,
            'via_id'=>$this->via_id,
            'kardex_id'=>$kardex,
        ]);
        
        $this->dosis='';
        $this->via_id='';
        $this->frecuencia='';
    }
}
