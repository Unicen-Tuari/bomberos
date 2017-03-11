<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bombero;

class Ingreso extends Model
{
    protected $table = 'ingreso';
    protected $fillable = [
        'id','id_bombero',
    ];

    public function bombero(){
      return $this->hasOne(Bombero::class,"id","id_bombero");
    }
}
