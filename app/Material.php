<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  protected $table = 'material';
  protected $fillable = [
      'nombre','vehiculo_id','detalle','mantenimiento','reparado','rubro',
  ];
  public function vehiculo(){
    return $this->belongsTo(Vehiculo::class);
  }
}
