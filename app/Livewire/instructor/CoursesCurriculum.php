<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use App\Models\Section;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class CoursesCurriculum extends Component
{
    use AuthorizesRequests;

    public $curso, $section, $name;

    protected $rules = [
        'section.name' => 'required',
    ];

    public function mount(Course $curso)
    {
        $this->curso = $curso;
        $this->section = new Section();

        $this->authorize('dicatated', $curso);  
    }

    public function render()
    {
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor', ['curso' => $this->curso]);
    }

    public function edit(Section $section)
    {
        $this->section = $section;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);

        Section::create([
            'name' => $this->name,
            'course_id' => $this->curso->id
        ]);

        $this->reset('name');
        $this->curso = Course::find($this->curso->id);
    }

    public function update()
    {
        $this->validate();

        $this->section->save();
        $this->section = new Section();
        $this->curso = Course::find($this->curso->id);
    }

    public function destroy(Section $section){
        $section->delete();
        $this->curso = Course::find($this->curso->id);
    }
}
