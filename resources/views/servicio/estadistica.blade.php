@extends('layouts.app')

@section('content')

<article class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Estadisticas
    </div>
    <div class="panel-body">
      <div class="col-sm-2">
        Mes:
      {{Form::selectMonth('mes', \Carbon\Carbon::now()->format('m'), ['class' => 'form-control','id' => 'mes'])}}
      </div>
      Año:
      <input id="anio" type="text" name="anio" value="2016">
      <hr>
      <div id="estadistica">

      </div>
    </div>
  </div>
</article>
@endsection

@section('js')
  {!! Html::script('assets/js/ajaxtabla.js') !!}
@endsection
