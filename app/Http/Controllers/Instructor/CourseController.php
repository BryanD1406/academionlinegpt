<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Leer cursos')->only('index');
        $this->middleware('can:Crear cursos')->only('create', 'store');
        $this->middleware('can:Actualizar cursos')->only('edit', 'update', 'goals');
        $this->middleware('can:Eliminar cursos')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('instructor.cursos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        return view('instructor.cursos.create', compact('categories', 'levels', 'prices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image',
        ]);


        $curso  = Course::create($request->all());

        if ($request->file('file')) {
            $url = Storage::disk('public')->put('courses', $request->file('file'));
            $curso->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('instructor.cursos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $curso)
    {
        return view('instructor.cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $curso)
    {
        $this->authorize('dicatated', $curso);

        //*Creamos un array de las categorias usando el metodo pluck para pasarlo a laravel collective
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('instructor.cursos.edit', compact('curso', 'categories', 'levels', 'prices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $curso)
    {
        $this->authorize('dicatated', $curso);

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $curso->id,
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image',
        ]);

        $curso->update($request->all());

        if ($request->file) {
            if ($request->file('file')->isValid()) {
                //*imagen guardada correctamente 
                $url = Storage::disk('public')->put('courses', $request->file('file'));
                if ($curso->image) {
                    // Storage::delete($curso->image->url);
                    //*imagen eliminada correctamente
                    Storage::disk('public')->delete($curso->image->url);
                    $curso->image->update([
                        'url' => $url
                    ]);
                } else {
                    $curso->image()->create([
                        'url' => $url
                    ]);
                }
            }
        }

        return redirect()->route('instructor.cursos.edit', $curso);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $curso)
    {
        //
    }

    public function goals(Course $curso)
    {
        $this->authorize('dicatated', $curso);
        return view('instructor.cursos.goals', compact('curso'));
    }

    public function status(Course $curso)
    {
        if ($curso->sections->isempty())  return redirect()->route('instructor.cursos.edit', $curso)->with('error', 'Oops!: Tiene que subir algun contenido para que el curso sea evaluado');
        if ($curso->lessons->isempty()) return redirect()->route('instructor.cursos.edit', $curso)->with('error', 'Oops!: Debe tener almenos una leccion por cada seccion de su curso');
        if ($curso->goals->isempty()) return redirect()->route('instructor.cursos.edit', $curso)->with('error', 'Oops!: Su curso no describe las metas que lograra el estudiante, debe añadirlo');
        if ($curso->requirements->isempty()) return redirect()->route('instructor.cursos.edit', $curso)->with('error', 'Oops!: Debe indicar los requerimientos que el estudiante debe tener para llevar su curso');
        if ($curso->audiences->isempty()) return redirect()->route('instructor.cursos.edit', $curso)->with('error', 'Oops!: Debe indicar para que tipo de audiencia esta enfocada su curso');

        $curso->status = 2;
        $curso->save();
        if ($curso->observation) {
            $curso->observation->delete();
        }
        return redirect()->route('instructor.cursos.edit', $curso);
    }

    public function observation(Course $curso)
    {
        return view('instructor.cursos.observation', compact('curso'));
    }
}
