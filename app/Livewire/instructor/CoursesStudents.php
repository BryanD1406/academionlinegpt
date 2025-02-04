<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesStudents extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $curso, $search;

    public function mount(Course $curso){
        $this->curso = $curso;
        $this->authorize('dicatated', $curso);
    }

    //*Ciclo de vida de livewire
    //*Este componente solo se activara cuando haya cambios en la variable search
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        //*al poner los parentesis indicamos que queremos la relacion mas no el registro
        $students = $this->curso->students()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(4);
        return view('livewire.instructor.courses-students', compact('students'))->layout('layouts.instructor', ['curso' => $this->curso]);
    }
}
