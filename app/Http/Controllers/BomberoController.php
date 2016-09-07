<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Bombero;
use App\Http\Requests\saveBomberoRequest;

class BomberoController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
      $bomberos=Bombero::orderBy('nombre','DESC')->paginate(2);
      return view('bombero/lista',compact('bomberos'));
  }
  public function create()
  {
      return view('bombero/alta');
  }
  public function edit($id)
  {
      $bombero=Bombero::findorfail($id);
      return view('bombero/editar',compact('bombero'));
  }
  public function destroy($id)
  {
      $bombero=Bombero::find($id);
      $bombero->delete();
      return redirect()->route('bombero.index');
  }
  public function update(saveBomberoRequest  $data, $id)
  {
      $bombero=Bombero::findorfail($id)->update($data->all());
      return redirect()->route('bombero.index');
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return User
   */
  public function store(saveBomberoRequest  $data)
  {
    Bombero::create($data->all());
    return redirect()->route('bombero.index');
  }
}
