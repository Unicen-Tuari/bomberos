<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VariableRequest extends Request
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
              'asistencia' => 'required|max:255',
              'accidentales' => 'required|max:255',
              'guardias' => 'required|max:255',
              'year' => 'required|max:255|unique:variables',
          ];
        }

        case 'PUT':
        {
          return [
            'asistencia' => 'required|max:255',
            'accidentales' => 'required|max:255',
            'guardias' => 'required|max:255',
          ];
        }
        default:break;
      }
    }
    public function messages()
    {
      return[
        'year.unique' => 'El año ya existe',
      ];
    }
}
