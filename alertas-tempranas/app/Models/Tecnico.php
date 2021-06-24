<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;
    public $timestamps = true;

    //Relacion uno a muchos
    public function monitoreos(){
        return $this->hasMany('App\Models\Monitoreo')->withtimestamps();
    }
}
