<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable=[
        'idZona',
        'nombreFinca',
        'propietarioFinca',
        'cedula',
        'telefono',
        'coordenadaX',
        'coordenadaY',
        'densidad',
    ];

    //Reacion de uno a muchos

    public function estudios(){
        return $this->hasMany('App\Models\Estudio')->withtimestamps();
    }

    //Relacion de muchos a muchos
    public function variedades(){
        return $this->belongsToMany('App\Models\Variedad')->withtimestamps();
    }

}
