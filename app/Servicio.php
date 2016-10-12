<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
  protected $table = 'servicio';
  protected $fillable = ['tipo_servicio_id, direccion, descripcion,
            hora_alarma, hora_salida, hora_regreso, ilesos, otros, muertos,
            quemados, lesionados, combustible, disposiciones, reconocimiento'];

  protected function getActivos()
  {   //servicios activos son aquellos que no tengan hora de regreso marcada
      return $this->whereNull('hora_regreso')->orderBy('id','ASC')->get();
  }

  public function bomberos(){
    return $this->hasMany(BomberoServicio::class);
  }

  public function vehiculos(){
    return $this->hasMany(VehiculoServicio::class);
  }
}
