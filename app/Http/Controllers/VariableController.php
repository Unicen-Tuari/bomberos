<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variables;
use App\Puntuacion;
use App\Http\Requests\VariableRequest;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class VariableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $variables=Variables::paginate(12);
        return view('variable/lista',compact('variables'));
    }

    public function modificar_variables(Request $request)
    {

    }

    public function create()
    {
        if(Auth::user()->admin){
          return view('variable/alta');
        }
        return view('auth/alerta');
    }

    public function edit($id)
    {
        if(Auth::user()->admin){
          $variables=Variables::findorfail($id);
          return view('variable/editar',compact('variables'));
        }
        return view('auth/alerta');
    }

    public function destroy($id)
    {
      if(Auth::user()->admin){
        $variable=Variables::find($id);
        $variable->delete();
        return redirect()->route('variable.index');
      }
    }

    public function update(VariableRequest $data, $id)
    {
        if(Auth::user()->admin){
          $variable=Variables::find($id);
          $variable->update($data->all());
          return redirect()->route('variable.index');
        }
      }

    public function store(VariableRequest  $data)
    {
        if(Auth::user()->admin){
          $variable=$data->all();
          Variables::create($variable);
          return redirect()->route('variable.index');
        }
    }
}
