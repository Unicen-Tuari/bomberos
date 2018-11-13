<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PlanillaRequest extends Request
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
              'jefe_guardia' => 'required',
              'nro_guardia' => 'required', 
              'inicio_semana' => 'required|numeric', 
              'fin_semana' => 'required|numeric', 
              'mes' => 'required',
          ];
        }

        case 'PUT':
        {
          return [
            'jefe_guardia' => 'required',
              'nro_guardia' => 'required', 
              'inicio_semana' => 'required|numeric', 
              'fin_semana' => 'required|numeric', 
              'mes' => 'required',
          ];
        }
        default:break;
      }
    }
}
