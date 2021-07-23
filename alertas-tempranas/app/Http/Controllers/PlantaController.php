<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use App\Models\Planta;
use App\Models\Monitoreo;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $datos['estudios'] =Estudio::all();
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
        $datos['estudios'] =Estudio::all();
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
        $idEstudio=request()->idEstudio;
        $codigo=request()->codigo;
        $coordenadasX=request()->x;
        $coordenadasY=request()->y;
        for ($i=0; $i < count($coordenadasX); $i++) {
            $datos=[
                'idEstudio'=>$idEstudio,
                'codigo'=>$codigo[$i],
                'x'=>$coordenadasX[$i],
                'y'=>$coordenadasY[$i],
            ];
            Planta::insert($datos);
        }
        return redirect('/plantas')->with('plantaGuardado','Planta guardado con éxito');
    }
    public function guardar(Request $request)
    {
        $idEstudio = $request->idEstudio;
        $codigo = $request->codigo;
        $x = $request->x;
        $y = $request->y;
        $severidad = $request->severidad;
        for ($i = 0; $i < count($idEstudio); $i++) {
            $datasave = [
                'idEstudio' => $idEstudio[$i],
                'codigo' => $codigo[$i],
                'x' => $x[$i],
                'y' => $y[$i],
            ];
            DB::table('plantas')->insert($datasave);
        }

        //return dd($i);
        return redirect('/tecnico')->with('datoGuardado', 'Dato guardado con éxito');
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
        $estudios=Estudio::all();
        return view('planta.edit', compact('planta','estudios'));
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
        return back()->with('plantaEliminado','Planta eliminada con éxito');
    }

    public function getPlantas(Request $request)
    {
        if (!$request->idMonitoreo) {
            $html = '';
        } else {
            $html = '';
            $plantas = Planta::where('idMonitoreo', $request->idMonitoreo)->get();
            foreach ($plantas as $planta) {
                $html .= '<tr><td>'.$planta->id.'"</td>'.$planta->codigo.'</td></tr>';
            }
        }
        return response()->json(['html' => $html]);
    }
}
