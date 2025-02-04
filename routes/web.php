<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\CourseStatus;
use App\Livewire\IA;
use App\Models\Course;

Route::get('/', HomeController::class)->name('home');

Route::middleware([])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');
});

Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');
Route::get('cursos/{curso}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/pdf', [CourseController::class, 'pdf'])->name('pdf');
Route::get('/invoices', [HomeController::class, 'invoices'])->name('invoices');
Route::get('/mis-cursos', [CourseController::class, 'courses'])->name('my-courses');


Route::post('cursos/{curso}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');
//*En este caso como solo vamos a mostrar el componente dinamico entonces no hacemos uso del controlador coursecontroller
//* en su lugar usamos el componente livewire CourseStatus 
// * Tambien recordar que le estamos pasando un valor por parametro, este lo recibe el controlador CourseStatus
//* Este lo recibe y lo guarda en una variable que se crea en ese componente para ser usado en la vista relacionada
Route::get('cursos-status/{curso}', CourseStatus::class)->name('courses.status')->middleware('auth');
