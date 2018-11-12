<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Renglon;

class Planilla extends Model
{
    protected $table = 'planillas';
    protected $fillable = [
      'id', 'jefe_guardia', 'nro_guardia', 'inicio_semana', 'fin_semana', 'mes',
    ];



    public function renglones(){
        return $this->hasMany(Renglon::class);
      }
}
