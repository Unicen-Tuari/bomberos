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
              'tipo' => 'required|exists:tipo_servicio,id',
              'direccion' => 'required|max:255',
              'descripcion' => 'required|max:255',
              'ilesos' => 'required_if:finalizado,true|numeric',
              'lesionados' => 'required_if:finalizado,true|numeric',
              'quemados' => 'required_if:finalizado,true|numeric',
              'muertos' => 'required_if:finalizado,true|numeric',
              'otros' => 'required_if:finalizado,true|numeric',
              'combustible' => 'required_if:finalizado,true|numeric',
              'reconocimiento' => 'required_if:finalizado,true|min:5',
              'disposiciones' => 'required_if:finalizado,true|min:5',
              'alarma' => 'required|date_format:Y-m-d H:i:s',
              'salida' => 'required_if:finalizado,true|date_format:Y-m-d H:i:s|after:alarma',
              'regreso' => 'required_if:finalizado,true|date_format:Y-m-d H:i:s|after:salida',
              'Bomberos' => 'array|required_if:finalizado,true',
          ];
        }

        case 'PUT':
        {
          return [
              'tipo' => 'required_if:editar,true|exists:tipo_servicio,id',
              'direccion' => 'required_if:editar,true|max:255',
              'descripcion' => 'required_if:editar,true|max:255',
              'ilesos' => 'required|numeric',
              'lesionados' => 'required|numeric',
              'quemados' => 'required|numeric',
              'muertos' => 'required|numeric',
              'otros' => 'required|numeric',
              'combustible' => 'required|numeric',
              'reconocimiento' => 'required|min:5',
              'disposiciones' => 'required|min:5',
              'alarma' => 'required_if:editar,true|date_format:Y-m-d H:i:s',
              'salida' => 'required|date_format:Y-m-d H:i:s|after:alarma',
              'regreso' => 'required|date_format:Y-m-d H:i:s|after:salida',
              'Bomberos' => 'array|required',
          ];
        }
        default:break;
      }
    }
}
