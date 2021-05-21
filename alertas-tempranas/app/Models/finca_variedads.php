<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finca_variedads extends Model
{
    use HasFactory;
    public $timestamps = true;
    public function fincas(){
        return $this->hasMany('App\Models\Finca')->withtimestamps();
    }
    public function variedades(){
        return $this->hasMany('App\Models\Variedad')->withtimestamps();
    }
}
