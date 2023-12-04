<?php

namespace App\Livewire\Forms;

use App\Models\DiaProcedimiento;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DiaProcedimientoDeleteForm extends Form
{
    //
    public function destroy($id){
        $diaprocedimiento = DiaProcedimiento::find($id);
        $diaprocedimiento->delete();
    }
}
