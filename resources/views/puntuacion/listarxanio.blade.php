@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-table" aria-hidden="true"></span>
      <h4>Resumen mensual y anual de calificaciones</h4>
    </div>
    <div class="panel-body form-horizontal">
      <div class="form-group col-md-10 col-sm-12 ">
        {!! Form::label('fecha_reunion', 'Buscar desde:',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-2">
          {{Form::text('inicio', \Carbon\Carbon::now()->subYears(5)->format('Y'), ['class' => 'form-control','id'=>'inicio'])}}
        </div>

        {!! Form::label('fecha_reunion', 'hasta:',['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
          {{Form::text('fin', \Carbon\Carbon::now()->format('Y'), ['class' => 'form-control','id'=>'fin'])}}
        </div>

        <div class="col-sm-2">
          <button type="button" id="buscar" class="btn btn-primary">Buscar</button>
        </div>
      </div>
      <div class="form-group col-md-10 col-sm-12 ">
          {!! Form::label('bombero', 'Bombero',['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-2">
            {{Form::select('bombero', $bomberos,$bombero,['class' => 'selectMultiple','id'=>'bombero'])}}
          </div>
      </div>
      <div id="tablaxaño">

      </div>
    </div>
  </div>
</article>
@endsection

@section('js')
  {!! Html::script('assets/js/ajaxpuntuacionanual.js') !!}
@endsection
