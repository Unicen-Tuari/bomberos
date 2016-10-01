<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoServicio;
use App\Http\Requests;
use App\Servicio;
use App\Bombero;
use App\Vehiculo;

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
      $servicios=Servicio::all();
      return view('servicio/servicios',compact('servicios'));
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
    public function mostrar($id)
    {
      // cambiar conteniado
        $datasb=Bombero::all(['id', 'nombre']);
        $bomberos = array();
        foreach ($datasb as $data)
        {
            $bomberos[$data->id] = $data->nombre;
        }
          $datasv=Vehiculo::all(['id', 'patente']);
          $vehiculos = array();
          foreach ($datasv as $data)
          {
              $vehiculos[$data->id] = $data->patente;
          }
        return view('servicio/finalizar',compact('id','bomberos','vehiculos'));
    }

    public function finalizar(Request $request, $id)
    {
      //con el id y las dos lista se generan las 2 relaciones
        dd($request->all(),$id);
    }
    public function salida($id)
    {
        $hsalida = date("Y-m-d H:i:s", (strtotime ("-3 Hours")));
        $servicio=Servicio::find($id);
        $servicio->hora_salida=$hsalida;
        $servicio->save();
        return redirect()->route('servicio.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $hllamada = date("Y-m-d H:i:s", (strtotime ("-3 Hours")));
      $tipo= TipoServicio::find($request['Tipo']);
      if($tipo)
      {$servicio=new Servicio;
      $servicio->tipo_servicio_id=$tipo->id;
      $servicio->direccion=$request['direccion'];
      $servicio->descripcion=$request['descripcion'];
      $servicio->hora_alarma=$hllamada;
      if ($servicio->save()) {
       $a=Servicio::all();
       return redirect()->route('servicio.index');
      }else {
        dd('fallo');
      }}
      else {
        dd('no existe tipo');
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

    public function finalizado(){
      $datas=TipoServicio::all(['id', 'nombre']);
      $tipos = array();
      foreach ($datas as $data)
      {
          $tipos[$data->id] = $data->nombre;
      }
      $datasb=Bombero::all(['id', 'nombre']);
      $bomberos = array();
      foreach ($datasb as $data)
      {
          $bomberos[$data->id] = $data->nombre;
      }
        $datasv=Vehiculo::all(['id', 'patente']);
        $vehiculos = array();
        foreach ($datasv as $data)
        {
            $vehiculos[$data->id] = $data->patente;
        }
      return view('servicio/finalizado',compact('tipos','bomberos','vehiculos'));
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
