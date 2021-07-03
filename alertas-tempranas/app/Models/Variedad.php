<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variedad extends Model
{
    use HasFactory;
    public $timestamps = true;

    //Relacion de muchos a muchos
    public function fincas(){
        return $this->belongsToMany('App\Models\Finca')->withtimestamps();
    }
}
