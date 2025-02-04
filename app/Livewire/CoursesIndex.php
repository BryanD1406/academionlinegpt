<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Livewire\Component;

// *Llamamos a la clase el cual nos ayudara a crear paginaciones de manera dinamica
use Livewire\WithPagination;



class CoursesIndex extends Component
{
    //*hacemos uso de la clase withPagination

    use WithPagination;

    //*Cualquier  propiedad publica creada en un componente puede usarse en la vista
    public $category_id;
    public $level_id;

    public function render()
    {
        $categories = Category::all();
        $levels = Level::all();

        $courses = Course::where('status', 3)
            ->category($this->category_id)
            ->level($this->level_id)
            ->latest('id')
            ->paginate(9);
        
        return view('livewire.courses-index', compact('courses', 'categories', 'levels'));
    }

    //*Resetear filtros cuando se haga click en el boton de  mostrar todos los cursos
    public function resetFilters(){
        $this->reset(['category_id', 'level_id']);
    }
}
