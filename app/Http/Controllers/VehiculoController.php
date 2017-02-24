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
      if($data['patente']!=""){
        $data['patente']=strtoupper($data->patente);
      }
      if(!array_key_exists('activo', $data->all())){
        $data['activo']=0;
      }
      if(!array_key_exists('baja', $data->all())){
        $data['baja']=0;
      }else{
        $data['activo']=0;
      }
      $vehiculo=Vehiculo::findorfail($id)->update($data->all());
      return redirect()->route('vehiculo.index');
  }

  public function store(VehiculoRequest $data)
  {
    if($data['patente']!=""){
      $data['patente']=strtoupper($data->patente);
    }
    if(!array_key_exists('activo', $data->all())){
      $data['activo']=0;
    }
    Vehiculo::create($data->all());
    return redirect()->route('vehiculo.index');
  }
}
