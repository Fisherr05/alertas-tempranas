<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    use HasFactory;
    public $timestamps = true;

    //relacion de uno a muchos
    public function plantas(){
        return $this->hasMany('App\Models\Planta')->withtimestamps();
    }
    //relacion de uno a muchos(inversa)
    /*public function monitoreo(){
        return $this->belongsTo('App\Models\Monitoreo')->withtimestamps();
    }*/
}
