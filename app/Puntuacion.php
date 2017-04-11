<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model
{
  protected $table = 'puntuacion';
  protected $fillable = ['id_bombero','ao_cant','ao_punt','ao_acad',
  'accid_cant','accid_punt','dedicacion','guar_cant','guar_punt','especiales',
  'licencia','castigo','total','detalle','fecha' ];
}
