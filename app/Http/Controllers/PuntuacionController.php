<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asistencia;
use App\Bombero;
use App\Servicio;
use App\Variables;
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

    public function variables()
    {
        $var=Variables::first();
        $asistencia=$var->asistencia;
        $accidentales=$var->accidentales;
        $guardias=$var->guardias;
        return view('puntuacion/variables',compact('asistencia','accidentales','guardias'));
    }

    public function modificaar_variables(Request $request)
    {
        $data=$request->all();
        $var=Variables::first();
        $var->update($data);
        return redirect()->route('puntuacion.index');
    }

    public function anual()
    {
        $bomberos=Bombero::getBomberos();
        unset ($bomberos[0]);//elimino el primer elemneto ya que no es un bombero y para esta tpl no es util
        $bombero=key($bomberos);
        return view('puntuacion/listarxanio',compact('bomberos','bombero'));
    }

    public function tabla_anual($bombero,$inicio,$fin)
    {
        $bombero=Bombero::find($bombero);
        return view('puntuacion/tablaanual',compact('bombero','inicio','fin'));
    }

    public function create()
    {
        if(Auth::user()->admin){
          return view('puntuacion/puntuacion');
        }
        return view('auth/alerta');
    }

    public function puntuacionmes($month,$year,$bombero)
    {
        if(Auth::user()->admin){
          $var=Variables::first();
          $monthactual=\Carbon\Carbon::now()->format('m');
          $yearactual=\Carbon\Carbon::now()->format('Y');
          if($year<$yearactual || ($year==$yearactual && $month<$monthactual)){
            $bombero=Bombero::find($bombero);
            $dias=asistencia::select(\DB::raw('COUNT(*) as cant, id_bombero'))->whereYear('fecha_reunion','=',$year)->whereMonth('fecha_reunion','=',$month)->groupBy('id_bombero')->get()->max('cant');
            if ($dias==null) {
              $dias=0;
            }
            $cantserv=Servicio::whereNotNull('hora_regreso')->where('tipo_alarma', 3)->whereYear('hora_alarma','=',$year)->whereMonth('hora_alarma','=',$month)->count();
            $cantguar=Servicio::whereNotNull('hora_regreso')->where('tipo_alarma','<', 3)->whereYear('hora_alarma','=',$year)->whereMonth('hora_alarma','=',$month)->count();
            $accid=$bombero->accidentales($month,$year);
            $guardia=$bombero->guardias($month,$year);
            $asistencia=$bombero->asistenciasmes($month,$year);
            $puntasis=0;
            if ($dias!=0) {
              $puntasis=($var->asistencia/$dias)*$asistencia;
            }
            $puntaccid=0;
            if ($cantserv>=($var->accidentales/5)) {//$var->accidentales/5 es la cantidad de dias minimos por el tema de no poder restar menos de 5 puntos por ley
              $puntaccid=($var->accidentales/$cantserv)*$accid;
            }elseif ($accid!=0) {
              $puntaccid=$var->accidentales-(5*($cantserv-$accid));
            }
            $puntguar=0;
            if ($cantguar>=($var->guardias/5)) {
              $puntguar=($var->guardias/$cantguar)*$guardia;
            }elseif($guardia!=0) {
                $puntguar=$var->guardias-(5*($cantguar-$guardia));
            }
            return view('puntuacion/alta',
            compact('bombero','cantserv','cantguar','mes','año','dias','accid','guardia','asistencia','puntasis','puntaccid','puntguar'));
          }
          return view('errors/aviso');
        }
        return view('auth/alerta');
    }

    public function listar($month,$year)
    {
        $bomberos=Bombero::where('activo', 1)->get();
        $dias=asistencia::select(\DB::raw('COUNT(*) as cant, id_bombero'))->whereYear('fecha_reunion','=',$year)->whereMonth('fecha_reunion','=',$month)->groupBy('id_bombero')->get()->max('cant');
        if ($dias==null) {
          $dias=0;
        }
        $cantserv=Servicio::whereNotNull('hora_regreso')->where('tipo_alarma', 3)->whereYear('hora_alarma','=',$year)->whereMonth('hora_alarma','=',$month)->count();
        $cantguar=Servicio::whereNotNull('hora_regreso')->where('tipo_alarma','<', 3)->whereYear('hora_alarma','=',$year)->whereMonth('hora_alarma','=',$month)->count();
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

    public function bomberos($month,$year)
    {
      $monthactual=\Carbon\Carbon::now()->format('m');
      $yearactual=\Carbon\Carbon::now()->format('Y');
      if($year<$yearactual || ($year==$yearactual && $month<$monthactual)){
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
        $var=Variables::first();
        $puntuacion=Puntuacion::find($id);
        $month=\Carbon\Carbon::parse($puntuacion->fecha)->format('m');
        $year=\Carbon\Carbon::parse($puntuacion->fecha)->format('Y');
        $dias=asistencia::select(\DB::raw('COUNT(*) as cant, id_bombero'))
          ->whereYear('fecha_reunion','=',$year)->whereMonth('fecha_reunion','=',$month)
          ->groupBy('id_bombero')->get()->max('cant');
        if ($dias==null) {
          $dias=0;
        }
        $cantserv=Servicio::where('tipo_alarma', 3)->whereYear('hora_alarma','=',$year)
          ->whereMonth('hora_alarma','=',$month)->count();
        $cantguar=Servicio::where('tipo_alarma','<', 3)->whereYear('hora_alarma','=',$year)
          ->whereMonth('hora_alarma','=',$month)->count();

        $accid=$puntuacion->bombero->accidentales($month,$year);
        $guardia=$puntuacion->bombero->guardias($month,$year);
        $asistencia=$puntuacion->bombero->asistenciasmes($month,$year);
        $puntasis=0;
        if ($dias!=0) {
          $puntasis=($var->asistencia/$dias)*$asistencia;
        }
        $puntaccid=0;
        if ($cantserv>=($var->accidentales/5)) {//$var->accidentales/5 es la cantidad de dias minimos por el tema de no poder restar menos de 5 puntos por ley
          $puntaccid=($var->accidentales/$cantserv)*$accid;
        }elseif ($accid!=0) {
          $puntaccid=$var->accidentales-(5*($cantserv-$accid));
        }
        $puntguar=0;
        if ($cantguar>=($var->guardias/5)) {
          $puntguar=($var->guardias/$cantguar)*$guardia;
        }elseif($guardia!=0) {
            $puntguar=$var->guardias-(5*($cantguar-$guardia));
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
