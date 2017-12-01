<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
              'nombre' => 'required|max:255',
              'apellido' => 'required|max:255',
              'usuario' => 'required|max:255',
              'password' => 'required|max:255',
          ];
        }

        case 'PUT':
        {
          return [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'usuario' => 'required|max:255',
          ];
        }
        default:break;
      }
    }

    public function messages()
    {
    return [
        'nombre.required' => 'Por favor ingrese un Nombre',
        'apellido.required'  => 'Por favor ingrese un Apellido',
        'usuario.required'  => 'Por favor ingrese un Usuario',
        'password.required'  => 'Por favor ingrese un Password',
      ];
    }
}
