<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    //* Propiedades
    public $curso, $current;


    use AuthorizesRequests;

    public function mount(Course $curso)
    {
        $this->curso  = $curso;
        //* que recupere la relacion lessons
        foreach ($curso->lessons as $lesson) {
            if (!$lesson->completed) {
                $this->current = $lesson;
                break;
            }
        }

        //* En caso de que todos las lecciones esten como marcados
        //* en la propiedad current se coloca la ultima leccion
        if(!$this->current){
           $this->current  = $curso->lessons->last();
        }

        //* en este metodo debemos pasar el metodo que quiere que verifique una determinada accion
        //* y como segundo parametro el objeto que quieres que verifique
        $this->authorize('enrolled', $curso); 
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    //*metodos

    public function changeLesson(Lesson $lesson)
    {
        //* Esta funcion nos ayudara a cambiar el index en base al curso que este actualmente
        //* debido que al cambiar de enlace se debe cambiar tambien el lesson actual
        $this->current = $lesson;
    }

    public function completed()
    {
        if ($this->current->completed) {
            //* Eliminar registro
            //* Ponemos los parentesis para acceder a la relacion
            $this->current->users()->detach(auth()->user()->id);
        } else {
            //* Agregar registro
            $this->current->users()->attach(auth()->user()->id);
        }
        //* Rellenamos la propiedad con el current actual para actualizar los cambios 
        $this->current = Lesson::find($this->current->id);
        $this->curso = Course::find($this->curso->id);
    }


    //*Propiedades computadas


    public function getIndexProperty()
    {
        return $this->curso->lessons->pluck('id')->search($this->current->id);
    }
    public function getPreviousProperty()
    {
        if ($this->index == 0) {
            return  null;
        } else {
            return $this->curso->lessons[$this->index - 1];
        }
    }
    public function getNextProperty()
    {
        if ($this->index == $this->curso->lessons->count() - 1) {
            return null;
        } else {
            return $this->curso->lessons[$this->index + 1];
        }
    }

    public function getAdvanceProperty()
    {
        //* Calculamos el avance, para ello accedemos a las lessons del curso actual y verificamos cuantos fueron marcadas como vistas
        //* en base a eso vamos sumando y guardando el total de lesson completadas

        $i = 0;
        foreach ($this->curso->lessons as $lesson ) {
          if ($lesson->completed) {
                $i++;
          }
        }

        //* Formula matematica para calcular el porcentaje
        $advance = ($i * 100)/($this->curso->lessons->count());
        return round($advance, 2);
    }
    public function download(){
        //*descargar recurso

        return response()->download(storage_path('app/' . $this->current->resource->url));
    }
}
