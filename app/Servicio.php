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
    {
        return $this->orderBy('id','ASC')->get();
    }
}
