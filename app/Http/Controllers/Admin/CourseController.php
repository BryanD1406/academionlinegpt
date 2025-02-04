<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;

class CourseController extends Controller
{
    public function index(){

        $cursos = Course::where('status', 2)->paginate();
        return view('admin.courses.index', compact('cursos'));
    }

    public function show(Course $curso){

        $this->authorize('revision', $curso);
        return view('admin.courses.show', compact('curso'));
    }

    public function approved(Course $curso){

        if (!$curso->lessons || !$curso->goals || !$curso->requirements || !$curso->image) {
           return back()->with('info', "No se puede publicar un curso que no este terminado");
        }

        $curso->status = 3;
        $curso->save();

        //*Enviar correo 

        // $mail = new ApprovedCourse($curso);
        // Mail::to($curso->teacher->email)->queue($mail);


        return redirect()->route('admin.cursos.index')->with('info', "El curso se aprobo con exito");
    }

    public function observation(Course $curso){
            return view('admin.courses.observation', compact('curso'));
    }

    public function reject(Request $request, Course $curso){

       $request->validate([
            'body' => 'required'
       ]); 

        //*crear mailable
        $curso->observation()->create($request->all());
        $curso->status = 1;
        $curso->save();

        //*Enviar correo 

        // $mail = new RejectCourse($curso);
        // Mail::to($curso->teacher->email)->queue($mail);
        return redirect()->route('admin.cursos.index')->with('info', "El curso se ah rechazado con exito");

    }
}
