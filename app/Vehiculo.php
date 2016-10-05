<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
  protected $table = 'vehiculo';
  protected $fillable = [
      'patente',
  ];
  public function materiales(){
    return $this->hasMany(Material::class);
  }
}
