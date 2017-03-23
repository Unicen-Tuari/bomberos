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
use App\Ingreso;
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
      $servicios=Servicio::paginate(12);
      return view('servicio/servicios',compact('servicios'));
    }

    public function store(ServicioRequest $request)
    {
      $data=$request->all();//obtengo todos los atributos
      $servicio=new Servicio;

      $servicio->tipo_servicio_id=$data['tipo'];
      $servicio->tipo_alarma=$data['tipo_alarma'];
      $servicio->direccion=$data['direccion'];
      $servicio->autor_llamada=$data['autor_llamada'];
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
      $servicio->jefe_servicio=$data['jefe_servicio'];
      $servicio->oficial=$data['oficial'];
      $servicio->jefe_de_cuerpo=$data['jefe_de_cuerpo'];
      if ($servicio->save()) {

        if ($data["bombero"]) {
           //creo las relaciones servicio bomberos                                          tipo_id es tipo asistencia 2 primera dotacion
           $a_cargo = BomberoServicio::create(['servicio_id'=>$servicio->id,'bombero_id'=>$data["bombero"],'tipo_id'=>2,'a_cargo'=>true]);
         }

        if ($data["vehiculo"]) {
          //creo las relaciones servicio Vehiculo primera dotacion
          VehiculoServicio::create(['servicio_id'=>$servicio->id,'vehiculo_id'=>$data['vehiculo'],'primero'=>true]);
          foreach ($data["vehiculos"] as $vehiculo) {
            //creo las relaciones servicio Vehiculos
            if ($data["vehiculo"]!=$vehiculo) {//evitamos el que salio primero
              VehiculoServicio::create(['servicio_id'=>$servicio->id,'vehiculo_id'=>$vehiculo,'primero'=>false]);
            }
          }
        }

       return redirect()->route('ingreso.indexPresentes',[0=>$servicio->id,1=>$data['bombero']]);
      }else {
        dd('fallo');
      }
    }

    public function create(){
      $bomberos=Bombero::getBomberos();
      $ingresados = $bomberos;
      $datasv=Vehiculo::where('estado',1)->get();
      $vehiculos = array();
      $vehiculos[0] = "vehiculo...";
      foreach ($datasv as $data)
      {
          $vehiculos[$data->id] = $data->patente;
      }
      $ultimo=Servicio::select('id')->orderBy('id','desc')->first();
      if($ultimo){
        $ultimo=$ultimo->id+1;
      }else {
        $ultimo=1;
      }
      return view('servicio/finalizado',compact('bomberos','vehiculos','ultimo','ingresados'));
    }

    public function llamada()
    {
        return view('servicio/llamada');
    }
    public function finalizarActivo($id)
    {
      // cambiar conteniado
        $servicio=Servicio::find($id);
        $bomberos=Bombero::getBomberos();
        $ing=Ingreso::all();
        $ingresados = array();
        $ingresados[0] = "bombero...";
        foreach ($ing as $data)
        {
            $ingresados[$data->id_bombero] = $data->bombero->nombre . " " . $data->bombero->apellido;
        }
        $datasv=Vehiculo::all(['id', 'patente']);
        $vehiculos = array();
        $vehiculos[0] = "vehiculo...";
        foreach ($datasv as $data)
        {
            $vehiculos[$data->id] = $data->patente;
        }
        return view('servicio/finalizar',compact('bomberos','vehiculos','servicio','ingresados'));
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
        $servicio->autor_llamada=$data['autor_llamada'];
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

    public function tabla($mes,$año)
    {
        $servicios=Servicio::all();
        foreach ($servicios as $key => $servicio) {
          if (!((\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_alarma)->format('m')==$mes ) &&  (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_alarma)->format('Y')==$año)))
          {
            unset($servicios[$key]);
          }
        }
        return view('servicio/estadisticasMes',compact('servicios','mes','año'));
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
      $bomberoserv=BomberoServicio::where([['servicio_id',$id],['a_cargo',1]])->first();
      $bombero=$bomberoserv->bombero_id;
      $servicio=Servicio::find($id);
      $bomberos=Bombero::getBomberos();
      $ingresados = $bomberos;

      $datasv=Vehiculo::all();
      $vehiculos = array();
      $vehiculos[0] = "vehiculo...";
      foreach ($datasv as $data)
      {
          $vehiculos[$data->id] = $data->patente;
      }
      $vehiculosSer=VehiculoServicio::where('servicio_id',$servicio->id)->get();
      $involucrados = array();
      foreach ($vehiculosSer as $data)
      {
          if ($data->primero) {
            $primero=$data->vehiculo_id;
          }
          $involucrados[] = $data->vehiculo_id;
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
      return view('servicio/editar',compact('servicio','bombero','bomberos',
      'vehiculos','bomberosparticipantes','vehiculosparticipantes','ingresados','involucrados','primero'));
    }

    public function update(ServicioRequest $request, $id)
    {
        $data=$request->all();//obtengo todos los atributos
        $servicio= Servicio::find($id);
        $servicio->tipo_servicio_id=$data['tipo'];
        $servicio->direccion=$data['direccion'];
        $servicio->autor_llamada=$data['autor_llamada'];
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
        $servicio->jefe_servicio=$data['jefe_servicio'];
        $servicio->oficial=$data['oficial'];
        $servicio->jefe_de_cuerpo=$data['jefe_de_cuerpo'];

        if ($servicio->save()) {

          $bomberoacargo=BomberoServicio::where([['servicio_id',$servicio->id],['a_cargo',1]])->first();
          if ($data["bombero"]) {
            //modifica el bombero a cargo
            if (!$bomberoacargo) {
              BomberoServicio::create(['servicio_id'=>$servicio->id,'bombero_id'=>$data["bombero"],'tipo_id'=>2,'a_cargo'=>true]);
            }else {
              $bomberoacargo->bombero_id=$data['bombero'];
              $bomberoacargo->save();
            }
          }

          $vehiculos=VehiculoServicio::where('servicio_id',$servicio->id)->get();
          $mantengo= array();
          foreach ($vehiculos as $value) {
            if (!in_array ( $value->vehiculo_id , $data["vehiculos"])) {
              $value->delete();
            }elseif($value->primero && $value->vehiculo_id!=$data["vehiculo"]){
              $mantengo[]=$value->vehiculo_id;
              $value->primero=false;
              $value->save();
            }else {
              $mantengo[]=$value->vehiculo_id;
            }
          }
          $mantengo = array_diff($data["vehiculos"],$mantengo);
          foreach ($mantengo as $vehiculo) {
            VehiculoServicio::create(['servicio_id'=>$servicio->id,'vehiculo_id'=>$vehiculo,'primero'=>false]);
          }
          $primerv=VehiculoServicio::where([['servicio_id',$servicio->id],['vehiculo_id',$data["vehiculo"]]])->first();
          $primerv->primero=true;
          $primerv->save();
          if ($data["finalizar"]!=0) {
            return redirect()->route('ingreso.indexPresentes',[0=>$servicio->id,1=>$data['bombero']]);
          }else {
            return redirect()->route('ingreso.editPresentes',$servicio->id);
          }
        }else {
          dd('fallo');
        }
    }

    public function guardar_presentes(Request $request)
    {
        $data=$request->all();
        //  obtenemos el ultimo bombero en servico ya que es el a cargo que va
        // en primera dotacion para no volver a asignarlo
        $acargo=BomberoServicio::all()->last();
        // para guardar los bomberos tenemos que ignorar los dos priemros datos
        //  que son el token y el id servicio
        foreach ($data as $key => $value) {
          if (strstr($key, '-', true)=="bombero") {
            $idbombero=substr($key, 8);
            if ($acargo["bombero_id"]!=$idbombero) {
              BomberoServicio::create(['servicio_id'=>$data['servicio'],'bombero_id'=>$idbombero,'tipo_id'=>$value]);
            }
          }
        }
        return redirect()->route('servicio.index');
    }

    public function editar_presentes(Request $request)
    {
      foreach ($request as $key => $value) {
        if (strstr($key, '-', true)=="bombero") {
          $idbombero=substr($key, 8);
          $involucrado=BomberoServicio::where([['servicio_id',$data['servicio']],['bombero_id',$idbombero]])->first();
          if (!$involucrado) {
            BomberoServicio::create(['servicio_id'=>$data['servicio'],'bombero_id'=>$idbombero,'tipo_id'=>$value]);
          }elseif((integer)$involucrado->tipo_id!=(integer)$value){
            $involucrado->tipo_id=$value;
            $involucrado->save();
          }
        }
      }
      return redirect()->route('servicio.index');
    }

    public function destroy($id)
    {
        $servicio=Servicio::find($id);
        $servicio->delete();
        return redirect()->route('servicio.index');
    }
}
