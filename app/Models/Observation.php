<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    protected $fillable = [
        'body', 'course_id'
    ];

    //* Relacion uno a uno inversa

    public function course(){
        return  $this->belongsTo('App\Models\Course');
    }
}
