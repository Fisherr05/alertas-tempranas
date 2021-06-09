<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    use HasFactory;
    public $timestamps = true;

    //Relacion uno a muchos
    public function monitoreos(){
        return $this->hasMany('App\Models\Monitoreo')->withtimestamps();
    }
    /*public function variedades(){
        return $this->hasMany('App\Models\Variedad')->withtimestamps();
    }*/

    // Relacion uno a muchos (inversa)
    public function finca(){
        return $this->belongsTo('App\Models\Finca')->withtimestamps();
    }
}
