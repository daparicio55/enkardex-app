<?php

namespace App\View\Components;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Inputdate extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $name;
    public $value;
    public $label;
    public function __construct(
        $id = "xinput",
        $name = "xinput",
        $label = 'Fecha',
        $value = null,
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputdate');
    }
}
