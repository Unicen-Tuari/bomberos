<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAsistencia extends Model
{
  protected $table = 'tipo_asistencia';
  protected $fillable = ['id','nombre'];
}
