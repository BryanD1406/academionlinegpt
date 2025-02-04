<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use App\Models\Goal;
use Livewire\Component;

class CoursesGoals extends Component
{
    public $curso, $goal, $name;

    protected $rules = [
        'goal.name' => 'required'
    ];

    public function mount(Course $curso)
    {
        $this->curso = $curso;
        $this->goal = new Goal();
    }

    public function render()
    {
        return view('livewire.instructor.courses-goals');
    }

    public function edit(Goal $goal)
    {
        $this->goal = $goal;
    }

    public function update(){
        $this->validate();
        $this->goal->save();
        $this->goal = new Goal();

        $this->curso = Course::find($this->curso->id);
    }
    public function destroy(Goal $goal){
        $goal->delete();
        $this->curso = Course::find($this->curso->id);
    }

    public function store(){

        $this->validate([
            'name' => 'required'
        ]);
        $this->curso->goals()->create([
            'name' => $this->name
        ]);
        $this->reset('name');
        $this->curso = Course::find($this->curso->id);
    }
}
