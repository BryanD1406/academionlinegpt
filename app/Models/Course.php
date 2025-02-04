<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    //*Colocar el metodo dentro del corchete para obtener el valor de cuantos estudiantes hay dentro del curso
    protected $withCount = ['students', 'reviews'];
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    protected $guarded = ['id', 'status'];
    
    //*obtener las reviews, crear nuevo atributo, obtenemos el promedio de calificaciones del curso
    public function getRatingAttribute(){
        //*rating es el campo donde se guardan las calificaciones
        //*Laravel entiende que al colocar un elemento dentro de la variable withCount, se asociara al 
        //*valor que quieras usando el nombre del metodo guardado '_' y count
        if($this->reviews_count){
            //*Si tiene calificaciones entonces que retorne el valor
            //*caso contrario debe devolver 5 
            return round($this->reviews->avg('rating'), 2);
        }else {
            return 5;
        }
        
    }

    //Query Scopes

    public function scopeCategory($query, $category_id){
        if($category_id) {
            return $query->where('category_id', $category_id);
        }
    }
    public function scopeLevel($query, $level_id){
        if($level_id) {
            return $query->where('level_id', $level_id);
        }
    }




    //relacion uno a muchos inversa
    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    //relacion uno a muchos inversa
    public function price()
    {
        return $this->belongsTo('App\Models\Price');
    }

    //relacion uno a muchos inversa
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    //Relacion reviews uno a muchos

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    //Realcion uno a muchos Profesores inversa

    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    //Relacion users estudiantes muchos a muchos inversa

    public function students()
    {
        return $this->belongsToMany('App\Models\User');
    }

    //Section relacion uno a muchos
    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }
    //Requirement relacion uno a muchos
    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement');
    }
    //Goal relacion uno a muchos
    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }
    //Audience relacion uno a muchos
    public function audiences()
    {
        return $this->hasMany('App\Models\Audience');
    }
    //Relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable'); 
    }

    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson','App\Models\Section');
    }

    //*Relacion uno a uno 

    public function observation(){
        return $this->hasOne('App\Models\Observation');
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
