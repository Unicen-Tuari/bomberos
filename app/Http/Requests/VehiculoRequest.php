<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Vehiculo;

class VehiculoRequest extends Request
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
      $vehiculo = Vehiculo::find($this->vehiculo);
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
              'patente' => array('required','min:6','unique:vehiculo', 'regex:/^\w{2}\s\d{3}\s\w{2}$|\w{3}\s\d{3}$/'),
          ];
        }

        case 'PUT':
        {
          return [
              'patente' => array('required','min:6','unique:vehiculo', 'regex:/^\w{2}\s\d{3}\s\w{2}$|\w{3}\s\d{3}$/'),
          ];
        }
        default:break;
      }
    }
}
