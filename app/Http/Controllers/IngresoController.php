<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ingreso;
use App\Bombero;

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

    public function guardarIngreso(Request $request){
      Ingreso::create($request->all());
    }

    public function borrarIngreso($id_bombero){
      $bombero=Ingreso::where('id_bombero', $id_bombero);
      $bombero->delete();
    }
}
