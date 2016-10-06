<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoServicio;
use App\Http\Requests;
use App\Servicio;
use App\Bombero;
use App\Vehiculo;
use Carbon\Carbon;
use \DateTimeZone;

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

    public function store(Request $data)
    {
      $serv=$data->all();
      unset($serv["Bomberos"]);
      unset($serv["Vehiculos"]);
      $servicio=new Servicio;
      $servicio->tipo_servicio_id=$serv['tipo'];
      $servicio->direccion=$serv['direccion'];
      $servicio->descripcion=$serv['descripcion'];
      $servicio->ilesos=$serv['ilesos'];
      $servicio->lesionados=$serv['lesionados'];
      $servicio->quemados=$serv['quemados'];
      $servicio->muertos=$serv['muertos'];
      $servicio->otros=$serv['otros'];
      $servicio->reconocimiento=$serv['reconocimiento'];
      $servicio->disposiciones=$serv['disposiciones'];
      $servicio->hora_alarma=$serv['alarma'];
      $servicio->hora_salida=$serv['salida'];
      $servicio->hora_regreso=$serv['regreso'];
      if ($servicio->save()) {
        foreach ($data->all()["Bomberos"] as $bombero) {
          //creo las relaciones servicio bomberos
          // $servicio->id
        }
        foreach ($data->all()["Vehiculos"] as $vehiculos) {
          //creo las relaciones servicio Vehiculos
          // $servicio->id
        }
       return redirect()->route('servicio.index');
      }else {
        dd('fallo');
      }
    }

    public function create(){
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

    public function llamada()
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

    public function finalizar(Request $data, $id)
    {
      //con el id y las dos lista se generan las 2 relaciones
        dd($data->all(),$id);
    }
    public function salida($id)
    {
        $hsalida = Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->toDateTimeString();
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
    public function iniciado(Request $data)
    {
      $hllamada = Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->toDateTimeString();
      $tipo= TipoServicio::find($data['Tipo']);
      if($tipo)
      {$servicio=new Servicio;
      $servicio->tipo_servicio_id=$tipo->id;
      $servicio->direccion=$data['direccion'];
      $servicio->descripcion=$data['descripcion'];
      $servicio->hora_alarma=$hllamada;
      if ($servicio->save()) {
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
