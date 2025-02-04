<?php

use App\Http\Controllers\Instructor\CourseController;
use App\Livewire\Instructor\CoursesCurriculum;
use App\Livewire\Instructor\CoursesStudents;
use Illuminate\Support\Facades\Route;
// use App\Livewire\InstructorCursos;

Route::redirect('', 'instructor/cursos');

Route::resource('cursos', CourseController::class)->names('cursos');

Route::get('cursos/{curso}/curriculum', CoursesCurriculum::class)->middleware('can:Actualizar cursos')->name('cursos.curriculum');


Route::get('cursos/{curso}/goals',[CourseController::class, 'goals'])->name('cursos.goals');

Route::get('cursos/{curso}/students', CoursesStudents::class)->middleware('can:Actualizar cursos')->name('cursos.students');

Route::post('cursos/{curso}/status',[CourseController::class, 'status'])->name('cursos.status');

Route::get('cursos/{curso}/observation',[CourseController::class, 'observation'])->name('cursos.observation');