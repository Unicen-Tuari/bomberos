<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use App\Http\Requests\PlanillaRequest;


class PlanillaController extends Controller
{
     public function __construct()
  {
      $this->middleware('auth');
  }

//   public function index(Request $request)
//   {
//       $bomberos=Bombero::legajo($request['legajo'])->nombre($request['nombre'])
//       ->jerarquia($request['jerarquia'])->paginate(12);
//       return view('bombero/lista',compact('bomberos'));
//   }

  public function create()
  {
      if(Auth::user()->admin){
        return view('planilla/alta');
      }
      return view('auth/alerta');
  }

  public function edit($id)
  {
      if(Auth::user()->admin){
        $planilla=Planilla::findorfail($id);
        return view('planilla/editar',compact('planilla'));
      }
      return view('auth/alerta');
  }

  public function destroy($id)
  {
    if(Auth::user()->admin){
      $planilla=Planilla::find($id);
      $bombero->delete();
      return redirect()->route('planilla.index');
    }
    return view('auth/alerta');
  }

//   public function update(PlanillaRequest  $data, $id)
//   {
//     if(Auth::user()->admin){
//       $bombero=$data->all();
//       list($dia, $month, $year) = explode('/', $bombero["fecha_nacimiento"]);
//       $bombero["fecha_nacimiento"]=$year.'-'.$month.'-'.$dia;
//       if (!array_key_exists('activo', $bombero)){
//         $bombero["activo"]=0;
//       }
//       Bombero::find($id)->update($bombero);
//       return redirect()->route('bombero.index');
//     }
//     return view('auth/alerta');
//   }

//   public function store(BomberoRequest  $data)
//   {
//     if(Auth::user()->admin){
//       $bombero=$data->all();
//       list($dia, $month, $year) = explode('/', $bombero["fecha_nacimiento"]);
//       $bombero["fecha_nacimiento"]=$year.'-'.$month.'-'.$dia;
//       if (!array_key_exists('activo', $bombero)){
//         $bombero["activo"]=0;
//       }
//       Bombero::create($bombero);
//       return redirect()->route('bombero.index');
//     }
//     return view('auth/alerta');
//   }

}
