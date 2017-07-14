<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\Auth;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
      $servicios=Servicio::tipo_s($request['tipo_s'])->tipo_a($request['tipo_a'])
      ->fecha($request['mes'],$request['año'])->paginate(12);
      $ultimos=false;
      return view('servicio/servicios',compact('servicios','ultimos'));
    }

    public function ultimos()
    {
      $servicios=Servicio::orderBy('hora_regreso','DESC')->limit(10)->get();
      $ultimos=true;
      return view('servicio/servicios',compact('servicios','ultimos'));
    }

    public function store(ServicioRequest $request)
    {
      if(Auth::user()->admin){
        $data=$request->all();//obtengo todos los atributos
        $servicio=new Servicio;
        $servicio->num_servicio=$data['num_servicio'];
        $servicio->tipo_servicio_id=$data['tipo'];
        $servicio->tipo_alarma=$data['tipo_alarma'];
        $servicio->direccion=$data['direccion'];
        $servicio->autor_llamada=$data['autor_llamada'];
        $servicio->ilesos=$data['ilesos'];
        $servicio->lesionados=$data['lesionados'];
        $servicio->quemados=$data['quemados'];
        $servicio->muertos=$data['muertos'];
        $servicio->otros=$data['otros'];
        $servicio->Superficie=$data['superficie'];
        $servicio->combustible=$data['combustible'];
        $servicio->reconocimiento=$data['reconocimiento'];
        $servicio->disposiciones=$data['disposiciones'];
        list($dia, $mes, $año) = explode('/', $data['alarma']);
        list($año,$hora) = explode(' ', $año);
        $data['alarma']=$año.'-'.$mes.'-'.$dia.' '.$hora;
        $servicio->hora_alarma=$data['alarma'];

        list($dia, $mes, $año) = explode('/', $data['salida']);
        list($año,$hora) = explode(' ', $año);
        $data['salida']=$año.'-'.$mes.'-'.$dia.' '.$hora;
        $servicio->hora_salida=$data['salida'];

        list($dia, $mes, $año) = explode('/', $data['regreso']);
        list($año,$hora) = explode(' ', $año);
        $data['regreso']=$año.'-'.$mes.'-'.$dia.' '.$hora;
        $servicio->hora_regreso=$data['regreso'];

        $servicio->jefe_servicio=$data['jefe_servicio'];
        $servicio->oficial=$data['oficial'];
        $servicio->jefe_de_cuerpo=$data['jefe_de_cuerpo'];
        if ($servicio->save()) {

          if ($data["bombero"]) {
             //creo las relaciones servicio bomberos                                          tipo_id es tipo asistencia 2 primera dotacion
             $a_cargo = BomberoServicio::create(['servicio_id'=>$servicio->id,'bombero_id'=>$data["bombero"],'tipo_id'=>2,'a_cargo'=>true]);
           }

          if ($data["vehiculo"]!=0) {
            //creo las relaciones servicio Vehiculo
            //Cargamos la primera dotacion al salir
            VehiculoServicio::create(['servicio_id'=>$servicio->id,'vehiculo_id'=>$data['vehiculo'],'primero'=>true]);
            foreach ($data["vehiculos"] as $vehiculo) {
              if ($data["vehiculo"]!=$vehiculo) {//cargamos todos las dotaciones que salieron luego
                VehiculoServicio::create(['servicio_id'=>$servicio->id,'vehiculo_id'=>$vehiculo,'primero'=>false]);
              }
            }
          }

         return redirect()->route('ingreso.indexPresentes',[0=>$servicio->id,1=>$data['bombero']]);
        }else {
          return view('errors/falla');
        }
      }
    }

    public function create(){
      if(Auth::user()->admin){
        $bomberos=Bombero::getBomberos();
        $ingresados = $bomberos;
        $datasv=Vehiculo::where('estado',1)->get();
        $vehiculos = array();
        $vehiculos[0] = "vehiculo...";
        foreach ($datasv as $data)
        {
            $vehiculos[$data->id] = 'Nº - '.$data->num_movil;
        }
        $ultimo=Servicio::select('num_servicio')->orderBy('num_servicio','desc')->first();
        if($ultimo){
          $ultimo=$ultimo->num_servicio+1;
        }else {
          $ultimo=1;
        }
        return view('servicio/finalizado',compact('bomberos','vehiculos','ultimo','ingresados'));
      }
      return view('auth/alerta');
    }

    public function llamada()
    {
      if(Auth::user()->admin){
        return view('servicio/llamada');
      }
      return view('auth/alerta');
    }

    public function finalizarActivo($id)
    {
      if(Auth::user()->admin){
        // cambiar conteniado
        $servicio=Servicio::find($id);
        $bomberos=Bombero::getBomberos();
        $ing=Ingreso::all();
        $ingresados = array();
        if ($ing!=null) {
          $ingresados[0] = "bombero...";
          foreach ($ing as $data)
          {
              $ingresados[$data->id_bombero] = $data->bombero->nombre . " " . $data->bombero->apellido;
          }
        }else {
          $ingresados = $bomberos;
        }
        $datasv=Vehiculo::all(['id', 'num_movil']);
        $vehiculos = array();
        $vehiculos[0] = "vehiculo...";
        foreach ($datasv as $data)
        {
            $vehiculos[$data->id] = 'Nº - '.$data->num_movil;
        }
        return view('servicio/finalizar',compact('bomberos','vehiculos','servicio','ingresados'));
      }
      return view('auth/alerta');
    }


    public function salida($id)
    {
      if(Auth::user()->admin){
        $hsalida = Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->toDateTimeString();
        $servicio=Servicio::find($id);
        $servicio->hora_salida=$hsalida;
        $servicio->save();
        return redirect()->route('servicio.index');
      }
    }

    public function iniciado(ServicioRequest $data)
    {
      if(Auth::user()->admin){
      if(array_key_exists($data['tipo'], config('selects.tipoServicio'))){
        $servicio=new Servicio;
        $ultimo=Servicio::select('num_servicio')->orderBy('num_servicio','desc')->first();
        if($ultimo){
          $servicio->num_servicio=$ultimo->num_servicio+1;
        }else {
          $servicio->num_servicio=1;
        }
        $servicio->tipo_servicio_id=$data['tipo'];
        $servicio->tipo_alarma=$data['tipo_alarma'];
        $servicio->direccion=$data['direccion'];
        $servicio->autor_llamada=$data['autor_llamada'];

        list($dia, $mes, $año) = explode('/', $data['alarma']);
        list($año,$hora) = explode(' ', $año);
        $data['alarma']=$año.'-'.$mes.'-'.$dia.' '.$hora;
        $servicio->hora_alarma=$data['alarma'];
        if ($servicio->save()) {
         return redirect()->route('servicio.index');
        }else {
          return view('errors/falla');
        }
      }else {
        return view('errors/alteracion');
        }
      }

    }
    public function estadistica()
    {
        return view('servicio/estadistica');
    }

    public function tabla($mes,$año)
    {
        $servicios=Servicio::whereYear('hora_alarma','=',$año)->whereMonth('hora_alarma','=',$mes)->get();
        return view('servicio/estadisticasMes',compact('servicios','mes','año'));
    }

    public function show($id)
    {
        $servicio=Servicio::find($id);
        $bombero=$servicio->bomberos->where('a_cargo',true)->first()->bombero_id;
        $bomberos=$ingresados=Bombero::getBomberos();
        $datavs=Vehiculo::all();
        $vehiculos = array();
        $vehiculos[0] = "vehiculo...";
        foreach ($datavs as $data){
          $vehiculos[$data->id] =  'Nº - '.$data->num_movil;
        }
        $involucrados=array();
        $primero=0;
        foreach ($servicio->vehiculos as $data){
          if ($data->primero) {
            $primero=$data->vehiculo_id;
          }
          $involucrados[] = $data->vehiculo_id;
        }
        return view('servicio/info',compact('servicio','bombero','bomberos',
        'vehiculos','ingresados','involucrados','primero'));
    }

    public function edit($id)
    {
      if(Auth::user()->admin){
        $servicio=Servicio::find($id);
        $bombero=$servicio->bomberos->where('a_cargo',true)->first()->bombero_id;
        $bomberos=$ingresados=Bombero::getBomberos();

        $datavs=Vehiculo::all();
        $vehiculos = array();
        $vehiculos[0] = "vehiculo...";
        foreach ($datavs as $data)
        {
            $vehiculos[$data->id] =  'Nº - '.$data->num_movil;
        }
        $involucrados=array();
        $primero=0;
        foreach ($servicio->vehiculos as $data)
        {
            if ($data->primero) {
              $primero=$data->vehiculo_id;
            }
            $involucrados[] = $data->vehiculo_id;
        }
        return view('servicio/editar',compact('servicio','bombero','bomberos',
        'vehiculos','ingresados','involucrados','primero'));
      }
      return view('auth/alerta');
    }

    public function update(ServicioRequest $request, $id)
    {
      if(Auth::user()->admin){
        $data=$request->all();//obtengo todos los atributos
        $servicio= Servicio::find($id);
        $servicio->num_servicio=$data['num_servicio'];
        $servicio->tipo_servicio_id=$data['tipo'];
        $servicio->tipo_alarma=$data['tipo_alarma'];
        $servicio->direccion=$data['direccion'];
        $servicio->autor_llamada=$data['autor_llamada'];
        $servicio->ilesos=$data['ilesos'];
        $servicio->lesionados=$data['lesionados'];
        $servicio->quemados=$data['quemados'];
        $servicio->muertos=$data['muertos'];
        $servicio->otros=$data['otros'];
        $servicio->Superficie=$data['superficie'];
        $servicio->combustible=$data['combustible'];
        $servicio->reconocimiento=$data['reconocimiento'];
        $servicio->disposiciones=$data['disposiciones'];
        list($dia, $mes, $año) = explode('/', $data['alarma']);
        list($año,$hora) = explode(' ', $año);
        $data['alarma']=$año.'-'.$mes.'-'.$dia.' '.$hora;
        $servicio->hora_alarma=$data['alarma'];

        list($dia, $mes, $año) = explode('/', $data['salida']);
        list($año,$hora) = explode(' ', $año);
        $data['salida']=$año.'-'.$mes.'-'.$dia.' '.$hora;
        $servicio->hora_salida=$data['salida'];

        list($dia, $mes, $año) = explode('/', $data['regreso']);
        list($año,$hora) = explode(' ', $año);
        $data['regreso']=$año.'-'.$mes.'-'.$dia.' '.$hora;
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
              if ($bomberoacargo->bombero_id!=$data['bombero']) {
                $bomberoacargo->a_cargo=false;
                $bomberoacargo->save();
                $actual=BomberoServicio::where([['servicio_id',$servicio->id],['bombero_id',$data['bombero']]])->first();
                $actual->a_cargo=true;
                $actual->save();
              };
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
          if (array_key_exists ( "vehiculos" , $data )) {
            $mantengo = array_diff($data["vehiculos"],$mantengo);
          }
          foreach ($mantengo as $vehiculo) {
            VehiculoServicio::create(['servicio_id'=>$servicio->id,'vehiculo_id'=>$vehiculo,'primero'=>false]);
          }
          if ($data["vehiculo"]!= 0) {
            $primerv=VehiculoServicio::where([['servicio_id',$servicio->id],['vehiculo_id',$data["vehiculo"]]])->first();
            $primerv->primero=true;
            $primerv->save();
          }
          if ($data["finalizar"]!=0) {//1 para finalizar un servicio 0 para editar servicio 
            return redirect()->route('ingreso.indexPresentes',[0=>$servicio->id,1=>$data['bombero']]);
          }else {
            return redirect()->route('ingreso.editPresentes',$servicio->id);
          }
        }else {
          return view('auth/alerta');
        }
      }//cierre del if admin
    }

    public function guardar_presentes(Request $request)
    {
      if(Auth::user()->admin){
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
    }

    public function editar_presentes(Request $request)
    {
      if(Auth::user()->admin){
        $data=$request->all();
        foreach ($data as $key => $value) {
          if (strstr($key, '-', true)=="bombero") {
            $idbombero=substr($key, 8);
            $involucrado=BomberoServicio::where([['servicio_id',$data['servicio']],['bombero_id',$idbombero]])->first();
            if($involucrado->tipo_id != $value)
            {
              $involucrado->tipo_id = $value;
            }
            $involucrado->save();
          }
        }
        return redirect()->route('servicio.index');
      }
    }

    public function destroy($id)
    {
      if(Auth::user()->admin){
        $servicio=Servicio::find($id);
        $servicio->delete();
        return redirect()->route('servicio.index');
      }
      return view('auth/alerta');
    }
}
