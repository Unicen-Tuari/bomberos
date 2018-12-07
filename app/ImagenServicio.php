<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ImagenServicio extends Model
{
    protected $fillable = ['servicio_id', 'path'];

    protected $table = 'imagen_servicios';

    public function servicio()
    {
        return $this->belongsTo(Servicio::class,"id");
    }
}