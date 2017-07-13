<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
  protected $table = 'servicio';
  protected $fillable = ['tipo_servicio_id, tipo_alarma, num_servicio, direccion, descripcion,
            hora_alarma, hora_salida, hora_regreso, ilesos, otros, Superficie, muertos,
            quemados, lesionados, combustible, disposiciones, reconocimiento'];

  public function ScopeTipo_s($query,$tipo)
  {
    if ($tipo>0) {
      $query->where('tipo_servicio_id',$tipo);
    }
  }

  public function ScopeFecha($query,$mes,$año)
  {
    if ($año > 0) {
      if ($mes>0) {
        $query->whereYear('hora_regreso','=',$año)->whereMonth('hora_regreso','=',$mes);
      }else {
        $query->whereYear('hora_regreso','=',$año);
      }
    }else {
      if ($mes>0) {
        $query->whereMonth('hora_regreso','=',$mes);
      }
    }
  }

  public function ScopeTipo_a($query,$tipo)
  {
  if ($tipo>0) {
  $query->where('tipo_alarma',$tipo);
  }
  }

  protected function getActivos()
  {   //servicios activos son aquellos que no tengan hora de regreso marcada
      return $this->whereNull('hora_regreso')->orderBy('id','ASC')->get()->all();
  }

  public function bomberos(){
    return $this->hasMany(BomberoServicio::class);
  }

  public function vehiculos(){
    return $this->hasMany(VehiculoServicio::class);
  }

  public function tipoServicio(){
    return $this->belongsTo(TipoServicio::class);
  }

}
