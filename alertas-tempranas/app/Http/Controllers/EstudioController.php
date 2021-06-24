<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use App\Models\Finca;
use App\Models\Variedad;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $fvs=DB::select('select * from finca_variedad');
        return view('estudio.index',compact('estudios','fincas','variedades', 'fvs'));
    }

    public function registro()
    {
        //
        $estudios= Estudio::all();
        $fincas= Finca::all();
        $variedades=Variedad::all();
        $fvs=DB::select('select * from finca_variedad');
        return view('estudio.registro',compact('estudios','fincas','variedades', 'fvs'));
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
        $fvSelected=DB::table('finca_variedad')
                ->select('*')
                ->where('id', $estudio->idFv)
                ->get();
        $fincaSelected=Finca::findOrfail($fvSelected[0]->finca_id);
        $variedadSelected=Variedad::findOrfail($fvSelected[0]->variedad_id);
        $fvs = DB::table('finca_variedad')
            ->join('variedads', 'finca_variedad.variedad_id', '=', 'variedads.id')
            ->join('fincas', 'finca_variedad.finca_id', '=', "fincas.id")
            ->select('finca_variedad.id', 'finca_variedad.finca_id', 'finca_variedad.variedad_id','variedads.codigo', 'variedads.descripcion')
            ->where('finca_id', $fincaSelected->id)
            ->get();
        return view('estudio.edit', compact('estudio','fincas', 'fvs','fincaSelected' ,'variedadSelected'));
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
