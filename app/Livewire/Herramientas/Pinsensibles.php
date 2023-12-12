<?php

namespace App\Livewire\Herramientas;

use Livewire\Component;

class Pinsensibles extends Component
{
    public $peso;
    public $horas;
    public $temperatura;
    public $pinsensible;
    public $aoxidacion;

    public function calcular(){
        dd($this->all());
    }

    public function refresh(){
        $this->reset([
            'peso',
            'horas',
            'temperatura',
            'pinsensible',
            'aoxidacion'
        ]);
    }

    public function render()
    {
        return view('livewire..herramientas.pinsensibles');
    }
}
