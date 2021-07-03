<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    use HasFactory;
    public $timestamps = true;

    //Reacion de uno a muchos
    public function parroquias(){
        return $this->hasMany('App\Models\Parroquia')->withtimestamps();
    }

}
