<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variables extends Model
{
  protected $table = 'variables';
  protected $fillable = [
      'asistencia', 'accidentales', 'guardias', 'year',
  ];
  public static function getVarByYear($year){
    $var=Variables::whereNotNull('year')->where('year','=', $year)->first();
    return $var;
  }
  public static function getVar(){
    $var=Variables::wherenotNull('year')->orderBy('year','desc')->first();
    return $var;
  }
}
