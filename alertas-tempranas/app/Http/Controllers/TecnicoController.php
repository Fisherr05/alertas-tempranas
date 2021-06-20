<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use App\Models\Estudio;
use App\Models\Monitoreo;
use Illuminate\Http\Request;

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
        $datos['tecnicos'] = Tecnico::all();
        $datos['monitoreos'] = Monitoreo::all();
        return view('tecnico.index',$datos);
    }

    public function registro()
    {
        //
        $datos['tecnicos'] = Tecnico::all();
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
        $datos['tecnicos'] = Tecnico::all();
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
        Tecnico::insert($datos);
        return redirect('/tecnicos')->with('tecnicoGuardado','Técnico guardado con éxito');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show(Tecnico $tecnico)
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
        $tecnico = Tecnico::findOrfail($id);

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
        Tecnico::where('id','=',$id)->update($datos);
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
        Tecnico::destroy($id);
        return back()->with('tecnicoEliminado','Técnico  eliminado con éxito');
    }
}
