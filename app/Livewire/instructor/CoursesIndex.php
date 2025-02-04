<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;


class CoursesIndex extends Component
{
    use WithPagination;
    public $search;


    public function render()
    {

        $searchTerm = trim($this->search);

        $cursos = Course::where('title', 'LIKE', '%' . $this->search . '%')
            ->where('user_id', auth()->user()->id)
            ->latest('id')
            ->paginate(8);
        //* $cursos = Course::where()->paginate(8);

        return view('livewire.instructor.courses-index', compact('cursos'));
    }
    public function limpiar_page()
    {
        $this->resetPage();
    }
}
