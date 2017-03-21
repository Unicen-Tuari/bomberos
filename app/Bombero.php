<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ingresado;
use App\BomberoServicio;
use Carbon\Carbon;
use \DateTimeZone;

class Bombero extends Model
{
  protected $table = 'bombero';
  protected $fillable = [
    'id', 'nombre', 'apellido', 'nro_legajo', 'jerarquia',
     'direccion', 'telefono', 'fecha_nacimiento','activo',
  ];

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

  public function servicios(){
    return $this->hasMany(BomberoServicio::class);
  }

  protected function serviciosAsistidos(){
    return $this->hasMany(BomberoServicio::class)->where('tipo_id','<',6);
  }

  public function accidentales($mes,$año){
    // $servicios=BomberoServicio::where('bombero_id',$this->id)->where('tipo_id','<',6)->get();
    $servicios=$this->serviciosAsistidos;
    foreach ($servicios as $key => $servicio) {
      if (!($servicio->servicio->tipo_alarma==3 &&
       (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->servicio->hora_alarma)->format('m')==$mes ) &&
       (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->servicio->hora_alarma)->format('Y')==$año)))
      {
        unset($servicios[$key]);
      }
    }
    return $servicios;
  }

  public function guardias($mes,$año){
    // $servicios=BomberoServicio::where('bombero_id',$this->id)->where('tipo_id','<',6)->get();
    $guardias=$this->serviciosAsistidos;
    foreach ($guardias as $key => $guardia) {
      if (!($guardia->servicio->tipo_alarma!=3 &&
       (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$guardia->servicio->hora_alarma)->format('m')==$mes ) &&
       (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$guardia->servicio->hora_alarma)->format('Y')==$año)))
      {
        unset($guardias[$key]);
      }
    }
    return $guardias;
  }

  public function ingresado(){
      return $this->hasOne(Ingreso::class,"id_bombero","id");
  }
}
