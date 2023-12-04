<?php

namespace App\Livewire\Forms;

use App\Models\DoneDiaProcedimiento;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DoneDiaProcedimientoCreateForm extends Form
{
    //
    public function store($id){
        try {
            //code...
            $done = DoneDiaProcedimiento::create([
                'diaprocedimiento_id'=>$id,
                'user_id'=>auth()->id(),
                'fechahora'=>Carbon::now(),
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
        
    }
}
