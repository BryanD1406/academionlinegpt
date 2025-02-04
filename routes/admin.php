<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\PriceController;
use App\Livewire\IA;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');

//*para los resource aplicaremos los middlewares en los controladores
Route::resource('roles', RoleController::class)->names('roles');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');



//*CRUD CATEGORIAS
Route::resource('categories', CategoryController::class)->names('categories');

//*CRUD NIVELES
Route::resource('levels', LevelController::class)->names('levels');

//*CRUD PRECIOS
Route::resource('prices', PriceController::class)->names('prices');


// Route::get('consultas', function(){
//     return view('IA.ia');
// });





Route::get('cursos', [CourseController::class, 'index'])->name('cursos.index');

Route::get('cursos/{curso}', [CourseController::class, 'show'])->name('cursos.show');

Route::post('cursos/{curso}/approved', [CourseController::class, 'approved'])->name('cursos.approved');

Route::get('cursos/{curso}/observation', [CourseController::class, 'observation'])->name('cursos.observation');

Route::post('cursos/{curso}/reject', [CourseController::class, 'reject'])->name('cursos.reject');
