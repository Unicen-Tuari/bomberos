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
      $superficie=$cuartel=$reconocimiento=$disposiciones=$jefe=$oficial=$jcuerpo=$bombero=$involucrados=$primero=null;
      $ilesos=$lesionados=$quemados=$muertos=$otros=$combustible=0;
      @endphp
      @php
      $numero=$servicio->id;
      $tipo=$servicio->tipo_servicio_id;
      $llamada=$servicio->autor_llamada;
      $direccion=$servicio->direccion;
      $hora=$servicio->hora_alarma;
      $salida=$servicio->hora_salida;
      $tipo_alarma=$servicio->tipo_alarma;
      $regreso=\Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->format('d/m/Y H:i:s');
      @endphp

      @if(!$salida)
        @php
          $salida=\Carbon\Carbon::parse($hora)->addSeconds(60)->format('d/m/Y H:i:s');
        @endphp
      @endif
      {!! Form::hidden('finalizar', 1) !!}
      @include('servicio.formcompleto')

      <div class="col-sm-6 col-sm-offset-3">
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
