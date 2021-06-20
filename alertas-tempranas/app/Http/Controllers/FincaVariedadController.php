<?php

namespace App\Http\Controllers;
use App\Models\finca_variedad;
use App\Models\Variedad;
use Illuminate\Support\Facades\DB;
use App\Models\Finca;

use Illuminate\Http\Request;

class FincaVariedadController extends Controller
{
    //
    public function store(Request $request)
    {
        //
        $fincaVariedad=new finca_variedad();
        $fincaVariedad->idFinca=$request->input('idFinca');
        $fincaVariedad->idVariedad=$request->input('idVariedad');
        $fincaVariedad->save();
        return back();
    }
   /* public function getFincas(Request $request)
    {
        if (!$request->idFinca) {
            $html = '<option value="">'.'Seleccione una variedad'.'</option>';
        } else {
            $html = '';
            $fincavs= finca_variedads::where('idFinca', $request->idFinca)->get();
            $variedades=Variedad::all();
            foreach ($fincavs as $fincav) {
                foreach($variedades as $variedad){
                    if($variedad->id==$fincav->idVariedad){
                        $html .= '<option value="'.$fincav->idVariedad.'">'.$variedad->descripcion.'</option>';
                    }
                }

            }
        }
        return response()->json(['html' => $html]);
    }*/

    public function getVariedades(Request $request) //Función que retorna las variedades de una finca
    {
        /*if (!$request->idFinca) {
            $html = '<option value="">'.'Seleccione una variedad'.'</option>';
        } else {
            $html = '';
            $variedades = Variedad::where('idFinca', $request->idFinca)->get();
            foreach ($variedades as $variedad) {
                $html .= '<option value="'.$variedad->id.'">'.$variedad->codigo.'</option>';
            }
        }
        return response()->json(['html' => $html]);*/
        $variedades = DB::table('finca_variedad')
            ->join('variedads', 'finca_variedad.variedad_id', '=', 'variedads.id')
            ->join('fincas', 'finca_variedad.finca_id', '=', "fincas.id")
            ->select('finca_variedad.id', 'variedads.codigo', 'variedads.descripcion')
            ->where('finca_id', $request->idFinca)
            ->get();

        return response()->json($variedades);
    }
}
