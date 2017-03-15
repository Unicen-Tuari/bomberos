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

  public function servicio(){
    return $this->belongsTo(BomberoServicio::class);
  }

  public function cantServicios($mes,$año){
    $servicios=BomberoServicio::where('bombero_id',$this->id)->where('tipo_id','<',6)->get();
    foreach ($servicios as $key => $servicio) {
      if (!((\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->servicio->hora_alarma)->format('m')==$mes ) && (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->servicio->hora_alarma)->format('Y')==$año)))
      {
        unset($servicios[$key]);
      }
    }
    return $servicios;
  }

  public function ingresado(){
      return $this->hasOne(Ingreso::class,"id_bombero","id");
  }
}
