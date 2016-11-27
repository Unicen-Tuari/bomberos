<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IngresoController extends Controller
{
    public function guardarIngreso(Request $id_bombero){
      Ingreso::create($id_bombero->all());
      return "guardo";
    }

    public function borrarIngreso($id_bombero){
      $bombero=Ingreso::find($id_bombero);
      $bombero->delete();
    }
}
