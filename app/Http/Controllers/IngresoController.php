<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ingreso;
use App\TipoAsistencia;
use App\Bombero;
use App\BomberoServicio;

class IngresoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function listarIngresos()
    {
        $ingresados=Ingreso::all();
        return view('asistencia/ingresados',compact('ingresados'));
    }
    public function indexPresentes($servicio,$acargo)
    {
        $ingresados=Ingreso::all();
        $bomberos=Bombero::where('activo',1)->get();
        return view('asistencia/presentes',compact('ingresados','bomberos','servicio','acargo'));
    }

    public function editPresentes($servicio)
    {
        $bomberos=BomberoServicio::where('servicio_id',$servicio)->orderBy('tipo_id')->get();
        if (count($bomberos)<2) {
          $bomberos=Bombero::where('activo',1)->get();
          return view('asistencia/presentes',compact('ingresados','bomberos','servicio','acargo'));
        }
        return view('asistencia/participantes',compact('bomberos','servicio'));
    }

    // esto esta en ajax era cuando no interesaba marcar ausentes
    // public function addbombero($bombero)
    // {
    //   $bombero=Bombero::find($bombero);
    //   // $ingresado = (object) array('bombero' => $bombero);
    //   $asistselec=4;
    //   return view('asistencia/bombero',compact('bombero','asistselec'));
    // }

    public function guardarIngreso(Request $request){
      Ingreso::create($request->all());
    }

    public function borrarIngreso($id_bombero){
      $bombero=Ingreso::where('id_bombero', $id_bombero);
      $bombero->delete();
    }
}
