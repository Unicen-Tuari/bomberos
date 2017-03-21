<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
  protected $table = 'vehiculo';
  protected $fillable = [
      'patente','num_movil','detalle','activo','baja',
  ];
  public function materiales(){
    return $this->hasMany(Material::class);
  }

  public function servicios(){
    return $this->hasMany(VehiculoServicio::class);
  }

}
