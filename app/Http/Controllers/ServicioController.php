<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoServicio;
use App\Http\Requests;
use App\servicio;
class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sers=Servicio::all();
      return view('servicio/servicios',compact('sers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas=TipoServicio::all(['id', 'nombre']);
        $tipos = array();
        foreach ($datas as $data)
        {
            $tipos[$data->id] = $data->nombre;
        }
        return view('servicio/llamada',compact('tipos'));
    }
    public function sinfinalizar()
    {
      // cambiar conteniado
        $datas=TipoServicio::all(['id', 'nombre']);
        $tipos = array();
        foreach ($datas as $data)
        {
            $tipos[$data->id] = $data->nombre;
        }
        return view('servicio/finalizar',compact('tipos'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $hllamada = date("Y-m-d H:i:s");
      $bom= TipoServicio::find($request['Tipo']);
      $servicio=new Servicio;
      $servicio->tipo_servicio_id=$request['Tipo'];
      $servicio->direccion=$request['direccion'];
      $servicio->hora_alarma=$hllamada;
      if ($servicio->save()) {
       $a=Servicio::all();
       dd($a);
      }else {
        dd('fallo');
      }

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
        $bombero=Servicio::find($id);
        $bombero->delete();
        return redirect()->route('servicio.index');
    }
}
