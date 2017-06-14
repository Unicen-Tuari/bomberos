<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  protected $table = 'material';
  protected $fillable = [
      'nombre','vehiculo_id','detalle','mantenimiento','reparado','rubro',
  ];

  public function ScopeMaterial($query,$nombre)
  {
    $nombre=strtoupper($nombre);
    if (trim($nombre)!="") {
      $query->where(\DB::raw("UPPER(nombre)"),'LIKE',"%$nombre%");
    }
  }

  public function ScopeRubro($query,$rubro)
  {
    if ($rubro>0) {
      $query->where('rubro',$rubro);
    }
  }

  public function ScopeMovil($query,$movil)
  {
    if ($movil>0) {
      $query->where('vehiculo_id',$movil);
    }
  }

  public function vehiculo(){
    return $this->belongsTo(Vehiculo::class);
  }
}
