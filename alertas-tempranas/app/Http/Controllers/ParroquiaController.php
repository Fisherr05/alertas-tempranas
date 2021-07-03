<?php

namespace App\Http\Controllers;

use App\Models\Parroquia;
use Illuminate\Http\Request;

class ParroquiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function show(Parroquia $parroquia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function edit(Parroquia $parroquia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parroquia $parroquia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parroquia $parroquia)
    {
        //
    }

    public function getParroquias(Request $request)
    {
        /*if (!$request->idCanton) {
            $html = '<option value="">'.'Seleccione una parroquia'.'</option>';
        } else {
            $html = '';
            $parroquias = Parroquia::where('idCanton', $request->idCanton)->get();
            $html = '<option value="">'.'Seleccione una parroquia'.'</option>';
            foreach ($parroquias as $parroquia) {
                $html .= '<option value="'.$parroquia->id.'">'.$parroquia->nombre.'</option>';
            }
        }
        return response()->json(['html' => $html]);*/
        $data = Parroquia::where('idCanton', $request->idCanton)->get();

        return response()->json($data);
    }
}
