<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variables extends Model
{
  protected $fillable = [
      'asistencia', 'accidentales', 'guardias',
  ];
  
}
