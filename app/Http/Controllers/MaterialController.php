<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Http\Requests;
use App\Http\Requests\MaterialRequest;
use App\Material;
use App\Vehiculo;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(Request $request)
  {
      $materiales=Material::movil($request['movil'])->rubro($request['rubro'])
      ->material($request['material'])->orderBy('id','DESC')->paginate(10);
      $datas=Vehiculo::all(['id', 'num_movil']);
      $vehiculos = array();
      $vehiculos[0] = "Nº - Movil";
      $vehiculos[-1] = "En Depósito";
      foreach ($datas as $data)
      {
          $vehiculos[$data->id] = 'Nº - '.$data->num_movil;
      }
      return view('material/lista',compact('materiales','vehiculos'));
  }
  public function show($id)
  {
      $material=Material::find($id);
      $datas=Vehiculo::all(['id', 'num_movil']);
      $vehiculos = array();
      $vehiculos['']='En depósito';
      foreach ($datas as $data)
      {
          $vehiculos[$data->id] = 'Nº - '.$data->num_movil;
      }
      return view('material/info',compact('material','vehiculos'));
  }
  public function create()
  {
      if(Auth::user()->admin){
        $datas=Vehiculo::all(['id', 'num_movil']);
        $vehiculos = array();
        foreach ($datas as $data)
        {
            $vehiculos[$data->id] = 'Nº - '.$data->num_movil;
        }
        return view('material/alta',compact('vehiculos'));
      }
      return view('auth/alerta');
  }

  public function edit($id)
  {
      if(Auth::user()->admin){
        $datas=Vehiculo::where('estado','<',3)->get();
        $vehiculos = array();
        foreach ($datas as $data)
        {
            $vehiculos[$data->id] = $data->num_movil;
        }
        $material=Material::findorfail($id);
        return view('material/editar',compact('material', 'vehiculos'));
      }
      return view('auth/alerta');
  }
  public function destroy($id)
  {
      if(Auth::user()->admin){
        $material=Material::find($id);
        $material->delete();
        return redirect()->route('material.index');
      }
  }

  public function update(MaterialRequest $data, $id)
  {
      if(Auth::user()->admin){
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
  }

  public function store(MaterialRequest $data)
  {
      if(Auth::user()->admin){
        if ($data['vehiculo_id'] == ""){
          $data['vehiculo_id'] = null;
        }
        Material::create($data->all());
        return redirect()->route('material.index');
      }
  }

}
