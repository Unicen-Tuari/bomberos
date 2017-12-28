<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bombero;

class Reemplazo extends Model
{
  protected $table = 'reemplazos';
  protected $fillable = [
    'id_bombero','id_bombero_reemplazo','fecha_inicio','fecha_fin','razon'
  ];

  public static function getActivos()
  {
    $fecha = date('Y-m-d H:i:s');
    return Reemplazo::whereDate('fecha_fin', '>=', $fecha)->get();
  }

  public static function getTerminados()
  {
    $fecha = date('Y-m-d H:i:s');
    return Reemplazo::whereDate('fecha_fin', '<', $fecha)->get();
  }

  public function bombero(){
    return $this->hasOne(Bombero::class,"id","id_bombero");
  }

  public function bomberoReemplazo(){
    return $this->hasOne(Bombero::class,"id","id_bombero_reemplazo");
  }
}
