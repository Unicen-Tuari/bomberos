<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BomberoServicio extends Model
{
    use Traits\HasCompositePrimaryKey;
    protected $table = 'bombero_servicio';
    protected $fillable = ['servicio_id','bombero_id','tipo_id'];
    protected $primarykey = ['servicio_id','bombero_id'];

    public function servicio(){
      return $this->belongsTo(Servicio::class);
    }


}
