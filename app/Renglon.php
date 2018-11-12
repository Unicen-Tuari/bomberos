<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renglon extends Model
{
    protected $table = 'renglons';
    protected $fillable = [
      'id', 'planilla_id', 'descripcion_responsabilidad', 'responsable', 'ayudante', 
    ];
}
