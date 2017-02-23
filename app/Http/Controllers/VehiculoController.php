<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Vehiculo;
use Validator;
use App\Http\Requests\VehiculoRequest;

class VehiculoController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
      $vehiculos=Vehiculo::orderBy('patente','DESC')->paginate(8);
      return view('vehiculo/lista',compact('vehiculos'));
  }
  public function info($id)
  {
      $vehiculo=Vehiculo::find($id);
      return view('vehiculo/info',compact('vehiculo'));
  }
  public function create()
  {
      return view('vehiculo/alta');
  }
  public function edit($id)
  {
      $vehiculo=Vehiculo::find($id);
      return view('vehiculo/editar',compact('vehiculo'));
  }

  public function show($id){
      $vehiculo=Vehiculo::find($id);
      return view('vehiculo/info',compact('vehiculo'));
  }

  public function destroy($id)
  {
      $vehiculo=Vehiculo::find($id);
      $vehiculo->delete();
      return redirect()->route('vehiculo.index');
  }
  public function update(VehiculoRequest $data, $id)
  {
      $vehiculo=Vehiculo::find($id);
      if($data['patente']!=""){
        $vehiculo->patente=strtoupper($data->patente);
      }else{
          $vehiculo->patente=null;
      }
      $vehiculo->num_movil=$data['num_movil'];
      $vehiculo->detalle=$data['detalle'];
      if(!array_key_exists('activo', $data->all())){
        $vehiculo->activo=0;
      }else{
        $vehiculo->activo=$data['activo'];
      }
      if(!array_key_exists('baja', $data->all())){
        $vehiculo->baja=0;
      }else{
        $vehiculo->baja=$data['baja'];
        $vehiculo->activo=0;
      }
      $vehiculo->save();
      return redirect()->route('vehiculo.index');
  }

  public function store(VehiculoRequest $data)
  {
    $vehiculo=new Vehiculo;
    if($data['patente']!=""){
      $vehiculo->patente=strtoupper($data->patente);
    }else{
        $vehiculo->patente=null;
    }
    $vehiculo->num_movil=$data['num_movil'];
    $vehiculo->detalle=$data['detalle'];
    if(!array_key_exists('activo', $data->all())){
      $vehiculo->activo=0;
    }else{
      $vehiculo->activo=$data['activo'];
    }
    $vehiculo->save();
    return redirect()->route('vehiculo.index');
  }
}
