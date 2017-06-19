<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IngresoRequest extends Request
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

    public function rules()
    {
      switch($this->method())
      {
        case 'POST':
        {
          return [
              'id_bombero' => 'required|exists:bombero,id'
          ];
        }
        default:break;
      }
    }
}
