<?php

namespace App\Http\Controllers;

use App\Models\Planta;
use App\Models\Monitoreo;
use Illuminate\Http\Request;

class PlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['plantas'] = Planta::all();
        $datos['monitoreos'] =Monitoreo::all();
        return view('planta.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datos['plantas'] = Planta::all();
        $datos['monitoreos'] =Monitoreo::all();
        return view('planta.create',$datos);
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
        $datos= request()->except('_token');
        Planta::insert($datos);
        return redirect('/plantas')->with('plantaGuardado','Planta guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function show(Planta $planta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $planta= Planta::findOrFail($id);
        $monitoreos=Monitoreo::all();
        return view('planta.edit', compact('planta','monitoreos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $datos= request()->except(['_token', '_method']);
        Planta::where('id','=',$id)->update($datos);
        return redirect('/plantas')->with('plantaModificado','Planta modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Planta::destroy($id);
        return back()->with('plantaEliminado','Planta eliminado con éxito');
    }
}
