<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses/index');
    }

    public function show(Course $curso)
    {
        //*authorize ya forma parte de controller asi que se puede usar
        $this->authorize('published', $curso);

        $cursos_similares = Course::where('category_id', $curso->category_id)
            ->where('id', '!=', $curso->id)
            ->where('status', 3)
            ->latest('id')
            ->take(5)
            ->get();
        return view('courses/show', compact('curso', 'cursos_similares'));
    }
    public function enrolled(Course $curso)
    {
        // *Matricular al estudiante, guardando su id en la tabla de muchos a muchos entre estudiantes y users

        $curso->students()->attach(auth()->user()->id);
        return redirect()->route('courses.status', $curso);
    }

    public function courses()
    {
        $courses = auth()->user()->courses;
        return view('mis-cursos', compact('courses'));
    }

    public function pdf()
    {
        return redirect()->route('home');
        $data_invoce = [
            'numero' => 1,
            'codigo_boleta' => 'B001-' . 1,
            'user_social' => auth()->user()->name,
            'user_address' => "Jr Los Alamos 1890",
            'user_id' => auth()->user()->id,
            'course_id' => 1,
            'course_description' => "Aprende sobre componentes electrónicos",
            'amount' => 1,
            'date' => now(),
            'venta_total' => 9.99,
        ];
        return view('pdf.invoice', compact('data_invoce'));
    }
}
