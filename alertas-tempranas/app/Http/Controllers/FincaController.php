<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use App\Models\Zona;
use App\Models\Variedad;
use Illuminate\Http\Request;

class FincaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $zonas = Zona::all();
        $fincas = Finca::all();
        $variedades = Variedad::all();
        return view('finca.index',compact('fincas','zonas','variedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datos['zonas'] = Zona::all();
        $datos['fincas'] = Finca::all();
        $datos['variedades'] = Variedad::all();
        return view('finca.create',$datos);
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
        Finca::insert($datos);
        return redirect('/fincas')->with('fincaGuardado','Finca guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Finca  $finca
     * @return \Illuminate\Http\Response
     */
    public function show(Finca $finca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finca  $finca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $finca= Finca::findOrFail($id);
        $zonas = Zona::all();
        $variedades = Variedad::all();
        return view('finca.edit', compact('finca','zonas','variedades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Finca  $finca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos= request()->except(['_token', '_method']);
        Finca::where('id','=',$id)->update($datos);
        return redirect('/fincas')->with('fincaModificado','Finca modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finca  $finca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Finca::destroy($id);
        return back()->with('fincaEliminado','Finca eliminado con éxito');
    }
}
