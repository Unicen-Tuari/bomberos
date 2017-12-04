<?php

namespace App\Http\Controllers;

use App\Reemplazo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bombero;
use Carbon\Carbon;
use \DateTimeZone;

class ReemplazoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $reemplazos = Reemplazo::getActivos();
      if ($reemplazos != null){
        foreach ($reemplazos as $key => $reemplazo){
          $bombero = Reemplazo::find($reemplazo->id)->bombero;
          $bomberoReemplazo = Reemplazo::find($reemplazo->id)->bomberoReemplazo;
          $reemplazo['bombero'] = $bombero->apellido . ", " . $bombero->nombre;
          $reemplazo['bombero_reemplazo'] = $bomberoReemplazo->apellido . ", " . $bomberoReemplazo->nombre;
        }
      }
      return view('reemplazo/lista', ['reemplazos' => $reemplazos, 'button' => 'terminados']);
    }

    public function terminados()
    {
      $reemplazos = Reemplazo::getTerminados();
      if ($reemplazos != null){
        foreach ($reemplazos as $key => $reemplazo){
          $bombero = Reemplazo::find($reemplazo->id)->bombero;
          $bomberoReemplazo = Reemplazo::find($reemplazo->id)->bomberoReemplazo;
          $reemplazo['bombero'] = $bombero->apellido . ", " . $bombero->nombre;
          $reemplazo['bombero_reemplazo'] = $bomberoReemplazo->apellido . ", " . $bomberoReemplazo->nombre;
        }
      }
      return view('reemplazo/lista', ['reemplazos' => $reemplazos, 'button' => 'activos']);
    }

    public function create()
    {
      $bomberos = Bombero::all();
      if(Auth::user()->admin){
        return view('reemplazo/alta', ['bomberos' => $bomberos]);
      }
      return view('auth/alerta');
    }

    public function store(Request $request)
    {
      if (Auth::user()->admin) {
        Reemplazo::create($request->all());
        return redirect()->route('reemplazo.index');
      }
    }

    public function show(Reemplazo $reemplazo)
    {
        //
    }

    public function edit(Reemplazo $reemplazo)
    {
        $bomberos = Bombero::all();
        if(Auth::user()->admin){
          return view('reemplazo/editar', ['reemplazo' => $reemplazo, 'bomberos' => $bomberos]);
        }
        return view('auth/alerta');
    }

    public function update(Request $request, Reemplazo $reemplazo)
    {
        if (Auth::user()->admin){
          Reemplazo::find($reemplazo->id)->update($request->all());
          return redirect()->route('reemplazo.index');
        }
    }

    public function destroy(Reemplazo $reemplazo)
    {
        if (Auth::user()->admin){
          $reemplazo->delete();
          return redirect()->route('reemplazo.index');
        }
    }
}
