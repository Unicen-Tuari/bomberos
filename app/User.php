<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nombre', 'apellido', 'usuario', 'password', 'admin',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ScopeId($query,$id)
    {
      if ($id>0) {
        $query->where('id',$id);
      }
    }

    public function ScopeNombre($query,$nombre)
    {
      $nombre=strtoupper($nombre);
      if (trim($nombre)!="") {
        $query->where(\DB::raw("UPPER(CONCAT(nombre,' ',apellido))"),'LIKE',"%$nombre%");
      }
    }
}
