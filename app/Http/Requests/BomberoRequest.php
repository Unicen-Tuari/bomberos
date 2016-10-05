<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Bombero;

class BomberoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      $bombero = Bombero::find($this->bombero);
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
              'nombre' => 'required|max:255',
              'apellido' => 'required|max:255',
              'nro_legajo' => 'required|min:6|numeric|unique:bombero',
              'jerarquia' => 'required|max:255',
              'direccion' => 'required|max:255',
              'telefono' => 'required|min:6',
              'fecha_nacimiento' => 'required|date_format:Y-m-d',
          ];
        }

        case 'PUT':
        {
          return [
              'nombre' => 'required|max:255',
              'apellido' => 'required|max:255',
              'nro_legajo' => 'required|min:6|numeric|unique:bombero,id,'.$bombero->id,
              'jerarquia' => 'required|max:255',
              'direccion' => 'required|max:255',
              'telefono' => 'required|min:6',
              'fecha_nacimiento' => 'required|date_format:Y-m-d',
          ];
        }
        default:break;
      }
    }
}
