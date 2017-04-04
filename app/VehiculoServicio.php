<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Servicio;

class VehiculoServicio extends Model
{
  protected $table = 'vehiculo_servicio';
  protected $fillable = ['servicio_id' , 'vehiculo_id','primero'];

  public function vehiculos(){
    return $this->hasOne(Vehiculo::class,"id","vehiculo_id");
  }

  public function servicio(){
    return $this->hasOne(Servicio::class,"id","servicio_id");
  }
}
