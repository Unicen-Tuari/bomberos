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
    $numero=$servicio->num_servicio;
    $tipo=$servicio->tipo_servicio_id;
    $tipo_alarma=$servicio->tipo_alarma;
    $llamada=$servicio->autor_llamada;
    $direccion=$servicio->direccion;
    $ilesos=$servicio->ilesos;
    $lesionados=$servicio->lesionados;
    $quemados=$servicio->quemados;
    $muertos=$servicio->muertos;
    $otros=$servicio->otros;
    $superficie=$servicio->Superficie;
    $cuartel=$servicio->cuartel_colaborador;
    $combustible=$servicio->combustible;
    $reconocimiento=$servicio->reconocimiento;
    $disposiciones=$servicio->disposiciones;
    $hora=\Carbon\Carbon::parse($servicio->hora_alarma)->format('d/m/Y H:i:s');
    $salida=\Carbon\Carbon::parse($servicio->hora_salida)->format('d/m/Y H:i:s');
    $regreso=\Carbon\Carbon::parse($servicio->hora_regreso)->format('d/m/Y H:i:s');
    $jefe=$servicio->jefe_servicio;
    $oficial=$servicio->oficial;
    $jcuerpo=$servicio->jefe_de_cuerpo;
    @endphp

    {!! Form::hidden('finalizar', 0) !!}
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
