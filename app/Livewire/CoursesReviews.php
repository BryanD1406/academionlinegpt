<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class CoursesReviews extends Component
{
    public $curso_id, $comment;
    public $rating = 5;

    public function mount(Course $curso){
        $this->curso_id = $curso->id;
    }

    public function render()
    {
        $curso = Course::find($this->curso_id);
        return view('livewire.courses-reviews', compact('curso'));
    }

    public function store(){
        $curso = Course::find($this->curso_id);
        $curso->reviews()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id
        ]);
    }
}
