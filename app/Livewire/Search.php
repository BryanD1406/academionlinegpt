<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class Search extends Component
{
    //*atributo search utilizado para obtener la informacion de la busqueda y luego hacer una consulta en la BD
    public $search;

    public function render()
    {
        return view('livewire.search');
    }

    //* Propiedad computada
    public function getResultsProperty()
    {
        //* El % indica que puede haber codigo antes o despues de la busqueda que le pasamos en search
        return Course::class::where('title', 'LIKE', '%' . $this->search . '%')
            ->where('status', 3)
            ->take(8)
            ->get();
    }
}
