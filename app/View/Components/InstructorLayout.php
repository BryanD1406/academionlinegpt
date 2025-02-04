<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InstructorLayout extends Component
{
    
    public $curso;

    public function __construct($curso)
    {
        $this->curso = $curso;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.instructor');
    }
}
