<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

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
              'num_servicio'=> 'required_if:finalizar,1|unique:servicio',
              'autor_llamada' => 'max:100',
              'direccion' => 'required|max:255',
              'ilesos' => 'required_if:finalizar,1|numeric|min:0',
              'lesionados' => 'required_if:finalizar,1|numeric|min:0',
              'quemados' => 'required_if:finalizar,1|numeric|min:0',
              'muertos' => 'required_if:finalizar,1|numeric|min:0',
              'otros' => 'required_if:finalizar,1|numeric|min:0',
              'combustible' => 'required_if:finalizar,1|numeric|min:0',
              'reconocimiento' => 'required_if:finalizar,1|min:5',
              'disposiciones' => 'required_if:finalizar,1|min:5',
              'alarma' => 'required|date_format:d/m/Y H:i:s',
              'cuartel_colaborador' => 'max:20',
              'superficie' => 'numeric|required_if:tipo,11|min:0',
              'salida' => 'required_if:finalizar,1|date_format:d/m/Y H:i:s|after:alarma',
              'regreso' => 'required_if:finalizar,1|date_format:d/m/Y H:i:s|after:salida',
              'bombero' => 'required_if:finalizar,1|exists:bombero,id',
              'jefe_servicio' => 'required_if:finalizar,1|exists:bombero,id',
              'oficial' => 'required_if:finalizar,1|exists:bombero,id',
              'jefe_de_cuerpo' => 'required_if:finalizar,1|exists:bombero,id',
          ];
        }

        case 'PUT':
        {
          return [
              'tipo' => 'required|max:11',
              'tipo_alarma' => 'required',
              'num_servicio'=> 'required|unique:servicio,num_servicio,'.$this->servicio,//$this->servicio = id servicio
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
