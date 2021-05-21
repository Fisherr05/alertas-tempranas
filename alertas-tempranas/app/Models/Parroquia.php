<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    use HasFactory;
    public $timestamps = true;

    //Relacion uno a muchos (inversa)
    public function canton(){
        return $this->belongsTo('App\Models\Canton')->withtimestamps();
    }

}
