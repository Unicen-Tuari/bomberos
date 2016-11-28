<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ingreso;
use App\Bombero;

class IngresoController extends Controller
{

    public function index()
    {
        $ingresados=Ingreso::orderBy('nombre','DESC')->paginate(12);
        return view('asistencia/listar',compact('bomberos'));
    }

    public function guardarIngreso(Request $request){
      Ingreso::create($request->all());
    }

    public function borrarIngreso($id_bombero){
      $bombero=Ingreso::where('id_bombero', $id_bombero);
      $bombero->delete();
    }
}
