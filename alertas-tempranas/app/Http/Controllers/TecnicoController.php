<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Estudio;
use App\Models\Monitoreo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        //
        $datos['tecnicos'] = User::all();
        $datos['monitoreos'] = Monitoreo::all();
        return view('tecnico.index',$datos);
    }

    public function registro()
    {
        //
        $datos['tecnicos'] = User::all();
        $datos['monitoreos'] = Monitoreo::all();
        $datos['estudios'] = Estudio::all();
        return view('tecnico.registro',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datos['tecnicos'] = User::all();
        $datos['monitoreos'] = Monitoreo::all();
        $datos['estudios']= Estudio::all();
        return view('tecnico.create',$datos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datos =request()-> except('_token');
        $datos["password"]= Hash::make($datos["password"]);
        //return dd($datos);
        User::insert($datos);
        return redirect('/tecnicos')->with('tecnicoGuardado','Técnico guardado con éxito');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show(User $tecnico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $monitoreos = Monitoreo::all();
        $tecnico = User::findOrfail($id);

        return view('tecnico.edit', compact('tecnico','monitoreos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos= request()->except(['_token', '_method']);
        $datos["password"]= Hash::make($datos["password"]);
        User::where('id','=',$id)->update($datos);
        return redirect('/tecnicos')->with('tecnicoModificado','Técnico modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::destroy($id);
        return back()->with('tecnicoEliminado','Técnico  eliminado con éxito');
    }
}
