<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

    //Reacion de uno a muchos
    public function parroquias(){
        return $this->hasMany('App\Models\Parroquia');
    }

    //Relacion uno a muchos (inversa)
    public function finca(){
        return $this->belongsTo('App\Models\Finca');
    }
}
