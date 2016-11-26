<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bombero extends Model
{
  protected $table = 'bombero';
  protected $fillable = [
    'id', 'nombre', 'apellido', 'nro_legajo', 'jerarquia',
     'direccion', 'telefono', 'fecha_nacimiento',
  ];

  protected function getBomberos(){
    $datasb= $this->select('id','nombre','apellido')->get();
    $bomberos = array();
    foreach ($datasb as $data)
    {
        $bomberos[$data->id] = $data->apellido.' '.$data->nombre;
    }
    return $bomberos;
  }

  public function servicio(){
    return $this->belongsTo(BomberoServicio::class);
  }
}
