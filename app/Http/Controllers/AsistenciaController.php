<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bombero;
use App\Servicio;

class AsistenciaController extends Controller
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

    public function puntuacionmes($mes,$año)
    {
        $servicios=Servicio::all();
        $bomberos=Bombero::all();
        foreach ($servicios as $key => $servicio) {
          if (!((\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_alarma)->format('m')==$mes ) &&  (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_alarma)->format('Y')==$año)))
          {
            unset($servicios[$key]);
          }
        }
        return view('asistencia/puntuacionmes',compact('bomberos'));
    }

     public function puntuacion()
     {
         return view('asistencia/puntuacion');
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
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
