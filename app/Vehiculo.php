<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
  protected $table = 'material';
  protected $fillable = [
      'patente',
  ];
}
