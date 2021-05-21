<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    public $timestamps = true;
    use HasFactory;
    //Relacion uno a muchos (inversa)
    public function monitoreo(){
        return $this->belongsTo('App\Models\Monitoreo')->withtimestamps();
    }
    public function dato(){
        return $this->belongsTo('App\Models\Dato')->withtimestamps();
    }
}
