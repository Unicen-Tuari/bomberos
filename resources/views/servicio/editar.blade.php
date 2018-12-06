@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-edit" aria-hidden="true"></span>
      <h4>Modificar servicio</h4>
    </div>
  <div class="panel-body">
   <form class='form-horizontal' action="{{route('servicio.update',$servicio)}}" method="POST" enctype="multipart/form-data">
     {{csrf_field()}}
     {{method_field('PUT')}}
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
    <input class="hidden" type="text" name="finalizar" value="0">
    @include('servicio.formcompleto')
    <div class="form-group {{$errors->has('disposiciones') ? ' has-error' : ''}}">
      <label class="col-sm-2 control-label" for="imageToUpload">Planillas</label>
      <div class="col-sm-8">
        <input type="file" class="form-control" name="imageToUpload" id="imageToUpload" multiple>
      </div>
    </div>
    <div class="col-sm-1 col-sm-offset-5">
      <button type="submit" class="btn btn-primary">
          <i class="glyphicon glyphicon-ok"></i> Finalizar
      </button>
    </div>
  </form>
    </div>
  </div>
</article>

@endsection
