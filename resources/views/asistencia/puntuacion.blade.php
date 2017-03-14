@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-table" aria-hidden="true"></span>
      <h4>Puntuaciones</h4>
    </div>
    <div class="panel-body">
      <div class="form-group col-sm-2">
        {{ Form::label('mess', 'Mes:',['class' => 'control-label col-sm-2 col-sm-offset-1']) }}
        <div class="col-sm-9">
          {{Form::select('mes', config('selects.meses'),\Carbon\Carbon::now()->format('m'), ['class' => 'form-control','id' => 'mes'])}}
        </div>
      </div>
      <div class="form-group col-sm-2">
        {{ Form::label('añoo', 'Año:',['class' => 'control-label col-sm-2 col-sm-offset-1']) }}
        <div class="col-sm-9">
          {{Form::text('año', \Carbon\Carbon::now()->format('Y'), ['class' => 'form-control','id'=>"año"])}}
        </div>
      </div>
      <div id="puntuacion">

      </div>
    </div>
  </div>
</article>
@endsection

@section('js')
  {!! Html::script('assets/js/ajaxpuntuacion.js') !!}
@endsection
