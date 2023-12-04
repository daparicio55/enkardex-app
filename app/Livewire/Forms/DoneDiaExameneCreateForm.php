<?php

namespace App\Livewire\Forms;

use App\Models\DoneDiaexamene;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DoneDiaExameneCreateForm extends Form
{
    //
    public function store($diaexamene_id){
        $done = DoneDiaexamene::create([
            'diaexamene_id'=>$diaexamene_id,
            'user_id'=>auth()->id(),
            'fechahora'=>Carbon::now(),
        ]);
    }
}
