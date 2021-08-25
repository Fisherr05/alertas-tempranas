<?php

namespace App\Http\Controllers;

use App\Models\Monitoreo;
use App\Models\Estudio;
use App\Models\Finca;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MonitoreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        $monitoreos = Monitoreo::all();
        $estudios= Estudio::all();
        $tecnicos= User::all();
        return view('monitoreo.index',compact('monitoreos','estudios','tecnicos'));
    }

    public function registro()
    {
        $monitoreos = Monitoreo::all();
        $estudios= Estudio::all();
        return view('monitoreo.registro',compact('monitoreos','estudios'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datos['monitoreos'] = Monitoreo::all();
        $datos1['estudios'] = Estudio::all();
        $datos['fincas']= Finca::all();
        $datos['tecnicos']=User::all();
        return view('monitoreo.create',$datos,$datos1);
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
       // $datosMonitoreo= request()->all();
        $datosMonitoreo= request()->except('_token');
        Monitoreo::insert($datosMonitoreo);
        return redirect('/monitoreos')->with('monitoreoGuardado','Monitoreo guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monitoreo  $monitoreo
     * @return \Illuminate\Http\Response
     */
    public function show(Monitoreo $monitoreo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monitoreo  $monitoreo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $monitoreo = Monitoreo::findOrFail($id);
        $estudios = Estudio::all();
        $tecnicos = User::all();
        return view('monitoreo.edit', compact('monitoreo','estudios','tecnicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monitoreo  $monitoreo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosMonitoreo= request()->except(['_token', '_method']);
        Monitoreo::where('id','=',$id)->update($datosMonitoreo);
        return redirect('/monitoreos')->with('monitoreoModificado','Monitoreo modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monitoreo  $monitoreo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Monitoreo::destroy($id);
        return back()->with('monitoreoEliminado','Monitoreo eliminado con éxito');
    }
}
