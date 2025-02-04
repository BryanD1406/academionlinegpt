<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;

class CoursePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    // ? La policy sirve para realizar una accion en base a una condicion que queramos en este caso usamos la autentificacion para validad
    // ? si un usuario puede o no puede ver una informacion : Codigo: php artisan make:policy CoursePolicy
    // ? la convencion es usar el nombre del controlador y poner policy al final

    // *Verificar si un alumno esta matriculado y en base a eso mostrar un boton que diga continuar curso o matrocularse
    public function enrolled(User $user, Course $curso)
    {
        //*objetivo verificar si un usuario puede o no ver un contenido
        //*Usando contains podemos verificar si el usuario que nos estan pasando por parametro forma parte de la tabla muchos a muchos
        return $curso->students->contains($user->id);
    }

    //*Siempre que generemos un policy debemos pasar por parametro al usuario actual
    //* Ponemos un simbolo de interrogacion para indicar que independientemente de si este logeado o no una persona funcionara igual la policy
    public function published(?User $user, Course $curso)
    {
        if ($curso->status == 3) {
            return true;
        } else {
            return false;
        }
    }
    //*policy para no permitir el paso a un instructor a un curso que no le pertenece y pueda editarlo

    public function dicatated(User $user, Course $curso)
    {
        if ($curso->user_id == $user->id) {
            return true;
        } else {
            return false;
        }
    }


    public function revision(User $user, Course $curso)
    {
        if ($curso->status == 2) {
            return true;
        } else {
            return false;
        }
    }

    public function valued(User $user, Course $curso)
    {
        //*Ya no permitir que se registren mas reseñas de un curso en caso que ya la haya realizado
        if (Review::where('user_id', $user->id)->where('course_id', $curso->id)->count()) {
            return false;
        }else{
            return true; 
        }
    }
}
