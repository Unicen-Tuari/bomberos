<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Servicio;

class ServicioRequest extends Request
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
      $bombero = Servicio::find($this->bombero);
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
              'tipo_servicio_id' => 'required|exists:bombero,id',
              'direccion' => 'required|max:255',
              'descripcion' => 'required|max:255',
              'hora_alarma' => 'required|date_format:Y-m-d H:i:s',
              'hora_salida' => 'required|date_format:Y-m-d H:i:s|after:hora_alarma',
              'hora_regreso' => 'required|date_format:Y-m-d H:i:s|after:hora_alarma',
              'nro_legajo' => 'required|min:6|numeric|unique:bombero',
              'jerarquia' => 'required|max:255',
              'telefono' => 'required|min:6',
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
