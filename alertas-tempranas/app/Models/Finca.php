<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    use HasFactory;

    //Reacion de uno a muchos
    public function zonas(){
        return $this->hasMany('App\Models\Zona');
    }
    public function estudios(){
        return $this->hasMany('App\Models\Estudio');
    }

    //Relacion de muchos a muchos
    public function variedades(){
        return $this->belongsToMany('App\Models\Variedad');
    }
}
