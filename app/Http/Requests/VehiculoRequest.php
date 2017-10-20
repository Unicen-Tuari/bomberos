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
      switch($this->method())
      {
        case 'GET':{
          return [
              'movil'=> 'numeric|min:0',
          ];
        }
        case 'DELETE':
        {
            return [];
        }
        case 'POST':
        {//formato arry para que funcione la expresion regular
          return [
              'num_movil'=> 'required|numeric|min:0|unique:vehiculo',
              'patente' => array('required_if:estado,1','min:6','unique:vehiculo', 'regex:/^\w{2}\s\d{3}\s\w{2}$|\w{3}\s\d{3}$/'),
              'estado' => array('required','not_in:3'),
          ];
        }

        case 'PUT':
        {
          $url = explode('/' , $_SERVER['REQUEST_URI']);
          $url['id_vehiculo'] = $url[2];
          $id_vehiculo = $url['id_vehiculo'] + 0;
            if (Vehiculo::find($id_vehiculo)['num_movil'] == $_POST['num_movil']){
              $num_movil_rule = 'required|numeric|min:0';
            }
            else{
              $num_movil_rule = 'required|numeric|min:0|unique:vehiculo';
            }
          return [
              'num_movil'=> $num_movil_rule ,               //$this->vehiculo = id vehiculo
              'patente' => array('required_if:estado,1','min:6','unique:vehiculo,patente,'.$this->vehiculo, 'regex:/^\w{2}\s\d{3}\s\w{2}$|\w{3}\s\d{3}$/'),
              'estado' => array('required'),
          ];
        }
        default:break;
      }
    }
}
