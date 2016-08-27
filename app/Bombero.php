<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bombero extends Model
{
  protected $table = 'bombero';
  protected $fillable = [
      'nro_legajo', 'jerarquia', 'apellido', 'nombre',
      'direccion', 'telefono', 'fecha_nacimiento',
  ];
}
