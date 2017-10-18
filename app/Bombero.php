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
    'id', 'nombre', 'apellido', 'nro_legajo', 'jerarquia',
     'direccion', 'telefono', 'fecha_nacimiento','activo',
  ];

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
      $query->where('nro_legajo','LIKE',"%$legajo%");
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

  public function accidentales($mes,$año){
    $servicios=$this->serviciosAsistidos;
    foreach ($servicios as $key => $servicio) {
      if (!($servicio->servicio->tipo_alarma==3 &&
       (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->servicio->hora_alarma)->format('m')==$mes ) &&
       (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->servicio->hora_alarma)->format('Y')==$año)))
      {
        unset($servicios[$key]);
      }
    }
    return $servicios->count();
  }

  public function guardias($mes,$año){
    $guardias=BomberoServicio::where('bombero_id',$this->id)->where('tipo_id','<',6)->get();
    foreach ($guardias as $key => $guardia) {
      if (!($guardia->servicio->tipo_alarma<3 &&
       (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$guardia->servicio->hora_alarma)->format('m')==$mes ) &&
       (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$guardia->servicio->hora_alarma)->format('Y')==$año)))
      {
        unset($guardias[$key]);
      }
    }
    return $guardias->count();
  }

  public function puntuo($mes,$año){
    return $this->hasMany(Puntuacion::class,"id_bombero","id")->whereYear('fecha','=',$año)->whereMonth('fecha','=',$mes)->count()>0;
  }

  public function puntuacion($mes,$año){
    return $this->hasMany(Puntuacion::class,"id_bombero","id")->whereYear('fecha','=',$año)->whereMonth('fecha','=',$mes)->first();
  }

  public function asistenciasmes($mes,$año){
    return $this->hasMany(asistencia::class,"id_bombero","id")->whereYear('fecha_reunion','=',$año)->whereMonth('fecha_reunion','=',$mes)->count();
  }

  public function ingresado(){
      return $this->hasOne(Ingreso::class,"id_bombero","id");
  }
}
