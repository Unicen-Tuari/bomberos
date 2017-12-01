<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Validator;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Request $request)
  {
    $usuarios=User::id($request['id'])->nombre($request['nombre'])->paginate(8);
    return view('usuario/lista',compact('usuarios'));
  }

  public function create()
  {
    if(Auth::user()->admin){
      return view('usuario/alta');
    }
    return view('auth/alerta');
  }

  public function edit($id)
  {
    if(Auth::user()->admin){
      $usuario=User::findorfail($id);
      return view('usuario/editar',compact('usuario'));
    }
    return view('auth/alerta');

  }

  public function show($id){
    $usuario=User::find($id);
    return view('usuario/info',compact('usuario'));
  }

  public function destroy(Request $request,$id)
  {
    if(Auth::user()->admin){
      $usuario=User::find($id);
      $usuario->delete();
      return redirect()->route('usuario.index');
    }
  }

  public function update(UserRequest $request, $id)
  {
    if(Auth::user()->admin){
      User::find($id)->update($request->all());
      return redirect()->route('usuario.index');
    }
  }

  public function store(UserRequest $data)
  {
    if(Auth::user()->admin){
      $pass =$data->password;
      $data->password = password_hash ($pass, PASSWORD_DEFAULT);
      User::create($data->all());
      return redirect()->route('usuario.index');
    }
  }

  public function showPermisos()
  {
    if(Auth::user()->admin){
      $usuarios=User::where('usuario','<>',Auth::user()->usuario)->get();
      return view('usuario/permiso',compact('usuarios'));
    }
  }

  public function permisosUpdate(Request $request)
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
