<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Material;
use App\Vehiculo;
class MaterialController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
      $materiales=Material::orderBy('nombre','DESC')->paginate(2);
      return view('material/lista',compact('materiales'));
  }
  public function create()
  {
      $datas=Vehiculo::all(['id', 'patente']);
      $vehiculos = array();
      foreach ($datas as $data)
      {
          $vehiculos[$data->id] = $data->patente;
      }
      return view('material/alta',compact('vehiculos'));
  }

  public function edit($id)
  {
      $material=Material::findorfail($id);
      return view('material/editar',compact('material'));
  }
  public function destroy($id)
  {
      $material=Material::find($id);
      $material->delete();
      return redirect()->route('material.index');
  }

  public function update(Request  $data, $id)
  {
      $material=Material::findorfail($id)->update($data->all());

      return redirect()->route('material.index');
  }

  public function store(Request $data)
  {
    if ($data['vehiculo_id'] == "")
      $data['vehiculo_id'] = null;

    Material::create($data->all());
    return redirect()->route('material.index');


  }
}
