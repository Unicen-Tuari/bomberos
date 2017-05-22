<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asistencia;
use App\Bombero;
use App\Servicio;
use App\Puntuacion;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class PuntuacionController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('puntuacion/lista');
    }

    public function create()
    {
        if(Auth::user()->admin){
        return view('puntuacion/puntuacion');
        }
        return view('auth/alerta');
    }

    public function puntuacionmes($mes,$año)
    {
        if(Auth::user()->admin){
          $bomberos=Bombero::where('activo', 1)->get();
          $dias=asistencia::select(\DB::raw('COUNT(*) as cant, id_bombero'))->whereYear('created_at','=',$año)->whereMonth('created_at','=',$mes)->groupBy('id_bombero')->get()->max('cant');
          if ($dias==null) {
            $dias=0;
          }
          $cantserv=Servicio::where('tipo_alarma', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->count();
          $cantguar=Servicio::where('tipo_alarma','<', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->count();
          return view('puntuacion/puntuacionmes',compact('bomberos','cantserv','cantguar','mes','año','dias'));
        }
        return view('auth/alerta');
    }

    public function listar($mes,$año)
    {
        $bomberos=Bombero::where('activo', 1)->get();
        $dias=asistencia::select(\DB::raw('COUNT(*) as cant, id_bombero'))->whereYear('created_at','=',$año)->whereMonth('created_at','=',$mes)->groupBy('id_bombero')->get()->max('cant');
        if ($dias==null) {
          $dias=0;
        }
        $cantserv=Servicio::where('tipo_alarma', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->count();
        $cantguar=Servicio::where('tipo_alarma','<', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->count();
        return view('puntuacion/tabla',compact('bomberos','cantserv','cantguar','mes','año','dias'));
    }

    public function store(Request $request)
    {
        $date=$request->all();
        $fecha=\Carbon\Carbon::parse($date['año'].'-'.$date['mes'].'-'.'1');
        $date['fecha']=$fecha;
        unset($date['mes'],$date['año']);
        Puntuacion::create($date);
    }

    public function bombero($id,$mes,$año)
    {
        $bombero=Bombero::find($id);
        $dias=asistencia::select(\DB::raw('COUNT(*) as cant, id_bombero'))->whereYear('created_at','=',$año)->whereMonth('created_at','=',$mes)->groupBy('id_bombero')->get()->max('cant');
        if ($dias==null) {
          $dias=0;
        }
        $cantserv=Servicio::where('tipo_alarma', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->count();
        $cantguar=Servicio::where('tipo_alarma','<', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->count();
        return view('puntuacion/resultado',compact('bombero','cantserv','cantguar','mes','año','dias'));
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        if(Auth::user()->admin){
          $puntuacion=Puntuacion::find($id);
          $bombero=Bombero::find($puntuacion->bombero->id);
          $mes=\Carbon\Carbon::parse($puntuacion->fecha)->format('m');
          $año=\Carbon\Carbon::parse($puntuacion->fecha)->format('Y');
          $dias=asistencia::select(\DB::raw('COUNT(*) as cant, id_bombero'))->whereYear('created_at','=',$año)->whereMonth('created_at','=',$mes)->groupBy('id_bombero')->get()->max('cant');
          if ($dias==null) {
            $dias=0;
          }
          $cantserv=Servicio::where('tipo_alarma', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->count();
          $cantguar=Servicio::where('tipo_alarma','<', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->count();
          return view('puntuacion/edit',compact('bombero','puntuacion','cantserv','cantguar','mes','año','dias'));
        }
        return view('auth/alerta');
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        //
    }
}
