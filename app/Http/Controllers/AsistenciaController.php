<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\asistencia;
use App\Bombero;
use App\Servicio;
use App\BomberoServicio;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $reuniones=asistencia::select('fecha_reunion')->orderBy('fecha_reunion', 'asc')->get()->groupBy('fecha_reunion');
      return view('asistencia/listar',compact('reuniones'));
    }

    public function create()
    {
      if(Auth::user()->admin){
        $bomberos=Bombero::where('activo', 1)->get();
        return view('asistencia/obligatoria',compact('bomberos'));
      }
      return view('auth/alerta');
    }

    public function store(Request $request)
    {
      $data=$request->all();
      foreach ($data as $key => $value) {
        if (strstr($key, '-', true)=="bombero") {
          $idbombero=substr($key, 8);
          asistencia::create(['id_bombero'=>$idbombero,'fecha_reunion'=>$data['fecha_reunion']]);
        }
      }
      return redirect()->route('home.index');
    }

    public function show($reunion)
    {
      $bomberos=Bombero::where('activo', 1)->get();
      return view('asistencia/info',compact('bomberos','reunion'));
    }

    public function edit($reunion)
    {
      if(Auth::user()->admin){
        $bomberos=Bombero::where('activo', 1)->get();
        return view('asistencia/editar',compact('bomberos','reunion'));
      }
      return view('auth/alerta');
    }


    public function update(Request $request, $id)
    {
      $data=$request->all();
      $reuniones=asistencia::where('fecha_reunion',$id)->get();
      $presentes=[];
      foreach ($data as $key => $value) {
        if (strstr($key, '-', true)=="bombero") {
          $idbombero=(integer)substr($key, 8);
          $presentes[]=$idbombero;
          if (!$reuniones->where('id_bombero',$idbombero)->first()) {
            asistencia::create(['id_bombero'=>$idbombero,'fecha_reunion'=>$id]);
          }
        }
      }
      foreach ($reuniones as $value) {
        if (!in_array($value->id_bombero,$presentes)) {
          $value->delete();
        }
      }
      return redirect()->route('asistencia.index');
    }


    public function destroy($id)
    {
        //
    }
}
