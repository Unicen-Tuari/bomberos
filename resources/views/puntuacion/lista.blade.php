@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-table" aria-hidden="true"></span>
      <h4>Puntuaciones</h4>
    </div>
    <div class="panel-body">
      <div class="form-group col-sm-4">
        {{ Form::label('mess', 'Elija el mes: ',['class' => 'control-label col-sm-4']) }}
        <div class="col-sm-8">
          {{Form::select('mes', config('selects.meses'),\Carbon\Carbon::now()->format('m'), ['class' => 'form-control','id' => 'mes'])}}
        </div>
      </div>
      <div class="form-group col-sm-4">
        {{ Form::label('añoo', 'Elija el año: ',['class' => 'control-label col-sm-4']) }}
        <div class="col-sm-8">
          {{Form::text('año', \Carbon\Carbon::now()->format('Y'), ['class' => 'form-control','id'=>"año"])}}
        </div>
      </div>
      <div class="form-group col-sm-4">
        {{ Form::label('Buscar', 'Buscar: ',['class' => 'control-label col-sm-3']) }}
        <div class="col-sm-9">
          {{Form::text('busqueda', null, ['placeholder'=>"Nombre", 'class' => 'form-control inputFilter'])}}
        </div>
      </div>
      <div id="tabla">

      </div>
    </div>
  </div>

  {{-- Inicio MODAL --}}
  <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" id="puntuacion">

      </div>
    </div>
  </div>
  {{-- Fin --}}

</article>
@endsection

@section('js')
  {!! Html::script('assets/js/ajaxpuntuacion.js') !!}
@endsection
