<?php

namespace App\Livewire\Forms;

use App\Models\Dia;
use App\Models\Kardex;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DiaCreateForm extends Form
{
    //
    public function store($kardex){
        
        try {
            //code...
            $kardex = Kardex::findOrFail($kardex);
            $lastday = Carbon::parse($kardex->dias()->orderBy('fecha','desc')->first()->fecha);
            $dia = Dia::create([
                'fecha'=>date('Y-m-d',strtotime($lastday->addDay())),
                'kardex_id'=>$kardex->id,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            //dd($th->getMessage());
        }
    }
}
