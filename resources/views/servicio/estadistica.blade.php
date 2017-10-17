@extends('layouts.app')

@section('content')

<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-bar-chart" aria-hidden="true"></span>
      <h4>Estadisticas</h4>
    </div>
    <div class="panel-body form-horizontal">
      <div class="form-group col-sm-3">
        {{ Form::label('me', 'Mes:',['class' => 'control-label col-sm-3']) }}
        <div class="col-sm-9">
          {{Form::select('mes', config('selects.meses'),\Carbon\Carbon::now()->format('m'), ['class' => 'form-control','id' => 'mes'])}}
        </div>
      </div>
      <div class="form-group col-sm-3">
        {{ Form::label('añ', 'Año:',['class' => 'control-label col-sm-3']) }}
        <div class="col-sm-9">
          {{Form::text('año', \Carbon\Carbon::now()->format('Y'), ['class' => 'form-control','id'=>'año'])}}
        </div>
      </div>
      <div id="estadistica">

      </div>
    </div>
  </div>
</article>
@endsection

@section('js')
  {!! Html::script('assets/js/ajaxtabla.js') !!}
@endsection
