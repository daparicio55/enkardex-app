<?php

namespace App\Livewire\Forms;

use App\Models\DiaExamene;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DiaExameneDeleteForm extends Form
{
    //
    public function destroy($id){
        $diaexamene = DiaExamene::find($id);
        $diaexamene->delete();
    }
}
