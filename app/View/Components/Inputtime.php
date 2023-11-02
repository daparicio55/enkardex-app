<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Inputtime extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $name;
    public $value;
    public $label;
    public $class;
    public function __construct(
        $id = "xtime",
        $name = "xtime",
        $label = 'Fecha',
        $value = null,
        $class = 'text-dark',
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputtime');
    }
}
