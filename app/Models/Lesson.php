<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // *Recordemos la logica de la tabla Lesson_user, la cual nos ayudaba a guardar todos los usuarios que hayan marcado como
    // * culminada una leccion entonces en esa tabla estan todos los usuarios y las lecciones que marcaron 
    //* Lo que se debe hacer ahora es consultar si el usuario logeado esta dentro de esa lista y en que lessons
    public function getCompletedAttribute(){
        //*llamamos a la relacion users que esta en nuestro modelo
       return $this->users->contains(auth()->user()->id);
    }

    //Relacion uno a muchos
    public function platform(){
        return $this->belongsTo('App\Models\Platform');
    }
    //Relacion muchos a uno
    public function section(){
        return $this->belongsTo('App\Models\Section');
    }
    //Relacion uno a uno
    public function description(){
        return $this->hasOne('App\Models\Description');
    }
    //Relacion muchos a muchos
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    //Relacion uno a uno polimorfica
    public function resource(){
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }
    
    //Relacion uno a muchos polimorfica
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    //Relacion uno a muchos polimorfica
    public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
}
