<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\User;
use App\Bombero;
use App\Material;
use App\Vehiculo;
use App\Ingreso;
use App\Http\Requests\BomberoRequest;
use Carbon\Carbon;
use \DateTimeZone;
use Illuminate\Support\Facades\Auth;

class BomberoController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Request $request)
  {
      $bomberos=Bombero::legajo($request['legajo'])->nombre($request['nombre'])
      ->jerarquia($request['jerarquia'])->paginate(12);
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
    if(Auth::user()->admin){
      $bombero=Bombero::find($id);
      $ingreso=$bombero->ingresado;
      if($ingreso){
        $ingresado=Ingreso::find($ingreso->id);
        $ingresado->delete();
      }
      $bombero->delete();
      return redirect()->route('bombero.index');
    }
    return view('auth/alerta');
  }

  public function update(BomberoRequest  $data, $id)
  {
    if(Auth::user()->admin){
      $bombero=$data->all();
      list($dia, $month, $year) = explode('/', $bombero["fecha_nacimiento"]);
      $bombero["fecha_nacimiento"]=$year.'-'.$month.'-'.$dia;
      if (!array_key_exists('activo', $bombero)){
        $bombero["activo"]=0;
      }
      Bombero::find($id)->update($bombero);
      return redirect()->route('bombero.index');
    }
    return view('auth/alerta');
  }

  public function store(BomberoRequest  $data)
  {
    if(Auth::user()->admin){
      $bombero=$data->all();
      list($dia, $month, $year) = explode('/', $bombero["fecha_nacimiento"]);
      $bombero["fecha_nacimiento"]=$year.'-'.$month.'-'.$dia;
      if (!array_key_exists('activo', $bombero)){
        $bombero["activo"]=0;
      }
      Bombero::create($bombero);
      return redirect()->route('bombero.index');
    }
    return view('auth/alerta');
  }

}
