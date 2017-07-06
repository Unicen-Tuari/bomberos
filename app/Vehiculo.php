<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
  protected $table = 'vehiculo';
  protected $fillable = [
      'patente','num_movil','detalle','estado',
  ];

  public function ScopePatente($query,$patente)
  {
    $patente=strtoupper($patente);
    if (trim($patente)!="") {
      $query->where('patente','LIKE',"%$patente%");
    }
  }

  public function ScopeMovil($query,$movil)
  {
    if ($movil>0) {
      $query->where('id',$movil);
    }
  }

  public function ScopeEstado($query,$estado)
  {
    if ($estado>0) {
      $query->where('estado',$estado);
    }
  }
  public function materiales(){
    return $this->hasMany(Material::class);
  }

  public function servicios(){
    return $this->hasMany(VehiculoServicio::class);
  }

}
