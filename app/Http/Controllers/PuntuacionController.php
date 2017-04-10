<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asistencia;
use App\Bombero;
use App\Servicio;
use App\Puntuacion;

use App\Http\Requests;

class PuntuacionController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('puntuacion/puntuacion');
    }

    public function create()
    {
      $bomberos=Bombero::getBomberos();
      return view('puntuacion/alta',compact('bomberos'));
    }

    public function bombero($id,$mes,$año)
    {
        $bombero=Bombero::find($id);
        $dias=asistencia::select(\DB::raw('COUNT(*) as cant, id_bombero'))->whereYear('created_at','=',$año)->whereMonth('created_at','=',$mes)->groupBy('id_bombero')->get()->max('cant');
        $cantserv=count(Servicio::where('tipo_alarma', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->get());
        $cantguar=count(Servicio::where('tipo_alarma','<', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->get());
        return view('puntuacion/resultado',compact('bombero','cantserv','cantguar','mes','año','dias'));
    }

    public function puntuacionmes($mes,$año)
    {
        $bomberos=Bombero::where('activo', 1)->get();
        $dias=asistencia::select(\DB::raw('COUNT(*) as cant, id_bombero'))->whereYear('created_at','=',$año)->whereMonth('created_at','=',$mes)->groupBy('id_bombero')->get()->max('cant');
        $servicios=Servicio::where('tipo_alarma', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->get();
        $cantguar=count(Servicio::where('tipo_alarma','<', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->get());
        return view('puntuacion/puntuacionmes',compact('bomberos','servicios','cantguar','mes','año','dias'));
    }

    public function store(Request $request)
    {
        $date=$request->all();
        $fecha=\Carbon\Carbon::parse($date['año'].'-'.$date['mes'])->format('d-m-Y');
        $date['fecha']=$fecha;
        unset($date['mes'],$date['año']);
        Puntuacion::create($date);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        //
    }
}
