<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
  protected $table = 'tipo_servicio';
  protected $fillable = ['nombre'];
}
