<?php

namespace App\Livewire\Forms;

use App\Models\DiaDieta;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DiadietaDeleteForm extends Form
{
    //
    public function destroy($id){
        $ddieta = DiaDieta::find($id);
        $ddieta->delete();
    }
}
