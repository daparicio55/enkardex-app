<?php

namespace App\Livewire\Forms;

use App\Models\Indicacione;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MedicamentoDeleteForm extends Form
{
    //
    public function destroy($id){
        $indicacione = Indicacione::find($id);
        $indicacione->delete();
    }
}
