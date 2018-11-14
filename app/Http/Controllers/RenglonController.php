<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Renglon;
use App\Planilla;
use App\Http\Requests\RenglonRequest;
use Illuminate\Support\Facades\Auth;

class RenglonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    // public function index(Request $request)
    // {
    //     $planillas=Planilla::get();
    //     return view('planilla/lista',compact('planillas'));
    // }
  
    public function create()
    {
        if(Auth::user()->admin){
          return view('renglon/alta');
        }
        return view('auth/alerta');
    }
  
    public function edit($id)
    {
        if(Auth::user()->admin){
          $renglon=Renglon::findorfail($id);
          return view('renglon/editar',compact('renglon'));
        }
        return view('auth/alerta');
    }
  
    public function destroy($id)
    {
      if(Auth::user()->admin){
        $renglon=Renglon::find($id);
        $renglon->delete();
        return redirect()->route('renglon.index');
      }
      return view('auth/alerta');
    }
  
    public function update(RenglonRequest  $data, $id)
    {
      if(Auth::user()->admin){
        $renglon=$data->all();
        Renglon::find($id)->update($renglon);
        return redirect()->route('renglon.index');
      }
      return view('auth/alerta');
    }
  
    public function store(RenglonRequest  $data)
    {
      if(Auth::user()->admin){
        $renglon=$data->all();
        Renglon::create($renglon);
        return redirect()->route('renglon.index');
      }
      return view('auth/alerta');
    }
  
}
