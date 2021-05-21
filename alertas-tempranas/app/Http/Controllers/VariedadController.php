<?php

namespace App\Http\Controllers;

use App\Models\Variedad;
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
        Variedad::insert($datos);
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

    public function getVariedades(Request $request)
    {
        if (!$request->idFinca) {
            $html = '<option value="">'.'Seleccione una variedad'.'</option>';
        } else {
            $html = '';
            $variedades = Variedad::where('idFinca', $request->idFinca)->get();
            foreach ($variedades as $variedad) {
                $html .= '<option value="'.$variedad->id.'">'.$variedad->codigo.'</option>';
            }
        }
        return response()->json(['html' => $html]);
    }
}
