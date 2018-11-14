<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renglon extends Model
{
    protected $table = 'renglons';
    protected $fillable = [
      'id', 'planilla_id', 'descripcion_responsabilidad', 'responsable', 'ayudante', 
    ];

    public function planilla(){
      return $this->hasOne(Planilla::class,"id","planilla_id");
    }
}
