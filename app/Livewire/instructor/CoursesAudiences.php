<?php

namespace App\Livewire\Instructor;

use App\Models\Audience;
use App\Models\Course;
use Livewire\Component;

class CoursesAudiences extends Component
{

    public $curso, $audience, $name;

    protected $rules = [
        'audience.name' => 'required'
    ];

    public function mount(Course $curso)
    {
        $this->curso = $curso;
        $this->audience = new Audience();
    }

    public function render()
    {
        return view('livewire.instructor.courses-audiences');
    }

    public function edit(Audience $audience)
    {
        $this->audience = $audience;
    }

    public function update(){
        $this->validate();
        $this->audience->save();
        $this->audience = new Audience();

        $this->curso = Course::find($this->curso->id);
    }
    public function destroy(Audience $audience){
        $audience->delete();
        $this->curso = Course::find($this->curso->id);
    }

    public function store(){

        $this->validate([
            'name' => 'required'
        ]);
        $this->curso->audiences()->create([
            'name' => $this->name
        ]);
        $this->reset('name');
        $this->curso = Course::find($this->curso->id);
    }
}
