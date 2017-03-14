<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asistencia extends Model
{
  protected $table = 'asistencia';
  protected $fillable = [
    'id', 'id_bombero'
  ];
}
