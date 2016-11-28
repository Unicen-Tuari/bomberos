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
      $datasb = $this->select('id', 'nombre', 'apellido')->orderBy('id','ASC')->where('activo', 1)->get();
      $bomberos = array();
      $bomberos[0] = "Elegir bombero...";
      foreach ($datasb as $data)
      {
          $bomberos[$data->id] = $data->nombre . " " . $data->apellido;
      }
      return $bomberos;
  }

  public function servicio(){
    return $this->belongsTo(BomberoServicio::class);
  }

  public function vehiculo(){
    return $this->belongsTo(Vehiculo::class);
  }

  public function ingresado(){
      return $this->belongsTo(Ingreso::class);
  }
}
