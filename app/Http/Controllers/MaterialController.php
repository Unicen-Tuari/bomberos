<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Http\Requests;
use App\Http\Requests\MaterialRequest;
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
      $materiales=Material::orderBy('id','DESC')->paginate(10);
      return view('material/lista',compact('materiales'));
  }
  public function show($id)
  {
      $material=Material::find($id);
      return view('material/info',compact('material'));
  }
  public function create()
  {
      $datas=Vehiculo::all(['id', 'num_movil']);
      $vehiculos = array();
      foreach ($datas as $data)
      {
          $vehiculos[$data->id] = $data->num_movil;
      }
      return view('material/alta',compact('vehiculos'));
  }

  public function edit($id)
  {
      $datas=Vehiculo::where('estado','<',3)->get();
      $vehiculos = array();
      foreach ($datas as $data)
      {
          $vehiculos[$data->id] = $data->num_movil;
      }
      $material=Material::findorfail($id);
      return view('material/editar',compact('material', 'vehiculos'));
  }
  public function destroy($id)
  {
      $material=Material::find($id);
      $material->delete();
      return redirect()->route('material.index');
  }

  public function update(MaterialRequest $data, $id)
  {
      if ($data['vehiculo_id'] == ""){
        $data['vehiculo_id'] = null;
      }
      if(!array_key_exists('mantenimiento', $data->all())){
        $data['mantenimiento']=0;
      }

      $material=Material::find($id);
      if (  $material->mantenimiento != $data['mantenimiento'] && $data['mantenimiento']==0) {
        $material->reparado+=1;
      }
      $material->update($data->all());

      return redirect()->route('material.index');
  }

  public function store(MaterialRequest $data)
  {
    if ($data['vehiculo_id'] == ""){
      $data['vehiculo_id'] = null;
    }
    Material::create($data->all());
    return redirect()->route('material.index');
  }
}
