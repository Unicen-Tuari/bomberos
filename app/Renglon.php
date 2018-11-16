<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Planilla;

class Renglon extends Model
{
    protected $table = 'renglons';
    protected $fillable = [
      'id', 'planilla_id', 'descripcion_responsabilidad', 'responsable', 'ayudante', 
    ];

    public function planillas(){
      return $this->belongsTo(Planilla::class);
    }
}
