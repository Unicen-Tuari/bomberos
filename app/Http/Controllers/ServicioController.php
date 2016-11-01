<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoServicio;
use App\Http\Requests;
use App\Http\Requests\ServicioRequest;
use App\Servicio;
use App\Bombero;
use App\Vehiculo;
use App\BomberoServicio;
use App\VehiculoServicio;
use Carbon\Carbon;
use \DateTimeZone;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $servicios=Servicio::orderBy('hora_regreso','DESC')->paginate(12);
      return view('servicio/servicios',compact('servicios'));
    }

    public function store(ServicioRequest $request)
    {
      $data=$request->all();//obtengo todos los atributos
      $servicio=new Servicio;
      $servicio->tipo_servicio_id=$data['tipo'];
      $servicio->direccion=$data['direccion'];
      $servicio->descripcion=$data['descripcion'];
      $servicio->ilesos=$data['ilesos'];
      $servicio->lesionados=$data['lesionados'];
      $servicio->quemados=$data['quemados'];
      $servicio->muertos=$data['muertos'];
      $servicio->otros=$data['otros'];
      $servicio->combustible=$data['combustible'];
      $servicio->reconocimiento=$data['reconocimiento'];
      $servicio->disposiciones=$data['disposiciones'];
      $servicio->hora_alarma=$data['alarma'];
      $servicio->hora_salida=$data['salida'];
      $servicio->hora_regreso=$data['regreso'];
      if ($servicio->save()) {
        foreach ($data["Bomberos"] as $bombero) {
          //creo las relaciones servicio bomberos
          BomberoServicio::create(['servicio_id'=>$servicio->id,'bombero_id'=>$bombero]);
        }
        if(array_key_exists("Vehiculos",$data)){
          foreach ($data["Vehiculos"] as $vehiculo) {
            //creo las relaciones servicio Vehiculos
            VehiculoServicio::create(['servicio_id'=>$servicio->id,'vehiculo_id'=>$vehiculo]);
          }
        }
       return redirect()->route('servicio.index');
      }else {
        dd('fallo');
      }
    }

    public function create(){
      $datas=TipoServicio::all(['id', 'nombre']);
      $tipos = array();
      foreach ($datas as $data)
      {
          $tipos[$data->id] = $data->nombre;
      }
      $datasb=Bombero::all(['id', 'nombre']);
      $bomberos = array();
      foreach ($datasb as $data)
      {
          $bomberos[$data->id] = $data->nombre;
      }
        $datasv=Vehiculo::all(['id', 'patente']);
        $vehiculos = array();
        foreach ($datasv as $data)
        {
            $vehiculos[$data->id] = $data->patente;
        }
      return view('servicio/finalizado',compact('tipos','bomberos','vehiculos'));
    }

    public function llamada()
    {
        $datas=TipoServicio::all(['id', 'nombre']);
        $tipos = array();
        foreach ($datas as $data)
        {
            $tipos[$data->id] = $data->nombre;
        }
        return view('servicio/llamada',compact('tipos'));
    }
    public function finalizarActivo($id)
    {
      // cambiar conteniado
        $servicio=Servicio::find($id);
        $datasb=Bombero::all(['id', 'nombre']);
        $bomberos = array();
        foreach ($datasb as $data)
        {
            $bomberos[$data->id] = $data->nombre;
        }
          $datasv=Vehiculo::all(['id', 'patente']);
          $vehiculos = array();
          foreach ($datasv as $data)
          {
              $vehiculos[$data->id] = $data->patente;
          }
        return view('servicio/finalizar',compact('servicio','bomberos','vehiculos'));
    }

    public function guardarActivo(ServicioRequest $request, $id)
    {
      $data=$request->all();//obtengo todos los atributos
      $servicio= Servicio::find($id);
      $servicio->ilesos=$data['ilesos'];
      $servicio->lesionados=$data['lesionados'];
      $servicio->quemados=$data['quemados'];
      $servicio->muertos=$data['muertos'];
      $servicio->otros=$data['otros'];
      $servicio->combustible=$data['combustible'];
      $servicio->reconocimiento=$data['reconocimiento'];
      $servicio->disposiciones=$data['disposiciones'];
      if(!$servicio->hora_salida && $servicio->hora_salida>$servicio->hora_alarma){
        //si la hora de salida no esta marcada se asigna igual a la de alarma
        $servicio->hora_salida=$data['salida'];
      }
      $servicio->hora_regreso=$data['regreso'];
      if ($servicio->save()) {
        foreach ($data["Bomberos"] as $bombero) {
          //creo las relaciones servicio bomberos
          BomberoServicio::create(['servicio_id'=>$servicio->id,'bombero_id'=>$bombero]);
        }
        if(array_key_exists("Vehiculos",$data)){
          foreach ($data["Vehiculos"] as $vehiculo) {
            //creo las relaciones servicio Vehiculos
            VehiculoServicio::create(['servicio_id'=>$servicio->id,'vehiculo_id'=>$vehiculo]);
          }
        }
       return redirect()->route('servicio.index');
      }else {
        dd('fallo');
      }
    }
    public function salida($id)
    {
        $hsalida = Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->toDateTimeString();
        $servicio=Servicio::find($id);
        $servicio->hora_salida=$hsalida;
        $servicio->save();
        return redirect()->route('servicio.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function iniciado(ServicioRequest $data)
    {
      $tipo= TipoServicio::find($data['tipo']);
      if($tipo){
        $servicio=new Servicio;
        $servicio->tipo_servicio_id=$tipo->id;
        $servicio->direccion=$data['direccion'];
        $servicio->descripcion=$data['descripcion'];
        $servicio->hora_alarma=$data['alarma'];
        if ($servicio->save()) {
         return redirect()->route('servicio.index');
        }else {
          dd('fallo');
        }
      }
      else {
        dd('no existe tipo');
      }

    }
    public function estadistica()
    {
        return view('servicio/estadistica');
    }

    public function tabla($mes,$anio)
    {
        $servicios=Servicio::all();
        foreach ($servicios as $key => $servicio) {
          if (!((\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_alarma)->format('m')==$mes ) &&  (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_alarma)->format('Y')==$anio)))
          {
            unset($servicios[$key]);
          }
        }
        return view('servicio/estadisticasMes',compact('servicios'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $servicio=Servicio::find($id);
      $datasb=Bombero::all(['id', 'nombre']);
      $bomberos = array();
      foreach ($datasb as $data)
      {
          $bomberos[$data->id] = $data->nombre;
      }

      $datasv=Vehiculo::all(['id', 'patente']);
      $vehiculos = array();
      foreach ($datasv as $data)
      {
          $vehiculos[$data->id] = $data->patente;
      }

      $datas=TipoServicio::all(['id', 'nombre']);
      $tipos = array();
      foreach ($datas as $data)
      {
          $tipos[$data->id] = $data->nombre;
      }

      $bomberosparticipantes=array();
      foreach ($servicio->bomberos as $data)
      {
          $bomberosparticipantes[] = $data->bombero_id;
      }

      $vehiculosparticipantes=array();
      foreach ($servicio->vehiculos as $data)
      {
          $vehiculosparticipantes[] = $data->vehiculo_id;
      }

      return view('servicio/editar',compact('tipos','servicio','bomberos','vehiculos','bomberosparticipantes','vehiculosparticipantes'));
    }

    public function update(ServicioRequest $request, $id)
    {
        $data=$request->all();//obtengo todos los atributos
        $servicio= Servicio::find($id);
        $servicio->direccion=$data['direccion'];
        $servicio->descripcion=$data['descripcion'];
        $servicio->ilesos=$data['ilesos'];
        $servicio->lesionados=$data['lesionados'];
        $servicio->quemados=$data['quemados'];
        $servicio->muertos=$data['muertos'];
        $servicio->otros=$data['otros'];
        $servicio->combustible=$data['combustible'];
        $servicio->reconocimiento=$data['reconocimiento'];
        $servicio->disposiciones=$data['disposiciones'];
        $servicio->hora_salida=$data['salida'];
        $servicio->hora_regreso=$data['regreso'];

        // Eliminamos los bomberos que han sido descartado por la edicion
        $eliminarb=BomberoServicio::where('servicio_id',$servicio->id)->get();
        foreach ($eliminarb as $value) {
          if (!in_array ( $value->bombero_id , $data["Bomberos"])) {
            BomberoServicio::where('servicio_id',$servicio->id)->where('bombero_id',$value->bombero_id)->delete();
          }
        }

        // Eliminamos los vehiculo que han sido descartado por la edicion
        $eliminarv=VehiculoServicio::where('servicio_id',$servicio->id)->get();
        foreach ($eliminarv as $value) {
          if (!in_array ( $value->vehiculo_id , $data["Vehiculos"])) {
            VehiculoServicio::where('servicio_id',$servicio->id)->where('vehiculo_id',$value->vehiculo_id)->delete();
          }
        }

        if ($servicio->save()) {
          foreach ($data["Bomberos"] as $bombero) {
            //creo las relaciones servicio bomberos de los nuevos bomberos
            if (!BomberoServicio::where('servicio_id',$servicio->id)->where('bombero_id',$bombero)->count()) {
              BomberoServicio::create(['servicio_id'=>$servicio->id,'bombero_id'=>$bombero]);
            }
          }


          if(array_key_exists("Vehiculos",$data)){
            foreach ($data["Vehiculos"] as $vehiculo) {
              //creo las relaciones servicio Vehiculos de los nuevos Vehiculos
              if (!VehiculoServicio::where('servicio_id',$servicio->id)->where('vehiculo_id',$vehiculo)->count()) {
                VehiculoServicio::create(['servicio_id'=>$servicio->id,'vehiculo_id'=>$vehiculo]);
              }
            }
          }
         return redirect()->route('servicio.index');
        }else {
          dd('fallo');
        }
    }


    public function destroy($id)
    {
        $servicio=Servicio::find($id);
        $servicio->delete();
        return redirect()->route('servicio.index');
    }
}
