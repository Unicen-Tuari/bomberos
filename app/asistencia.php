<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
  protected $table = 'asistencia';
  protected $fillable = [
    'id', 'id_bombero','fecha_reunion'
  ];

  public function bombero(){
    return $this->hasOne(Bombero::class,"id","id_bombero");
  }

}
