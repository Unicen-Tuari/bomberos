<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bombero;
use App\Servicio;

class BomberoServicio extends Model
{
  use Traits\HasCompositePrimaryKey; 
    protected $table = 'bombero_servicio';
    protected $fillable = ['servicio_id','bombero_id'];
    protected $primarykey = ['servicio_id','bombero_id'];
}
