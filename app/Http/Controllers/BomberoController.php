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
  public function index()
  {
      $bomberos=Bombero::all();
      return view('bombero/lista',compact('bomberos'));
  }
  public function create()
  {
      return view('bombero/alta');
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return User
   */
  public function store(GuardarBomberoRequest  $data)
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
    return BomberoController::index();
  }
}
