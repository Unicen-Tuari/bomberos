<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bombero extends Model
{
  protected $table = 'bombero';
  protected $fillable = 'nombre';
}
