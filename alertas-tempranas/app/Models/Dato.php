<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    use HasFactory;

    public function monitoreo(){
        return $this->belongsTo('App\Models\Monitoreo');
    }
}
