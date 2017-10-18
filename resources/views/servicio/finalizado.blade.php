@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-check-square-o" aria-hidden="true"></span>
      <h4>Cargar servicio finalizado</h4>
    </div>
    <div class="panel-body">

    {!! Form::open([ 'route' => 'servicio.store', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

      @php
      $tipo_alarma=$tipo=$llamada=$direccion=$cuartel=$reconocimiento=null;
      $disposiciones=$jefe=$oficial=$jcuerpo=$bombero=$involucrados=$primero=null;
      $ilesos=$lesionados=$quemados=$muertos=$otros=$superficie=$combustible=0;
      $numero=$ultimo;
      $hora=\Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->format('d/m/Y H:i:s');
      $salida=\Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->addSeconds(30)->format('d/m/Y H:i:s');
      $regreso=\Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->addSeconds(60)->format('d/m/Y H:i:s');
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
