<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vehiculo;
use App\Servicio;

class VehiculoServicio extends Model
{
  use Traits\HasCompositePrimaryKey;
  protected $table = 'vehiculo_servicio';
  protected $fillable = ['servicio_id' , 'vehiculo_id'];
  protected $primaryKey = ['servicio_id','vehiculo_id'];

}
