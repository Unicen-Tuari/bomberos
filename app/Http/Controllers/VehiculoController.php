<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Vehiculo;

class VehiculoController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
      $vehiculos=Vehiculo::orderBy('patente','DESC')->paginate(2);
      return view('vehiculo/lista',compact('vehiculos'));
  }
  public function create()
  {
      return view('vehiculo/alta');
  }
  public function edit($id)
  {
      $vehiculo=Vehiculo::findorfail($id);
      return view('vehiculo/editar',compact('vehiculo'));
  }
  public function destroy($id)
  {
      $vehiculo=Vehiculo::find($id);
      $vehiculo->delete();
      return redirect()->route('vehiculo.index');
  }
  public function update(Request  $data, $id)
  {
      $vehiculo=Vehiculo::findorfail($id)->update($data->all());
      // $bombero->update();
      return redirect()->route('vehiculo.index');
  }

  public function store(Request $data)
  {
    Vehiculo::create($data->all());
    return redirect()->route('vehiculo.index');
  }
}
