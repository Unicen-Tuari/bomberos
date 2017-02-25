<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Bombero;
use App\Material;
use App\Vehiculo;
use App\Http\Requests\BomberoRequest;

class BomberoController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
      $bomberos=Bombero::orderBy('nombre','DESC')->paginate(12);
      return view('bombero/lista',compact('bomberos'));
  }
  public function create()
  {
      return view('bombero/alta');
  }

  public function edit($id)
  {
      $bombero=Bombero::findorfail($id);
      return view('bombero/editar',compact('bombero'));
  }
  public function destroy($id)
  {
      $bombero=Bombero::find($id);
      $bombero->delete();
      return redirect()->route('bombero.index');
  }
  public function update(BomberoRequest  $data, $id)
  {
    $bombero=$data->all();
    if (!array_key_exists('activo', $bombero)){
      $bombero["activo"]=0;
    }
    Bombero::find($id)->update($bombero);
    return redirect()->route('bombero.index');
  }

  public function store(BomberoRequest  $data)
  {
    $bombero=$data->all();
    if (!array_key_exists('activo', $bombero)){
      $bombero["activo"]=0;
    }
    Bombero::create($bombero);
    return redirect()->route('bombero.index');
  }

  public function altaResponsable()
  {
    $dataM=Material::all(['id', 'nombre']);
    $materiales = array();
    foreach ($dataM as $data)
    {
        $materiales[$data->id] = $data->nombre;
    }
    $dataV=Vehiculo::all(['id', 'patente']);
    $vehiculos = array();
    $vehiculosA = array();
    $vehiculosB = array();
    foreach ($dataV as $key => $data)
    {
      $vehiculos[$data->id] = $data->patente;
      if ($key <= (count($dataV)/2))
        $vehiculosA[] = $data->id;
      else
        $vehiculosB[] = $data->id;
    }
    $dataB=Bombero::all(['id', 'nombre']);
    $bomberos = array();
    foreach ($dataB as $data)
    {
        $bomberos[$data->id] = $data->nombre;
    }
      return view('bombero/responsable/alta', compact('materiales', 'vehiculos', 'vehiculosA', 'vehiculosB', 'bomberos'));
  }
}
