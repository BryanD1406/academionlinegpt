<?php

namespace App\Livewire\Instructor;

use App\Models\Lesson;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class LessonResources extends Component
{
    use WithFileUploads;
    //*para el procesamiento de imagenes

    public $lesson, $file;

    public function mount(Lesson $lesson){
        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.instructor.lesson-resources');
    }

    public function save(){
        $this->validate([
            'file' => 'required'
        ]);

         $url = $this->file->store('resources');
         $this->lesson->resource()->create([
                'url' => $url
         ]);

         $this->lesson = Lesson::find($this->lesson->id);
    }


    public function destroy(){
        Storage::delete($this->lesson->resource->url);
        $this->lesson->resource->delete();
        $this->lesson = Lesson::find($this->lesson->id);
    }


    public function download(){
        //*descargar recurso

        return response()->download(storage_path('app/' . $this->lesson->resource->url));
    }
    

}
