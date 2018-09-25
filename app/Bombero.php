<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ingresado;
use App\BomberoServicio;
use App\asistencia;
use App\Puntuacion;
use Carbon\Carbon;
use \DateTimeZone;

class Bombero extends Model
{
  protected $table = 'bombero';
  protected $fillable = [
    'id', 'nombre', 'apellido', 'cuartel', 'legajo', 'jerarquia',
     'direccion', 'telefono', 'fecha_nacimiento','activo',
  ];

  
  public function nro_legajo(){
    return $this->cuartel . '/' . $this->legajo;
  }

  public function ScopeNombre($query,$nombre)
  {
    $nombre=strtoupper($nombre);
    if (trim($nombre)!="") {
      $query->where(\DB::raw("UPPER(CONCAT(nombre,' ',apellido))"),'LIKE',"%$nombre%");
    }
  }

  public function ScopeLegajo($query,$legajo)
  {
    if (trim($legajo)!="") {
      $query->where('legajo','LIKE',"%$legajo%");
    }
  }

  public function ScopeJerarquia($query,$jerarquia)
  {
    if ($jerarquia>0) {
      $query->where('jerarquia',$jerarquia);
    }
  }

  protected function getBomberos(){
      $datasb = $this->select('id', 'nombre', 'apellido')->orderBy('jerarquia','ASC')->where('activo', 1)->get();
      $bomberos = array();
      $bomberos[0] = "bombero...";
      foreach ($datasb as $data)
      {
          $bomberos[$data->id] = $data->nombre . " " . $data->apellido;
      }
      return $bomberos;
  }

  protected function getBomberosnoIngresados(){
      $datasb = $this->select('id', 'nombre', 'apellido')->orderBy('jerarquia','ASC')->where('activo', 1)->get();
      $bomberos = array();
      $bomberos[0] = "bombero...";
      foreach ($datasb as $data)
      {
        if(!$data->ingresado){
          $bomberos[$data->id] = $data->nombre . " " . $data->apellido;
        }
      }
      return $bomberos;
  }

  public function servicios(){
    return $this->hasMany(BomberoServicio::class);
  }

  public function acargo($servicio){
    return $this->hasMany(BomberoServicio::class)->where('servicio_id',$servicio)->first();
  }

  public function serviciosAsistidos(){
    return $this->hasMany(BomberoServicio::class)->where('tipo_id','<',6);
  }

  public function asistencias(){
    return $this->hasMany(asistencia::class,"id_bombero","id");
  }

  public function presente($reunion){
    return $this->hasMany(asistencia::class,"id_bombero","id")->where('fecha_reunion',$reunion)->count();
  }

  public function accidentales($month,$year){
    $servicios=$this->serviciosAsistidos;
    foreach ($servicios as $key => $servicio) {
      if (!($servicio->servicio->tipo_alarma==3 &&
       (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->servicio->hora_alarma)->format('m')==$month ) &&
       (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->servicio->hora_alarma)->format('Y')==$year)))
      {
        unset($servicios[$key]);
      }
    }
    return $servicios->count();
  }

  public function guardias($month,$year){
    $guardias=BomberoServicio::where('bombero_id',$this->id)->where('tipo_id','<',6)->get();
    foreach ($guardias as $key => $guardia) {
      if (!($guardia->servicio->tipo_alarma<3 &&
       (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$guardia->servicio->hora_alarma)->format('m')==$month ) &&
       (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$guardia->servicio->hora_alarma)->format('Y')==$year)))
      {
        unset($guardias[$key]);
      }
    }
    return $guardias->count();
  }

  public function puntuo($month,$year){
    return $this->hasMany(Puntuacion::class,"id_bombero","id")->whereYear('fecha','=',$year)->whereMonth('fecha','=',$month)->count()>0;
  }

  public function puntuacion($month,$year){
    return $this->hasMany(Puntuacion::class,"id_bombero","id")->whereYear('fecha','=',$year)->whereMonth('fecha','=',$month)->first();
  }

  public function asistenciasmes($month,$year){
    return $this->hasMany(asistencia::class,"id_bombero","id")->whereYear('fecha_reunion','=',$year)->whereMonth('fecha_reunion','=',$month)->count();
  }

  public function ingresado(){
      return $this->hasOne(Ingreso::class,"id_bombero","id");
  }
}
