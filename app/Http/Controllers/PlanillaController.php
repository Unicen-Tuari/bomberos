<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Planilla;
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
      return view('planilla/lista',compact('planillas'));
  }

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
      $planilla->delete();
      return redirect()->route('planilla.index');
    }
    return view('auth/alerta');
  }

  public function update(PlanillaRequest  $data, $id)
  {
    if(Auth::user()->admin){
      $planilla=$data->all();
      Planilla::find($id)->update($planilla);
      return redirect()->route('planilla.index');
    }
    return view('auth/alerta');
  }

  public function store(PlanillaRequest  $data)
  {
    if(Auth::user()->admin){
      $planilla=$data->all();
      Planilla::create($planilla);
      return redirect()->route('planilla.index');
    }
    return view('auth/alerta');
  }

  public function mostrar($id)
  { 
    $planilla=Planilla::find($id);
    $renglon=Renglon::find($id);
    $responsable=User::find($renglon->responsable);
    $ayudante=User::find($renglon->ayudante);
    return view('planilla.mostrar', compact('planilla', 'renglon', 'responsable', 'ayudante'));
  }

  public function imprimir($id)
  { 
    $planilla=Planilla::find($id);
    $renglon=Renglon::find($id);
    $responsable=User::find($renglon->responsable);
    $ayudante=User::find($renglon->ayudante);
    return view('planilla.imprimir', compact('planilla', 'renglon', 'responsable', 'ayudante'));
  }


}
