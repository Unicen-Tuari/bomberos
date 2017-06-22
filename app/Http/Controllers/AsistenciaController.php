<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AsistenciaRequest;
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
      $reuniones=asistencia::select('fecha_reunion')->orderBy('fecha_reunion', 'asc')->groupBy('fecha_reunion')->limit(10)->get();
      return view('asistencia/listar',compact('reuniones'));
    }

    public function rango(AsistenciaRequest $request)
    {
      if(Auth::user()->admin){
        list($dia, $mes, $año) = explode('/', $request['inicio']);
        $request['inicio']=$año.'-'.$mes.'-'.$dia;
        list($dia, $mes, $año) = explode('/', $request['fin']);
        $request['fin']=$año.'-'.$mes.'-'.$dia;
        $reuniones=asistencia::select('fecha_reunion')->orderBy('fecha_reunion', 'asc')->groupBy('fecha_reunion')->having('fecha_reunion','>=', $request['inicio'])->having('fecha_reunion','<=', $request['fin'])->limit(10)->get();
         return view('asistencia/listar',compact('reuniones'));
      }
      return view('auth/alerta');
    }

    public function create()
    {
      if(Auth::user()->admin){
        $bomberos=Bombero::where('activo', 1)->get();
        return view('asistencia/obligatoria',compact('bomberos'));
      }
      return view('auth/alerta');
    }

    public function store(AsistenciaRequest $request)
    {
      if(Auth::user()->admin){
        $data=$request->all();
        list($dia, $mes, $año) = explode('/', $data['fecha_reunion']);
        $data['fecha_reunion']=$año.'-'.$mes.'-'.$dia;
        foreach ($data as $key => $value) {
          if (strstr($key, '-', true)=="bombero") {
            $idbombero=substr($key, 8);
            asistencia::create(['id_bombero'=>$idbombero,'fecha_reunion'=>$data['fecha_reunion']]);
          }
        }
        return redirect()->route('asistencia.index');
      }
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
      if(Auth::user()->admin){
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
      return view('auth/alerta');
    }


    public function destroy($id)
    {
      if(Auth::user()->admin){
        $reuniones=asistencia::where('fecha_reunion',$id)->get();
        foreach ($reuniones as $value) {
          $value->delete();
        }
        return redirect()->route('asistencia.index');
      }
      return view('auth/alerta');
    }
}
