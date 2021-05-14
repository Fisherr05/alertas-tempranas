<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoreo extends Model
{
    use HasFactory;

    //Relacion uno a muchos
    public function datos(){
        return $this->hasMany('App\Models\Datos');
    }

    public function tecnicos(){
        return $this->hasMany('App\Models\Tecnico');
    }

    public function archivos(){
        return $this->hasMany('App\Models\Archivo');
    }

    public function plantas(){
        return $this->hasMany('App\Models\Planta');
    }

    //Relacion uno a muchos (inversa)
    public function estudio(){
        return $this->belongsTo('App\Models\Estudio');
    }
}
