<?php

namespace App\Livewire\Forms;

use App\Models\Dia;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DiaDeleteForm extends Form
{
    //
    public function destroy($dia){
        try {
            //code...
            $dia = Dia::findOrFail($dia);
            $dia->delete();
        } catch (\Throwable $th) {
            //throw $th;
//           dd($th->getMessage());
        }
    }
}
