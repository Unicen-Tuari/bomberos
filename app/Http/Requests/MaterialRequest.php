<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

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
               'vehiculo_id'=>'exists:vehiculo,id'
           ];
         }

         case 'PUT':
         {
           return [
             'nombre' => 'required|min:3|max:255',
             'vehiculo_id'=>'exists:vehiculo,id'
           ];
         }
         default:break;
       }
     }
}
