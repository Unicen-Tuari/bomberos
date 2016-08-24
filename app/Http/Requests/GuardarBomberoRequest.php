<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GuardarBomberoRequest extends Request
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
        return [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'nro_legajo' => 'required|min:6|alpha_num|unique:bombero',
            'jerarquia' => 'required|max:255',
            'direccion' => 'required|max:255',
            'telefono' => 'required|min:6|alpha_num',
            'fechan' => 'required|date_format:d/m/Y',
        ];
    }

}
