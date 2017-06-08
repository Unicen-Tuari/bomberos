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
        return "1";
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
              'tipo' => 'required|max:11',
              'tipo_alarma' => 'required_if:tipo,1,2,3',
              'autor_llamada' => 'max:100',
              'direccion' => 'required|max:255',
              'ilesos' => 'required_if:finalizar,true|numeric',
              'lesionados' => 'required_if:finalizar,true|numeric',
              'quemados' => 'required_if:finalizar,true|numeric',
              'muertos' => 'required_if:finalizar,true|numeric',
              'otros' => 'required_if:finalizar,true|numeric',
              'combustible' => 'required_if:finalizar,true|numeric',
              'reconocimiento' => 'required_if:finalizar,true|min:5',
              'disposiciones' => 'required_if:finalizar,true|min:5',
              'alarma' => 'required|date_format:d/m/Y H:i:s',
              'cuartel_colaborador' => 'max:20',
              'superficie' => 'numeric|required_if:tipo,11',
              'salida' => 'required_if:finalizar,true|date_format:d/m/Y H:i:s|after:alarma',
              'regreso' => 'required_if:finalizar,true|date_format:d/m/Y H:i:s|after:salida',
              'bombero' => 'required_if:finalizar,true|exists:bombero,id',
              'jefe_servicio' => 'required_if:finalizar,true|exists:bombero,id',
              'oficial' => 'required_if:finalizar,true|exists:bombero,id',
              'jefe_de_cuerpo' => 'required_if:finalizar,true|exists:bombero,id',
          ];
        }

        case 'PUT':
        {
          return [
              'tipo' => 'required|max:11',
              'tipo_alarma' => 'required',
              'autor_llamada' => 'max:100',
              'direccion' => 'required|max:255',
              'ilesos' => 'required|numeric',
              'lesionados' => 'required|numeric',
              'quemados' => 'required|numeric',
              'muertos' => 'required|numeric',
              'otros' => 'required|numeric',
              'bombero' => 'required|exists:bombero,id',
              'combustible' => 'required|numeric',
              'reconocimiento' => 'required|min:5',
              'disposiciones' => 'required|min:5',
              'cuartel_colaborador' => 'max:20',
              'superficie' => 'numeric|required_if:tipo,11',
              'alarma' => 'required|date_format:d/m/Y H:i:s',
              'salida' => 'required|date_format:d/m/Y H:i:s|after:alarma',
              'regreso' => 'required|date_format:d/m/Y H:i:s|after:salida',
              'jefe_servicio' => 'required|exists:bombero,id',
              'oficial' => 'required|exists:bombero,id',
              'jefe_de_cuerpo' => 'required|exists:bombero,id',
          ];
        }
        default:break;
      }
    }
}
