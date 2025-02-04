<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use App\Models\Requirement;
use Livewire\Component;

class CoursesRequirements extends Component
{

    public $curso, $requirement, $name;

    protected $rules = [
        'requirement.name' => 'required'
    ];

    public function mount(Course $curso)
    {
        $this->curso = $curso;
        $this->requirement = new Requirement();
    }


    public function render()
    {
        return view('livewire.instructor.courses-requirements');
    }

    public function edit(Requirement $requirement)
    {
        $this->requirement = $requirement;
    }

    public function update(){
        $this->validate();
        $this->requirement->save();
        $this->requirement = new Requirement();

        $this->curso = Course::find($this->curso->id);
    }
    public function destroy(Requirement $requirement){
        $requirement->delete();
        $this->curso = Course::find($this->curso->id);
    }

    public function store(){

        $this->validate([
            'name' => 'required'
        ]);
        $this->curso->requirements()->create([
            'name' => $this->name
        ]);
        $this->reset('name');
        $this->curso = Course::find($this->curso->id);
    }
}
