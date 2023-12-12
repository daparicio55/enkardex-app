<?php

namespace App\Livewire\Herramientas;

use Livewire\Component;

class Imc extends Component
{
    public $peso;
    public $talla;
    public $resultado;
    public function calcular(){
        $this->resultado = number_format($this->peso / ((($this->talla)/100) * (($this->talla)/100)),2);
    }
    public function refresh(){
        $this->reset([
            'peso',
            'talla',
            'resultado'
        ]);
    }
    public function render()
    {
        return view('livewire..herramientas.imc');
    }
}
