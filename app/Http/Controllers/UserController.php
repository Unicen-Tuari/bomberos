<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
//use App\Vehiculo;
use Validator;
//use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Request $request)
  {
      $usuarios = User::paginate(8);
      return view('usuario/lista',compact('usuarios'));

  }

  public function create()
  {

  }

  public function edit($id)
  {

  }

  public function show($id){

  }

  public function destroy(Request $request,$id)
  {

  }
  public function update(Request $data, $id)
  {

  }

  public function store(Request $data)
  {

  }


  /*funciones sacadas de BomberoController ya que no pertenecian ahi*/
  public function permisos()
  {
    if(Auth::user()->admin){
      $usuarios=User::where('usuario','<>',Auth::user()->usuario)->get();
      return view('usuario/permiso',compact('usuarios'));
    }
  }

  public function permisosupdate(Request $request)
  {
    if(Auth::user()->admin){
      $data=$request->all();
      $usuarios=User::where('usuario','<>',Auth::user()->usuario)->get();
      $presentes=[];
      foreach ($data as $key => $value) {
        if (strstr($key, '-', true)=="usuario") {
          $id=(integer)substr($key, 8);
          $presentes[]=$id;
          User::find($id)->update(['admin'=>$value]);
        }
      }
      foreach ($usuarios as $value) {
        if (!in_array($value->id,$presentes)) {
          User::find($value->id)->update(['admin'=>0]);
        }
      }
    }
    return view('home');
  }

}
