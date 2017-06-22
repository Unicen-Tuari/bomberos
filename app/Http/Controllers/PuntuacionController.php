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
        $this->middleware('auth');
    }

    public function index()
    {
        return view('puntuacion/lista');
    }

    public function anual()
    {
        if(Auth::user()->admin){
          $bomberos=Bombero::getBomberos();
          unset ($bomberos[0]);//elimino el primer elemneto ya que no es un bombero y para esta tpl no es util
          $bombero=key($bomberos);
          return view('puntuacion/listarxanio',compact('bomberos','bombero'));
        }
        return view('auth/alerta');
    }

    public function tabla_anual($bombero,$inicio,$fin)
    {
        if(Auth::user()->admin){
          $bombero=Bombero::find($bombero);
          return view('puntuacion/tablaanual',compact('bombero','inicio','fin'));
        }
        return view('auth/alerta');
    }

    public function create()
    {
        if(Auth::user()->admin){
          return view('puntuacion/puntuacion');
        }
        return view('auth/alerta');
    }

    public function puntuacionmes($mes,$año,$bombero)
    {
        if(Auth::user()->admin){
          $mesactual=\Carbon\Carbon::now()->format('m');
          $añoactual=\Carbon\Carbon::now()->format('Y');
          if($año<$añoactual || ($año==$añoactual && $mes<$mesactual)){
            $bombero=Bombero::find($bombero);
            $dias=asistencia::select(\DB::raw('COUNT(*) as cant, id_bombero'))->whereYear('fecha_reunion','=',$año)->whereMonth('fecha_reunion','=',$mes)->groupBy('id_bombero')->get()->max('cant');
            if ($dias==null) {
              $dias=0;
            }
            $cantserv=Servicio::whereNotNull('hora_regreso')->where('tipo_alarma', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->count();
            $cantguar=Servicio::whereNotNull('hora_regreso')->where('tipo_alarma','<', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->count();
            $accid=$bombero->accidentales($mes,$año);
            $guardia=$bombero->guardias($mes,$año);
            $asistencia=$bombero->asistenciasmes($mes,$año);
            $puntasis=0;
            if ($dias!=0) {
              $puntasis=(10/$dias)*$asistencia;
            }
            $puntaccid=0;
            if ($cantserv>6) {
              $puntaccid=(35/$cantserv)*$accid;
            }elseif ($accid!=0) {
              $puntaccid=35-(5*($cantserv-$accid));
            }
            $puntguar=0;
            if ($guardia!=0) {
                $puntguar=(10/$cantguar)*$guardia;
            }
            return view('puntuacion/alta',
            compact('bombero','cantserv','cantguar','mes','año','dias','accid','guardia','asistencia','puntasis','puntaccid','puntguar'));
          }
          return view('errors/aviso');
        }
        return view('auth/alerta');
    }

    public function listar($mes,$año)
    {
        $bomberos=Bombero::where('activo', 1)->get();
        $dias=asistencia::select(\DB::raw('COUNT(*) as cant, id_bombero'))->whereYear('fecha_reunion','=',$año)->whereMonth('fecha_reunion','=',$mes)->groupBy('id_bombero')->get()->max('cant');
        if ($dias==null) {
          $dias=0;
        }
        $cantserv=Servicio::whereNotNull('hora_regreso')->where('tipo_alarma', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->count();
        $cantguar=Servicio::whereNotNull('hora_regreso')->where('tipo_alarma','<', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->count();
        return view('puntuacion/tabla',compact('bomberos','cantserv','cantguar','mes','año','dias'));
    }

    public function store(Request $request)
    {
        if(Auth::user()->admin){
          $date=$request->all();
          $fecha=\Carbon\Carbon::parse($date['año'].'-'.$date['mes'].'-'.'1');
          $date['fecha']=$fecha;
          unset($date['mes'],$date['año']);//elimino los elemnetos qeu no machean con la tabla
          Puntuacion::create($date);
        }
    }

    public function bomberos($mes,$año)
    {
      $mesactual=\Carbon\Carbon::now()->format('m');
      $añoactual=\Carbon\Carbon::now()->format('Y');
      if($año<$añoactual || ($año==$añoactual && $mes<$mesactual)){
        $bomberos=Bombero::where('activo', 1)->get();
        return view('puntuacion/puntuacionmes',compact('bomberos','mes','año'));
      }
      return view('errors/aviso');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
      if(Auth::user()->admin){
        $puntuacion=Puntuacion::find($id);
        $mes=\Carbon\Carbon::parse($puntuacion->fecha)->format('m');
        $año=\Carbon\Carbon::parse($puntuacion->fecha)->format('Y');
        $dias=asistencia::select(\DB::raw('COUNT(*) as cant, id_bombero'))
          ->whereYear('fecha_reunion','=',$año)->whereMonth('fecha_reunion','=',$mes)
          ->groupBy('id_bombero')->get()->max('cant');
        if ($dias==null) {
          $dias=0;
        }
        $cantserv=Servicio::where('tipo_alarma', 3)->whereYear('hora_alarma','=',$año)
          ->whereMonth('hora_alarma','=',$mes)->count();
        $cantguar=Servicio::where('tipo_alarma','<', 3)->whereYear('hora_alarma','=',$año)
          ->whereMonth('hora_alarma','=',$mes)->count();

        $accid=$puntuacion->bombero->accidentales($mes,$año);
        $guardia=$puntuacion->bombero->guardias($mes,$año);
        $asistencia=$puntuacion->bombero->asistenciasmes($mes,$año);
        $puntasis=0;
        if ($dias!=0) {
          $puntasis=(10/$dias)*$asistencia;
        }
        $puntaccid=0;
        if ($cantserv>6) {
          $puntaccid=(35/$cantserv)*$accid;
        }elseif ($accid!=0) {
          $puntaccid=35-(5*($cantserv-$accid));
        }
        $puntguar=0;
        if ($guardia!=0) {
            $puntguar=(10/$cantguar)*$guardia;
        }
        return view('puntuacion/edit',
        compact('puntuacion','cantserv','cantguar','dias','accid','guardia',
        'asistencia','puntasis','puntaccid','puntguar'));
      }
      return view('auth/alerta');
    }

    public function update(Request $request, $id)
    {
      if(Auth::user()->admin){
        Puntuacion::find($id)->update($request->all());
      }
    }

    public function destroy($id)
    {
        //No encontramos logica para este uso ya que todo personal activo es puntuado, en el peor de los caso se editara
    }
}
