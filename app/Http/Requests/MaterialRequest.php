<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Material;

class MaterialRequest extends Request
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
       $material = Material::find($this->material);
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
               'nombre' => 'required|min:3|max:255',
           ];
         }

         case 'PUT':
         {
           return [
             'nombre' => 'required|min:3|max:255',
           ];
         }
         default:break;
       }
     }
}
