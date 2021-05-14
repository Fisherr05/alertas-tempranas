<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    use HasFactory;
    //Relacion uno a muchos (inversa)
    public function monitoreo(){
        return $this->belongsTo('App\Models\Monitoreo');
    }
    public function dato(){
        return $this->belongsTo('App\Models\Dato');
    }
}