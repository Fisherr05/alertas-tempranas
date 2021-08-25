<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Estudio;
use App\Models\Zona;
use App\Models\Finca;
use App\Models\Canton;
use App\Models\Parroquia;
use App\Models\Monitoreo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $datos['tecnicos'] = User::all();
        $datos['monitoreos'] = Monitoreo::all();
        return view('tecnico.index', $datos);
    }

    public function registro()
    {
        //
        $pendientes = DB::table('finca_variedad')
            ->join('fincas', 'finca_variedad.finca_id', '=', "fincas.id")
            ->join('estudios', 'estudios.idFv', '=', 'finca_variedad.id')
            ->join('zonas', 'fincas.idZona', '=', 'zonas.id')
            ->join('parroquias', 'zonas.idParroquia', '=', 'parroquias.id')
            ->join('cantons', 'cantons.id', '=', 'parroquias.idCanton')
            ->join('monitoreos', 'estudios.id', '=', 'monitoreos.idEstudio')
            ->join('users', 'monitoreos.idTecnico', '=', 'users.id')
            ->select('monitoreos.id', 'users.name', 'estudios.codigo', 'monitoreos.codigo as codigoMonitoreo', 'fincas.nombreFinca', 'cantons.nombre as cantonNombre', 'parroquias.nombre as parroquiaNombre', 'monitoreos.fechaPlanificada', 'monitoreos.observaciones', 'estudios.nombreEstudio', 'monitoreos.idTecnico', 'monitoreos.estado')
            ->get();
        //return dd($pedientes);
        return view('tecnico.registro', compact('pendientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datos['tecnicos'] = User::all();
        $datos['monitoreos'] = Monitoreo::all();
        $datos['estudios'] = Estudio::all();
        return view('tecnico.create', $datos);
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
        $datos["password"] = Hash::make($datos["password"]);
        if ($datos["fullacces"] == 1) {
            $datos["fullacces"] = "no";
        } else if ($datos["fullacces"] == 2) {
            $datos["fullacces"] = "revisor";
        }

        //return dd($datos);
        User::insert($datos);

        return redirect('/tecnicos')->with('tecnicoGuardado', 'Técnico guardado con éxito');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show(User $tecnico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $monitoreos = Monitoreo::all();
        $tecnico = User::findOrfail($id);

        return view('tecnico.edit', compact('tecnico', 'monitoreos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos = request()->except(['_token', '_method']);
        if (array_key_exists("password", $datos)) {
            $datos["password"] = Hash::make($datos["password"]);
        }

        User::where('id', '=', $id)->update($datos);
        return redirect('/tecnicos')->with('tecnicoModificado', 'Técnico modificado con éxito');
        //return dd($datos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::where('id', '=', $id)->delete($id);
        return back()->with('tecnicoEliminado', 'Técnico  eliminado con éxito');
    }
}
