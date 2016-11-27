<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bombero extends Model
{
  protected $table = 'bombero';
  protected $fillable = [
    'id', 'nombre', 'apellido', 'nro_legajo', 'jerarquia',
     'direccion', 'telefono', 'fecha_nacimiento','activo',
  ];

  protected function getBomberos(){
      $datasb = $this->select('id', 'nombre')->orderBy('id','ASC')->get();
      $bomberos = array();
      $bomberos[0] = "Elegir bombero...";
      foreach ($datasb as $data)
      {
          $bomberos[$data->id] = $data->nombre;
      }
      return $bomberos;
  }

  public function servicio(){
    return $this->belongsTo(BomberoServicio::class);
  }

}
