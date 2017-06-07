@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-calendar" aria-hidden="true"></span>
      <h4>Reuniones realizadas</h4>
    </div>
    <div class="panel-body">
      <div class="form-group ">
        <div class="form-group col-sm-6 col-md-4">
          {!! Form::label('fecha_reunion', 'Buscar desde:',['class' => 'col-sm-6 control-label']) !!}
          <div class="col-sm-6">
            {!! Form::date('inicio', \Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires')) ,['class' => 'form-control','id'=>'inicio']) !!}
          </div>
        </div>
        <div class="form-group col-sm-6 col-md-4">
          {!! Form::label('fecha_reunion', 'hasta:',['class' => 'col-sm-6 control-label']) !!}
          <div class="col-sm-6">
            {!! Form::date('fin', \Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires')) ,['class' => 'form-control','id'=>'fin']) !!}
          </div>
        </div>
        <div class="form-group col-sm-6 col-sm-offset-6 col-md-4 col-md-offset-0">
          <button type="button" id="buscar" class="btn btn-primary">Buscar</button>
        </div>
      </div>
      <div class="form-group col-sm-12" id="fecha">

        @include('asistencia.rango')

      </div>
    </div>
  </div>
</article>
@endsection

@section('js')
  {!! Html::script('assets/js/ajaxasistencia.js') !!}
@endsection
