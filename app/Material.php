<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  protected $table = 'material';
  protected $fillable = [
      'nombre','vehiculo_id',
  ];
  public function vehiculo(){
    return $this->belongsTo(Vehiculo::class);
  }
}
