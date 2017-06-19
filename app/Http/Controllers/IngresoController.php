<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\IngresoRequest;
use App\Ingreso;
use App\TipoAsistencia;
use App\Bombero;
use App\BomberoServicio;
use Illuminate\Support\Facades\Auth;

class IngresoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
        return view('asistencia/participantes',compact('bomberos','servicio'));
    }


    public function show($servicio)
    {
        $bomberos=BomberoServicio::where('servicio_id',$servicio)->orderBy('tipo_id')->get();
        return view('asistencia/servicio',compact('bomberos','servicio'));
    }

    public function guardarIngreso(IngresoRequest $request){
      if($request->all()['id_bombero']>0){
        Ingreso::create($request->all());
        return redirect()->route('home.index');
      }
    }

    public function borrarIngreso($id_bombero){
      if($id_bombero>0){
        $bombero=Ingreso::where('id_bombero', $id_bombero);
        $bombero->delete();
        return redirect()->route('home.index');
      }
    }
}
