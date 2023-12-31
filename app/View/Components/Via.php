<?php

namespace App\View\Components;

use App\Models\Via as ModelsVia;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Via extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $vias = ModelsVia::orderBy('nombre','asc')->pluck('nombre','id')->toArray();
        return view('components.via',compact('vias'));
    }
}
