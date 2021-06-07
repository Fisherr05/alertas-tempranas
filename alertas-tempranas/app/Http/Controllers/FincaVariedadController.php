<?php

namespace App\Http\Controllers;
use App\Models\finca_variedads;
use App\Models\Variedad;
use App\Models\Finca;

use Illuminate\Http\Request;

class FincaVariedadController extends Controller
{
    //
    public function store(Request $request)
    {
        //
        $fincaVariedad=new finca_variedads();
        $fincaVariedad->idFinca=$request->input('idFinca');
        $fincaVariedad->idVariedad=$request->input('idVariedad');
        $fincaVariedad->save();
        return back();
    }
    public function getFincas(Request $request)
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
    }
}
