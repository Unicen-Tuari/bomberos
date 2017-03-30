<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\asistencia;
use App\Bombero;
use App\Servicio;
use App\BomberoServicio;
use Carbon\Carbon;
use \DateTimeZone;

class AsistenciaController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
    }

    public function puntuacionmes($mes,$año)
    {
        $bomberos=Bombero::where('activo', 1)->get();
        $dias=asistencia::select(\DB::raw('COUNT(*) as cant, id_bombero'))->whereYear('created_at','=',$año)->whereMonth('created_at','=',$mes)->groupBy('id_bombero')->get()->max('cant');
        $servicios=Servicio::where('tipo_alarma', 3)->whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->get();
        return view('asistencia/puntuacionmes',compact('bomberos','servicios','mes','año','dias'));
    }

     public function puntuacion()
     {
         return view('asistencia/puntuacion');
     }

    public function create()
    {
      $bomberos=Bombero::where('activo', 1)->get();
      return view('asistencia/obligatoria',compact('bomberos'));
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
        //
    }


    public function destroy($id)
    {
        //
    }
}
