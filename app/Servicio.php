<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
  protected $table = 'servicio';
  protected $fillable = ['tipo_servicio_id, tipo_alarma, num_servicio, direccion, descripcion,
            hora_alarma, hora_salida, hora_regreso, ilesos, otros, Superficie, muertos,
            quemados, lesionados, combustible, disposiciones, reconocimiento'];

  public function ScopeTipo($query,$tipo)
  {
    if ($tipo>0) {
      $query->where('tipo_servicio_id',$tipo);
    }
  }

  public function ScopeFecha($query, $month, $year)
  {
    if ($year > 0) {
      if ($month>0) {
        $query->whereYear('hora_regreso','=',$year)->whereMonth('hora_regreso','=',$month);
      }else {
        $query->whereYear('hora_regreso','=',$year);
      }
    }else {
      if ($month>0) {
        $query->whereMonth('hora_regreso','=',$month);
      }
    }
  }

  public function ScopeFechaAlarma($query, $month, $year)
  {
    $query->whereYear('hora_alarma','=',$year)->whereMonth('hora_alarma','=',$month);
  }

  public function ScopeFechaAlarmaPeriodo($query, $monthSince, $yearSince, $monthUntil, $yearUntil)
  {
    if ($yearSince < $yearUntil) {
      if ('hora_alarma' >= $yearSince) {
        if (whereYear('hora_alarma' == $yearSince)) {
          $query->whereMonth('hora_alarma','>=',$monthSince);
        }
        elseif (whereYear('hora_alarma' >= $yearUntil)) {
          if (whereYear('hora_alarma' == $yearUntil)) {
            $query->whereMonth('hora_alarma','<=',$monthUntil);
          }
          else {
            $query;
          }
        }
      }
      // $query->whereYear('hora_alarma','>=',$yearSince)->whereYear('hora_alarma','<=',$yearUntil);
    }
  }

  public function ScopeTipoAlarma($query,$tipo)
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
