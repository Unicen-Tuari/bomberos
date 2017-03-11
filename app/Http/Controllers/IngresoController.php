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
        return view('asistencia/listar',compact('ingresados'));
    }
    public function indexPresentes($servicio)
    {
        $ingresados=Ingreso::all();
        $bomberos=Bombero::getBomberos();
        return view('asistencia/presentes',compact('ingresados','bomberos','servicio'));
    }

    public function editPresentes($servicio)
    {
      // ver esto para todos los que participaron
        $ingresados=BomberoServicio::where('servicio_id',$servicio)->get();
        $bomberos=Bombero::getBomberos();
        return view('asistencia/participantes',compact('ingresados','bomberos','servicio'));
    }
    public function guardarIngreso(Request $request){
      Ingreso::create($request->all());
    }

    public function addbombero($bombero)
    {
      $bombero=Bombero::find($bombero);
      $ingresado = (object) array('bombero' => $bombero);
      $asistselec=4;
      return view('asistencia/bombero',compact('ingresado','asistselec'));
    }

    public function borrarIngreso($id_bombero){
      $bombero=Ingreso::where('id_bombero', $id_bombero);
      $bombero->delete();
    }
}
