<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use App\Models\Finca;
use App\Models\Parroquia;
use App\Models\Canton;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ZonaController extends Controller
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
        $parroquias = Parroquia::all();
        $cantones = Canton::all();

        return view('zona.index', compact('zonas','parroquias','cantones'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datos1['zonas'] = Zona::all();
        $datos['parroquias'] = Parroquia::all();
        $datos['cantones'] = Canton::all();
        return view('zona.create',$datos,$datos1);
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
        Zona::insert($datos);
        return redirect('/zonas')->with('zonaGuardado','Zona guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function show(Zona $zona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $zona= Zona::findOrFail($id);
        $parroquias = Parroquia::all();
        $cantones = Canton::all();
        return view('zona.edit', compact('zona','cantones','parroquias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos= request()->except(['_token', '_method']);
        Zona::where('id','=',$id)->update($datos);
        return redirect('/zonas')->with('zonaModificado','Zona modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Zona::destroy($id);
        return back()->with('zonaEliminado','Zona eliminado con éxito');
    }
}
