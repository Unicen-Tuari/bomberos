<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Planilla;
use App\Bombero;
use App\Renglon;

use App\Http\Requests\PlanillaRequest;

use Illuminate\Support\Facades\Auth;

class PlanillaController extends Controller
{
     public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Request $request)
  {
      $planillas=Planilla::get();
      if (!empty($planillas)){
        foreach ($planillas as $key => $planilla){
          $bombero = Planilla::find($planilla->id)->bombero;
          $planilla['jefe_guardia'] = $bombero->apellido . ", " . $bombero->nombre;
        }
      } 
      return view('planilla/lista',compact('planillas'));
  }

  public function create()
  {
    $bomberos = Bombero::all();
      if(Auth::user()->admin){
        return view('planilla/alta', ['bomberos' => $bomberos]);
      }
      return view('auth/alerta');
  }

  public function edit($id)
  {
      $bomberos = Bombero::all();
      if(Auth::user()->admin){
        $planilla=Planilla::findorfail($id);
        return view('planilla/editar',compact('planilla', 'bomberos'));
      }
      return view('auth/alerta');
  }

  public function destroy($id)
  {
    if(Auth::user()->admin){
      $planilla=Planilla::find($id);
      $planilla->delete();
      return redirect()->route('planilla.index');
    }
    return view('auth/alerta');
  }

  public function update(PlanillaRequest $data, $id)
  {
    if(Auth::user()->admin){
      $planilla=$data->all();
      Planilla::find($id)->update($planilla);
      return redirect()->route('planilla.index');
    }
    return view('auth/alerta');
  }

  public function store(PlanillaRequest $data)
  {
    if(Auth::user()->admin){
      $planilla=$data->all();
      Planilla::create($planilla);
      return redirect()->route('planilla.index');
    }
    return view('auth/alerta');
  }

  public function mostrar($id){ 
    $planilla=Planilla::find($id);
    if($planilla != null){
      $jefe=Bombero::find($planilla->jefe_guardia);
      $renglones=Renglon::where('planilla_id', $planilla->id)->get();
        foreach ($renglones as $renglon){
          $responsables[]=Bombero::find($renglon->responsable);
          $ayudantes[]=Bombero::find($renglon->ayudante);
        }
      return view('planilla.mostrar', compact('planilla', 'renglones', 'jefe', 'responsables', 'ayudantes'));
    }else{
      return view('auth/planilla');
    }
  }

  public function imprimir($id){
    $planilla=Planilla::find($id);
    if($planilla != null){
      $jefe=Bombero::find($planilla->jefe_guardia);
      $renglones=Renglon::where('planilla_id', $planilla->id)->get();
        foreach ($renglones as $renglon){
          $responsables[]=Bombero::find($renglon->responsable);
          $ayudantes[]=Bombero::find($renglon->ayudante);
        }
      return view('planilla.imprimir', compact('planilla', 'renglones', 'jefe', 'responsables', 'ayudantes'));
    }else{
      return view('auth/planilla');
    }
  }

}
