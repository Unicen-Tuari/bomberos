@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-edit" aria-hidden="true"></span>
      <h4>Modificar servicio</h4>
    </div>
  <div class="panel-body">

  {!! Form::open([ 'route' =>['servicio.update', $servicio], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}

    @php
    $numero=$servicio->id;
    $tipo=$servicio->tipo_servicio_id;
    $llamada=$servicio->autor_llamada;
    $direccion=$servicio->direccion;
    $ilesos=$servicio->ilesos;
    $lesionados=$servicio->lesionados;
    $quemados=$servicio->quemados;
    $muertos=$servicio->muertos;
    $otros=$servicio->otros;
    $superficie=$servicio->superficie;
    $cuartel=$servicio->cuartel_colaborador;
    $combustible=$servicio->combustible;
    $reconocimiento=$servicio->reconocimiento;
    $disposiciones=$servicio->disposiciones;
    $hora=$servicio->hora_alarma;
    $salida=$servicio->hora_salida;
    $regreso=$servicio->hora_regreso;
    $jefe=$servicio->jefe_servicio;
    $oficial=$servicio->oficial;
    $jcuerpo=$servicio->jefe_de_cuerpo;
    @endphp

    @include('servicio.formcompleto')
  {!! Form::close() !!}

    </div>
  </div>
</article>

@endsection
