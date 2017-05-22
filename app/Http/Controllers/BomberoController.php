<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Bombero;
use App\Material;
use App\Vehiculo;
use App\Http\Requests\BomberoRequest;
use Illuminate\Support\Facades\Auth;

class BomberoController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
      $bomberos=Bombero::paginate(12);
      return view('bombero/lista',compact('bomberos'));
  }
  public function create()
  {
      if(Auth::user()->admin){
        return view('bombero/alta');
      }
      return view('auth/alerta');
  }

  public function edit($id)
  {
      if(Auth::user()->admin){
        $bombero=Bombero::findorfail($id);
        return view('bombero/editar',compact('bombero'));
      }
      return view('auth/alerta');
  }
  public function destroy($id)
  {
      $bombero=Bombero::find($id);
      $bombero->delete();
      return redirect()->route('bombero.index');
  }
  public function update(BomberoRequest  $data, $id)
  {
    $bombero=$data->all();
    if (!array_key_exists('activo', $bombero)){
      $bombero["activo"]=0;
    }
    Bombero::find($id)->update($bombero);
    return redirect()->route('bombero.index');
  }

  public function store(BomberoRequest  $data)
  {
    $bombero=$data->all();
    if (!array_key_exists('activo', $bombero)){
      $bombero["activo"]=0;
    }
    Bombero::create($bombero);
    return redirect()->route('bombero.index');
  }

}
