<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Bombero;
use App\Http\Requests;
use App\Http\Requests\GuardarBomberoRequest;

class BomberoController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function alta()
  {
      return view('bombero/alta');
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return User
   */
  protected function create(Request  $data)
  {
      return Bombero::create([
          'nombre' => $data['nombre'],
          'apellido'=> $data['apellido'],
          'nro_legajo' => $data['nro_legajo'],
          'jerarquia' => $data['jerarquia'],
          'direccion' => $data['direccion'],
          'telefono' => $data['telefono'],
          'fecha_nacimiento' => $data['fechan'],
      ]);
  }

  public function altaBombero(GuardarBomberoRequest  $data)
  {
    Bombero::create([
        'nombre' => $data->all()['nombre'],
        'apellido'=> $data->all()['apellido'],
        'nro_legajo' => $data->all()['nro_legajo'],
        'jerarquia' => $data->all()['jerarquia'],
        'direccion' => $data->all()['direccion'],
        'telefono' => $data->all()['telefono'],
        'fecha_nacimiento' => $data->all()['fechan'],
    ]);
    return back();
  }
}
