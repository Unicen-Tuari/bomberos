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
    $tipo_alarma=$tipo=$llamada=$direccion=$superficie=$cuartel=$reconocimiento=$disposiciones=$jefe=$oficial=$jcuerpo=$bombero=null;
    $ilesos=$lesionados=$quemados=$muertos=$otros=$combustible=0;
    $numero=$ultimo;
    $hora=\Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->toDateTimeString();
    $salida=\Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->addSeconds(30)->toDateTimeString();
    $regreso=\Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->addSeconds(60)->toDateTimeString();
    @endphp

    @include('servicio.formcompleto')
  {!! Form::close() !!}

    </div>
  </div>
</article>

@endsection
