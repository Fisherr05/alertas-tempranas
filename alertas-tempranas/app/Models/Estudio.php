<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    use HasFactory;

    //Relacion uno a muchos
    public function monitoreos(){
        return $this->hasMany('App\Models\Monitoreo');
    }

    // Relacion uno a muchos (inversa)
    public function finca(){
        return $this->belongsTo('App\Models\Finca');
    }

}
