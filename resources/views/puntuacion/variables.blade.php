@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-table" aria-hidden="true"></span>
      <h4>Modificar valores de Puntuacion</h4>
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => 'puntuacion.modificar', 'class' => 'form-horizontal', 'method' => 'POST']) !!}
        <div class="form-group">
          {!! Form::label('asistencia', 'Asistencia',['class' => 'col-sm-4 control-label']) !!}
          {!! Form::text('asistencia', $asistencia , ['class' => 'control-label col-sm-1']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('accidentales', 'Accidentales',['class' => 'col-sm-4 control-label']) !!}
          {!! Form::text('accidentales', $accidentales , ['class' => 'control-label col-sm-1']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('guardias', 'Guardias',['class' => 'col-sm-4 control-label']) !!}
          {!! Form::text('guardias', $guardias , ['class' => 'control-label col-sm-1']) !!}
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class=" glyphicon glyphicon-floppy-saved"></i> Guardar
            </button>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
