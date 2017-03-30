<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BomberoServicio extends Model
{
    protected $table = 'bombero_servicio';
    protected $fillable = ['servicio_id','bombero_id','tipo_id','a_cargo'];

    public function bombero(){
      return $this->hasOne(Bombero::class,"id","bombero_id");
    }

    public function servicio(){
      return $this->hasOne(Servicio::class,"id","servicio_id");
    }

}
