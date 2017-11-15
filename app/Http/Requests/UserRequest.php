<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
              'nombre' => 'required|max:255',
              'apellido' => 'required|max:255',
              'usuario' => 'required|max:255',
              'password' => 'required|max:255',
              // por el momento queda asi porque sino no deja cargar. 'admin' => 'required|max:1',
          ];
        }

        case 'PUT':
        {
          return [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'usuario' => 'required|max:255',
            'admin' => 'required|max:1',
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
