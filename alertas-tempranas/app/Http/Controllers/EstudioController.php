<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use App\Models\Finca;
use App\Models\Variedad;
use App\Models\Zona;
use Illuminate\Http\Request;

class EstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estudios= Estudio::all();
        $fincas= Finca::all();
        $variedades=Variedad::all();
        return view('estudio.index',compact('estudios','fincas','variedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datos['estudios'] = Estudio::all();
        $datos['fincas'] = Finca::all();
        $datos['zonas']= Zona::all();
        $datos['variedades']=Variedad::all();
        return view('estudio.create',$datos);

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
        Estudio::insert($datos);
        return redirect('/estudios')->with('estudioGuardado','Estudio guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function show(Estudio $estudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $estudio = Estudio::findOrfail($id);
        $fincas = Finca::all();
        $variedades =Variedad::all();
        return view('estudio.edit', compact('estudio','fincas','variedades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos= request()->except(['_token', '_method']);
        Estudio::where('id','=',$id)->update($datos);
        return redirect('/estudios')->with('estudioModificado','Estudio modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Estudio::destroy($id);
        return back()->with('estudioEliminado','Estudio eliminado con éxito');
    }
}
