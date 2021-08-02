<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Principal extends Controller
{
    //

    public function index()
    {
        $contenidos=[
            [
                "titulo"=>"Ho",
                "imagen"=>"la",
                "texto"=>"0",
                "color"=>"bg-info",
            ],
            [
                "titulo"=>"como",
                "imagen"=>"es",
                "texto"=>"tas",
                "color"=>"bg-primary",
            ],
        ];

        return view('vista',compact('contenidos'));
    }
}
