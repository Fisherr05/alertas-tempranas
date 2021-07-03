<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use App\Models\Variedad;

use Illuminate\Http\Request;

class finca_variedad extends Controller
{
    //
    public function store(Request $request)
    {
        //
        $datos= request()->except('_token');
        $variedad=new Variedad;
        $variedad->idFinca=$datos['idFinca'];
        $variedad->idVariedad=$datos['idVariedad'];
        $variedad->save();

    }


}
