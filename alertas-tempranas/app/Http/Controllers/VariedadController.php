<?php

namespace App\Http\Controllers;

use App\Models\Variedad;
use App\Models\finca_variedads;
use App\Models\Finca;
use Illuminate\Http\Request;


class VariedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        //
        $datos['variedades'] = Variedad::all();
        return view('variedad.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datos['variedades'] = Variedad::all();
        return view('variedad.create',$datos);
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
        $variedad=new Variedad;
        Variedad::insert($datos);
        $variedad->save;
        return redirect('/variedades')->with('variedadGuardado','Variedad guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Variedad  $variedad
     * @return \Illuminate\Http\Response
     */
    public function show(Variedad $variedad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Variedad  $variedad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $variedad= Variedad::findOrFail($id);

        return view('variedad.edit', compact('variedad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Variedad  $variedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos= request()->except(['_token', '_method']);
        Variedad::where('id','=',$id)->update($datos);
        return redirect('/variedades')->with('variedadModificado','Variedad modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Variedad  $variedad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Variedad::destroy($id);
        return back()->with('variedadEliminado','Variedad eliminado con éxito');
    }
}
