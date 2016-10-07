<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bombero;
use App\Servicio;

class BomberoServicio extends Model
{

    protected $table = 'bombero_servicio';
    protected $fillable = ['servicio_id','bombero_id'];

    public function bombero(){
      return $this->belongsTo(Bombero::class);
    }
    public function servicio(){
      return $this->belongsTo(Servicio::class);
    }
}
