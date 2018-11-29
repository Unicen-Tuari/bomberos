<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RenglonRequest extends Request
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
              'planilla_id' => 'required|exists:planillas,id',
              'descripcion_responsabilidad' => 'required|max:200', 
              'responsable' => 'required|numeric|exists:bombero,id',
              'ayudante' => 'required|numeric|exists:bombero,id|different:responsable', 
          ];
        }

        case 'PUT':
        {
          return [
              'planilla_id' => 'required|exists:planillas,id',
              'descripcion_responsabilidad' => 'required|max:200', 
              'responsable' => 'required|numeric|exists:bombero,id', 
              'ayudante' => 'required|numeric|exists:bombero,id|different:responsable',  
          ];
        }
        default:break;
      }
    }
}