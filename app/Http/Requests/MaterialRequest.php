<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MaterialRequest extends Request
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
          'nombre' => 'required|min:3|max:255'
        ];
      }

      case 'PUT':
      {
        return [
          'nombre' => 'required|min:3|max:255'
        ];
      }
      default:break;
    }
  }
}
