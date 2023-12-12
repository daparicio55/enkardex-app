<?php

namespace App\Livewire\Herramientas;

use Livewire\Component;

class Scninios extends Component
{
    public $peso;
    public $talla;
    public $resultados;

    public function calcular(){
        
    }

    public function refresh(){
        $this->reset([
            'peso',
            'talla',
            'resultados'
        ]);
    }

    public function render()
    {
        return view('livewire..herramientas.scninios');
    }
}
