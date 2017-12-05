<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReemplazoRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      switch($this->method())
      {
        case 'GET':
        case 'DELETE':
        {
            return [];
        }
        case 'POST':
        {
          return [
              'id_bombero' => 'required|numeric|different:id_bombero_reemplazo|min:0',
              'id_bombero_reemplazo' => 'required|numeric|different:id_bombero|min:0',
              'fecha_inicio' => 'required',
              'fecha_fin' => 'required|after:fecha_inicio',
              'razon' => 'required',
          ];
        }

        case 'PUT':
        {
          return [
            'id_bombero'=> 'required|numeric|different:id_bombero_reemplazo|min:0',
            'id_bombero_reemplazo' => 'required|numeric|different:id_bombero|min:0',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required|after:fecha_inicio',
            'razon' => 'required',
          ];
        }
        default:break;
      }
    }
}
