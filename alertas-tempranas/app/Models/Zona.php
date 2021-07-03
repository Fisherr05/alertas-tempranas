<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;
    public $timestamps = true;

    //Reacion de uno a muchos
    public function parroquias(){
        return $this->hasMany('App\Models\Parroquia')->withtimestamps();
    }
    public function fincas(){

        return $this->hasMany('App\Models\Finca')->withtimestamps();
    }

    //Relacion uno a muchos (inversa)

}
