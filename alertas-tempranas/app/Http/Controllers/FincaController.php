<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use App\Models\Zona;
use App\Models\Variedad;
use App\Models\Canton;
use App\Models\finca_variedads;
use App\Models\Parroquia;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

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
        return view('finca.index', compact('fincas', 'zonas', 'variedades'));
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
        $datos['cantones'] = Canton::all();
        $datos['parroquias'] = Parroquia::all();
        return view('finca.create', $datos);
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
        $finca=Finca::create([
        'idZona'=>$request->idZona,
        'nombreFinca'=>$request->nombreFinca,
        'propietarioFinca'=>$request->propietarioFinca,
        'cedula'=>$request->cedula,
        'telefono'=>$request->telefono,
        'coordenadaX'=>$request->coordenadaX,
        'coordenadaY'=>$request->coordenadaY,
        'densidad'=>$request->densidad
       ]);
        $finca-> variedades()->attach($request->idVariedad);
        return redirect('/fincas')->with('fincaGuardado','Finca guardado con éxito');
        /*$createdAt = date('Y-m-d H:i:s');
        $datos = [
            'idZona' => $request->idZona,
            'nombreFinca' => $request->nombreFinca,
            'propietarioFinca' => $request->propietarioFinca,
            'cedula' => $request->cedula,
            'telefono' => $request->telefono,
            'coordenadaX' => $request->coordenadaX,
            'coordenadaY' => $request->coordenadaY,
            'densidad' => $request->densidad,
            'created_at' => $createdAt,
        ];
        Finca::insert($datos);
        $finca = Finca::where('created_at', '=', $createdAt)->firstOrFail();/*
        /*for ($i = 0; $i < count($request->idVariedad); $i++) {
            $fv = [
                'finca_id'=>$finca[0],
                'variedad_id' => $request->idVariedad[$i],
            ];
            DB::table('finca_variedad')->insert($fv);
        }*/
        //$finca=Finca::create($datos);
        //$finca-> variedades()->attach($request->idVariedad);
        //return dd($finca);
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
        $finca = Finca::find($id);
        $zonas = Zona::all();
        $variedades = Variedad::all();
        return view('finca.edit', compact('finca', 'zonas', 'variedades'));
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
        $finca = Finca::find($id);
        $finca->idZona = $request->idZona;
        $finca->nombreFinca = $request->nombreFinca;
        $finca->propietarioFinca = $request->propietarioFinca;
        $finca->cedula = $request->cedula;
        $finca->telefono = $request->telefono;
        $finca->coordenadaX = $request->coordenadaX;
        $finca->coordenadaY = $request->coordenadaY;
        $finca->densidad = $request->densidad;
        $finca->variedades()->sync($request->idVariedad);
        $finca->save();

        return redirect('/fincas')->with('fincaModificado', 'Finca modificado con éxito');
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
        return back()->with('fincaEliminado', 'Finca eliminado con éxito');
    }

    public function post(Request $request)
    {
        $finca = Finca::create($request->all());

        return redirect('/fincas')->with('fincaGuardado', 'Finca guardado con éxito');
    }
}
