<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vehiculo;
use App\Servicio;

class VehiculoServicio extends Model
{
  protected $table = 'vehiculo_servicio';
  protected $fillable = ['servicio_id' , 'vehiculo_id'];

  public function vehiculo(){
    return $this->belongsTo(Vehiculo::class);
  }
  public function servicio(){
    return $this->belongsTo(Servicio::class);
  }
}
