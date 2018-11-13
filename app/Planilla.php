<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Renglon;

class Planilla extends Model
{
  protected $table = 'planillas';
  protected $fillable = [
    'id', 'jefe_guardia', 'nro_guardia', 'inicio_semana', 'fin_semana', 'mes', 'year',
  ];

  // public function ScopeJefe_guardia($query,$jefe_guardia)
  // {
  //   $jefe_guardia=strtoupper($jefe_guardia);
  //   if (trim($jefe_guardia)!="") {
  //     $query->where(\DB::raw("UPPER(CONCAT(jefe_guardia))"),'LIKE',"%$jefe_guardia%");
  //   }
  // }
  // public function ScopeNro_guardia($query,$nro_guardia)
  // {
  //   if (trim($nro_guardia)!="") {
  //     $query->where('nro_guardia','LIKE',"%$nro_guardia%");
  //   }
  // }

  // public function ScopeInicio_semana($query,$inicio_semana)
  // {
  //   if (trim($inicio_semana)!="") {
  //     $query->where('inicio_semana','LIKE',"%$inicio_semana%");
  //   }
  // }
  // public function ScopeFin_semana($query,$fin_semana)
  // {
  //   if (trim($fin_semana)!="") {
  //     $query->where('fin_semana','LIKE',"%$fin_semana%");
  //   }
  // }
  // public function ScopeMes($query,$mes)
  // {
  //   if (trim($mes)!="") {
  //     $query->where('mes','LIKE',"%$mes%");
  //   }
  // }

  public function renglones(){
      return $this->hasMany(Renglon::class);
    }
}