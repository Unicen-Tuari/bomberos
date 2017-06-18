<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AsistenciaRequest extends Request
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
        {
          return [
              'inicio' => 'required|date_format:d/m/Y',
              'fin' => 'required|date_format:d/m/Y|after:inicio'
          ];
        }
        case 'POST':
        {
          return [
              'fecha_reunion' => 'required|date_format:d/m/Y'
          ];
        }
        default:break;
      }
    }
}
