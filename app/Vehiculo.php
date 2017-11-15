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
    if ($patente != "") {
      $query->whereRaw('UPPER(patente) = ?', $patente);
    } //No esta devolviendo la patente
  }

  public function ScopeMovil($query,$movil)
  {
    if ($movil>0) {
      $query->where('num_movil',$movil);
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
  /*
  public function patente(){
    return strtoupper($this->patente);
  }*/
  //Problemas con el Scope Patente no se puede llamar estaticamente

}
