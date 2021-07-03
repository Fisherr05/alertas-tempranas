<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoreo extends Model
{
    use HasFactory;
    public $timestamps = true;

    //Relacion uno a muchos
    /*public function datos(){
        return $this->hasMany('App\Models\Datos')->withtimestamps();
    }*/

    public function tecnico(){
        return $this->belongsTo('App\Models\Tecnico')->withtimestamps();
    }

    public function archivos(){
        return $this->hasMany('App\Models\Archivo')->withtimestamps();
    }

    public function plantas(){
        return $this->hasMany('App\Models\Planta')->withtimestamps();
    }

    //Relacion uno a muchos (inversa)
    public function estudio(){
        return $this->belongsTo('App\Models\Estudio')->withtimestamps();
    }
}
