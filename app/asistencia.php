<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asistencia extends Model
{
  protected $table = 'asistencia';
  protected $fillable = [
    'id', 'id_bombero'
  ];

  public function bombero(){
    return $this->hasOne(Bombero::class,"id","id_bombero");
  }

}
