@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-edit" aria-hidden="true"></span>
      <h4>Finalizar servicio activo</h4>
    </div>
    <div class="panel-body">

    {!! Form::open([ 'route' => ['servicio.update', $servicio], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}

      @php
      $cuartel=$reconocimiento=$disposiciones=$jefe=$oficial=$jcuerpo=$bombero=$involucrados=$primero=null;
      $superficie=$ilesos=$lesionados=$quemados=$muertos=$otros=$combustible=0;
      @endphp
      @php
      $numero=$servicio->num_servicio;
      $tipo=$servicio->tipo_servicio_id;
      $llamada=$servicio->autor_llamada;
      $direccion=$servicio->direccion;
      $hora=\Carbon\Carbon::parse($servicio->hora_alarma)->format('d/m/Y H:i:s');
      if (!$servicio->hora_salida) {
        $salida=\Carbon\Carbon::parse($servicio->hora_alarma)->addSeconds(60)->format('d/m/Y H:i:s');
      }else {
        $salida=\Carbon\Carbon::parse($servicio->hora_salida)->format('d/m/Y H:i:s');
      }
      $tipo_alarma=$servicio->tipo_alarma;
      $regreso=\Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->format('d/m/Y H:i:s');
      @endphp

      {!! Form::hidden('finalizar', 1) !!}
      @include('servicio.formcompleto')

      <div class="col-sm-1 col-sm-offset-5">
        <button type="submit" class="btn btn-primary">
            <i class="glyphicon glyphicon-ok"></i> Finalizar
        </button>
      </div>
    {!! Form::close() !!}

    </div>
  </div>
</article>

@endsection

@section('js')
{!! Html::script('assets/js/toggleDetails.js') !!}
@endsection
