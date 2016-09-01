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
      return view('vehiculos/lista',compact('vehiculos'));
  }
  public function create()
  {
      return view('vehiculos/alta');
  }
  public function edit($id)
  {
      $vehiculo=Vehiculo::findorfail($id);
      return view('vehiculos/editar',compact('vehiculo'));
  }
  public function destroy($id)
  {
      $bombero=Vehiculo::find($id);
      $bombero->delete();
      return redirect()->route('vehiculos.index');
  }
  public function update(Request  $data, $id)
  {
      $vehiculo=Vehiculo::findorfail($id)->update($data->all());
      // $bombero->update();
      return redirect()->route('vehiculos.index');
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return User
   */
  public function store(Request $data)
  {
    Vehiculo::create($data->all());
    return redirect()->route('vehiculos.index');
  }
}
