<?php

namespace App\Http\Controllers;

use App\Models\Dato;
use App\Models\Estudio;
use App\Models\Monitoreo;
use App\Models\Planta;
use Illuminate\Http\Request;

class DatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['datos'] = Dato::all();
        $datos ['monitoreos'] = Monitoreo::all();
        $datos ['plantas'] = Planta::all();
        return view('dato.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datos['datos'] = Dato::all();
        $datos['monitoreos'] = Monitoreo::all();
        $datos['plantas'] =Planta::all();
        $datos['estudios']=Estudio::all();
        return view('dato.create',$datos);
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
        $datos = request()->except('_token');
        Dato::insert($datos);
        return redirect('/datos')->with('datoGuardado','Dato guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dato  $dato
     * @return \Illuminate\Http\Response
     */
    public function show(Dato $dato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dato  $dato
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dato = Dato::findorFail($id);
        $monitoreos = Monitoreo::all();
        $plantas = Planta::all();
        return view('dato.edit', compact('dato', 'monitoreos','plantas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dato  $dato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos= request()->except(['_token', '_method']);
        Dato::where('id','=',$id)->update($datos);
        return redirect('/datos')->with('datoModificado','Dato modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dato  $dato
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Dato::destroy($id);
        return back()->with('datoEliminado','Dato eliminado con éxito');
    }
}
