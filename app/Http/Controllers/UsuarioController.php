<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Vehiculo;
use Validator;
use App\Http\Requests\VehiculoRequest;
use Illuminate\Support\Facades\Auth;

class VehiculoController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(VehiculoRequest $request)
  {
      $vehiculos=Vehiculo::movil($request['movil'])->estado($request['estado'])->patente($request['patente'])->paginate(8);
      return view('vehiculo/lista',compact('vehiculos'));
  }
  public function create()
  {
      if(Auth::user()->admin){
        return view('vehiculo/alta');
      }
      return view('auth/alerta');
  }
  public function edit($id)
  {
      if(Auth::user()->admin){
        $vehiculo=Vehiculo::find($id);
        return view('vehiculo/editar',compact('vehiculo'));
      }
      return view('auth/alerta');
  }

  public function show($id){
      $vehiculo=Vehiculo::find($id);
      return view('vehiculo/info',compact('vehiculo'));
  }

  public function destroy(Request $request,$id)
  {
    if(Auth::user()->admin){
      $vehiculo=Vehiculo::find($id);
      if (count($vehiculo->servicios)==0) {
        $vehiculo->delete();
      }
      return redirect()->route('vehiculo.index');
    }
  }
  public function update(VehiculoRequest $data, $id)
  {
    if(Auth::user()->admin){
      if($data['patente']!=""){
        $data['patente']=strtoupper($data->patente);
      }
      $vehiculo=Vehiculo::findorfail($id)->update($data->all());
      return redirect()->route('vehiculo.index');
    }
  }

  public function store(VehiculoRequest $data)
  {
    if(Auth::user()->admin){
      if($data['patente']!=""){
        $data['patente']=strtoupper($data->patente);
      }
      Vehiculo::create($data->all());
      return redirect()->route('vehiculo.index');
    }
  }

}
